<!-- Header -->
<?php
session_start();
error_reporting(0); // ปิด error report
include "../include/dbconf.php";
include "../include/function.php";

$dateshow = date("d/m/Y");
$time = date("H:i:s");
if ($time > '00:00:00' && $time <= '12:00:00') {
    $period = 'ช่วงเช้า';
} else if ($time > '12:00:00' && $time <= '16:30:00') {
    $period = 'ช่วงบ่าย';
} else {
    $period = 'ตลอดวัน';
}
$messageline .= "\n\nสภาพอากาศเฉลี่ย$period วันที่ $dateshow";
?>
<!-- Header -->

<!-- อาคารสำนักวิทยบริการ ชั้น 1 -->
<?php
$date = date("Y-m-d");
$sql = "select avg(dustrec_amount_dust),avg(dustrec_temp),avg(dustrec_moistness),avg(dustrec_amount_co2) from dustrec as a, position as b where b.position_id = a.dustrec_position_id AND b.position_name = 'โถงอ่านหนังสือชั้น 1' AND a.dustrec_date = '$date'";
$query = mysqli_query($connection, $sql);
$row = mysqli_num_rows($query);
$row_result = mysqli_fetch_array($query, MYSQLI_ASSOC);

$pm22_1 = $row_result['avg(dustrec_amount_dust)'];

$aqiVal = number_format((float)(aqiCal($row_result['avg(dustrec_amount_dust)'])), 2, '.', '');
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

//$messageline .= "\nอาคารสำนักวิทยบริการ ชั้น 1\n - ฝุ่นละออง " . number_format((float)$row_result['avg(dustrec_amount_dust)'], 2, '.', '') . " µg/m³\n - อุณหภูมิ " . number_format((float)$row_result['avg(dustrec_temp)'], 2, '.', '') . " °C\n - ความชื้น " . number_format((float)$row_result['avg(dustrec_moistness)'], 2, '.', '') . " %\n - คาร์บอนฯ " . number_format((float)$row_result['avg(dustrec_amount_co2)'], 2, '.', '') . " PPM.\n - AQI " . $aqiVal . " คุณภาพ" . $aqiDcrt;

$messageline .= "\n- อาคารสำนักวิทยบริการ ชั้น 1 AQI " . $aqiVal . " คุณภาพ" . $aqiDcrt . "\n(" . number_format((float)$row_result['avg(dustrec_amount_dust)'], 2, '.', '') . " µg/m³, " . number_format((float)$row_result['avg(dustrec_temp)'], 2, '.', '') . " °C, " . number_format((float)$row_result['avg(dustrec_moistness)'], 2, '.', '') . " %, " . number_format((float)$row_result['avg(dustrec_amount_co2)'], 2, '.', '') . " PPM.)";

/*$massage1=iconv('utf-8','utf-8',$messageline);
                    define('LINE_API',"https://notify-api.line.me/api/notify");
                    $token = "h7GbD4ac0qMXgx6YYqCR4Zt6niD1If0fPJzjOea1Z2t"; //ใส่ Token ของ group line ที่จะแจ้ง
                    $str1 = $massage1; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
                    $res = notify_message($str1,$token);*/

?>

<div class="row">
    <h3>อาคารสำนักวิทยบริการ ชั้น 1 (โถงอ่านหนังสือชั้น 1)</h3>
    <img src="/assets/icons/dust.png" width="25"> ฝุ่น (µg/m³)
    <?php echo number_format((float)$row_result['avg(dustrec_amount_dust)'], 2, '.', ''); ?>
    <img src="/assets/icons/celsius.png" width="25"> อุณหภูมิ (°C)
    <?php echo number_format((float)$row_result['avg(dustrec_temp)'], 2, '.', ''); ?>
    <img src="/assets/icons/waterdrop.png" width="25"> ความชื้น (%)
    <?php echo number_format((float)$row_result['avg(dustrec_moistness)'], 2, '.', ''); ?>
    <img src="/assets/icons/co2.png" width="25"> คาร์บอนฯ (PPM.)
    <?php echo number_format((float)$row_result['avg(dustrec_amount_co2)'], 2, '.', ''); ?>
</div>
<!-- อาคารสำนักวิทยบริการ ชั้น 1 -->

<!-- อาคารสำนักวิทยบริการ ชั้น 2 -->
<?php
$date = date("Y-m-d");
$sql = "select avg(dustrec_amount_dust),avg(dustrec_temp),avg(dustrec_moistness),avg(dustrec_amount_co2) from dustrec as a, position as b where b.position_id = a.dustrec_position_id AND b.position_name = 'โถงอ่านหนังสือชั้น 2' AND a.dustrec_date = '$date'";
$query = mysqli_query($connection, $sql);
$row = mysqli_num_rows($query);
$row_result = mysqli_fetch_array($query, MYSQLI_ASSOC);

