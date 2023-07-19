<!-- Header -->
<?php
session_start();
error_reporting(0); // ปิด error report

////// A1 //////       
$sqlA1dust = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '1' and
                            dustrec_amount_dust >= '37.5'";
$queryA1dust = mysqli_query($connection, $sqlA1dust);
$rowA1dust = mysqli_num_rows($queryA1dust); // A1 ปริมาณฝุ่นละอองสูงกว่าเกณฑ์ --> ใช้สร้างกราฟ

$sqlA1co2 = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '1' and
                            dustrec_amount_co2 >= '1000'";
$queryA1co2 = mysqli_query($connection, $sqlA1co2);
$rowA1co2 = mysqli_num_rows($queryA1co2); // A1 ปริมาณ co2 สูงกว่าเกณฑ์ --> ใช้สร้างกราฟ
////// A1 //////  

////// A2 //////       
$sqlA2dust = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '2' and
                            dustrec_amount_dust >= '37.5'";
$queryA2dust = mysqli_query($connection, $sqlA2dust);
$rowA2dust = mysqli_num_rows($queryA2dust); // A2 ปริมาณฝุ่นละอองสูงกว่าเกณฑ์ --> ใช้สร้างกราฟ

$sqlA2co2 = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '2' and
                            dustrec_amount_co2 >= '1000'";
$queryA2co2 = mysqli_query($connection, $sqlA2co2);
$rowA2co2 = mysqli_num_rows($queryA2co2); // A2 ปริมาณ co2 สูงกว่าเกณฑ์ --> ใช้สร้างกราฟ
////// A2 ////// 

$sqlA3dust = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '3' and
                            dustrec_amount_dust >= '37.5'";
$queryA3dust = mysqli_query($connection, $sqlA3dust);
$rowA3dust = mysqli_num_rows($queryA3dust);

$sqlA3co2 = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '3' and
                            dustrec_amount_co2 >= '1000'";
$queryA3co2 = mysqli_query($connection, $sqlA3co2);
$rowA3co2 = mysqli_num_rows($queryA3co2);

$sqlA4dust = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '4' and
                            dustrec_amount_dust >= '37.5'";
$queryA4dust = mysqli_query($connection, $sqlA4dust);
$rowA4dust = mysqli_num_rows($queryA4dust);

$sqlA4co2 = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '4' and
                            dustrec_amount_co2 >= '1000'";
$queryA4co2 = mysqli_query($connection, $sqlA4co2);
$rowA4co2 = mysqli_num_rows($queryA4co2);

$sqlA5dust = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '5' and
                            dustrec_amount_dust >= '37.5'";
$queryA5dust = mysqli_query($connection, $sqlA5dust);
$rowA5dust = mysqli_num_rows($queryA5dust);

$sqlA5co2 = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '5' and
                            dustrec_amount_co2 >= '1000'";
$queryA5co2 = mysqli_query($connection, $sqlA5co2);
$rowA5co2 = mysqli_num_rows($queryA5co2);


$sqlA6dust = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '6' and
                            dustrec_amount_dust >= '37.5'";
$queryA6dust = mysqli_query($connection, $sqlA6dust);
$rowA6dust = mysqli_num_rows($queryA6dust);

$sqlA6co2 = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '6' and
                            dustrec_amount_co2 >= '1000'";
$queryA6co2 = mysqli_query($connection, $sqlA6co2);
$rowA6co2 = mysqli_num_rows($queryA6co2);

$sqlA7dust = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '7' and
                            dustrec_amount_dust >= '37.5'";
$queryA7dust = mysqli_query($connection, $sqlA7dust);
$rowA7dust = mysqli_num_rows($queryA7dust);

$sqlA7co2 = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '7' and
                            dustrec_amount_co2 >= '1000'";
$queryA7co2 = mysqli_query($connection, $sqlA7co2);
$rowA7co2 = mysqli_num_rows($queryA7co2);

$sqlA8dust = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '8' and
                            dustrec_amount_dust >= '37.5'";
$queryA8dust = mysqli_query($connection, $sqlA8dust);
$rowA8dust = mysqli_num_rows($queryA8dust);

$sqlA8co2 = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '8' and
                            dustrec_amount_co2 >= '1000'";
$queryA8co2 = mysqli_query($connection, $sqlA8co2);
$rowA8co2 = mysqli_num_rows($queryA8co2);

$sqlA9dust = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '9' and
                            dustrec_amount_dust >= '37.5'";
