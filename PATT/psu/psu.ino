#include <Arduino.h>
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <ESP8266WebServer.h>
#include <ArduinoJson.h>
#include <TridentTD_LineNotify.h>
#include <ESPDateTime.h>
#include "osapi.h"
#include <AirGradient.h>
#include "SSD1306Wire.h"
#include "user_interface.h"
#include "wpa2_enterprise.h"
SSD1306Wire display(0x3c, SDA, SCL);

AirGradient ag = AirGradient();

// set sensors that you do not use to false
boolean hasPM = true;
boolean hasCO2 = true;
boolean hasSHT = true;

// set to true to switch PM2.5 from ug/m3 to US AQI
boolean inUSaqi = false;

// set to true to switch from Celcius to Fahrenheit
boolean inF = false;


//-------------------------------------------------------- WiFi config --------------------------------------------------------
// SSID to connect to
static const char* ssid = "PSU WiFi (802.1x)";
// Username for authentification
static const char* username = "kittisak.k";
// Password for authentification
static const char* password = "itjfklib50*";

//-------------------------------------------------------- Line config --------------------------------------------------------
#define LINE_TOKEN "eS9XaDaUTfeDFcqz2eiipGZhXZVFyhjU4GM236YeOX9"

//-------------------------------------------------------- Web/Server address to read/write from --------------------------------------------------------
String serverName = "http://ddr.oas.psu.ac.th/update_sensor.php";

void setupDateTime() { //--------------------------------------------------------  setup DateTime --------------------------------------------------------
 
  DateTime.setServer("time.psu.ac.th");
  DateTime.setTimeZone("UTC-7");
  DateTime.begin();
  
  Serial.printf("DateTime : %s\n", DateTime.toISOString().c_str());
  // กำหนด Line Token
  LINE.setToken(LINE_TOKEN);
  String date = DateTime.toISOString().c_str();
  String message = "Connect ";
  LINE.notify(message+date);

}
//--------------------------------------------------------  setup --------------------------------------------------------
void setup() {

  Serial.begin(9600);
  
  display.init();
  display.flipScreenVertically();
  showTextRectangle("Init", String(ESP.getChipId(), HEX), true);

//-------------------------------------------------------- connect WiFi --------------------------------------------------------
  wifi_station_disconnect();
   struct station_config wifi_config;
      memset(&wifi_config, 0, sizeof(wifi_config));
      strcpy((char*)wifi_config.ssid, ssid);
      wifi_station_set_config(&wifi_config);
      wifi_station_clear_cert_key();
      wifi_station_clear_enterprise_ca_cert();
      wifi_station_set_wpa2_enterprise_auth(1);
      wifi_station_set_enterprise_identity((uint8*)username, strlen(username));
      wifi_station_set_enterprise_username((uint8*)username, strlen(username));
      wifi_station_set_enterprise_password((uint8*)password, strlen(password));
      wifi_station_connect();

  Serial.print("Status: ");
  Serial.println(wifi_station_get_connect_status());

  Serial.println("");
  Serial.println("");
  Serial.println(LINE.getVersion());
  Serial.println("");
  Serial.print("Try connect to ");
  Serial.println(ssid);


  // Wait for connection AND IP address from DHCP
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.println("WiFi connected");
  Serial.print("IP address : ");
  Serial.println(WiFi.localIP());
  
  setupDateTime(); //DateTime
  delay(10000);  //Post Data at every 10 seconds

} //-------------------------------------------------------- End setup --------------------------------------------------------

void loop() {
  // create payload
  String payload = "{\"wifi\":" + String(WiFi.RSSI()) + ",";

  if (hasPM) {
    int PM2 = ag.getPM2_Raw();
    payload = payload + "\"pm02\":" + String(PM2);

    if (inUSaqi) {
      showTextRectangle("AQI", String(PM_TO_AQI_US(PM2)), false);
    } else {
      showTextRectangle("PM2", String(PM2), false);
    }
  }

  if (hasCO2) {
    if (hasPM) payload = payload + ",";
    int CO2 = ag.getCO2_Raw();
    payload = payload + "\"rco2\":" + String(CO2);
    showTextRectangle("CO2", String(CO2), false);
  }

  if (hasSHT) {
    if (hasCO2 || hasPM) payload = payload + ",";
    TMP_RH result = ag.periodicFetchData();
    payload = payload + "\"atmp\":" + String(result.t) + ",\"rhum\":" + String(result.rh);

    if (inF) {
      showTextRectangle(String((result.t * 9 / 5) + 32), String(result.rh) + "%", false);
    } else {
      showTextRectangle(String(result.t), String(result.rh) + "%", false);
    }
  }

  payload = payload + "}";

  Serial.println(payload);
  
  Serial.println(payload);
  int PM2 = ag.getPM2_Raw();
  TMP_RH result = ag.periodicFetchData();
  String POSTURL = serverName + "?sensor=f3&posid=13&pm="+PM2+"&temp="+String(result.t)+"&hum="+String(result.rh);
   
  WiFiClient client;
  HTTPClient http;
  http.begin(client, POSTURL);
  int httpResponseCode = http.GET();
  delay(21000);
}

// DISPLAY
void showTextRectangle(String ln1, String ln2, boolean small) {
  display.clear();
  display.setTextAlignment(TEXT_ALIGN_LEFT);
  if (small) {
    display.setFont(ArialMT_Plain_16);
  } else {
    display.setFont(ArialMT_Plain_24);
  }
  display.drawString(32, 16, ln1);
  display.drawString(32, 36, ln2);
  display.display();
}

// Calculate PM2.5 US AQI
int PM_TO_AQI_US(int pm02) {
  if (pm02 <= 12.0) return ((50 - 0) / (12.0 - .0) * (pm02 - .0) + 0);
  else if (pm02 <= 35.4) return ((100 - 50) / (35.4 - 12.0) * (pm02 - 12.0) + 50);
  else if (pm02 <= 55.4) return ((150 - 100) / (55.4 - 35.4) * (pm02 - 35.4) + 100);
  else if (pm02 <= 150.4) return ((200 - 150) / (150.4 - 55.4) * (pm02 - 55.4) + 150);
  else if (pm02 <= 250.4) return ((300 - 200) / (250.4 - 150.4) * (pm02 - 150.4) + 200);
  else if (pm02 <= 350.4) return ((400 - 300) / (350.4 - 250.4) * (pm02 - 250.4) + 300);
  else if (pm02 <= 500.4) return ((500 - 400) / (500.4 - 350.4) * (pm02 - 350.4) + 400);
  else return 500;
};