$pm22_2 = $row_result['avg(dustrec_amount_dust)'];

$aqiVal = number_format((float)(aqiCal($row_result['avg(dustrec_amount_dust)'])), 2, '.', '');
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

//$messageline .= "\nอาคารสำนักวิทยบริการ ชั้น 2\n - ฝุ่นละออง " . number_format((float)$row_result['avg(dustrec_amount_dust)'], 2, '.', '') . " µg/m³\n - อุณหภูมิ " . number_format((float)$row_result['avg(dustrec_temp)'], 2, '.', '') . " °C\n - ความชื้น " . number_format((float)$row_result['avg(dustrec_moistness)'], 2, '.', '') . " %\n - คาร์บอนฯ " . number_format((float)$row_result['avg(dustrec_amount_co2)'], 2, '.', '') . " PPM.\n - AQI " . $aqiVal . " คุณภาพ" . $aqiDcrt;

$messageline .= "\n- อาคารสำนักวิทยบริการ ชั้น 2 AQI " . $aqiVal . " คุณภาพ" . $aqiDcrt . "\n(" . number_format((float)$row_result['avg(dustrec_amount_dust)'], 2, '.', '') . " µg/m³, " . number_format((float)$row_result['avg(dustrec_temp)'], 2, '.', '') . " °C, " . number_format((float)$row_result['avg(dustrec_moistness)'], 2, '.', '') . " %, " . number_format((float)$row_result['avg(dustrec_amount_co2)'], 2, '.', '') . " PPM.)";

/*$massage2=iconv('utf-8','utf-8',$messageline);
                    define('LINE_API',"https://notify-api.line.me/api/notify");
                    $token = "h7GbD4ac0qMXgx6YYqCR4Zt6niD1If0fPJzjOea1Z2t"; //ใส่ Token ของ group line ที่จะแจ้ง
                    $str2 = $massage2; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
                    $res = notify_message($str2,$token);*/

?>

<div class="row">
    <h3>อาคารสำนักวิทยบริการ ชั้น 2 (โถงอ่านหนังสือชั้น 2)</h3>
    <img src="/assets/icons/dust.png" width="25"> ฝุ่น (µg/m³)
    <?php echo number_format((float)$row_result['avg(dustrec_amount_dust)'], 2, '.', ''); ?>
    <img src="/assets/icons/celsius.png" width="25"> อุณหภูมิ (°C)
    <?php echo number_format((float)$row_result['avg(dustrec_temp)'], 2, '.', ''); ?>
    <img src="/assets/icons/waterdrop.png" width="25"> ความชื้น (%)
    <?php echo number_format((float)$row_result['avg(dustrec_moistness)'], 2, '.', ''); ?>
    <img src="/assets/icons/co2.png" width="25"> คาร์บอนฯ (PPM.)
    <?php echo number_format((float)$row_result['avg(dustrec_amount_co2)'], 2, '.', ''); ?>
</div>
<!-- อาคารสำนักวิทยบริการ ชั้น 2 -->

<!-- อาคารสำนักวิทยบริการ ชั้น 3 -->
<?php
$date = date("Y-m-d");
$sql = "select avg(dustrec_amount_dust),avg(dustrec_temp),avg(dustrec_moistness),avg(dustrec_amount_co2) from dustrec as a, position as b where b.position_id = a.dustrec_position_id AND b.position_name = 'IT-Zone' AND a.dustrec_date = '$date'";
$query = mysqli_query($connection, $sql);
$row = mysqli_num_rows($query);
$row_result = mysqli_fetch_array($query, MYSQLI_ASSOC);

$pm22_3 = $row_result['avg(dustrec_amount_dust)'];

$aqiVal = number_format((float)(aqiCal($row_result['avg(dustrec_amount_dust)'])), 2, '.', '');
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

//$messageline .= "\nอาคารสำนักวิทยบริการ ชั้น 3\n - ฝุ่นละออง " . number_format((float)$row_result['avg(dustrec_amount_dust)'], 2, '.', '') . " µg/m³\n - อุณหภูมิ " . number_format((float)$row_result['avg(dustrec_temp)'], 2, '.', '') . " °C\n - ความชื้น " . number_format((float)$row_result['avg(dustrec_moistness)'], 2, '.', '') . " %\n - คาร์บอนฯ " . number_format((float)$row_result['avg(dustrec_amount_co2)'], 2, '.', '') . " PPM.\n - AQI " . $aqiVal . " คุณภาพ" . $aqiDcrt;

