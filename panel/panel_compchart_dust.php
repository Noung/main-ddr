<!-- Header -->
<?php
session_start();
error_reporting(0); // ปิด error report
//$_SESSION["LOGIN"];

$searchwordcomp_posidA = $_SESSION["SEARCHWORDCOMP_POSIDA"]; //-->ใช้ค้นกราฟ
$searchwordcomp_posidB = $_SESSION["SEARCHWORDCOMP_POSIDB"]; //-->ใช้ค้นกราฟ
$searchwordcomp_st = $_SESSION["SEARCHWORDCOMP_STDATE"];
$searchwordcomp_en = $_SESSION["SEARCHWORDCOMP_ENDATE"];

$explodecomp_st = explode(" ", $searchwordcomp_st); // แยกวันและเวลาออกจากกันด้วยช่องว่าง " "
$searchwordcomp_stdate = $explodecomp_st[0]; // วันที่เริ่ม //-->ใช้ค้นกราฟ
$explodecomp_en = explode(" ", $searchwordcomp_en); // แยกวันและเวลาออกจากกันด้วยช่องว่าง " "
$searchwordcomp_endate = $explodecomp_en[0]; // วันที่สิ้นสุด //-->ใช้ค้นกราฟ

/*echo '$searchwordcomp_posidA ='.$searchwordcomp_posidA."<br>";
echo '$searchwordcomp_posidB ='.$searchwordcomp_posidB."<br>";
echo '$searchwordcomp_stdate ='.$searchwordcomp_stdate."<br>";
echo '$searchwordcomp_endate ='.$searchwordcomp_endate."<br>";
exit();*/

//if($_SESSION["LOGIN"]!=1){

?>

<!-- Header -->

