<!-- Header -->
<?php
session_start();
error_reporting(0); // ปิด error report
include "../include/dbconf.php";

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

$messageline .= "\nอาคารสำนักวิทยบริการ ชั้น 1\n - ฝุ่นละออง " . number_format((float)$row_result['avg(dustrec_amount_dust)'], 2, '.', '') . " µg/m³\n - อุณหภูมิ " . number_format((float)$row_result['avg(dustrec_temp)'], 2, '.', '') . " °C\n - ความชื้น " . number_format((float)$row_result['avg(dustrec_moistness)'], 2, '.', '') . " %\n - คาร์บอนฯ " . number_format((float)$row_result['avg(dustrec_amount_co2)'], 2, '.', '') . " PPM.";

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

$messageline .= "\nอาคารสำนักวิทยบริการ ชั้น 2\n - ฝุ่นละออง " . number_format((float)$row_result['avg(dustrec_amount_dust)'], 2, '.', '') . " µg/m³\n - อุณหภูมิ " . number_format((float)$row_result['avg(dustrec_temp)'], 2, '.', '') . " °C\n - ความชื้น " . number_format((float)$row_result['avg(dustrec_moistness)'], 2, '.', '') . " %\n - คาร์บอนฯ " . number_format((float)$row_result['avg(dustrec_amount_co2)'], 2, '.', '') . " PPM.";

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

$messageline .= "\nอาคารสำนักวิทยบริการ ชั้น 3\n - ฝุ่นละออง " . number_format((float)$row_result['avg(dustrec_amount_dust)'], 2, '.', '') . " µg/m³\n - อุณหภูมิ " . number_format((float)$row_result['avg(dustrec_temp)'], 2, '.', '') . " °C\n - ความชื้น " . number_format((float)$row_result['avg(dustrec_moistness)'], 2, '.', '') . " %\n - คาร์บอนฯ " . number_format((float)$row_result['avg(dustrec_amount_co2)'], 2, '.', '') . " PPM.";

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

$messageline .= "\nอาคาร JFK ชั้น 1 (ตึกเก่า)\n - ฝุ่นละออง " . number_format((float)$row_result['avg(dustrec_amount_dust)'], 2, '.', '') . " µg/m³\n - อุณหภูมิ " . number_format((float)$row_result['avg(dustrec_temp)'], 2, '.', '') . " °C\n - ความชื้น " . number_format((float)$row_result['avg(dustrec_moistness)'], 2, '.', '') . " %\n - คาร์บอนฯ " . number_format((float)$row_result['avg(dustrec_amount_co2)'], 2, '.', '') . " PPM.
                    \nตรวจสอบรายละเอียดได้ที่ https://ddr.oas.psu.ac.th";

$massage4 = iconv('utf-8', 'utf-8', $messageline);
define('LINE_API', "https://notify-api.line.me/api/notify");
$token = "h7GbD4ac0qMXgx6YYqCR4Zt6niD1If0fPJzjOea1Z2t"; //ใส่ Token ของ group line ที่จะแจ้ง
$str4 = $massage4; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
$res = notify_message($str4, $token);

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

<?php
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