$messageline .= "\n- อาคารสำนักวิทยบริการ ชั้น 3 AQI " . $aqiVal . " คุณภาพ" . $aqiDcrt . "\n(" . number_format((float)$row_result['avg(dustrec_amount_dust)'], 2, '.', '') . " µg/m³, " . number_format((float)$row_result['avg(dustrec_temp)'], 2, '.', '') . " °C, " . number_format((float)$row_result['avg(dustrec_moistness)'], 2, '.', '') . " %, " . number_format((float)$row_result['avg(dustrec_amount_co2)'], 2, '.', '') . " PPM.)";

/*$massage3=iconv('utf-8','utf-8',$messageline);
                    define('LINE_API',"https://notify-api.line.me/api/notify");
                    $token = "h7GbD4ac0qMXgx6YYqCR4Zt6niD1If0fPJzjOea1Z2t"; //ใส่ Token ของ group line ที่จะแจ้ง
                    $str3 = $massage3; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
                    $res = notify_message($str3,$token);*/

?>

<div class="row">
    <h3>อาคารสำนักวิทยบริการ ชั้น 3 (IT-Zone)</h3>
    <img src="/assets/icons/dust.png" width="25"> ฝุ่น (µg/m³)
    <?php echo number_format((float)$row_result['avg(dustrec_amount_dust)'], 2, '.', ''); ?>
    <img src="/assets/icons/celsius.png" width="25"> อุณหภูมิ (°C)
    <?php echo number_format((float)$row_result['avg(dustrec_temp)'], 2, '.', ''); ?>
    <img src="/assets/icons/waterdrop.png" width="25"> ความชื้น (%)
    <?php echo number_format((float)$row_result['avg(dustrec_moistness)'], 2, '.', ''); ?>
    <img src="/assets/icons/co2.png" width="25"> คาร์บอนฯ (PPM.)
    <?php echo number_format((float)$row_result['avg(dustrec_amount_co2)'], 2, '.', ''); ?>
</div>
<!-- อาคารสำนักวิทยบริการ ชั้น 3 -->

<!-- อาคาร JFK ชั้น 1 (ตึกเก่า) -->
<?php
$date = date("Y-m-d");
$sql = "select avg(dustrec_amount_dust),avg(dustrec_temp),avg(dustrec_moistness),avg(dustrec_amount_co2) from dustrec as a, position as b where b.position_id = a.dustrec_position_id AND b.position_name = 'งานซ่อมฯ' AND a.dustrec_date = '$date'";
$query = mysqli_query($connection, $sql);
$row = mysqli_num_rows($query);
$row_result = mysqli_fetch_array($query, MYSQLI_ASSOC);

$pm17_1 = $row_result['avg(dustrec_amount_dust)'];

$aqiVal = number_format((float)(aqiCal($row_result['avg(dustrec_amount_dust)'])), 2, '.', '');
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

//$messageline .= "\nอาคาร JFK ชั้น 1 (ตึกเก่า)\n - ฝุ่นละออง " . number_format((float)$row_result['avg(dustrec_amount_dust)'], 2, '.', '') . " µg/m³\n - อุณหภูมิ " . number_format((float)$row_result['avg(dustrec_temp)'], 2, '.', '') . " °C\n - ความชื้น " . number_format((float)$row_result['avg(dustrec_moistness)'], 2, '.', '') . " %\n - คาร์บอนฯ " . number_format((float)$row_result['avg(dustrec_amount_co2)'], 2, '.', '') . " PPM.\n - AQI " . $aqiVal . " คุณภาพ" . $aqiDcrt;

$messageline .= "\n- อาคาร JFK ชั้น 1 AQI " . $aqiVal . " คุณภาพ" . $aqiDcrt . "\n(" . number_format((float)$row_result['avg(dustrec_amount_dust)'], 2, '.', '') . " µg/m³, " . number_format((float)$row_result['avg(dustrec_temp)'], 2, '.', '') . " °C, " . number_format((float)$row_result['avg(dustrec_moistness)'], 2, '.', '') . " %, " . number_format((float)$row_result['avg(dustrec_amount_co2)'], 2, '.', '') . " PPM.)";

/*$massage4 = iconv('utf-8', 'utf-8', $messageline);
define('LINE_API', "https://notify-api.line.me/api/notify");
$token = "h7GbD4ac0qMXgx6YYqCR4Zt6niD1If0fPJzjOea1Z2t"; //ใส่ Token ของ group line ที่จะแจ้ง
$str4 = $massage4; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
$res = notify_message($str4, $token);*/

?>