<!-- /////////////////// ฝุ่น /////////////////// -->
<?php
if (!$searchwordcomp_posidA || !$searchwordcomp_posidB || !$searchwordcomp_stdate || !$searchwordcomp_endate) {
?>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover table-responsive" id="datatable">
                <thead>
                    <tr>
                        <th>วันที่</th>
                        <th>ไม่พบข้อมูล</th>
                        <th>ไม่พบข้อมูล</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sqlA = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_amount_dust),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '' and 
                            dustrec_date <= '' and
                            dustrec_position_id =                 
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A ใน 5 วันหลังสุด

                    $queryA = mysqli_query($connection, $sqlA);
                    $rowA = mysqli_num_rows($queryA);

                    while ($rowA_result = mysqli_fetch_array($queryA, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA_result['dustrec_date']; ?>
                            </th>
                            <td>
                                <?php echo $rowA_result['ROUND(AVG(dustrec_amount_dust),2)']; ?>
                            </td>
                            <td>

                            </td>
                        </tr>

                    <?php

                    }

                    $sqlB = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_amount_dust),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '' and 
                            dustrec_date <= '' and
                            dustrec_position_id =                 
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง B ใน 5 วันหลังสุด

                    $queryB = mysqli_query($connection, $sqlB);
                    $rowB = mysqli_num_rows($queryB);

                    while ($rowB_result = mysqli_fetch_array($queryB, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowB_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>
                                <?php echo $rowB_result['ROUND(AVG(dustrec_amount_dust),2)']; ?>
                            </td>
                        </tr>

                    <?php

                    }

                    ?>

                </tbody>
            </table>
        </div>
    </div>

    <!--<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>-->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script>
        $(function() {
            $('#container5').highcharts({
                data: {
                    table: 'datatable'
                },
                chart: {
                    type: 'area'
                },
                title: {
                    text: 'แผนภูมิแสดงปริมาณฝุ่นละออง'
                },
                subtitle: {
                    text: 'เปรียบเทียบตำแหน่ง - และ - ระหว่างวันที่ - ถึง -',
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
                yAxis: {
                    allowDecimals: false,
                    title: {
                        text: 'ปริมาณฝุ่นละออง (µg/m³)'
                    },
                    plotLines: [{
                        value: 37.5,
                        color: 'red', //#7CB5EC
                        dashStyle: 'shortdash',
                        width: 2,
                        label: {
                            text: 'มาตรฐาน PM = 37.5 µg/m³'
                        }
                    }]
                },
                tooltip: {
                    /*formatter: function () {
					       return '<b>' + this.series.name + '</b><br/>' +
						      this.point.y + ' ' + this.point.name.toLowerCase();
				        }*/
                    valueSuffix: ' µg/m³'
                },
                credits: {
                    enabled: false
                },
                exporting: {
                    enabled: false
                }
            });
        });
    </script>
<?php
} else {
    if ($searchwordcomp_posidA == '1') {
        $posnameA = 'บริการยืม-คืน';
    } else if ($searchwordcomp_posidA == '2') {
        $posnameA = 'บริการตอบคำถามฯ';
    } else if ($searchwordcomp_posidA == '3') {
        $posnameA = 'โถงอ่านหนังสือชั้น 1';
    } else if ($searchwordcomp_posidA == '4') {
        $posnameA = 'หน้าอาคารสำนักวิทยบริการ';
    } else if ($searchwordcomp_posidA == '5') {
        $posnameA = 'ชั้นวารสารล่วงเวลา';
    } else if ($searchwordcomp_posidA == '6') {
        $posnameA = 'สำนักงานเลขานุการ';
    } else if ($searchwordcomp_posidA == '7') {
        $posnameA = 'ชั้นหนังสือภาษาไทย';
    } else if ($searchwordcomp_posidA == '8') {
        $posnameA = 'ชั้นหนังสือภาษาอังกฤษ';
    } else if ($searchwordcomp_posidA == '9') {
        $posnameA = 'โถงอ่านหนังสือชั้น 2';
    } else if ($searchwordcomp_posidA == '10') {
        $posnameA = 'ทางเดินหน้าห้องจดหมายเหตุฯ';
    } else if ($searchwordcomp_posidA == '11') {
        $posnameA = 'ทางเดินไปอาคาร 17';
    } else if ($searchwordcomp_posidA == '12') {
        $posnameA = 'ทางเดินโซนห้องประชุม';
    } else if ($searchwordcomp_posidA == '13') {
        $posnameA = 'IT-Zone';
    } else if ($searchwordcomp_posidA == '14') {
        $posnameA = 'ห้องวิทยานิพนธ์';
    } else if ($searchwordcomp_posidA == '15') {
        $posnameA = 'บริการโสตฯ';
    } else if ($searchwordcomp_posidA == '16') {
        $posnameA = 'American Corner Pattani';
    } else if ($searchwordcomp_posidA == '17') {
        $posnameA = 'ทางเข้าห้องมินิเธียเตอร์';
    } else if ($searchwordcomp_posidA == '18') {
        $posnameA = 'ทางเข้าห้องบริการคอมพิวเตอร์ 1';
    } else if ($searchwordcomp_posidA == '19') {
        $posnameA = 'งานวิเคราะห์ทรัพยากรฯ';
    } else if ($searchwordcomp_posidA == '20') {
        $posnameA = 'โรงพิมพ์ฝ่ายเทคโนโลยีและนวัตกรรมฯ';
    } else if ($searchwordcomp_posidA == '21') {
        $posnameA = 'งานห้องสมุดดิจิทัล';
    } else if ($searchwordcomp_posidA == '22') {
        $posnameA = 'งานซ่อมฯ';
    } else if ($searchwordcomp_posidA == '23') {
        $posnameA = 'ห้องกราฟิกและสื่อสิ่งพิมพ์ดิจิทัล';
    } else if ($searchwordcomp_posidA == '24') {
        $posnameA = 'ชั้นหนังสือภาษาเกาหลี';
    } else if ($searchwordcomp_posidA == '25') {
        $posnameA = 'ชั้นหนังสือภาษาอังกฤษ';
    } else if ($searchwordcomp_posidA == '26') {
        $posnameA = 'ชั้นหนังสือภาษาไทย';
    } else if ($searchwordcomp_posidA == '27') {
        $posnameA = 'ชั้นหนังสือภาษาอิสลาม';
    } else if ($searchwordcomp_posidA == '28') {
        $posnameA = 'ชั้นหนังสือนวนิยาย';
    } else if ($searchwordcomp_posidA == '29') {
        $posnameA = 'ที่นั่งอ่านหนังสือด้านตะวันตก';
    } else if ($searchwordcomp_posidA == '30') {
        $posnameA = 'ที่นั่งอ่านหนังสือด้านตะวันออก';
    } else if ($searchwordcomp_posidA == '31') {
        $posnameA = 'ที่นั่งอ่านหนังสือด้านทิศใต้';
    }

    if ($searchwordcomp_posidB == '1') {
        $posnameB = 'บริการยืม-คืน';
    } else if ($searchwordcomp_posidB == '2') {
        $posnameB = 'บริการตอบคำถามฯ';
    } else if ($searchwordcomp_posidB == '3') {
        $posnameB = 'โถงอ่านหนังสือชั้น 1';
    } else if ($searchwordcomp_posidB == '4') {
        $posnameB = 'หน้าอาคารสำนักวิทยบริการ';
    } else if ($searchwordcomp_posidB == '5') {
        $posnameB = 'ชั้นวารสารล่วงเวลา';
    } else if ($searchwordcomp_posidB == '6') {
        $posnameB = 'สำนักงานเลขานุการ';
    } else if ($searchwordcomp_posidB == '7') {
        $posnameB = 'ชั้นหนังสือภาษาไทย';
    } else if ($searchwordcomp_posidB == '8') {
        $posnameB = 'ชั้นหนังสือภาษาอังกฤษ';
    } else if ($searchwordcomp_posidB == '9') {
        $posnameB = 'โถงอ่านหนังสือชั้น 2';
    } else if ($searchwordcomp_posidB == '10') {
        $posnameB = 'ทางเดินหน้าห้องจดหมายเหตุฯ';
    } else if ($searchwordcomp_posidB == '11') {
        $posnameB = 'ทางเดินไปอาคาร 17';
    } else if ($searchwordcomp_posidB == '12') {
        $posnameB = 'ทางเดินโซนห้องประชุม';
    } else if ($searchwordcomp_posidB == '13') {
        $posnameB = 'IT-Zone';
    } else if ($searchwordcomp_posidB == '14') {
        $posnameB = 'ห้องวิทยานิพนธ์';
    } else if ($searchwordcomp_posidB == '15') {
        $posnameB = 'บริการโสตฯ';
    } else if ($searchwordcomp_posidB == '16') {
        $posnameB = 'American Corner Pattani';
    } else if ($searchwordcomp_posidB == '17') {
        $posnameB = 'ทางเข้าห้องมินิเธียเตอร์';
    } else if ($searchwordcomp_posidB == '18') {
        $posnameB = 'ทางเข้าห้องบริการคอมพิวเตอร์ 1';
    } else if ($searchwordcomp_posidB == '19') {
        $posnameB = 'งานวิเคราะห์ทรัพยากรฯ';
    } else if ($searchwordcomp_posidB == '20') {
        $posnameB = 'โรงพิมพ์ฝ่ายเทคโนโลยีและนวัตกรรมฯ';
    } else if ($searchwordcomp_posidB == '21') {
        $posnameB = 'งานห้องสมุดดิจิทัล';
    } else if ($searchwordcomp_posidB == '22') {
        $posnameB = 'งานซ่อมฯ';
    } else if ($searchwordcomp_posidB == '23') {
        $posnameB = 'ห้องกราฟิกและสื่อสิ่งพิมพ์ดิจิทัล';
    } else if ($searchwordcomp_posidB == '24') {
        $posnameB = 'ชั้นหนังสือภาษาเกาหลี';
    } else if ($searchwordcomp_posidB == '25') {
        $posnameB = 'ชั้นหนังสือภาษาอังกฤษ';
    } else if ($searchwordcomp_posidB == '26') {
        $posnameB = 'ชั้นหนังสือภาษาไทย';
    } else if ($searchwordcomp_posidB == '27') {
        $posnameB = 'ชั้นหนังสือภาษาอิสลาม';
    } else if ($searchwordcomp_posidB == '28') {
        $posnameB = 'ชั้นหนังสือนวนิยาย';
    } else if ($searchwordcomp_posidB == '29') {
        $posnameB = 'ที่นั่งอ่านหนังสือด้านตะวันตก';
    } else if ($searchwordcomp_posidB == '30') {
        $posnameB = 'ที่นั่งอ่านหนังสือด้านตะวันออก';
    } else if ($searchwordcomp_posidB == '31') {
        $posnameB = 'ที่นั่งอ่านหนังสือด้านทิศใต้';
    }
?>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover table-responsive" id="datatable">
                <thead>
                    <tr>
                        <th>วันที่</th>
                        <th><?php echo $posnameA; ?></th>
                        <th><?php echo $posnameB; ?></th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sqlA = " 
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_amount_dust),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$searchwordcomp_stdate' and 
                            dustrec_date <= '$searchwordcomp_endate' and
                            dustrec_position_id like '%$searchwordcomp_posidA%'                  
                    
                        GROUP BY dustrec_date ORDER BY 
                            dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง $searchwordcomp_posidA วันที่ $searchwordcomp_stdate - $searchwordcomp_endate

                    $queryA = mysqli_query($connection, $sqlA);
                    $rowA = mysqli_num_rows($queryA);

                    while ($rowA_result = mysqli_fetch_array($queryA, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA_result['dustrec_date']; ?>
                            </th>
                            <td>
                                <?php echo $rowA_result['ROUND(AVG(dustrec_amount_dust),2)']; ?>
                            </td>
                            <td>

                            </td>
                        </tr>

                    <?php

                    }

                    $sqlB = " 
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_amount_dust),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$searchwordcomp_stdate' and 
                            dustrec_date <= '$searchwordcomp_endate' and
                            dustrec_position_id like '%$searchwordcomp_posidB%'                  
                    
                        GROUP BY dustrec_date ORDER BY 
                            dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง $searchwordcomp_posidB วันที่ $searchwordcomp_stdate - $searchwordcomp_endate

                    $queryB = mysqli_query($connection, $sqlB);
                    $rowB = mysqli_num_rows($queryB);

                    while ($rowB_result = mysqli_fetch_array($queryB, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowB_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>
                                <?php echo $rowB_result['ROUND(AVG(dustrec_amount_dust),2)']; ?>
                            </td>
                        </tr>

                    <?php

                    }

                    ?>

                </tbody>
            </table>
        </div>
    </div>

    <!--<script src="http://code.jquery.com/jquery-1.12.0.min.js"></script>-->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script>
        $(function() {
            $('#container5').highcharts({
                data: {
                    table: 'datatable'
                },
                chart: {
                    type: 'area'
                },
                title: {
                    text: 'แผนภูมิแสดงปริมาณฝุ่นละออง'
                },
                subtitle: {
                    text: 'เปรียบเทียบตำแหน่ง <?php echo $posnameA; ?> และ <?php echo $posnameB; ?> ระหว่างวันที่ <?php echo date("d/m/Y", strtotime($searchwordcomp_stdate)); ?> ถึง <?php echo date("d/m/Y", strtotime($searchwordcomp_endate)); ?> ',
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
                yAxis: {
                    allowDecimals: false,
                    title: {
                        text: 'ปริมาณฝุ่นละออง (µg/m³)'
                    },
                    plotLines: [{
                        value: 37.5,
                        color: 'red', //#7CB5EC
                        dashStyle: 'shortdash',
                        width: 2,
                        label: {
                            text: 'มาตรฐาน PM = 37.5 µg/m³'
                        }
                    }]
                },
                tooltip: {
                    /*formatter: function () {
					       return '<b>' + this.series.name + '</b><br/>' +
						      this.point.y + ' ' + this.point.name.toLowerCase();
				        }*/
                    valueSuffix: ' µg/m³'
                },
                credits: {
                    enabled: false
                },
                exporting: {
                    enabled: false
                }
            });
        });
    </script>

<?php
}
?>
<!-- /////////////////// ฝุ่น /////////////////// -->