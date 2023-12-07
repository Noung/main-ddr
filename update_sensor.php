<?php
// Create connection
$mysqli = new mysqli("localhost","","","");
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
if($dustrec_position_id == 32){
    $dustrec_position_id = 4;
}
$dustrec_amount_dust = $_GET['pm'];//ฝุ่น
$dustrec_temp = $_GET['temp'];//อุณหภูมิ
$dustrec_moistness = $_GET['hum'];//ความชื้น
$dustrec_amount_co2 = '0';//คาร์บอนไดออกไซด์ *ไม่มีค่าจาก sensor
$aqi = $_GET['aqi']; //ค่าคุณภาพอากาศ
$ipAdd = $_GET['ipAdd']; //เลขแมค
$macAdd = $_GET['macAdd']; //เลขแมค
/*$dustrec_position_id = "12";//ตำแหน่ง
$dustrec_amount_dust = "5";//ฝุ่น
$dustrec_temp = "25";//อุณหภูมิ
$dustrec_moistness = "48";//ความชื้น
$dustrec_amount_co2 = '';//คาร์บอนไดออกไซด์*/

/*$sql = "INSERT INTO dustrec (dustrec_id, dustrec_date, dustrec_time, dustrec_position_id, dustrec_amount_dust, dustrec_temp, dustrec_moistness, dustrec_amount_co2, dustrec_timestamp) VALUES ('', '$dateadd', '$timeadd', '$dustrec_position_id', '$dustrec_amount_dust', '$dustrec_temp', '$dustrec_moistness', '$dustrec_amount_co2', '$dustrec_timestamp')";*/

// Perform query
$mysqli -> query("INSERT INTO dustrec (dustrec_id, dustrec_date, dustrec_time, dustrec_position_id, dustrec_amount_dust, dustrec_temp, dustrec_moistness, dustrec_amount_co2, dustrec_timestamp) VALUES ('', '$dateadd', '$timeadd', '$dustrec_position_id', '$dustrec_amount_dust', '$dustrec_temp', '$dustrec_moistness', '$dustrec_amount_co2', '$dustrec_timestamp')");
$mysqli->query("INSERT INTO dustreclog (dustrec_id, dustrec_position_id, dustrec_timestamp, device_ipadd, device_macadd, aqi) VALUES ('', '$dustrec_position_id', '$dustrec_timestamp', '$ipAdd', '$macAdd', '$aqi')");


// แจ้งเตือนทางไลน์ให้ จนท.

/*
โถงอ่านหนังสือชั้น 1 /3
โถงอ่านหนังสือชั้น 2 /9
IT-Zone /13
งานซ่อมฯ /22
*/