<div class="row">
    <h3>อาคาร JFK ชั้น 1 (ตึกเก่า) (งานซ่อมฯ)</h3>
    <img src="/assets/icons/dust.png" width="25"> ฝุ่น (µg/m³)
    <?php echo number_format((float)$row_result['avg(dustrec_amount_dust)'], 2, '.', ''); ?>
    <img src="/assets/icons/celsius.png" width="25"> อุณหภูมิ (°C)
    <?php echo number_format((float)$row_result['avg(dustrec_temp)'], 2, '.', ''); ?>
    <img src="/assets/icons/waterdrop.png" width="25"> ความชื้น (%)
    <?php echo number_format((float)$row_result['avg(dustrec_moistness)'], 2, '.', ''); ?>
    <img src="/assets/icons/co2.png" width="25"> คาร์บอนฯ (PPM.)
    <?php echo number_format((float)$row_result['avg(dustrec_amount_co2)'], 2, '.', ''); ?>
</div>
<!-- อาคาร JFK ชั้น 1 (ตึกเก่า) -->

<!-- อาคาร JFK ชั้น 2 (ตึกเก่า) -->
<?php
$date = date("Y-m-d");
$sql = "select avg(dustrec_amount_dust),avg(dustrec_temp),avg(dustrec_moistness),avg(dustrec_amount_co2) from dustrec as a, position as b where b.position_id = a.dustrec_position_id AND b.position_name = 'ที่นั่งอ่านหนังสือด้านตะวันออก' AND a.dustrec_date = '$date'";
$query = mysqli_query($connection, $sql);
$row = mysqli_num_rows($query);
$row_result = mysqli_fetch_array($query, MYSQLI_ASSOC);

$pm17_2 = $row_result['avg(dustrec_amount_dust)'];

$aqiVal = number_format((float)(aqiCal($row_result['avg(dustrec_amount_dust)'])), 2, '.', '');
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

//$messageline .= "\nอาคาร JFK ชั้น 2 (ตึกเก่า)\n - ฝุ่นละออง " . number_format((float)$row_result['avg(dustrec_amount_dust)'], 2, '.', '') . " µg/m³\n - อุณหภูมิ " . number_format((float)$row_result['avg(dustrec_temp)'], 2, '.', '') . " °C\n - ความชื้น " . number_format((float)$row_result['avg(dustrec_moistness)'], 2, '.', '') . " %\n - คาร์บอนฯ " . number_format((float)$row_result['avg(dustrec_amount_co2)'], 2, '.', '') ." PPM.\n - AQI " . $aqiVal . " คุณภาพ" . $aqiDcrt;

$messageline .= "\n- อาคาร JFK ชั้น 2 AQI " . $aqiVal . " คุณภาพ" . $aqiDcrt . "\n(" . number_format((float)$row_result['avg(dustrec_amount_dust)'], 2, '.', '') . " µg/m³, " . number_format((float)$row_result['avg(dustrec_temp)'], 2, '.', '') . " °C, " . number_format((float)$row_result['avg(dustrec_moistness)'], 2, '.', '') . " %, " . number_format((float)$row_result['avg(dustrec_amount_co2)'], 2, '.', '') . " PPM.)";

/*$massage4 = iconv('utf-8', 'utf-8', $messageline);
define('LINE_API', "https://notify-api.line.me/api/notify");
$token = "h7GbD4ac0qMXgx6YYqCR4Zt6niD1If0fPJzjOea1Z2t"; //ใส่ Token ของ group line ที่จะแจ้ง
$str4 = $massage4; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
$res = notify_message($str4, $token);*/

?>

<div class="row">
    <h3>อาคาร JFK ชั้น 2 (ตึกเก่า) (ที่นั่งอ่านหนังสือด้านตะวันออก)</h3>
    <img src="/assets/icons/dust.png" width="25"> ฝุ่น (µg/m³)
    <?php echo number_format((float)$row_result['avg(dustrec_amount_dust)'], 2, '.', ''); ?>
    <img src="/assets/icons/celsius.png" width="25"> อุณหภูมิ (°C)
    <?php echo number_format((float)$row_result['avg(dustrec_temp)'], 2, '.', ''); ?>
    <img src="/assets/icons/waterdrop.png" width="25"> ความชื้น (%)
    <?php echo number_format((float)$row_result['avg(dustrec_moistness)'], 2, '.', ''); ?>
    <img src="/assets/icons/co2.png" width="25"> คาร์บอนฯ (PPM.)
    <?php echo number_format((float)$row_result['avg(dustrec_amount_co2)'], 2, '.', ''); ?>
</div>
<!-- อาคาร JFK ชั้น 2 (ตึกเก่า) -->

<!-- ห้องสำนักงานบริหาร -->
<?php
$date = date("Y-m-d");
$sql = "select avg(dustrec_amount_dust),avg(dustrec_temp),avg(dustrec_moistness),avg(dustrec_amount_co2) from dustrec as a, position as b where b.position_id = a.dustrec_position_id AND b.position_name = 'สำนักงานเลขานุการ' AND a.dustrec_date = '$date'";
$query = mysqli_query($connection, $sql);
$row = mysqli_num_rows($query);
$row_result = mysqli_fetch_array($query, MYSQLI_ASSOC);

