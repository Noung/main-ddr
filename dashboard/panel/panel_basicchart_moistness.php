<!-- Header -->
<?php
session_start();
error_reporting(0); // ปิด error report
//$_SESSION["LOGIN"];

$searchword_posid = $_SESSION["SEARCHWORD_POSID"]; //-->ใช้ค้นกราฟ
$searchword_st = $_SESSION["SEARCHWORD_STDATE"];
$searchword_en = $_SESSION["SEARCHWORD_ENDATE"];

$explode_st = explode(" ", $searchword_st); // แยกวันและเวลาออกจากกันด้วยช่องว่าง " "
$searchword_stdate = $explode_st[0]; // วันที่เริ่ม //-->ใช้ค้นกราฟ
$explode_en = explode(" ", $searchword_en); // แยกวันและเวลาออกจากกันด้วยช่องว่าง " "
$searchword_endate = $explode_en[0]; // วันที่สิ้นสุด //-->ใช้ค้นกราฟ

/*echo '$searchword_posid ='.$searchword_posid."<br>";
echo '$searchword_stdate ='.$searchword_stdate."<br>";
echo '$searchword_endate ='.$searchword_endate."<br>";
exit();*/

//if($_SESSION["LOGIN"]!=1){

?>


<!-- Header -->

<!-- /////////////////// ความชื้น /////////////////// -->
<?php
if (!$searchword_posid || !$searchword_stdate || !$searchword_endate) {
    $showdatetoday = date('Y-m-d'); // วันที่ปัจจุบัน
    $showdatebefore = date('Y-m-d', strtotime(' -2 days')); //วันที่ย้อนหลัง 2 วัน
?>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover table-responsive" id="datatable">
                <thead>
                    <tr>
                        <th>วันที่</th>
                        <th>บริการยืม-คืน</th>
                        <th>บริการตอบคำถามฯ</th>
                        <th>โถงอ่านหนังสือชั้น 1</th>
                        <th>หน้าอาคารสำนักวิทยบริการ</th>
                        <th>ชั้นวารสารล่วงเวลา</th>
                        <th>สำนักงานเลขานุการ</th>
                        <th>ชั้นหนังสือภาษาไทย</th>
                        <th>ชั้นหนังสือภาษาอังกฤษ</th>
                        <th>โถงอ่านหนังสือชั้น 2</th>
                        <th>ทางเดินหน้าห้องจดหมายเหตุฯ</th>
                        <th>ทางเดินไปอาคาร 17</th>
                        <th>ทางเดินโซนห้องประชุม</th>
                        <th>IT-Zone</th>
                        <th>ห้องวิทยานิพนธ์</th>
                        <th>บริการโสตฯ</th>
                        <th>American Corner Pattani</th>
                        <th>ทางเข้าห้องมินิเธียเตอร์</th>
                        <th>ทางเข้าห้องบริการคอมพิวเตอร์ 1</th>
                        <th>งานวิเคราะห์ทรัพยากรฯ</th>
                        <th>โรงพิมพ์ฝ่ายเทคโนโลยีและนวัตกรรมฯ</th>
                        <th>งานห้องสมุดดิจิทัล</th>
                        <th>งานซ่อมฯ</th>
                        <th>ห้องกราฟิกและสื่อสิ่งพิมพ์ดิจิทัล</th>
                        <th>ชั้นหนังสือภาษาเกาหลี</th>
                        <th>ชั้นหนังสือภาษาอังกฤษ</th>
                        <th>ชั้นหนังสือภาษาไทย</th>
                        <th>ชั้นหนังสือภาษาอิสลาม</th>
                        <th>ชั้นหนังสือนวนิยาย</th>
                        <th>ที่นั่งอ่านหนังสือด้านตะวันตก</th>
                        <th>ที่นั่งอ่านหนังสือด้านตะวันออก</th>
                        <th>ที่นั่งอ่านหนังสือด้านทิศใต้</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sqlA1 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$showdatebefore' and 
                            dustrec_date <= '$showdatetoday' and
                            dustrec_position_id = '1'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A1 ใน 5 วันหลังสุด

                    $queryA1 = mysqli_query($connection, $sqlA1);
                    $rowA1 = mysqli_num_rows($queryA1);

                    while ($rowA1_result = mysqli_fetch_array($queryA1, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA1_result['dustrec_date']; ?>
                            </th>
                            <td>
                                <?php echo $rowA1_result['ROUND(AVG(dustrec_moistness),2)']; ?>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }

                    $sqlA2 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$showdatebefore' and 
                            dustrec_date <= '$showdatetoday' and
                            dustrec_position_id = '2'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A2 ใน 5 วันหลังสุด

                    $queryA2 = mysqli_query($connection, $sqlA2);
                    $rowA2 = mysqli_num_rows($queryA2);

                    while ($rowA2_result = mysqli_fetch_array($queryA2, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA2_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>
                                <?php echo $rowA2_result['ROUND(AVG(dustrec_moistness),2)']; ?>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }

                    $sqlA3 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$showdatebefore' and 
                            dustrec_date <= '$showdatetoday' and
                            dustrec_position_id = '3'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A3 ใน 5 วันหลังสุด

                    $queryA3 = mysqli_query($connection, $sqlA3);
                    $rowA3 = mysqli_num_rows($queryA3);

                    while ($rowA3_result = mysqli_fetch_array($queryA3, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA3_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td><?php echo $rowA3_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }

                    $sqlA4 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$showdatebefore' and 
                            dustrec_date <= '$showdatetoday' and
                            dustrec_position_id = '4'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A4 ใน 5 วันหลังสุด

                    $queryA4 = mysqli_query($connection, $sqlA4);
                    $rowA4 = mysqli_num_rows($queryA4);

                    while ($rowA4_result = mysqli_fetch_array($queryA4, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA4_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA4_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA5 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$showdatebefore' and 
                            dustrec_date <= '$showdatetoday' and
                            dustrec_position_id = '5'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A5 ใน 5 วันหลังสุด

                    $queryA5 = mysqli_query($connection, $sqlA5);
                    $rowA5 = mysqli_num_rows($queryA5);

                    while ($rowA5_result = mysqli_fetch_array($queryA5, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA5_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA5_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA6 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$showdatebefore' and 
                            dustrec_date <= '$showdatetoday' and
                            dustrec_position_id = '6'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A6 ใน 5 วันหลังสุด

                    $queryA6 = mysqli_query($connection, $sqlA6);
                    $rowA6 = mysqli_num_rows($queryA6);

                    while ($rowA6_result = mysqli_fetch_array($queryA6, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA6_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA6_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }

                    $sqlA7 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$showdatebefore' and 
                            dustrec_date <= '$showdatetoday' and
                            dustrec_position_id = '7'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A7 ใน 5 วันหลังสุด

                    $queryA7 = mysqli_query($connection, $sqlA7);
                    $rowA7 = mysqli_num_rows($queryA7);

                    while ($rowA7_result = mysqli_fetch_array($queryA7, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA7_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA7_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA8 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$showdatebefore' and 
                            dustrec_date <= '$showdatetoday' and
                            dustrec_position_id = '8'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A8 ใน 5 วันหลังสุด

                    $queryA8 = mysqli_query($connection, $sqlA8);
                    $rowA8 = mysqli_num_rows($queryA8);

                    while ($rowA8_result = mysqli_fetch_array($queryA8, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA8_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA8_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>

                    <?php

                    }

                    $sqlA9 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$showdatebefore' and 
                            dustrec_date <= '$showdatetoday' and
                            dustrec_position_id = '9'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A9 ใน 5 วันหลังสุด

                    $queryA9 = mysqli_query($connection, $sqlA9);
                    $rowA9 = mysqli_num_rows($queryA9);

                    while ($rowA9_result = mysqli_fetch_array($queryA9, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA9_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA9_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }

                    $sqlA10 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$showdatebefore' and 
                            dustrec_date <= '$showdatetoday' and
                            dustrec_position_id = '10'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A10 ใน 5 วันหลังสุด

                    $queryA10 = mysqli_query($connection, $sqlA10);
                    $rowA10 = mysqli_num_rows($queryA10);

                    while ($rowA10_result = mysqli_fetch_array($queryA10, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA10_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA10_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA11 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$showdatebefore' and 
                            dustrec_date <= '$showdatetoday' and
                            dustrec_position_id = '11'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A11 ใน 5 วันหลังสุด

                    $queryA11 = mysqli_query($connection, $sqlA11);
                    $rowA11 = mysqli_num_rows($queryA11);

                    while ($rowA11_result = mysqli_fetch_array($queryA11, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA11_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA11_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA12 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$showdatebefore' and 
                            dustrec_date <= '$showdatetoday' and
                            dustrec_position_id = '12'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A12 ใน 5 วันหลังสุด

                    $queryA12 = mysqli_query($connection, $sqlA12);
                    $rowA12 = mysqli_num_rows($queryA12);

                    while ($rowA12_result = mysqli_fetch_array($queryA12, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA12_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA12_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA13 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$showdatebefore' and 
                            dustrec_date <= '$showdatetoday' and
                            dustrec_position_id = '13'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A13 ใน 5 วันหลังสุด

                    $queryA13 = mysqli_query($connection, $sqlA13);
                    $rowA13 = mysqli_num_rows($queryA13);

                    while ($rowA13_result = mysqli_fetch_array($queryA13, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA13_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA13_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA14 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$showdatebefore' and 
                            dustrec_date <= '$showdatetoday' and
                            dustrec_position_id = '14'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A14 ใน 5 วันหลังสุด

                    $queryA14 = mysqli_query($connection, $sqlA14);
                    $rowA14 = mysqli_num_rows($queryA14);

                    while ($rowA14_result = mysqli_fetch_array($queryA14, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA14_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA14_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA15 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$showdatebefore' and 
                            dustrec_date <= '$showdatetoday' and
                            dustrec_position_id = '15'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A15 ใน 5 วันหลังสุด

                    $queryA15 = mysqli_query($connection, $sqlA15);
                    $rowA15 = mysqli_num_rows($queryA15);

                    while ($rowA15_result = mysqli_fetch_array($queryA15, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA15_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA15_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA16 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$showdatebefore' and 
                            dustrec_date <= '$showdatetoday' and
                            dustrec_position_id = '16'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A16 ใน 5 วันหลังสุด

                    $queryA16 = mysqli_query($connection, $sqlA16);
                    $rowA16 = mysqli_num_rows($queryA16);

                    while ($rowA16_result = mysqli_fetch_array($queryA16, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA16_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA16_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA17 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$showdatebefore' and 
                            dustrec_date <= '$showdatetoday' and
                            dustrec_position_id = '17'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A17 ใน 5 วันหลังสุด

                    $queryA17 = mysqli_query($connection, $sqlA17);
                    $rowA17 = mysqli_num_rows($queryA17);

                    while ($rowA17_result = mysqli_fetch_array($queryA17, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA17_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA17_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA18 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$showdatebefore' and 
                            dustrec_date <= '$showdatetoday' and
                            dustrec_position_id = '18'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A18 ใน 5 วันหลังสุด

                    $queryA18 = mysqli_query($connection, $sqlA18);
                    $rowA18 = mysqli_num_rows($queryA18);

                    while ($rowA18_result = mysqli_fetch_array($queryA18, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA18_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA18_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA19 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$showdatebefore' and 
                            dustrec_date <= '$showdatetoday' and
                            dustrec_position_id = '19'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A19 ใน 5 วันหลังสุด

                    $queryA19 = mysqli_query($connection, $sqlA19);
                    $rowA19 = mysqli_num_rows($queryA19);

                    while ($rowA19_result = mysqli_fetch_array($queryA19, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA19_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA19_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA20 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$showdatebefore' and 
                            dustrec_date <= '$showdatetoday' and
                            dustrec_position_id = '20'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A20 ใน 5 วันหลังสุด

                    $queryA20 = mysqli_query($connection, $sqlA20);
                    $rowA20 = mysqli_num_rows($queryA20);

                    while ($rowA20_result = mysqli_fetch_array($queryA20, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA20_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA20_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>

                    <?php

                    }
                    $sqlA21 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$showdatebefore' and 
                            dustrec_date <= '$showdatetoday' and
                            dustrec_position_id = '21'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A21 ใน 5 วันหลังสุด

                    $queryA21 = mysqli_query($connection, $sqlA21);
                    $rowA21 = mysqli_num_rows($queryA21);

                    while ($rowA21_result = mysqli_fetch_array($queryA21, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA21_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA21_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA22 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$showdatebefore' and 
                            dustrec_date <= '$showdatetoday' and
                            dustrec_position_id = '22'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A22 ใน 5 วันหลังสุด

                    $queryA22 = mysqli_query($connection, $sqlA22);
                    $rowA22 = mysqli_num_rows($queryA22);

                    while ($rowA22_result = mysqli_fetch_array($queryA22, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA22_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA22_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA23 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$showdatebefore' and 
                            dustrec_date <= '$showdatetoday' and
                            dustrec_position_id = '23'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A23 ใน 5 วันหลังสุด

                    $queryA23 = mysqli_query($connection, $sqlA23);
                    $rowA23 = mysqli_num_rows($queryA23);

                    while ($rowA23_result = mysqli_fetch_array($queryA23, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA23_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA23_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA24 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$showdatebefore' and 
                            dustrec_date <= '$showdatetoday' and
                            dustrec_position_id = '24'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A24 ใน 5 วันหลังสุด

                    $queryA24 = mysqli_query($connection, $sqlA24);
                    $rowA24 = mysqli_num_rows($queryA24);

                    while ($rowA24_result = mysqli_fetch_array($queryA24, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA24_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA24_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA25 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$showdatebefore' and 
                            dustrec_date <= '$showdatetoday' and
                            dustrec_position_id = '25'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A25 ใน 5 วันหลังสุด

                    $queryA25 = mysqli_query($connection, $sqlA25);
                    $rowA25 = mysqli_num_rows($queryA25);

                    while ($rowA25_result = mysqli_fetch_array($queryA25, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA25_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA25_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA26 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$showdatebefore' and 
                            dustrec_date <= '$showdatetoday' and
                            dustrec_position_id = '26'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A26 ใน 5 วันหลังสุด

                    $queryA26 = mysqli_query($connection, $sqlA26);
                    $rowA26 = mysqli_num_rows($queryA26);

                    while ($rowA26_result = mysqli_fetch_array($queryA26, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA26_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA26_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA27 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$showdatebefore' and 
                            dustrec_date <= '$showdatetoday' and
                            dustrec_position_id = '27'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A27 ใน 5 วันหลังสุด

                    $queryA27 = mysqli_query($connection, $sqlA27);
                    $rowA27 = mysqli_num_rows($queryA27);

                    while ($rowA27_result = mysqli_fetch_array($queryA27, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA27_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA27_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA28 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$showdatebefore' and 
                            dustrec_date <= '$showdatetoday' and
                            dustrec_position_id = '28'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A28 ใน 5 วันหลังสุด

                    $queryA28 = mysqli_query($connection, $sqlA28);
                    $rowA28 = mysqli_num_rows($queryA28);

                    while ($rowA28_result = mysqli_fetch_array($queryA28, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA28_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA28_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA29 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$showdatebefore' and 
                            dustrec_date <= '$showdatetoday' and
                            dustrec_position_id = '29'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A29 ใน 5 วันหลังสุด

                    $queryA29 = mysqli_query($connection, $sqlA29);
                    $rowA29 = mysqli_num_rows($queryA29);

                    while ($rowA29_result = mysqli_fetch_array($queryA29, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA29_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA29_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA30 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$showdatebefore' and 
                            dustrec_date <= '$showdatetoday' and
                            dustrec_position_id = '30'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A30 ใน 5 วันหลังสุด

                    $queryA30 = mysqli_query($connection, $sqlA30);
                    $rowA30 = mysqli_num_rows($queryA30);

                    while ($rowA30_result = mysqli_fetch_array($queryA30, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA30_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA30_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA31 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$showdatebefore' and 
                            dustrec_date <= '$showdatetoday' and
                            dustrec_position_id = '31'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A31 ใน 5 วันหลังสุด

                    $queryA31 = mysqli_query($connection, $sqlA31);
                    $rowA31 = mysqli_num_rows($queryA31);

                    while ($rowA31_result = mysqli_fetch_array($queryA31, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA31_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA31_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
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
            $('#container3').highcharts({
                data: {
                    table: 'datatable'
                },
                chart: {
                    type: 'area'
                },
                title: {
                    text: 'แผนภูมิแสดงความชื้น'
                },
                subtitle: {
                    text: 'ทุกตำแหน่งย้อนหลัง 3 วันล่าสุด ระหว่างวันที่ <?php echo date("d/m/Y", strtotime($showdatebefore)); ?> ถึง <?php echo date("d/m/Y", strtotime($showdatetoday)); ?>',
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
                        text: 'ความชื้น (%)'
                    }
                },
                tooltip: {
                    /*formatter: function () {
					       return '<b>' + this.series.name + '</b><br/>' +
						      this.point.y + ' ' + this.point.name.toLowerCase();
				        }*/
                    valueSuffix: ' %'
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
} else if ($searchword_posid == 'all') {
?>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover table-responsive" id="datatable">
                <thead>
                    <tr>
                        <th>วันที่</th>
                        <th>บริการยืม-คืน</th>
                        <th>บริการตอบคำถามฯ</th>
                        <th>โถงอ่านหนังสือชั้น 1</th>
                        <th>หน้าอาคารสำนักวิทยบริการ</th>
                        <th>ชั้นวารสารล่วงเวลา</th>
                        <th>สำนักงานเลขานุการ</th>
                        <th>ชั้นหนังสือภาษาไทย</th>
                        <th>ชั้นหนังสือภาษาอังกฤษ</th>
                        <th>โถงอ่านหนังสือชั้น 2</th>
                        <th>ทางเดินหน้าห้องจดหมายเหตุฯ</th>
                        <th>ทางเดินไปอาคาร 17</th>
                        <th>ทางเดินโซนห้องประชุม</th>
                        <th>IT-Zone</th>
                        <th>ห้องวิทยานิพนธ์</th>
                        <th>บริการโสตฯ</th>
                        <th>American Corner Pattani</th>
                        <th>ทางเข้าห้องมินิเธียเตอร์</th>
                        <th>ทางเข้าห้องบริการคอมพิวเตอร์ 1</th>
                        <th>งานวิเคราะห์ทรัพยากรฯ</th>
                        <th>โรงพิมพ์ฝ่ายเทคโนโลยีและนวัตกรรมฯ</th>
                        <th>งานห้องสมุดดิจิทัล</th>
                        <th>งานซ่อมฯ</th>
                        <th>ห้องกราฟิกและสื่อสิ่งพิมพ์ดิจิทัล</th>
                        <th>ชั้นหนังสือภาษาเกาหลี</th>
                        <th>ชั้นหนังสือภาษาอังกฤษ</th>
                        <th>ชั้นหนังสือภาษาไทย</th>
                        <th>ชั้นหนังสือภาษาอิสลาม</th>
                        <th>ชั้นหนังสือนวนิยาย</th>
                        <th>ที่นั่งอ่านหนังสือด้านตะวันตก</th>
                        <th>ที่นั่งอ่านหนังสือด้านตะวันออก</th>
                        <th>ที่นั่งอ่านหนังสือด้านทิศใต้</th> <!-- เพิ่มตำแหน่งตรงนี้ให้ครบ -->
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sqlA1 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$searchword_stdate' and 
                            dustrec_date <= '$searchword_endate' and
                            dustrec_position_id = '1'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A1 ใน 5 วันหลังสุด

                    $queryA1 = mysqli_query($connection, $sqlA1);
                    $rowA1 = mysqli_num_rows($queryA1);

                    while ($rowA1_result = mysqli_fetch_array($queryA1, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA1_result['dustrec_date']; ?>
                            </th>
                            <td>
                                <?php echo $rowA1_result['ROUND(AVG(dustrec_moistness),2)']; ?>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }

                    $sqlA2 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$searchword_stdate' and 
                            dustrec_date <= '$searchword_endate' and
                            dustrec_position_id = '2'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A2 ใน 5 วันหลังสุด

                    $queryA2 = mysqli_query($connection, $sqlA2);
                    $rowA2 = mysqli_num_rows($queryA2);

                    while ($rowA2_result = mysqli_fetch_array($queryA2, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA2_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>
                                <?php echo $rowA2_result['ROUND(AVG(dustrec_moistness),2)']; ?>
                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }

                    $sqlA3 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$searchword_stdate' and 
                            dustrec_date <= '$searchword_endate' and
                            dustrec_position_id = '3'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A3 ใน 5 วันหลังสุด

                    $queryA3 = mysqli_query($connection, $sqlA3);
                    $rowA3 = mysqli_num_rows($queryA3);

                    while ($rowA3_result = mysqli_fetch_array($queryA3, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA3_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td><?php echo $rowA3_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }

                    $sqlA4 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$searchword_stdate' and 
                            dustrec_date <= '$searchword_endate' and
                            dustrec_position_id = '4'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A4 ใน 5 วันหลังสุด

                    $queryA4 = mysqli_query($connection, $sqlA4);
                    $rowA4 = mysqli_num_rows($queryA4);

                    while ($rowA4_result = mysqli_fetch_array($queryA4, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA4_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA4_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA5 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$searchword_stdate' and 
                            dustrec_date <= '$searchword_endate' and
                            dustrec_position_id = '5'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A5 ใน 5 วันหลังสุด

                    $queryA5 = mysqli_query($connection, $sqlA5);
                    $rowA5 = mysqli_num_rows($queryA5);

                    while ($rowA5_result = mysqli_fetch_array($queryA5, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA5_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA5_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA6 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$searchword_stdate' and 
                            dustrec_date <= '$searchword_endate' and
                            dustrec_position_id = '6'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A6 ใน 5 วันหลังสุด

                    $queryA6 = mysqli_query($connection, $sqlA6);
                    $rowA6 = mysqli_num_rows($queryA6);

                    while ($rowA6_result = mysqli_fetch_array($queryA6, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA6_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA6_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }

                    $sqlA7 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$searchword_stdate' and 
                            dustrec_date <= '$searchword_endate' and
                            dustrec_position_id = '7'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A7 ใน 5 วันหลังสุด

                    $queryA7 = mysqli_query($connection, $sqlA7);
                    $rowA7 = mysqli_num_rows($queryA7);

                    while ($rowA7_result = mysqli_fetch_array($queryA7, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA7_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA7_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA8 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$searchword_stdate' and 
                            dustrec_date <= '$searchword_endate' and
                            dustrec_position_id = '8'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A8 ใน 5 วันหลังสุด

                    $queryA8 = mysqli_query($connection, $sqlA8);
                    $rowA8 = mysqli_num_rows($queryA8);

                    while ($rowA8_result = mysqli_fetch_array($queryA8, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA8_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA8_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>

                    <?php

                    }

                    $sqlA9 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$searchword_stdate' and 
                            dustrec_date <= '$searchword_endate' and
                            dustrec_position_id = '9'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A9 ใน 5 วันหลังสุด

                    $queryA9 = mysqli_query($connection, $sqlA9);
                    $rowA9 = mysqli_num_rows($queryA9);

                    while ($rowA9_result = mysqli_fetch_array($queryA9, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA9_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA9_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }

                    $sqlA10 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$searchword_stdate' and 
                            dustrec_date <= '$searchword_endate' and
                            dustrec_position_id = '10'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A10 ใน 5 วันหลังสุด

                    $queryA10 = mysqli_query($connection, $sqlA10);
                    $rowA10 = mysqli_num_rows($queryA10);

                    while ($rowA10_result = mysqli_fetch_array($queryA10, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA10_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA10_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA11 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$searchword_stdate' and 
                            dustrec_date <= '$searchword_endate' and
                            dustrec_position_id = '11'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A11 ใน 5 วันหลังสุด

                    $queryA11 = mysqli_query($connection, $sqlA11);
                    $rowA11 = mysqli_num_rows($queryA11);

                    while ($rowA11_result = mysqli_fetch_array($queryA11, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA11_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA11_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA12 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$searchword_stdate' and 
                            dustrec_date <= '$searchword_endate' and
                            dustrec_position_id = '12'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A12 ใน 5 วันหลังสุด

                    $queryA12 = mysqli_query($connection, $sqlA12);
                    $rowA12 = mysqli_num_rows($queryA12);

                    while ($rowA12_result = mysqli_fetch_array($queryA12, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA12_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA12_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA13 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$searchword_stdate' and 
                            dustrec_date <= '$searchword_endate' and
                            dustrec_position_id = '13'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A13 ใน 5 วันหลังสุด

                    $queryA13 = mysqli_query($connection, $sqlA13);
                    $rowA13 = mysqli_num_rows($queryA13);

                    while ($rowA13_result = mysqli_fetch_array($queryA13, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA13_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA13_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA14 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$searchword_stdate' and 
                            dustrec_date <= '$searchword_endate' and
                            dustrec_position_id = '14'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A14 ใน 5 วันหลังสุด

                    $queryA14 = mysqli_query($connection, $sqlA14);
                    $rowA14 = mysqli_num_rows($queryA14);

                    while ($rowA14_result = mysqli_fetch_array($queryA14, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA14_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA14_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA15 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$searchword_stdate' and 
                            dustrec_date <= '$searchword_endate' and
                            dustrec_position_id = '15'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A15 ใน 5 วันหลังสุด

                    $queryA15 = mysqli_query($connection, $sqlA15);
                    $rowA15 = mysqli_num_rows($queryA15);

                    while ($rowA15_result = mysqli_fetch_array($queryA15, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA15_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA15_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA16 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$searchword_stdate' and 
                            dustrec_date <= '$searchword_endate' and
                            dustrec_position_id = '16'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A16 ใน 5 วันหลังสุด

                    $queryA16 = mysqli_query($connection, $sqlA16);
                    $rowA16 = mysqli_num_rows($queryA16);

                    while ($rowA16_result = mysqli_fetch_array($queryA16, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA16_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA16_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA17 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$searchword_stdate' and 
                            dustrec_date <= '$searchword_endate' and
                            dustrec_position_id = '17'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A17 ใน 5 วันหลังสุด

                    $queryA17 = mysqli_query($connection, $sqlA17);
                    $rowA17 = mysqli_num_rows($queryA17);

                    while ($rowA17_result = mysqli_fetch_array($queryA17, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA17_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA17_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA18 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$searchword_stdate' and 
                            dustrec_date <= '$searchword_endate' and
                            dustrec_position_id = '18'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A18 ใน 5 วันหลังสุด

                    $queryA18 = mysqli_query($connection, $sqlA18);
                    $rowA18 = mysqli_num_rows($queryA18);

                    while ($rowA18_result = mysqli_fetch_array($queryA18, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA18_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA18_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA19 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$searchword_stdate' and 
                            dustrec_date <= '$searchword_endate' and
                            dustrec_position_id = '19'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A19 ใน 5 วันหลังสุด

                    $queryA19 = mysqli_query($connection, $sqlA19);
                    $rowA19 = mysqli_num_rows($queryA19);

                    while ($rowA19_result = mysqli_fetch_array($queryA19, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA19_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA19_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA20 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$searchword_stdate' and 
                            dustrec_date <= '$searchword_endate' and
                            dustrec_position_id = '20'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A20 ใน 5 วันหลังสุด

                    $queryA20 = mysqli_query($connection, $sqlA20);
                    $rowA20 = mysqli_num_rows($queryA20);

                    while ($rowA20_result = mysqli_fetch_array($queryA20, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA20_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA20_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>

                        </tr>

                    <?php

                    }
                    $sqlA21 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$searchword_stdate' and 
                            dustrec_date <= '$searchword_endate' and
                            dustrec_position_id = '21'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A21 ใน 5 วันหลังสุด

                    $queryA21 = mysqli_query($connection, $sqlA21);
                    $rowA21 = mysqli_num_rows($queryA21);

                    while ($rowA21_result = mysqli_fetch_array($queryA21, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA21_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA21_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA22 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$searchword_stdate' and 
                            dustrec_date <= '$searchword_endate' and
                            dustrec_position_id = '22'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A22 ใน 5 วันหลังสุด

                    $queryA22 = mysqli_query($connection, $sqlA22);
                    $rowA22 = mysqli_num_rows($queryA22);

                    while ($rowA22_result = mysqli_fetch_array($queryA22, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA22_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA22_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA23 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$searchword_stdate' and 
                            dustrec_date <= '$searchword_endate' and
                            dustrec_position_id = '23'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A23 ใน 5 วันหลังสุด

                    $queryA23 = mysqli_query($connection, $sqlA23);
                    $rowA23 = mysqli_num_rows($queryA23);

                    while ($rowA23_result = mysqli_fetch_array($queryA23, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA23_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA23_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA24 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$searchword_stdate' and 
                            dustrec_date <= '$searchword_endate' and
                            dustrec_position_id = '24'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A24 ใน 5 วันหลังสุด

                    $queryA24 = mysqli_query($connection, $sqlA24);
                    $rowA24 = mysqli_num_rows($queryA24);

                    while ($rowA24_result = mysqli_fetch_array($queryA24, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA24_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA24_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA25 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$searchword_stdate' and 
                            dustrec_date <= '$searchword_endate' and
                            dustrec_position_id = '25'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A25 ใน 5 วันหลังสุด

                    $queryA25 = mysqli_query($connection, $sqlA25);
                    $rowA25 = mysqli_num_rows($queryA25);

                    while ($rowA25_result = mysqli_fetch_array($queryA25, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA25_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA25_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA26 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$searchword_stdate' and 
                            dustrec_date <= '$searchword_endate' and
                            dustrec_position_id = '26'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A26 ใน 5 วันหลังสุด

                    $queryA26 = mysqli_query($connection, $sqlA26);
                    $rowA26 = mysqli_num_rows($queryA26);

                    while ($rowA26_result = mysqli_fetch_array($queryA26, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA26_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA26_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA27 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$searchword_stdate' and 
                            dustrec_date <= '$searchword_endate' and
                            dustrec_position_id = '27'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A27 ใน 5 วันหลังสุด

                    $queryA27 = mysqli_query($connection, $sqlA27);
                    $rowA27 = mysqli_num_rows($queryA27);

                    while ($rowA27_result = mysqli_fetch_array($queryA27, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA27_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA27_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA28 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$searchword_stdate' and 
                            dustrec_date <= '$searchword_endate' and
                            dustrec_position_id = '28'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A28 ใน 5 วันหลังสุด

                    $queryA28 = mysqli_query($connection, $sqlA28);
                    $rowA28 = mysqli_num_rows($queryA28);

                    while ($rowA28_result = mysqli_fetch_array($queryA28, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA28_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA28_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA29 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$searchword_stdate' and 
                            dustrec_date <= '$searchword_endate' and
                            dustrec_position_id = '29'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A29 ใน 5 วันหลังสุด

                    $queryA29 = mysqli_query($connection, $sqlA29);
                    $rowA29 = mysqli_num_rows($queryA29);

                    while ($rowA29_result = mysqli_fetch_array($queryA29, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA29_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA29_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA30 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$searchword_stdate' and 
                            dustrec_date <= '$searchword_endate' and
                            dustrec_position_id = '30'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A30 ใน 5 วันหลังสุด

                    $queryA30 = mysqli_query($connection, $sqlA30);
                    $rowA30 = mysqli_num_rows($queryA30);

                    while ($rowA30_result = mysqli_fetch_array($queryA30, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA30_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA30_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
                            <td></td>
                        </tr>

                    <?php

                    }
                    $sqlA31 = "
                        SELECT 
                            dustrec_date,
                            dustrec_time,
                            ROUND(AVG(dustrec_moistness),2) 
                    
                        FROM 
                            dustrec
                    
                        WHERE 
                            dustrec_date >= '$searchword_stdate' and 
                            dustrec_date <= '$searchword_endate' and
                            dustrec_position_id = '31'                
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง A31 ใน 5 วันหลังสุด

                    $queryA31 = mysqli_query($connection, $sqlA31);
                    $rowA31 = mysqli_num_rows($queryA31);

                    while ($rowA31_result = mysqli_fetch_array($queryA31, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $rowA31_result['dustrec_date']; ?>
                            </th>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><?php echo $rowA31_result['ROUND(AVG(dustrec_moistness),2)']; ?></td>
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
            $('#container3').highcharts({
                data: {
                    table: 'datatable'
                },
                chart: {
                    type: 'area'
                },
                title: {
                    text: 'แผนภูมิแสดงความชื้น'
                },
                subtitle: {
                    text: 'ทุกตำแหน่ง ระหว่างวันที่ <?php echo date("d/m/Y", strtotime($searchword_stdate)); ?> ถึง <?php echo date("d/m/Y", strtotime($searchword_endate)); ?> ',
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
                        text: 'ความชื้น (%)'
                    }
                },
                tooltip: {
                    /*formatter: function () {
					       return '<b>' + this.series.name + '</b><br/>' +
						      this.point.y + ' ' + this.point.name.toLowerCase();
				        }*/
                    valueSuffix: ' %'
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
    if ($searchword_posid == '1') {
        $posname = 'บริการยืม-คืน';
    } else if ($searchword_posid == '2') {
        $posname = 'บริการตอบคำถามฯ';
    } else if ($searchword_posid == '3') {
        $posname = 'โถงอ่านหนังสือชั้น 1';
    } else if ($searchword_posid == '4') {
        $posname = 'หน้าอาคารสำนักวิทยบริการ';
    } else if ($searchword_posid == '5') {
        $posname = 'ชั้นวารสารล่วงเวลา';
    } else if ($searchword_posid == '6') {
        $posname = 'สำนักงานเลขานุการ';
    } else if ($searchword_posid == '7') {
        $posname = 'ชั้นหนังสือภาษาไทย';
    } else if ($searchword_posid == '8') {
        $posname = 'ชั้นหนังสือภาษาอังกฤษ';
    } else if ($searchword_posid == '9') {
        $posname = 'โถงอ่านหนังสือชั้น 2';
    } else if ($searchword_posid == '10') {
        $posname = 'ทางเดินหน้าห้องจดหมายเหตุฯ';
    } else if ($searchword_posid == '11') {
        $posname = 'ทางเดินไปอาคาร 17';
    } else if ($searchword_posid == '12') {
        $posname = 'ทางเดินโซนห้องประชุม';
    } else if ($searchword_posid == '13') {
        $posname = 'IT-Zone';
    } else if ($searchword_posid == '14') {
        $posname = 'ห้องวิทยานิพนธ์';
    } else if ($searchword_posid == '15') {
        $posname = 'บริการโสตฯ';
    } else if ($searchword_posid == '16') {
        $posname = 'American Corner Pattani';
    } else if ($searchword_posid == '17') {
        $posname = 'ทางเข้าห้องมินิเธียเตอร์';
    } else if ($searchword_posid == '18') {
        $posname = 'ทางเข้าห้องบริการคอมพิวเตอร์ 1';
    } else if ($searchword_posid == '19') {
        $posname = 'งานวิเคราะห์ทรัพยากรฯ';
    } else if ($searchword_posid == '20') {
        $posname = 'โรงพิมพ์ฝ่ายเทคโนโลยีและนวัตกรรมฯ';
    } else if ($searchword_posid == '21') {
        $posname = 'งานห้องสมุดดิจิทัล';
    } else if ($searchword_posid == '22') {
        $posname = 'งานซ่อมฯ';
    } else if ($searchword_posid == '23') {
        $posname = 'ห้องกราฟิกและสื่อสิ่งพิมพ์ดิจิทัล';
    } else if ($searchword_posid == '24') {
        $posname = 'ชั้นหนังสือภาษาเกาหลี';
    } else if ($searchword_posid == '25') {
        $posname = 'ชั้นหนังสือภาษาอังกฤษ';
    } else if ($searchword_posid == '26') {
        $posname = 'ชั้นหนังสือภาษาไทย';
    } else if ($searchword_posid == '27') {
        $posname = 'ชั้นหนังสือภาษาอิสลาม';
    } else if ($searchword_posid == '28') {
        $posname = 'ชั้นหนังสือนวนิยาย';
    } else if ($searchword_posid == '29') {
        $posname = 'ที่นั่งอ่านหนังสือด้านตะวันตก';
    } else if ($searchword_posid == '30') {
        $posname = 'ที่นั่งอ่านหนังสือด้านตะวันออก';
    } else if ($searchword_posid == '31') {
        $posname = 'ที่นั่งอ่านหนังสือด้านทิศใต้';
    }
?>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-hover table-responsive" id="datatable">
                <thead>
                    <tr>
                        <th>วันที่</th>
                        <th><?php echo $posname; ?></th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $sql = " 
                    SELECT 
                        dustrec_date,
                        dustrec_time,
                        ROUND(AVG(dustrec_moistness),2) 
                    
                    FROM 
                        dustrec
                    
                    WHERE 
                        dustrec_date >= '$searchword_stdate' and 
                        dustrec_date <= '$searchword_endate' and
                        dustrec_position_id like '%$searchword_posid%'                  
                    
                    GROUP BY dustrec_date ORDER BY 
                        dustrec_date asc"; //เลือกดูผลลัพธ์ในตำแหน่ง $searchword_posid วันที่ $searchword_stdate - $searchword_endate

                    $query = mysqli_query($connection, $sql);
                    $row = mysqli_num_rows($query);

                    while ($row_result = mysqli_fetch_array($query, MYSQLI_ASSOC)) {

                    ?>

                        <tr>
                            <th>
                                <?php echo $row_result['dustrec_date']; ?>
                            </th>
                            <td>
                                <?php echo $row_result['ROUND(AVG(dustrec_moistness),2)']; ?>
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
            $('#container3').highcharts({
                data: {
                    table: 'datatable'
                },
                chart: {
                    type: 'area'
                },
                title: {
                    text: 'แผนภูมิแสดงความชื้น'
                },
                subtitle: {
                    text: 'ตำแหน่ง <?php echo $posname; ?> ระหว่างวันที่ <?php echo date("d/m/Y", strtotime($searchword_stdate)); ?> ถึง <?php echo date("d/m/Y", strtotime($searchword_endate)); ?> ',
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
                        text: 'ความชื้น (%)'
                    }
                },
                tooltip: {
                    /*formatter: function () {
					       return '<b>' + this.series.name + '</b><br/>' +
						      this.point.y + ' ' + this.point.name.toLowerCase();
				        }*/
                    valueSuffix: ' %'
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
<!-- /////////////////// ความชื้น /////////////////// -->