$queryA9dust = mysqli_query($connection, $sqlA9dust);
$rowA9dust = mysqli_num_rows($queryA9dust);

$sqlA9co2 = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '9' and
                            dustrec_amount_co2 >= '1000'";
$queryA9co2 = mysqli_query($connection, $sqlA9co2);
$rowA9co2 = mysqli_num_rows($queryA9co2);

$sqlA10dust = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '10' and
                            dustrec_amount_dust >= '37.5'";
$queryA10dust = mysqli_query($connection, $sqlA10dust);
$rowA10dust = mysqli_num_rows($queryA10dust);

$sqlA10co2 = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '10' and
                            dustrec_amount_co2 >= '1000'";
$queryA10co2 = mysqli_query($connection, $sqlA10co2);
$rowA10co2 = mysqli_num_rows($queryA10co2);

$sqlA11dust = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '11' and
                            dustrec_amount_dust >= '37.5'";
$queryA11dust = mysqli_query($connection, $sqlA11dust);
$rowA11dust = mysqli_num_rows($queryA11dust);

$sqlA11co2 = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '11' and
                            dustrec_amount_co2 >= '1000'";
$queryA11co2 = mysqli_query($connection, $sqlA11co2);
$rowA11co2 = mysqli_num_rows($queryA11co2);

$sqlA12dust = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '12' and
                            dustrec_amount_dust >= '37.5'";
$queryA12dust = mysqli_query($connection, $sqlA12dust);
$rowA12dust = mysqli_num_rows($queryA12dust);

$sqlA12co2 = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '12' and
                            dustrec_amount_co2 >= '1000'";
$queryA12co2 = mysqli_query($connection, $sqlA12co2);
$rowA12co2 = mysqli_num_rows($queryA12co2);

$sqlA13dust = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '13' and
                            dustrec_amount_dust >= '37.5'";
$queryA13dust = mysqli_query($connection, $sqlA13dust);
$rowA13dust = mysqli_num_rows($queryA13dust);

$sqlA13co2 = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '13' and
                            dustrec_amount_co2 >= '1000'";
$queryA13co2 = mysqli_query($connection, $sqlA13co2);
$rowA13co2 = mysqli_num_rows($queryA13co2);

$sqlA14dust = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '14' and
                            dustrec_amount_dust >= '37.5'";
$queryA14dust = mysqli_query($connection, $sqlA14dust);
$rowA14dust = mysqli_num_rows($queryA14dust);

$sqlA14co2 = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '14' and
                            dustrec_amount_co2 >= '1000'";
$queryA14co2 = mysqli_query($connection, $sqlA14co2);
$rowA14co2 = mysqli_num_rows($queryA14co2);

$sqlA15dust = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '15' and
                            dustrec_amount_dust >= '37.5'";
$queryA15dust = mysqli_query($connection, $sqlA15dust);
$rowA15dust = mysqli_num_rows($queryA15dust);

$sqlA15co2 = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '15' and
                            dustrec_amount_co2 >= '1000'";
$queryA15co2 = mysqli_query($connection, $sqlA15co2);
$rowA15co2 = mysqli_num_rows($queryA15co2);

$sqlA16dust = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '16' and
                            dustrec_amount_dust >= '37.5'";
$queryA16dust = mysqli_query($connection, $sqlA16dust);
$rowA16dust = mysqli_num_rows($queryA16dust);

$sqlA16co2 = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '16' and
                            dustrec_amount_co2 >= '1000'";
$queryA16co2 = mysqli_query($connection, $sqlA16co2);
$rowA16co2 = mysqli_num_rows($queryA16co2);

$sqlA17dust = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '17' and
                            dustrec_amount_dust >= '37.5'";
$queryA17dust = mysqli_query($connection, $sqlA17dust);
$rowA17dust = mysqli_num_rows($queryA17dust);

$sqlA17co2 = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '17' and
                            dustrec_amount_co2 >= '1000'";
$queryA17co2 = mysqli_query($connection, $sqlA17co2);
$rowA17co2 = mysqli_num_rows($queryA17co2);

$sqlA18dust = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '18' and
                            dustrec_amount_dust >= '37.5'";
$queryA18dust = mysqli_query($connection, $sqlA18dust);
$rowA18dust = mysqli_num_rows($queryA18dust);

$sqlA18co2 = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '18' and
                            dustrec_amount_co2 >= '1000'";