$pm22_secret = $row_result['avg(dustrec_amount_dust)'];

$aqiVal = number_format((float)(aqiCal($row_result['avg(dustrec_amount_dust)'])), 2, '.', '');
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

//$messageline .= "\nห้องสำนักงานบริหาร\n - ฝุ่นละออง " . number_format((float)$row_result['avg(dustrec_amount_dust)'], 2, '.', '') . " µg/m³\n - อุณหภูมิ " . number_format((float)$row_result['avg(dustrec_temp)'], 2, '.', '') . " °C\n - ความชื้น " . number_format((float)$row_result['avg(dustrec_moistness)'], 2, '.', '') . " %\n - คาร์บอนฯ " . number_format((float)$row_result['avg(dustrec_amount_co2)'], 2, '.', '') ." PPM.\n - AQI " . $aqiVal . " คุณภาพ" . $aqiDcrt;

$messageline .= "\n- ห้องสำนักงานบริหาร AQI " . $aqiVal . " คุณภาพ" . $aqiDcrt . "\n(" . number_format((float)$row_result['avg(dustrec_amount_dust)'], 2, '.', '') . " µg/m³, " . number_format((float)$row_result['avg(dustrec_temp)'], 2, '.', '') . " °C, " . number_format((float)$row_result['avg(dustrec_moistness)'], 2, '.', '') . " %, " . number_format((float)$row_result['avg(dustrec_amount_co2)'], 2, '.', '') . " PPM.)";

/*$massage4 = iconv('utf-8', 'utf-8', $messageline);
define('LINE_API', "https://notify-api.line.me/api/notify");
$token = "h7GbD4ac0qMXgx6YYqCR4Zt6niD1If0fPJzjOea1Z2t"; //ใส่ Token ของ group line ที่จะแจ้ง
$str4 = $massage4; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
$res = notify_message($str4, $token);*/

?>

<div class="row">
    <h3>อาคารสำนักวิทยบริการ ชั้น 1 (ห้องสำนักงานบริหาร)</h3>
    <img src="/assets/icons/dust.png" width="25"> ฝุ่น (µg/m³)
    <?php echo number_format((float)$row_result['avg(dustrec_amount_dust)'], 2, '.', ''); ?>
    <img src="/assets/icons/celsius.png" width="25"> อุณหภูมิ (°C)
    <?php echo number_format((float)$row_result['avg(dustrec_temp)'], 2, '.', ''); ?>
    <img src="/assets/icons/waterdrop.png" width="25"> ความชื้น (%)
    <?php echo number_format((float)$row_result['avg(dustrec_moistness)'], 2, '.', ''); ?>
    <img src="/assets/icons/co2.png" width="25"> คาร์บอนฯ (PPM.)
    <?php echo number_format((float)$row_result['avg(dustrec_amount_co2)'], 2, '.', ''); ?>
</div>
<!-- ห้องสำนักงานบริหาร -->

<!-- อาคารฝ่ายเทคโนโลยีและนวัตกรรมฯ ชั้น 1 -->
<?php
$date = date("Y-m-d");
$sql = "select avg(dustrec_amount_dust),avg(dustrec_temp),avg(dustrec_moistness),avg(dustrec_amount_co2) from dustrec as a, position as b where b.position_id = a.dustrec_position_id AND b.position_name = 'ห้องกราฟิกและสื่อสิ่งพิมพ์ดิจิทัล' AND a.dustrec_date = '$date'";
$query = mysqli_query($connection, $sql);
$row = mysqli_num_rows($query);
$row_result = mysqli_fetch_array($query, MYSQLI_ASSOC);

$pm16_1 = $row_result['avg(dustrec_amount_dust)'];

$aqiVal = number_format((float)(aqiCal($row_result['avg(dustrec_amount_dust)'])), 2, '.', '');
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

//$messageline .= "\nอาคารฝ่ายเทคโนโลยีและนวัตกรรมฯ ชั้น 1\n - ฝุ่นละออง " . number_format((float)$row_result['avg(dustrec_amount_dust)'], 2, '.', '') . " µg/m³\n - อุณหภูมิ " . number_format((float)$row_result['avg(dustrec_temp)'], 2, '.', '') . " °C\n - ความชื้น " . number_format((float)$row_result['avg(dustrec_moistness)'], 2, '.', '') . " %\n - คาร์บอนฯ " . number_format((float)$row_result['avg(dustrec_amount_co2)'], 2, '.', '') . " PPM.\n - AQI " . $aqiVal . " คุณภาพ" . $aqiDcrt . "\nตรวจสอบรายละเอียดได้ที่ https://ddr.oas.psu.ac.th";

