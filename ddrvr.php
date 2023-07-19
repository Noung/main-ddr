<?php
header('Access-Control-Allow-Origin: http://ddr.oas.psu.ac.th');
session_start();
error_reporting(0); // ปิด error report

include "include/dbconf.php";
include "include/function.php";
include "include/login.php";

$_SESSION["SEARCHWORD_POSID"] = $_GET['posid'];
if ($_SESSION["SEARCHWORD_POSID"] == 3) {
    $gaugechart = 'panel_gaugechart_dustFl1.php';
} else if ($_SESSION["SEARCHWORD_POSID"] == 9) {
    $gaugechart = 'panel_gaugechart_dustFl2.php';
} else if ($_SESSION["SEARCHWORD_POSID"] == 13) {
    $gaugechart = 'panel_gaugechart_dustFl3.php';
} else if ($_SESSION["SEARCHWORD_POSID"] == 22) {
    $gaugechart = 'panel_gaugechart_dustFlob.php';
} else if ($_SESSION["SEARCHWORD_POSID"] == 4) {
    $gaugechart = 'panel_gaugechart_dustoutside.php';
} else if ($_SESSION["SEARCHWORD_POSID"] == 6) {
    $gaugechart = 'panel_gaugechart_dustFlsecret.php';
} else if ($_SESSION["SEARCHWORD_POSID"] == 30) {
    $gaugechart = 'panel_gaugechart_dustFlob2.php';
} /*else if ($_SESSION["SEARCHWORD_POSID"] == 20) {
    $gaugechart = 'panel_gaugechart_dustFltechno.php';
}*/ else if ($_SESSION["SEARCHWORD_POSID"] == 23) {
    $gaugechart = 'panel_gaugechart_dustFltechno.php';
}

$_SESSION["SEARCHWORD_STDATE"] = $_POST['searchword_stdate'];
$_SESSION["SEARCHWORD_ENDATE"] = $_POST['searchword_endate'];
$_SESSION["SEARCHWORDCOMP_POSIDA"] = $_POST['searchwordcomp_posidA'];
$_SESSION["SEARCHWORDCOMP_POSIDB"] = $_POST['searchwordcomp_posidB'];
$_SESSION["SEARCHWORDCOMP_STDATE"] = $_POST['searchwordcomp_stdate'];
$_SESSION["SEARCHWORDCOMP_ENDATE"] = $_POST['searchwordcomp_endate'];

$PageTitle = "Dashboard";
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ระบบรายงานสภาพอากาศและฝุ่นละอองสำนักวิทยบริการ - <?= $PageTitle ?></title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="refresh" content="300">
    <link rel="shortcut icon" href="http://ddr.oas.psu.ac.th/favicon.ico" type="image/x-icon">
    <link rel="icon" href="http://ddr.oas.psu.ac.th/favicon.ico" type="image/x-icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script>
    <link href="assets/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <script src="assets/js/moment-with-locales.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.js"></script>

    <script type="text/javascript">
        $(function() {
            $('#datetimepickerNormal').datetimepicker();
        });
        $(function() {
            $('#datetimepickerLocal').datetimepicker({
                locale: 'th'
            });
        });
        $(function() {
            $('#datetimepickerLocalST').datetimepicker({
                locale: 'th-notime'
            });
        });
        $(function() {
            $('#datetimepickerLocalEN').datetimepicker({
                locale: 'th-notime'
            });
        });
        $(function() {
            $('#datetimepickerLocalCOMPST').datetimepicker({
                locale: 'th-notime'
            });
        });
        $(function() {
            $('#datetimepickerLocalCOMPEN').datetimepicker({
                locale: 'th-notime'
            });
        });
    </script>
</head>

<body>
    <style>
        .pmvalbox {
            border: 1px solid red;
            margin: 5px;
            padding: 10px;
        }

        .container-fluid {
            margin-top: 10px;
        }

        a.ddrlink {
            color: #c7c3c3 !important;
            text-decoration: none !important;
        }
    </style>

    <div class="container-fluid" style="">
        <div class="row">
            <div class="col-md-12">
                <div class="container-fluid">

                    <!-- กล่องแสดงข้อมูลปริมาณฝุ่นละออง-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h2 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>&nbsp; สภาพอากาศภายในสำนักวิทยบริการ วันที่ <?php echo date('d/m/Y') . " เวลา " . date('H:i:s') . " น."; ?></h2>
                                    <div class="text-right" style="margin-top:-20px"><a href="https://ddr.oas.psu.ac.th/" target="_blank" class="ddrlink">ข้อมูลเชิงลึก</a></div>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12"><!--ชั้น 1 -->
                                            <div class="pmvalbox">
                                                <?php
                                                // echo $row_result
                                                /*foreach ($row_result as $key => $val) {
                                       echo $val."/";
                                    }*/
                                                ?>
                                                <div class="row">
                                                    <?php
                                                    include "panel/" . $gaugechart;
                                                    mysqli_close();
                                                    $date = date("Y-m-d");
                                                    $sql = "select avg(dustrec_amount_dust),avg(dustrec_temp),avg(dustrec_moistness),avg(dustrec_amount_co2) from dustrec as a, position as b where a.dustrec_position_id = '" . $_SESSION["SEARCHWORD_POSID"] . "' AND a.dustrec_date = '$date' AND b.position_id = a.dustrec_position_id";
                                                    $query = mysqli_query($connection, $sql);
                                                    $row = mysqli_num_rows($query);
                                                    $row_result = mysqli_fetch_array($query, MYSQLI_ASSOC);

                                                        // $ddrdata = array( //สร้าง array เก็บค่าที่ค้นได้ไปใช้
                                                        //     "dust" => number_format((float)$row_result['avg(dustrec_amount_dust)'], 2, '.', ''),
                                                        //     "temp" => number_format((float)$row_result['avg(dustrec_temp)'], 2, '.', ''),
                                                        //     "mois" => number_format((float) $row_result['avg(dustrec_moistness)'], 2, '.', ''),
                                                        //     "carbon" => number_format((float) $row_result['avg(dustrec_amount_co2)'], 2, '.', '')
                                                        // );
                                                        // header("Content-Type: application/json");
                                                        // json_encode($ddrdata);
                                                        // //echo json_encode($ddrdata);
                                                    ?>
                                                </div>
                                                <div class="row">
                                                    <center>
                                                        <span>เฉลี่ยทั้งวัน </span>
                                                        <img src="/assets/icons/dust.png" width="25"> ฝุ่น
                                                        <?php echo number_format((float)$row_result['avg(dustrec_amount_dust)'], 2, '.', '') . " (µg/m³)"; ?>
                                                        <img src="/assets/icons/celsius.png" width="25"> อุณหภูมิ
                                                        <?php echo number_format((float)$row_result['avg(dustrec_temp)'], 2, '.', '') . " (°C)"; ?>
                                                        <img src="/assets/icons/waterdrop.png" width="25"> ความชื้น
                                                        <?php echo number_format((float)$row_result['avg(dustrec_moistness)'], 2, '.', '') . " (%)"; ?>
                                                        <img src="/assets/icons/co2.png" width="25"> คาร์บอนฯ
                                                        <?php echo number_format((float)$row_result['avg(dustrec_amount_co2)'], 2, '.', '') . " (PPM.)"; ?>
                                                    </center>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- กล่องแสดงข้อมูลปริมาณฝุ่นละออง-->

                </div>
            </div>
        </div>
    </div>
</body>

</html>