$queryA18co2 = mysqli_query($connection, $sqlA18co2);
$rowA18co2 = mysqli_num_rows($queryA18co2);

$sqlA19dust = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '19' and
                            dustrec_amount_dust >= '37.5'";
$queryA19dust = mysqli_query($connection, $sqlA19dust);
$rowA19dust = mysqli_num_rows($queryA19dust);

$sqlA19co2 = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '19' and
                            dustrec_amount_co2 >= '1000'";
$queryA19co2 = mysqli_query($connection, $sqlA19co2);
$rowA19co2 = mysqli_num_rows($queryA19co2);

$sqlA20dust = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '20' and
                            dustrec_amount_dust >= '37.5'";
$queryA20dust = mysqli_query($connection, $sqlA20dust);
$rowA20dust = mysqli_num_rows($queryA20dust);

$sqlA20co2 = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '20' and
                            dustrec_amount_co2 >= '1000'";
$queryA20co2 = mysqli_query($connection, $sqlA20co2);
$rowA20co2 = mysqli_num_rows($queryA20co2);

$sqlA21dust = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '21' and
                            dustrec_amount_dust >= '37.5'";
$queryA21dust = mysqli_query($connection, $sqlA21dust);
$rowA21dust = mysqli_num_rows($queryA21dust);

$sqlA21co2 = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '21' and
                            dustrec_amount_co2 >= '1000'";
$queryA21co2 = mysqli_query($connection, $sqlA21co2);
$rowA21co2 = mysqli_num_rows($queryA21co2);

$sqlA22dust = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '22' and
                            dustrec_amount_dust >= '37.5'";
$queryA22dust = mysqli_query($connection, $sqlA22dust);
$rowA22dust = mysqli_num_rows($queryA22dust);

$sqlA22co2 = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '22' and
                            dustrec_amount_co2 >= '1000'";
$queryA22co2 = mysqli_query($connection, $sqlA22co2);
$rowA22co2 = mysqli_num_rows($queryA22co2);

$sqlA23dust = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '23' and
                            dustrec_amount_dust >= '37.5'";
$queryA23dust = mysqli_query($connection, $sqlA23dust);
$rowA23dust = mysqli_num_rows($queryA23dust);

$sqlA23co2 = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '23' and
                            dustrec_amount_co2 >= '1000'";
$queryA23co2 = mysqli_query($connection, $sqlA23co2);
$rowA23co2 = mysqli_num_rows($queryA23co2);

$sqlA24dust = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '24' and
                            dustrec_amount_dust >= '37.5'";
$queryA24dust = mysqli_query($connection, $sqlA24dust);
$rowA24dust = mysqli_num_rows($queryA24dust);

$sqlA24co2 = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '24' and
                            dustrec_amount_co2 >= '1000'";
$queryA24co2 = mysqli_query($connection, $sqlA24co2);
$rowA24co2 = mysqli_num_rows($queryA24co2);

$sqlA25dust = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '25' and
                            dustrec_amount_dust >= '37.5'";
$queryA25dust = mysqli_query($connection, $sqlA25dust);
$rowA25dust = mysqli_num_rows($queryA25dust);

$sqlA25co2 = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '25' and
                            dustrec_amount_co2 >= '1000'";
$queryA25co2 = mysqli_query($connection, $sqlA25co2);
$rowA25co2 = mysqli_num_rows($queryA25co2);

$sqlA26dust = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '26' and
                            dustrec_amount_dust >= '37.5'";
$queryA26dust = mysqli_query($connection, $sqlA26dust);
$rowA26dust = mysqli_num_rows($queryA26dust);

$sqlA26co2 = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '26' and
                            dustrec_amount_co2 >= '1000'";
$queryA26co2 = mysqli_query($connection, $sqlA26co2);
$rowA26co2 = mysqli_num_rows($queryA26co2);

$sqlA27dust = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '27' and
                            dustrec_amount_dust >= '37.5'";
$queryA27dust = mysqli_query($connection, $sqlA27dust);
$rowA27dust = mysqli_num_rows($queryA27dust);

$sqlA27co2 = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '27' and
                            dustrec_amount_co2 >= '1000'";
$queryA27co2 = mysqli_query($connection, $sqlA27co2);
$rowA27co2 = mysqli_num_rows($queryA27co2);

$sqlA28dust = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '28' and
                            dustrec_amount_dust >= '37.5'";
