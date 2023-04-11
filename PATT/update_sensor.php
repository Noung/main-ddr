<?php
// Create connection
$mysqli = new mysqli("localhost","ddr","**123ddr321**","ddr");
$mysqli->set_charset('utf8');

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$dateadd = date("Y-m-d");
$timeadd = date("H:i:s");
$dustrec_timestamp = date("Y-m-d H:i:s");
$sensor = $_GET['sensor'];//ชื่อ sensor ประจำจุด
$dustrec_position_id = $_GET['posid'];//ตำแหน่ง
$dustrec_amount_dust = $_GET['pm'];//ฝุ่น
$dustrec_temp = $_GET['temp'];//อุณหภูมิ
$dustrec_moistness = $_GET['hum'];//ความชื้น
$dustrec_amount_co2 = '';//คาร์บอนไดออกไซด์

/*$dustrec_position_id = "12";//ตำแหน่ง
$dustrec_amount_dust = "5";//ฝุ่น
$dustrec_temp = "25";//อุณหภูมิ
$dustrec_moistness = "48";//ความชื้น
$dustrec_amount_co2 = '';//คาร์บอนไดออกไซด์*/

/*$sql = "INSERT INTO dustrec (dustrec_id, dustrec_date, dustrec_time, dustrec_position_id, dustrec_amount_dust, dustrec_temp, dustrec_moistness, dustrec_amount_co2, dustrec_timestamp) VALUES ('', '$dateadd', '$timeadd', '$dustrec_position_id', '$dustrec_amount_dust', '$dustrec_temp', '$dustrec_moistness', '$dustrec_amount_co2', '$dustrec_timestamp')";*/

// Perform query
$mysqli -> query("INSERT INTO dustrec (dustrec_id, dustrec_date, dustrec_time, dustrec_position_id, dustrec_amount_dust, dustrec_temp, dustrec_moistness, dustrec_amount_co2, dustrec_timestamp) VALUES ('', '$dateadd', '$timeadd', '$dustrec_position_id', '$dustrec_amount_dust', '$dustrec_temp', '$dustrec_moistness', '$dustrec_amount_co2', '$dustrec_timestamp')");

$mysqli -> close();
?>