<!-- Header -->
<?php
session_start();
error_reporting(0); // ปิด error report
?>
<style>
  .aqi_down {
    padding: 10px;
    text-align: center;
    color: black;
    background-color: #ccc;
    border-radius: 25px;
    font-size: 18px;
    margin: 15px 0px 15px 0px;
  }

  .aqi_god {
    padding: 10px;
    text-align: center;
    color: white;
    background-color: #ABD162;
    border-radius: 25px;
    font-size: 18px;
    margin: 15px 0px 15px 0px;
  }

  .aqi_mod {
    padding: 10px;
    text-align: center;
    color: white;
    background-color: #F7D460;
    border-radius: 25px;
    font-size: 18px;
    margin: 15px 0px 15px 0px;
  }

  .aqi_unh {
    padding: 10px;
    text-align: center;
    color: white;
    background-color: #FA9B4B;
    border-radius: 25px;
    font-size: 18px;
    margin: 15px 0px 15px 0px;
  }

  .aqi_mun {
    padding: 10px;
    text-align: center;
    color: white;
    background-color: #F6666E;
    border-radius: 25px;
    font-size: 18px;
    margin: 15px 0px 15px 0px;
  }

  .aqi_vuh {
    padding: 10px;
    text-align: center;
    color: white;
    background-color: #A27DB6;
    border-radius: 25px;
    font-size: 18px;
    margin: 15px 0px 15px 0px;
  }

  .aqi_haz {
    padding: 10px;
    text-align: center;
    color: white;
    background-color: #A07684;
    border-radius: 25px;
    font-size: 18px;
    margin: 15px 0px 15px 0px;
  }
</style>
<!-- Header -->



<?php
include "../include/function.php";
$date = date("Y-m-d");
$sql = "select avg(dustrec_amount_dust),avg(dustrec_temp),avg(dustrec_moistness),avg(dustrec_amount_co2) from dustrec as a, position as b where  b.position_name = '" . $_SESSION["SEARCHQUERY_POSNAME"] . "' AND
                                    b.position_id = a.dustrec_position_id AND a.dustrec_date = '$date'";

$query = mysqli_query($connection, $sql);
$row = mysqli_num_rows($query);
$row_result = mysqli_fetch_array($query, MYSQLI_ASSOC);

//aqi
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
//aqi

?>
<div class="row">
  <div class="col-md-12">
    <div class="<?= $aqiClass ?>">AQI <?= $aqiVal ?> คุณภาพ<?= $aqiDcrt ?> </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="update-nag"><!--ฝุ่น-->
      <div class="update-split"><img src="/assets/icons/dust.png" width="25"> </div>
      <div class="update-text">ฝุ่น (µg/m³)</div>
      <div class="update-textdata"><?php echo number_format((float)$row_result['avg(dustrec_amount_dust)'], 2, '.', ''); ?></div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="update-temp"><!--อุณหภูมิ-->
      <div class="update-split"><img src="/assets/icons/celsius.png" width="25"> </div>
      <div class="update-text">อุณหภูมิ (°C)</div>
      <div class="update-textdata"><?php echo number_format((float)$row_result['avg(dustrec_temp)'], 2, '.', ''); ?> </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="update-mois"><!--ความชื้น-->
      <div class="update-split"><img src="/assets/icons/waterdrop.png" width="25"> </div>
      <div class="update-text">ความชื้น (%)</div>
      <div class="update-textdata"><?php echo number_format((float)$row_result['avg(dustrec_moistness)'], 2, '.', ''); ?> </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="update-co2"><!--ก๊าชคาร์บอนไดออกไซค์-->
      <div class="update-split"><img src="/assets/icons/co2.png" width="25"> </div>
      <div class="update-text">คาร์บอนฯ (PPM.)</div>
      <div class="update-textdata"><?php echo number_format((float)$row_result['avg(dustrec_amount_co2)'], 2, '.', ''); ?> </div>
    </div>
  </div>
</div>