$queryA28dust = mysqli_query($connection, $sqlA28dust);
$rowA28dust = mysqli_num_rows($queryA28dust);

$sqlA28co2 = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '28' and
                            dustrec_amount_co2 >= '1000'";
$queryA28co2 = mysqli_query($connection, $sqlA28co2);
$rowA28co2 = mysqli_num_rows($queryA28co2);

$sqlA29dust = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '29' and
                            dustrec_amount_dust >= '37.5'";
$queryA29dust = mysqli_query($connection, $sqlA29dust);
$rowA29dust = mysqli_num_rows($queryA29dust);

$sqlA29co2 = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '29' and
                            dustrec_amount_co2 >= '1000'";
$queryA29co2 = mysqli_query($connection, $sqlA29co2);
$rowA29co2 = mysqli_num_rows($queryA29co2);

$sqlA30dust = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '30' and
                            dustrec_amount_dust >= '37.5'";
$queryA30dust = mysqli_query($connection, $sqlA30dust);
$rowA30dust = mysqli_num_rows($queryA30dust);

$sqlA30co2 = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '30' and
                            dustrec_amount_co2 >= '1000'";
$queryA30co2 = mysqli_query($connection, $sqlA30co2);
$rowA30co2 = mysqli_num_rows($queryA30co2);

$sqlA31dust = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '31' and
                            dustrec_amount_dust >= '37.5'";
$queryA31dust = mysqli_query($connection, $sqlA31dust);
$rowA31dust = mysqli_num_rows($queryA31dust);

$sqlA31co2 = "
                        SELECT 
                            * 
                        FROM 
                            dustrec
                        WHERE 
                            dustrec_position_id = '31' and
                            dustrec_amount_co2 >= '1000'";
$queryA31co2 = mysqli_query($connection, $sqlA31co2);
$rowA31co2 = mysqli_num_rows($queryA31co2);
/*echo '$rowA1dust = '.$rowA1dust."<br>";
            echo '$rowA1co2 = '.$rowA1co2."<br>";
            echo '$rowA2dust = '.$rowA2dust."<br>";
            echo '$rowA2co2 = '.$rowA2co2."<br>";*/

