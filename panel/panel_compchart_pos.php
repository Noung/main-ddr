<!-- Header -->
<?php
session_start();
error_reporting(0); // ปิด error report

                   //นับจำนวนทั้งหมด
                    $sqlALL = "
                        SELECT 
                            * 
                    
                        FROM 
                            dustrec";
                    
			        $queryALL = mysqli_query($connection, $sqlALL);
			        $rowALL = mysqli_num_rows($queryALL); // จำนวนการวัดทั้งหมด --> ใช้สร้างกราฟ

			        //นับจำนวนตำแหน่ง A1
                    $sqlA1 = "
                            SELECT * FROM dustrec WHERE dustrec_position_id = '1'";
                            $queryA1 = mysqli_query($connection, $sqlA1);
                            $rowA1 = mysqli_num_rows($queryA1); // จำนวนการวัดที่ตำแหน่ง A1 --> ใช้สร้างกราฟ
                    
                    //นับจำนวนตำแหน่ง A2
                    //$rowA2 = $rowALL - $rowA1; // จำนวนการวัดที่ตำแหน่ง A2 --> ใช้สร้างกราฟ
    
                    $sqlA2 = "
                            SELECT * FROM dustrec WHERE dustrec_position_id = '2'";
                            $queryA2 = mysqli_query($connection, $sqlA2);
                            $rowA2 = mysqli_num_rows($queryA2); // จำนวนการวัดที่ตำแหน่ง A2 --> ใช้สร้างกราฟ
    
                   $sqlA3 = "
                            SELECT * FROM dustrec WHERE dustrec_position_id = '3'";
                            $queryA3 = mysqli_query($connection, $sqlA3);
                            $rowA3 = mysqli_num_rows($queryA3);
    
                    $sqlA4 = "
                            SELECT * FROM dustrec WHERE dustrec_position_id = '4'";
                            $queryA4 = mysqli_query($connection, $sqlA4);
                            $rowA4 = mysqli_num_rows($queryA4);
    
                    $sqlA5 = "
                            SELECT * FROM dustrec WHERE dustrec_position_id = '5'";
                            $queryA5 = mysqli_query($connection, $sqlA5);
                            $rowA5 = mysqli_num_rows($queryA5);
                    
                    $sqlA6 = "
                            SELECT * FROM dustrec WHERE dustrec_position_id = '6'";
                            $queryA6 = mysqli_query($connection, $sqlA6);
                            $rowA6 = mysqli_num_rows($queryA6);
    
                    $sqlA7 = "
                            SELECT * FROM dustrec WHERE dustrec_position_id = '7'";
                            $queryA7 = mysqli_query($connection, $sqlA7);
                            $rowA7 = mysqli_num_rows($queryA7);
    
                    $sqlA8 = "
                            SELECT * FROM dustrec WHERE dustrec_position_id = '8'";
                            $queryA8 = mysqli_query($connection, $sqlA8);
                            $rowA8 = mysqli_num_rows($queryA8);
    
                    $sqlA9 = "
                            SELECT * FROM dustrec WHERE dustrec_position_id = '9'";
                            $queryA9 = mysqli_query($connection, $sqlA9);
                            $rowA9 = mysqli_num_rows($queryA9);
    
                    $sqlA10 = "
                            SELECT * FROM dustrec WHERE dustrec_position_id = '10'";
                            $queryA10 = mysqli_query($connection, $sqlA10);
                            $rowA10 = mysqli_num_rows($queryA10);
                    
                    $sqlA11 = "
                            SELECT * FROM dustrec WHERE dustrec_position_id = '11'";
                            $queryA11 = mysqli_query($connection, $sqlA11);
                            $rowA11 = mysqli_num_rows($queryA11);
    
                    $sqlA12 = "
                            SELECT * FROM dustrec WHERE dustrec_position_id = '12'";
                            $queryA12 = mysqli_query($connection, $sqlA12);
                            $rowA12 = mysqli_num_rows($queryA12);
    
                    $sqlA13 = "
                            SELECT * FROM dustrec WHERE dustrec_position_id = '13'";
                            $queryA13 = mysqli_query($connection, $sqlA13);
                            $rowA13 = mysqli_num_rows($queryA13);
    
                    $sqlA14 = "
                            SELECT * FROM dustrec WHERE dustrec_position_id = '14'";
                            $queryA14 = mysqli_query($connection, $sqlA14);
                            $rowA14 = mysqli_num_rows($queryA14);
    
                    $sqlA15 = "
                            SELECT * FROM dustrec WHERE dustrec_position_id = '15'";
                            $queryA15 = mysqli_query($connection, $sqlA15);
                            $rowA15 = mysqli_num_rows($queryA15);
    
                    $sqlA16 = "
                            SELECT * FROM dustrec WHERE dustrec_position_id = '16'";
                            $queryA16 = mysqli_query($connection, $sqlA16);
                            $rowA16 = mysqli_num_rows($queryA16);
    
                    $sqlA17 = "
                            SELECT * FROM dustrec WHERE dustrec_position_id = '17'";
                            $queryA17 = mysqli_query($connection, $sqlA17);
                            $rowA17 = mysqli_num_rows($queryA17);
    
                    $sqlA18 = "
                            SELECT * FROM dustrec WHERE dustrec_position_id = '18'";
                            $queryA18 = mysqli_query($connection, $sqlA18);
                            $rowA18 = mysqli_num_rows($queryA18);
    
                    $sqlA19 = "
                            SELECT * FROM dustrec WHERE dustrec_position_id = '19'";
                            $queryA19 = mysqli_query($connection, $sqlA19);
                            $rowA19 = mysqli_num_rows($queryA19);
    
                    $sqlA20 = "
                            SELECT * FROM dustrec WHERE dustrec_position_id = '20'";
                            $queryA20 = mysqli_query($connection, $sqlA20);
                            $rowA20 = mysqli_num_rows($queryA20);
    
                    $sqlA21 = "
                            SELECT * FROM dustrec WHERE dustrec_position_id = '21'";
                            $queryA21 = mysqli_query($connection, $sqlA21);
                            $rowA21 = mysqli_num_rows($queryA21);
    
                    $sqlA22 = "
                            SELECT * FROM dustrec WHERE dustrec_position_id = '22'";
                            $queryA22 = mysqli_query($connection, $sqlA22);
                            $rowA22 = mysqli_num_rows($queryA22);
    
                    $sqlA23 = "
                            SELECT * FROM dustrec WHERE dustrec_position_id = '23'";
                            $queryA23 = mysqli_query($connection, $sqlA23);
                            $rowA23 = mysqli_num_rows($queryA23);
    
                    $sqlA24 = "
                            SELECT * FROM dustrec WHERE dustrec_position_id = '24'";
                            $queryA24 = mysqli_query($connection, $sqlA24);
                            $rowA24 = mysqli_num_rows($queryA24);
    
                    $sqlA25 = "
                            SELECT * FROM dustrec WHERE dustrec_position_id = '25'";
                            $queryA25 = mysqli_query($connection, $sqlA25);
                            $rowA25 = mysqli_num_rows($queryA25);
    
                    $sqlA26 = "
                            SELECT * FROM dustrec WHERE dustrec_position_id = '26'";
                            $queryA26 = mysqli_query($connection, $sqlA26);
                            $rowA26 = mysqli_num_rows($queryA26);
    
                    $sqlA27 = "
                            SELECT * FROM dustrec WHERE dustrec_position_id = '27'";
                            $queryA27 = mysqli_query($connection, $sqlA27);
                            $rowA27 = mysqli_num_rows($queryA27);
    
                    $sqlA28 = "
                            SELECT * FROM dustrec WHERE dustrec_position_id = '28'";
                            $queryA28 = mysqli_query($connection, $sqlA28);
                            $rowA28 = mysqli_num_rows($queryA28);
    
                    $sqlA29 = "
                            SELECT * FROM dustrec WHERE dustrec_position_id = '29'";
                            $queryA29 = mysqli_query($connection, $sqlA29);
                            $rowA29 = mysqli_num_rows($queryA29);
    
                    $sqlA30 = "
                            SELECT * FROM dustrec WHERE dustrec_position_id = '30'";
                            $queryA30 = mysqli_query($connection, $sqlA30);
                            $rowA30 = mysqli_num_rows($queryA30);
    
                    $sqlA31 = "
                            SELECT * FROM dustrec WHERE dustrec_position_id = '31'";
                            $queryA31 = mysqli_query($connection, $sqlA31);
                            $rowA31 = mysqli_num_rows($queryA31);
    
                    //echo $rowALL."<br>".$rowA1."<br>".$rowA2;
		            
 ?>
             <!--<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>-->
	        <script src="https://code.highcharts.com/highcharts.js"></script>
	        <script src="https://code.highcharts.com/modules/data.js"></script>
	        <script src="https://code.highcharts.com/modules/exporting.js"></script>
             <script type="text/javascript">
