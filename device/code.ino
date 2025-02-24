/*
  demo place. (ID 0)
 */

#include <AirGradient.h>
#include <ESP8266WiFi.h>
#include <ESP8266HTTPClient.h>
#include <Wire.h>
#include "SSD1306Wire.h"

AirGradient ag = AirGradient(DIY_BASIC);
SSD1306Wire display(0x3c, SDA, SCL);

// Sensor configuration
boolean hasPM = false;
boolean hasCO2 = false;
boolean hasSHT = false;

// Display configuration
boolean inUSaqi = false;
boolean inF = false;

// WiFi configuration
boolean connectWIFI = true;
const char* ssid = "oarit_2.5G";
const char* password = "oarit123";

// Server configuration
String serverName = "http://ddr.oas.psu.ac.th/update_sensor.php";

// Timing variables
unsigned long previousMillis = 0;
const long interval = 10000;  // 10 seconds ส่งค่าทุก 10 วินาที

void setup() {
  Serial.begin(9600);

  // Initialize display
  display.init();
  display.flipScreenVertically();
  showTextRectangle("Init", String(ESP.getChipId(), HEX), true);

  /// For firmware version 3.0.3 or later ///
  /** Init I2C */
  Wire.begin(ag.getI2cSdaPin(), ag.getI2cSclPin());
  delay(1000);

  /** Init SHT */
  if (ag.sht.begin(Wire) == false) {
    Serial.println("SHTx sensor not found");
    hasSHT = false;
  } else {
    Serial.println("SHTx sensor found");
    hasSHT = true;
  }

  /** Init S8 CO2 sensor */
  if (ag.s8.begin(&Serial) == false) {
    Serial.println("CO2 S8 sensor not found");
    hasCO2 = false;
  } else {
    Serial.println("CO2 S8 sensor found");
    hasCO2 = true;
  }

  /** Init PMS5003 */
  if (ag.pms5003.begin(&Serial) == false) {
    Serial.println("PMS sensor not found");
    hasPM = false;
  } else {
    Serial.println("PMS sensor found");
    hasPM = true;
  }

  // Initialize sensors
  // if (hasPM) ag.PMS_Init();
  // if (hasCO2) ag.CO2_Init();
  // if (hasSHT) ag.TMP_RH_Init(0x44);

  Serial.println("Firmware Version: " + ag.getVersion());
  // Connect to WiFi
  if (connectWIFI) {
    WiFi.begin(ssid, password);
    while (WiFi.status() != WL_CONNECTED) {
      delay(500);
      Serial.print(".");
    }
    Serial.println("\nConnected to WiFi");
    Serial.print("IP address: ");
    Serial.println(WiFi.localIP());
  }
}

void loop() {
  unsigned long currentMillis = millis();

  /// For firmware version 3.0.3 or later ///
  if (currentMillis - previousMillis >= interval) {
    previousMillis = currentMillis;

    // Read sensor data
    int PM2 = hasPM ? ag.sht.getTemperature() : 0;
    int CO2 = hasCO2 ? ag.s8.getCo2() : 0;
    float hum;
    float temp;

    if (hasSHT) {
      if (ag.sht.measure()) {
        hum = ag.sht.getRelativeHumidity();
        temp = ag.sht.getTemperature();
      } else {
        Serial.println("Measure failed");
      }
    } else {
      hum = 0;
      temp = 0;
    }

    // int PM2 = hasPM ? ag.getPM2_Raw() : 0;
    // int CO2 = hasCO2 ? ag.getCO2_Raw() : 0;
    // TMP_RH result = hasSHT ? ag.periodicFetchData() : TMP_RH{ 0, 0 };

    // Display data on OLED
//    if (hasPM) {
//      if (inUSaqi) {
//        showTextRectangle("AQI", String(PM_TO_AQI_US(PM2)), false);
//      } else {
//        showTextRectangle("PM2", String(PM2), false);
//      }
//    }

    if (hasPM) {
      if (inUSaqi) {
        showTextRectangle("AQI", String(PM_TO_AQI_US(PM2)), false);
      } else {
        showTextRectangle("PM2", String(PM2), false);
      }
      // เพิ่มการหน่วงเวลาอีกครั้งหากต้องการ
//      delay(5000); // แสดงค่าฝุ่นเป็นเวลา 5 วินาที
    }

    if (hasCO2) {
      showTextRectangle("CO2", String(CO2), false);
    }
    if (hasSHT) {
      if (inF) {
        showTextRectangle(String((temp * 9 / 5) + 32), String(hum) + "%", false);
      } else {
        showTextRectangle(String(temp), String(hum) + "%", false);
      }
    }

    // Send data to server
    if (connectWIFI) {
      sendDataToServer(PM2, CO2, temp, hum);
    }
    Serial.println("AQI: " + String(PM_TO_AQI_US(PM2)));
    Serial.println("PM2: " + String(PM2));
    Serial.println("CO2: " + String(CO2));
    if (inF) {
      Serial.println("Temp: " + String((temp * 9 / 5) + 32) + "C\t Hum: " + String(hum) + "%");
    } else {
      Serial.println("Temp: " + String(temp) + "C, Hum: " + String(hum) + "%");
    }
  }
}

void sendDataToServer(int pm2, int co2, float temp, float humidity) {
  if (WiFi.status() == WL_CONNECTED) {
    WiFiClient client;
    HTTPClient http;

    String ipadd = WiFi.localIP().toString();

    String url = serverName + "?sensor=demoplace&posid=0" + "&pm=" + String(pm2) + "&temp=" + String(temp) + "&hum=" + String(humidity) + "&aqi=" + String(PM_TO_AQI_US(pm2)) + "&ipAdd=" + ipadd;

    if (hasCO2) {
      url += "&co2=" + String(co2);
    }

    http.begin(client, url);
    int httpResponseCode = http.GET();

    Serial.println("Sending data to server:");
    Serial.println(url);  // Print the full URL being sent
    Serial.print("HTTP Response code: ");
    Serial.println(httpResponseCode);

    if (httpResponseCode > 0) {
      String response = http.getString();
      Serial.println("Server response:");
      Serial.println(response);
    }

    http.end();
  } else {
    Serial.println("WiFi Disconnected");
  }
}

//void showTextRectangle(String ln1, String ln2, boolean small) {
//  display.clear();
//  display.setTextAlignment(TEXT_ALIGN_LEFT);
//  if (small) {
//    display.setFont(ArialMT_Plain_16);
//  } else {
//    display.setFont(ArialMT_Plain_24);
//  }
//  display.drawString(32, 16, ln1);
//  display.drawString(32, 36, ln2);
//  display.display();
//}

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
  
  // หน่วงเวลา 4 วินาที (4000 มิลลิวินาที) ก่อนที่จะล้างหน้าจอ
  delay(4000);
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
}