?>
<!--<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>-->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script type="text/javascript">
    $(function() {
        $('#containerover').highcharts({
            chart: {
                type: 'column'
            },
            title: {
                text: 'แผนภูมิแสดงสถิติจำนวนการวัด<br>ที่พบปริมาณฝุ่นละอองและก๊าชคาร์บอนไดออกไซค์สูงกว่าเกณฑ์'
            },
            xAxis: {
                categories: ['บริการยืม-คืน',
                    'บริการตอบคำถามฯ',
                    'โถงอ่านหนังสือชั้น 1',
                    'หน้าอาคารสำนักวิทยบริการ',
                    'ชั้นวารสารล่วงเวลา',
                    'สำนักงานเลขานุการ',
                    'ชั้นหนังสือภาษาไทย',
                    'ชั้นหนังสือภาษาอังกฤษ',
                    'โถงอ่านหนังสือชั้น 2',
                    'ทางเดินหน้าห้องจดหมายเหตุฯ',
                    'ทางเดินไปอาคาร 17',
                    'ทางเดินโซนห้องประชุม',
                    'IT-Zone',
                    'ห้องวิทยานิพนธ์',
                    'บริการโสตฯ',
                    'American Corner Pattani',
                    'ทางเข้าห้องมินิเธียเตอร์',
                    'ทางเข้าห้องบริการคอมพิวเตอร์ 1',
                    'งานวิเคราะห์ทรัพยากรฯ',
                    'โรงพิมพ์ฝ่ายเทคโนโลยีและนวัตกรรมฯ',
                    'งานห้องสมุดดิจิทัล',
                    'งานซ่อมฯ',
                    'ห้องกราฟิกและสื่อสิ่งพิมพ์ดิจิทัล',
                    'ชั้นหนังสือภาษาเกาหลี',
                    'ชั้นหนังสือภาษาอังกฤษ',
                    'ชั้นหนังสือภาษาไทย',
                    'ชั้นหนังสือภาษาอิสลาม',
                    'ชั้นหนังสือนวนิยาย',
                    'ที่นั่งอ่านหนังสือด้านตะวันตก',
                    'ที่นั่งอ่านหนังสือด้านตะวันออก',
                    'ที่นั่งอ่านหนังสือด้านทิศใต้'
                ]
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'การวัดที่ได้ผลสูงกว่าเกณฑ์ (ครั้ง)'
                },
                stackLabels: {
                    enabled: true,
                    style: {
                        fontWeight: 'bold',
                        color: (Highcharts.theme && Highcharts.theme.textColor) || 'gray'
                    }
                }
            },
            legend: {
                reversed: true
            },
            tooltip: {
                headerFormat: '<b>{point.x}</b><br/>',
                pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
            },
            plotOptions: {
                column: {
                    stacking: 'normal',
                    dataLabels: {
                        enabled: true,
                        color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white',
                        style: {
                            textShadow: '0 0 3px black'
                        }
                    },
                    series: {
                        animation: {
                            duration: 3000,
                            easing: 'easeOutBounce'
                        }
                    }
                }
            },
            subtitle: {
                text: 'แยกตามตำแหน่งทั้งหมด',
                x: 0
            },
            credits: {
                enabled: false
            },
            exporting: {
                enabled: false
            },
            series: [{
                name: 'ปริมาณก๊าชคาร์บอนไดออกไซค์สูงกว่าเกณฑ์',
                data: [<?php echo $rowA1co2; ?>,
                    <?php echo $rowA2co2; ?>,
                    <?php echo $rowA3co2; ?>,
                    <?php echo $rowA4co2; ?>,
                    <?php echo $rowA5co2; ?>,
                    <?php echo $rowA6co2; ?>,
                    <?php echo $rowA7co2; ?>,
                    <?php echo $rowA8co2; ?>,
                    <?php echo $rowA9co2; ?>,
                    <?php echo $rowA10co2; ?>,
                    <?php echo $rowA11co2; ?>,
                    <?php echo $rowA12co2; ?>,
                    <?php echo $rowA13co2; ?>,
                    <?php echo $rowA14co2; ?>,
                    <?php echo $rowA15co2; ?>,
                    <?php echo $rowA16co2; ?>,
                    <?php echo $rowA17co2; ?>,
                    <?php echo $rowA18co2; ?>,
                    <?php echo $rowA19co2; ?>,
                    <?php echo $rowA20co2; ?>,
                    <?php echo $rowA21co2; ?>,
                    <?php echo $rowA22co2; ?>,
                    <?php echo $rowA23co2; ?>,
                    <?php echo $rowA24co2; ?>,
                    <?php echo $rowA25co2; ?>,
                    <?php echo $rowA26co2; ?>,
                    <?php echo $rowA27co2; ?>,
                    <?php echo $rowA28co2; ?>,
                    <?php echo $rowA29co2; ?>,
                    <?php echo $rowA30co2; ?>,
                    <?php echo $rowA31co2; ?>
                ]
            }, {
                name: 'ปริมาณฝุ่นละอองสูงกว่าเกณฑ์',
                data: [<?php echo $rowA1dust; ?>,
                    <?php echo $rowA2dust; ?>,
                    <?php echo $rowA3dust; ?>,
                    <?php echo $rowA4dust; ?>,
                    <?php echo $rowA5dust; ?>,
                    <?php echo $rowA6dust; ?>,
                    <?php echo $rowA7dust; ?>,
                    <?php echo $rowA8dust; ?>,
                    <?php echo $rowA9dust; ?>,
                    <?php echo $rowA10dust; ?>,
                    <?php echo $rowA11dust; ?>,
                    <?php echo $rowA12dust; ?>,
                    <?php echo $rowA13dust; ?>,
                    <?php echo $rowA14dust; ?>,
                    <?php echo $rowA15dust; ?>,
                    <?php echo $rowA16dust; ?>,
                    <?php echo $rowA17dust; ?>,
                    <?php echo $rowA18dust; ?>,
                    <?php echo $rowA19dust; ?>,
                    <?php echo $rowA20dust; ?>,
                    <?php echo $rowA21dust; ?>,
                    <?php echo $rowA22dust; ?>,
                    <?php echo $rowA23dust; ?>,
                    <?php echo $rowA24dust; ?>,
                    <?php echo $rowA25dust; ?>,
                    <?php echo $rowA26dust; ?>,
                    <?php echo $rowA27dust; ?>,
                    <?php echo $rowA28dust; ?>,
                    <?php echo $rowA29dust; ?>,
                    <?php echo $rowA30dust; ?>,
                    <?php echo $rowA31dust; ?>
                ]
            }]
        });
    });
</script>