$messageline .= "\n- อาคารฝ่ายเทคโนโลยีและนวัตกรรมฯ AQI " . $aqiVal . " คุณภาพ" . $aqiDcrt . "\n(" . number_format((float)$row_result['avg(dustrec_amount_dust)'], 2, '.', '') . " µg/m³, " . number_format((float)$row_result['avg(dustrec_temp)'], 2, '.', '') . " °C, " . number_format((float)$row_result['avg(dustrec_moistness)'], 2, '.', '') . " %, " . number_format((float)$row_result['avg(dustrec_amount_co2)'], 2, '.', '') . " PPM.)";

/*$massage5 = iconv('utf-8', 'utf-8', $messageline);
define('LINE_API', "https://notify-api.line.me/api/notify");
$token = "h7GbD4ac0qMXgx6YYqCR4Zt6niD1If0fPJzjOea1Z2t"; //ใส่ Token ของ group line ที่จะแจ้ง
$str5 = $massage5; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
$res = notify_message($str5, $token);*/

?>

<div class="row">
    <h3>อาคารฝ่ายเทคโนโลยีและนวัตกรรมฯ ชั้น 1 (ห้องกราฟิกและสื่อสิ่งพิมพ์ดิจิทัล)</h3>
    <img src="/assets/icons/dust.png" width="25"> ฝุ่น (µg/m³)
    <?php echo number_format((float)$row_result['avg(dustrec_amount_dust)'], 2, '.', ''); ?>
    <img src="/assets/icons/celsius.png" width="25"> อุณหภูมิ (°C)
    <?php echo number_format((float)$row_result['avg(dustrec_temp)'], 2, '.', ''); ?>
    <img src="/assets/icons/waterdrop.png" width="25"> ความชื้น (%)
    <?php echo number_format((float)$row_result['avg(dustrec_moistness)'], 2, '.', ''); ?>
    <img src="/assets/icons/co2.png" width="25"> คาร์บอนฯ (PPM.)
    <?php echo number_format((float)$row_result['avg(dustrec_amount_co2)'], 2, '.', ''); ?>
</div>
<!-- อาคารฝ่ายเทคโนโลยีและนวัตกรรมฯ ชั้น 1 -->

<!-- หน้าอาคารสำนัก -->
<?php
$date = date("Y-m-d");
$sql = "select avg(dustrec_amount_dust),avg(dustrec_temp),avg(dustrec_moistness),avg(dustrec_amount_co2) from dustrec as a, position as b where b.position_id = a.dustrec_position_id AND b.position_name = 'หน้าอาคารสำนักวิทยบริการ' AND a.dustrec_date = '$date'";
$query = mysqli_query($connection, $sql);
$row = mysqli_num_rows($query);
$row_result = mysqli_fetch_array($query, MYSQLI_ASSOC);

$pm22_front = $row_result['avg(dustrec_amount_dust)'];

$aqiVal = number_format((float)(aqiCal($row_result['avg(dustrec_amount_dust)'])), 2, '.', '');
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

//$messageline .= "\nอาคารฝ่ายเทคโนโลยีและนวัตกรรมฯ ชั้น 1\n - ฝุ่นละออง " . number_format((float)$row_result['avg(dustrec_amount_dust)'], 2, '.', '') . " µg/m³\n - อุณหภูมิ " . number_format((float)$row_result['avg(dustrec_temp)'], 2, '.', '') . " °C\n - ความชื้น " . number_format((float)$row_result['avg(dustrec_moistness)'], 2, '.', '') . " %\n - คาร์บอนฯ " . number_format((float)$row_result['avg(dustrec_amount_co2)'], 2, '.', '') . " PPM.\n - AQI " . $aqiVal . " คุณภาพ" . $aqiDcrt . "\nตรวจสอบรายละเอียดได้ที่ https://ddr.oas.psu.ac.th";

$messageline .= "\n- หน้าอาคารสำนักวิทยบริการ AQI " . $aqiVal . " คุณภาพ" . $aqiDcrt . "\n(" . number_format((float)$row_result['avg(dustrec_amount_dust)'], 2, '.', '') . " µg/m³, " . number_format((float)$row_result['avg(dustrec_temp)'], 2, '.', '') . " °C, " . number_format((float)$row_result['avg(dustrec_moistness)'], 2, '.', '') . " %, " . number_format((float)$row_result['avg(dustrec_amount_co2)'], 2, '.', '') . " PPM.)\nตรวจสอบรายละเอียดได้ที่ https://ddr.oas.psu.ac.th";