if($dustrec_position_id == '3'){
    $dustrec_position_name = 'โถงอ่านหนังสือชั้น 1';
}else if($dustrec_position_id == '9'){
    $dustrec_position_name = 'โถงอ่านหนังสือชั้น 2';
}else if($dustrec_position_id == '13'){
    $dustrec_position_name = 'IT-Zone';
}else if($dustrec_position_id == '22'){
    $dustrec_position_name = 'งานซ่อมฯ';
}else if ($dustrec_position_id == '4') {
    $dustrec_position_name = 'หน้าอาคารสำนักวิทยบริการ';
} else if ($dustrec_position_id == '6') {
    $dustrec_position_name = 'สำนักงานเลขานุการ';
} else if ($dustrec_position_id == '30') {
    $dustrec_position_name = 'ที่นั่งอ่านหนังสือด้านตะวันออก';
} else if ($dustrec_position_id == '20') {
    $dustrec_position_name = 'โรงพิมพ์ฝ่ายเทคโนโลยีและนวัตกรรมฯ';
} else if ($dustrec_position_id == '23') {
    $dustrec_position_name = 'ห้องกราฟิกและสื่อสิ่งพิมพ์ดิจิทัล';
}

                
                            if($dustrec_amount_dust >= '37.5' && $dustrec_amount_co2 >= '1000'){//37.5,1000
                                    $messageline .= "\n\nขณะนี้ระบบตรวจวัดปริมาณฝุ่นละอองสำนักวิทยบริการพบค่าความผิดปกติระดับสีแดง (PM และ CO2 สูงกว่าค่ามาตรฐาน >=37.5 µg/m³, >=1000 PPM.) ณ ตำแหน่ง ".$dustrec_position_name." วันที่ ".date('d/m/Y', strtotime($dateadd))." เวลา ".$timeadd." น. (PM=".$dustrec_amount_dust." µg/m³, CO2=".$dustrec_amount_co2." PPM.)\n\nตรวจสอบรายละเอียดได้ที่ https://ddr.oas.psu.ac.th";
                              }
                            if($dustrec_amount_dust >= '37.5' && $dustrec_amount_co2 < '1000'){
                                    $messageline .= "\n\nขณะนี้ระบบตรวจวัดปริมาณฝุ่นละอองสำนักวิทยบริการพบค่าความผิดปกติระดับสีชมพู (PM สูงกว่าค่ามาตรฐาน >=37.5 µg/m³) ณ ตำแหน่ง ".$dustrec_position_name." วันที่ ".date('d/m/Y', strtotime($dateadd))." เวลา ".$timeadd." น. (PM=".$dustrec_amount_dust." µg/m³, CO2=".$dustrec_amount_co2." PPM.)\n\nตรวจสอบรายละเอียดได้ที่ https://ddr.oas.psu.ac.th";
                              }
                            if($dustrec_amount_dust < '37.5' && $dustrec_amount_co2 >= '1000'){
                                    $messageline .= "\n\nขณะนี้ระบบตรวจวัดปริมาณฝุ่นละอองสำนักวิทยบริการพบค่าความผิดปกติระดับสีส้ม (CO2 สูงกว่าค่ามาตรฐาน >=1000 PPM.) ณ ตำแหน่ง ".$dustrec_position_name." วันที่ ".date('d/m/Y', strtotime($dateadd))." เวลา ".$timeadd." น. (PM=".$dustrec_amount_dust." µg/m³, CO2=".$dustrec_amount_co2." PPM.)\n\nตรวจสอบรายละเอียดได้ที่ https://ddr.oas.psu.ac.th";
                              }
                      
                            //$messageline .= "\n\nขณะนี้ระบบตรวจวัดปริมาณฝุ่นละอองสำนักวิทยบริการพบค่าความผิดปกติระดับสีส้ม (CO2 สูงกว่าค่ามาตรฐาน >=1000 PPM.) ณ ตำแหน่ง ".$dustrec_position_name." วันที่ ".date('d/m/Y', strtotime($dateadd))." เวลา ".$timeadd." น. (PM=".$dustrec_amount_dust." µg/m³, CO2=".$dustrec_amount_co2." PPM.)\n\nตรวจสอบรายละเอียดได้ที่ https://ddr.oas.psu.ac.th";
                          
                            function notify_message($messageline,$token){
                                $queryData = array('message' => $messageline);
                                $queryData = http_build_query($queryData,'','&');
                                $headerOptions = array( 
                                    'http'=>array(
                                        'method'=>'POST',
                                        'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                                            ."Authorization: Bearer ".$token."\r\n"
                                            ."Content-Length: ".strlen($queryData)."\r\n",
                                        'content' => $queryData
                                    ),
                                );
                                $context = stream_context_create($headerOptions);
                                $result = file_get_contents(LINE_API,FALSE,$context);
                                $res = json_decode($result);
                                return $res;
                            } 

                            $massage1=iconv('utf-8','utf-8',$messageline);

                            define('LINE_API',"https://notify-api.line.me/api/notify");
                            $token = ""; //ใส่ Token ของ group line ที่จะแจ้ง
                            $str = $massage1; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
                            $res = notify_message($str,$token);
                            //print_r($res);
                            
// แจ้งเตือนทางไลน์ให้ จนท.

$mysqli -> close();
?>