$(function () {
    $('#containerpos').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'แผนภูมิแสดงสถิติจำนวนการวัด'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        subtitle: {
                text: 'แยกตามตำแหน่งทั้งหมด',
                x: 0
                },
        plotOptions: {
                series: {
                animation: {
                duration: 3000,
                easing: 'easeOutBounce'
                }
            }
        },
        credits: {
                enabled: false
                },
                exporting: {
                    enabled: false
                },
        series: [{
            name: 'ประมาณ',
            colorByPoint: true,
            data: [{
                name: 'บริการยืม-คืน <?php echo $rowA1; ?> ครั้ง',
                y: <?php echo $rowA1; ?>
            }, {
                name: 'บริการตอบคำถามฯ <?php echo $rowA2; ?> ครั้ง',
                y: <?php echo $rowA2; ?>
            }, {
                name: 'โถงอ่านหนังสือชั้น 1 <?php echo $rowA3; ?> ครั้ง',
                y: <?php echo $rowA3; ?>
            }, {
                name: 'ชั้นวารสารใหม่ <?php echo $rowA4; ?> ครั้ง',
                y: <?php echo $rowA4; ?>
            }, {
                name: 'ชั้นวารสารล่วงเวลา <?php echo $rowA5; ?> ครั้ง',
                y: <?php echo $rowA5; ?>
            }, {
                name: 'สำนักงานเลขานุการ <?php echo $rowA6; ?> ครั้ง',
                y: <?php echo $rowA6; ?>
            }, {
                name: 'ชั้นหนังสือภาษาไทย <?php echo $rowA7; ?> ครั้ง',
                y: <?php echo $rowA7; ?>
            }, {
                name: 'ชั้นหนังสือภาษาอังกฤษ <?php echo $rowA8; ?> ครั้ง',
                y: <?php echo $rowA8; ?>
            }, {
                name: 'โถงอ่านหนังสือชั้น 2 <?php echo $rowA9; ?> ครั้ง',
                y: <?php echo $rowA9; ?>
            }, {
                name: 'ทางเดินหน้าห้องจดหมายเหตุฯ <?php echo $rowA10; ?> ครั้ง',
                y: <?php echo $rowA10; ?>
            }, {
                name: 'ทางเดินไปอาคาร 17 <?php echo $rowA11; ?> ครั้ง',
                y: <?php echo $rowA11; ?>
            }, {
                name: 'ทางเดินโซนห้องประชุม <?php echo $rowA12; ?> ครั้ง',
                y: <?php echo $rowA12; ?>
            }, {
                name: 'IT-Zone <?php echo $rowA13; ?> ครั้ง',
                y: <?php echo $rowA13; ?>
            }, {
                name: 'ห้องวิทยานิพนธ์ <?php echo $rowA14; ?> ครั้ง',
                y: <?php echo $rowA14; ?>
            }, {
                name: 'บริการโสตฯ <?php echo $rowA15; ?> ครั้ง',
                y: <?php echo $rowA15; ?>
            }, {
                name: 'American Corner Pattani <?php echo $rowA16; ?> ครั้ง',
                y: <?php echo $rowA16; ?>
            }, {
                name: 'ทางเข้าห้องมินิเธียเตอร์ <?php echo $rowA17; ?> ครั้ง',
                y: <?php echo $rowA17; ?>
            }, {
                name: 'ทางเข้าห้องบริการคอมพิวเตอร์ 1 <?php echo $rowA18; ?> ครั้ง',
                y: <?php echo $rowA18; ?>
            }, {
                name: 'งานวิเคราะห์ทรัพยากรฯ <?php echo $rowA19; ?> ครั้ง',
                y: <?php echo $rowA19; ?>
            }, {
                name: 'งานธุรการ <?php echo $rowA20; ?> ครั้ง',
                y: <?php echo $rowA20; ?>
            }, {
                name: 'งานห้องสมุดดิจิทัล <?php echo $rowA21; ?> ครั้ง',
                y: <?php echo $rowA21; ?>
            }, {
                name: 'งานซ่อมฯ <?php echo $rowA22; ?> ครั้ง',
                y: <?php echo $rowA22; ?>
            }, {
                name: 'ชั้นหนังสือ <?php echo $rowA23; ?> ครั้ง',
                y: <?php echo $rowA23; ?>
            }, {
                name: 'ชั้นหนังสือภาษาเกาหลี <?php echo $rowA24; ?> ครั้ง',
                y: <?php echo $rowA24; ?>
            }, {
                name: 'ชั้นหนังสือภาษาอังกฤษ <?php echo $rowA25; ?> ครั้ง',
                y: <?php echo $rowA25; ?>
            }, {
                name: 'ชั้นหนังสือภาษาไทย <?php echo $rowA26; ?> ครั้ง',
                y: <?php echo $rowA26; ?>
            }, {
                name: 'ชั้นหนังสือภาษาอิสลาม <?php echo $rowA27; ?> ครั้ง',
                y: <?php echo $rowA27; ?>
            }, {
                name: 'ชั้นหนังสือนวนิยาย <?php echo $rowA28; ?> ครั้ง',
                y: <?php echo $rowA28; ?>
            }, {
                name: 'ที่นั่งอ่านหนังสือด้านตะวันตก <?php echo $rowA29; ?> ครั้ง',
                y: <?php echo $rowA29; ?>
            }, {
                name: 'ที่นั่งอ่านหนังสือด้านตะวันออก <?php echo $rowA30; ?> ครั้ง',
                y: <?php echo $rowA30; ?>
            }, {
                name: 'ที่นั่งอ่านหนังสือด้านทิศใต้ <?php echo $rowA31; ?> ครั้ง',
                y: <?php echo $rowA31; ?>
            }]
        }]
    });
});
		</script>