$massage5 = iconv('utf-8', 'utf-8', $messageline);
define('LINE_API', "https://notify-api.line.me/api/notify");
$token = "h7GbD4ac0qMXgx6YYqCR4Zt6niD1If0fPJzjOea1Z2t"; //ใส่ Token ของ group line ที่จะแจ้ง
$str5 = $massage5; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
$res = notify_message($str5, $token);

?>

<div class="row">
    <h3>หน้าอาคารสำนักวิทยบริการ</h3>
    <img src="/assets/icons/dust.png" width="25"> ฝุ่น (µg/m³)
    <?php echo number_format((float)$row_result['avg(dustrec_amount_dust)'], 2, '.', ''); ?>
    <img src="/assets/icons/celsius.png" width="25"> อุณหภูมิ (°C)
    <?php echo number_format((float)$row_result['avg(dustrec_temp)'], 2, '.', ''); ?>
    <img src="/assets/icons/waterdrop.png" width="25"> ความชื้น (%)
    <?php echo number_format((float)$row_result['avg(dustrec_moistness)'], 2, '.', ''); ?>
    <img src="/assets/icons/co2.png" width="25"> คาร์บอนฯ (PPM.)
    <?php echo number_format((float)$row_result['avg(dustrec_amount_co2)'], 2, '.', ''); ?>
</div>
<!-- หน้าอาคารสำนัก -->

<?php
//--สรุป อ.22
$pm22avg = number_format((float)($pm22_1 + $pm22_2 + $pm22_3)/3, 2, '.', '');
$aqi22avg = number_format((float)(aqiCal($pm22avg)), 2, '.', '');
if ($aqi22avg <= 50) {
    $aqiClass = 'aqi_god';
    $aqiDcrt = 'อากาศดี';
} else if ($aqi22avg <= 100) {
    $aqiClass = 'aqi_mod';
    $aqiDcrt = 'อากาศปานกลาง';
} else if ($aqi22avg <= 150) {
    $aqiClass = 'aqi_unh';
    $aqiDcrt = 'อากาศไม่ดีต่อกลุ่มเสี่ยง';
} else if ($aqi22avg <= 200) {
    $aqiClass = 'aqi_mun';
    $aqiDcrt = 'อากาศไม่ดี';
} else if ($aqi22avg <= 300) {
    $aqiClass = 'aqi_vuh';
    $aqiDcrt = 'อากาศไม่ดีอย่างยิ่ง';
} else {
    $aqiClass = 'aqi_haz';
    $aqiDcrt = 'อากาศอันตราย';
}
$messagelinesum .= "\n\nสภาพอากาศเฉลี่ย$period วันที่ $dateshow";
$messagelinesum .= "\n- อาคารสำนักวิทยบริการ PM " . $pm22avg . " µg/m³ AQI ". $aqi22avg ." คุณภาพ" . $aqiDcrt . "\n";

//--สรุป อ.17
$pm17avg = number_format((float)($pm17_1 + $pm17_2) / 2, 2, '.', '');
$aqi17avg = number_format((float)(aqiCal($pm17avg)), 2, '.', '');
if ($aqi17avg <= 50) {
    $aqiClass = 'aqi_god';
    $aqiDcrt = 'อากาศดี';
} else if ($aqi17avg <= 100) {
    $aqiClass = 'aqi_mod';
    $aqiDcrt = 'อากาศปานกลาง';
} else if ($aqi17avg <= 150) {
    $aqiClass = 'aqi_unh';
    $aqiDcrt = 'อากาศไม่ดีต่อกลุ่มเสี่ยง';
} else if ($aqi17avg <= 200) {
    $aqiClass = 'aqi_mun';
    $aqiDcrt = 'อากาศไม่ดี';
} else if ($aqi17avg <= 300) {
    $aqiClass = 'aqi_vuh';
    $aqiDcrt = 'อากาศไม่ดีอย่างยิ่ง';
} else {
    $aqiClass = 'aqi_haz';
    $aqiDcrt = 'อากาศอันตราย';
}
$messagelinesum .= "\n- อาคารจอห์น เอฟ เคนเนดี้ PM " . $pm17avg . " µg/m³ AQI " . $aqi17avg . " คุณภาพ" . $aqiDcrt . "\n";

