<?php
include "include/dbconf.php";
include "include/function.php";

$posid = $_GET['posid'];
//echo $posid; exit();

$date = date("Y-m-d");
$sql = "select avg(dustrec_amount_dust),avg(dustrec_temp),avg(dustrec_moistness),avg(dustrec_amount_co2) from dustrec as a, position as b where a.dustrec_position_id = '" . $posid . "' AND a.dustrec_date = '$date' AND b.position_id = a.dustrec_position_id";
$query = mysqli_query($connection, $sql);
$row = mysqli_num_rows($query);
$row_result = mysqli_fetch_array($query, MYSQLI_ASSOC);

$dust = number_format((float)$row_result['avg(dustrec_amount_dust)'], 2, '.', '');
$temp = number_format((float)$row_result['avg(dustrec_temp)'], 2, '.', '');
$mois = number_format((float) $row_result['avg(dustrec_moistness)'], 2, '.', '');
$carbon = number_format((float) $row_result['avg(dustrec_amount_co2)'], 2, '.', '');

$aqiVal = number_format((float)aqiCal($dust), 2, '.', '');
if ($aqiVal <= 50) {
    $aqiClass = 'aqi_god';
    $aqiDcrt = 'อากาศดี';
} else if ($aqiVal <= 100) {
    $aqiClass = 'aqi_mod';
    $aqiDcrt = 'อากาศปานกลาง';
} else if ($aqiVal <= 150) {
    $aqiClass = 'aqi_unh';
    $aqiDcrt = 'อากาศไม่ดีต่อกลุ่มเสี่ยง';
} else if ($aqiVal <= 200) {
    $aqiClass = 'aqi_mun';
    $aqiDcrt = 'อากาศไม่ดี';
} else if ($aqiVal <= 300) {
    $aqiClass = 'aqi_vuh';
    $aqiDcrt = 'อากาศไม่ดีอย่างยิ่ง';
} else {
    $aqiClass = 'aqi_haz';
    $aqiDcrt = 'อากาศอันตราย';
}

$ddrdata = array( //สร้าง array เก็บค่าที่ค้นได้ไปใช้
    "dust" => $dust,
    "temp" => $temp,
    "mois" => $mois,
    "carbon" => $carbon,
    "aqi" => $aqiDcrt
);

//print_r($ddrdata);
//var_dump($ddrdata);

header("Content-Type: application/json");
json_encode($ddrdata);
echo json_encode($ddrdata);
?>