//--สรุป อ.16
$pm16avg = number_format((float)($pm16_1) / 1, 2, '.', '');
$aqi16avg = number_format((float)(aqiCal($pm16avg)), 2, '.', '');
if ($aqi16avg <= 50) {
    $aqiClass = 'aqi_god';
    $aqiDcrt = 'อากาศดี';
} else if ($aqi16avg <= 100) {
    $aqiClass = 'aqi_mod';
    $aqiDcrt = 'อากาศปานกลาง';
} else if ($aqi16avg <= 150) {
    $aqiClass = 'aqi_unh';
    $aqiDcrt = 'อากาศไม่ดีต่อกลุ่มเสี่ยง';
} else if ($aqi16avg <= 200) {
    $aqiClass = 'aqi_mun';
    $aqiDcrt = 'อากาศไม่ดี';
} else if ($aqi16avg <= 300) {
    $aqiClass = 'aqi_vuh';
    $aqiDcrt = 'อากาศไม่ดีอย่างยิ่ง';
} else {
    $aqiClass = 'aqi_haz';
    $aqiDcrt = 'อากาศอันตราย';
}
$messagelinesum .= "\n- อาคารเทคโนโลยีและนวัตกรรมการเรียนรู้ PM " . $pm16avg . " µg/m³ AQI " . $aqi16avg . " คุณภาพ" . $aqiDcrt . "\n";

//--สรุป สนล
$pmsecretavg = number_format((float)($pm22_secret) / 1, 2, '.', '');
$aqisecretavg = number_format((float)(aqiCal($pmsecretavg)), 2, '.', '');
if ($aqisecretavg <= 50) {
    $aqiClass = 'aqi_god';
    $aqiDcrt = 'อากาศดี';
} else if ($aqisecretavg <= 100) {
    $aqiClass = 'aqi_mod';
    $aqiDcrt = 'อากาศปานกลาง';
} else if ($aqisecretavg <= 150) {
    $aqiClass = 'aqi_unh';
    $aqiDcrt = 'อากาศไม่ดีต่อกลุ่มเสี่ยง';
} else if ($aqisecretavg <= 200) {
    $aqiClass = 'aqi_mun';
    $aqiDcrt = 'อากาศไม่ดี';
} else if ($aqisecretavg <= 300) {
    $aqiClass = 'aqi_vuh';
    $aqiDcrt = 'อากาศไม่ดีอย่างยิ่ง';
} else {
    $aqiClass = 'aqi_haz';
    $aqiDcrt = 'อากาศอันตราย';
}
$messagelinesum .= "\n- ห้องสำนักงานบริหาร PM " . $pmsecretavg . " µg/m³ AQI " . $aqisecretavg . " คุณภาพ" . $aqiDcrt . "\n";

//--สรุป หน้าอาคาร
$pmfrontavg = number_format((float)($pm22_front) / 1, 2, '.', '');
$aqifrontavg = number_format((float)(aqiCal($pmfrontavg)), 2, '.', '');
if ($aqifrontavg <= 50) {
    $aqiClass = 'aqi_god';
    $aqiDcrt = 'อากาศดี';
} else if ($aqifrontavg <= 100) {
    $aqiClass = 'aqi_mod';
    $aqiDcrt = 'อากาศปานกลาง';
} else if ($aqifrontavg <= 150) {
    $aqiClass = 'aqi_unh';
    $aqiDcrt = 'อากาศไม่ดีต่อกลุ่มเสี่ยง';
} else if ($aqifrontavg <= 200) {
    $aqiClass = 'aqi_mun';
    $aqiDcrt = 'อากาศไม่ดี';
} else if ($aqifrontavg <= 300) {
    $aqiClass = 'aqi_vuh';
    $aqiDcrt = 'อากาศไม่ดีอย่างยิ่ง';
} else {
    $aqiClass = 'aqi_haz';
    $aqiDcrt = 'อากาศอันตราย';
}
$messagelinesum .= "\n- หน้าอาคารสำนักวิทยบริการ PM " . $pmfrontavg . " µg/m³ AQI " . $aqifrontavg . " คุณภาพ" . $aqiDcrt . "\nตรวจสอบรายละเอียดได้ที่ https://ddr.oas.psu.ac.th";

$massagesum = iconv('utf-8', 'utf-8', $messagelinesum);
define('LINE_API', "https://notify-api.line.me/api/notify");
$tokensum = "ROqM2TpIR7fISNzrVs5jI1y5YOM9gnYacsS9ZB3s2ZS"; //ใส่ Token ของ group line ที่จะแจ้ง
$strsum = $massagesum; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
$ressum = notify_message($strsum, $tokensum);

function notify_message($messageline, $token)
{
    $queryData = array('message' => $messageline);
    $queryData = http_build_query($queryData, '', '&');
    $headerOptions = array(
        'http' => array(
            'method' => 'POST',
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
                . "Authorization: Bearer " . $token . "\r\n"
                . "Content-Length: " . strlen($queryData) . "\r\n",
            'content' => $queryData
        ),
    );
    $context = stream_context_create($headerOptions);
    $result = file_get_contents(LINE_API, FALSE, $context);
    $res = json_decode($result);
    return $res;
}

//echo "<br>".$messageline;

?>