<!-- Header -->
<?php
//error_reporting(0); // ปิด error report
//include "include/header.php";
?>
<!-- Header -->     

<?php
	  //เรียงข้อมูล
	  $sort = $_GET[sort];
	  if(!$sort){
		  $sort = 'dustrec_timestamp';
	  }
	  //เรียงข้อมูล
      
      ///แบ่งหน้า///
			$sqlrownum = "select * from dustrec";//คำนวณหาจำนวนเรคคอร์ดทั้งหมดเพื่อใช้คิดจำนวนหน้า
			$queryrownum = mysqli_query($connection, $sqlrownum);
			$rownum = mysqli_num_rows($queryrownum);
			//echo $rownum;
			//exit();

			$Per_Page = 5;// จำนวนที่แสดงต่อ 1 หน้า
			$Page = $_GET["Page"];
			if(!$_GET["Page"])
				{
					$Page = 1;
				}
			$Prev_Page = $Page - 1;
			$Next_Page = $Page + 1;
			$Page_Start = (($Per_Page * $Page) - $Per_Page);
			if($rownum <= $Per_Page)
				{
					$Num_Pages = 1;
				}
			else if(($rownum % $Per_Page) == 0)
				{
					$Num_Pages = ($rownum / $Per_Page);
				}
			else
				{
					$Num_Pages = ($rownum / $Per_Page) + 1;
					$Num_Pages = (int)$Num_Pages;
				}
		///แบ่งหน้า///
  ?>
       
       <!-- dataTable library-->    
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.css">
            <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">

            <!--<script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>-->

            <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.js"></script>

            <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
            <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
            <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
            <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
            <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
            <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
            <!-- dataTable library-->
            
        <div class="row">
            <div class="col-md-4"><h4>ข้อมูลสภาพอากาศล่าสุด</h4></div>
            <!--<div class="col-md-8">
				<div class="text-right"><br><small><span class="glyphicon glyphicon-sort-by-attributes"></span> เรียงตาม: <a href="?sort=dustrec_date">วันที่</a> | <a href="?sort=dustrec_position_id">ตำแหน่ง</a> | <a href="?sort=dustrec_amount_dust">ฝุ่น</a> | <a href="?sort=dustrec_temp">อุณหภูมิ</a> | <a href="?sort=dustrec_moistness">ความชื้น</a> | <a href="?sort=dustrec_amount_co2">ก๊าชคาร์บอนไดออกไซค์</a></small></div>
            </div>-->
        </div>
        <hr>
        <div class="row">
            <div class="col-md-12 table-responsive">
               
               <script type="text/javascript">
                    //var $d = jQuery.noConflict();

                        //$d(document).ready(function(){
                        $(document).ready(function(){
                            $('#dustdatatable').DataTable({
                                dom: 'Bfrtip',
                                buttons: [
                                    'copy', 'excel', 'print'
                                ],
                                order: [ 0, "desc" ],//เรียงข้อมูลตาม
                                pageLength: 5
                                //recordsTotal: 50
                            });
                        });
                </script>
                
                <table class="table table-striped table-hover table-responsive" id="dustdatatable">
                  <thead>
                    <tr>
                        <th><center>วันที่</center></th>
                        <th><center>เวลา</center></th>
                        <th><center>ตำแหน่ง</center></th>
                        <th><center>ฝุ่น</center></th>
                        <th><center>อุณหภูมิ</center></th>
                        <th><center>ความชื้น</center></th>
                        <th><center>ก๊าชคาร์บอนไดออกไซค์</center></th>
                    </tr>
                  </thead>
                  <tbody>
                 <?php
                    //if((!$browsecourse) && (!$tagsearch)){//กรณีไม่มีการป้อนคำค้น
                    if($sort == 'dustrec_id' || $sort == 'dustrec_date'){
                        $sql = "SELECT * from dustrec as a, position as b where a.dustrec_position_id = b.position_id order by $sort desc LIMIT 5";//กำหนดจำนวนการแสดงผลต่อ 1 หน้า
                    }else{
                        $sql = "SELECT * from dustrec as a, position as b where a.dustrec_position_id = b.position_id order by $sort desc LIMIT 5";//กำหนดจำนวนการแสดงผลต่อ 1 หน้า
                    }
                    
			        $query = mysqli_query($connection, $sql);
			        $row = mysqli_num_rows($query);

			        while($row_result = mysqli_fetch_array($query, MYSQLI_ASSOC)){ 
                        
                    if(($row_result['dustrec_amount_dust'] >= '37.5') || ($row_result['dustrec_amount_co2'] >= '1000')){//37.5,1000
                      if($row_result['dustrec_amount_dust'] >= '37.5' && $row_result['dustrec_amount_co2'] >= '1000'){//37.5,1000
                      ?>
                        <!-- 1 block data -->
			            <tr style="color:#E74C3C;font-weight:bold"><!-- สีแดง PM และ CO2 สูงกว่าค่ามาตรฐาน มีผลกระทบต่อสุขภาพ โปรดตรวจสอบ (PM>=37.5 µg/m³, CO2>=1000 PPM.) -->
                      <?php
                          // แจ้งเตือนทางไลน์ให้ จนท.
                          /*
                          $messageline .= "\n\nขณะนี้ระบบตรวจวัดปริมาณฝุ่นละอองสำนักวิทยบริการพบค่าความผิดปกติระดับสีแดง (PM และ CO2 สูงกว่าค่ามาตรฐาน >=37.5 µg/m³, >=1000 PPM.) ณ ตำแหน่ง ".$row_result['position_name']." วันที่ ".date('d/m/Y', strtotime($row_result['dustrec_date']))." เวลา ".$row_result['dustrec_time']." น. (PM=".$row_result['dustrec_amount_dust']." µg/m³, CO2=".$row_result['dustrec_amount_co2']." PPM.)\n\nตรวจสอบรายละเอียดได้ที่ https://ddr.oas.psu.ac.th";
                          
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
                            $token = "h7GbD4ac0qMXgx6YYqCR4Zt6niD1If0fPJzjOea1Z2t"; //ใส่ Token ของ group line ที่จะแจ้ง
                            $str = $massage1; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
                            $res = notify_message($str,$token);
                            //print_r($res);
                            */
                             // แจ้งเตือนทางไลน์ให้ จนท.
                          
                      }
                      if($row_result['dustrec_amount_dust'] >= '37.5' && $row_result['dustrec_amount_co2'] < '1000'){//37.5,1000
                      ?>
                        <!-- 1 block data -->
			            <tr style="color:#EF8B80"><!-- สีชมพู PM สูงกว่าค่ามาตรฐาน มีผลกระทบต่อสุขภาพ โปรดตรวจสอบ (PM>=37.5 µg/m³) -->
                      <?php
                          // แจ้งเตือนทางไลน์ให้ จนท.
                          /*
                          $messageline .= "\n\nขณะนี้ระบบตรวจวัดปริมาณฝุ่นละอองสำนักวิทยบริการพบค่าความผิดปกติระดับสีชมพู (PM สูงกว่าค่ามาตรฐาน >=37.5 µg/m³) ณ ตำแหน่ง ".$row_result['position_name']." วันที่ ".date('d/m/Y', strtotime($row_result['dustrec_date']))." เวลา ".$row_result['dustrec_time']." น. (PM=".$row_result['dustrec_amount_dust']." µg/m³, CO2=".$row_result['dustrec_amount_co2']." PPM.)\n\nตรวจสอบรายละเอียดได้ที่ https://ddr.oas.psu.ac.th";
                          
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
                            $token = "h7GbD4ac0qMXgx6YYqCR4Zt6niD1If0fPJzjOea1Z2t"; //ใส่ Token ของ group line ที่จะแจ้ง
                            $str = $massage1; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
                            $res = notify_message($str,$token);
                            //print_r($res);
                            */
                             // แจ้งเตือนทางไลน์ให้ จนท.
                      }
                      if($row_result['dustrec_amount_dust'] < '37.5' && $row_result['dustrec_amount_co2'] >= '1000'){ //37.5,1000
                       ?>
                        <!-- 1 block data -->
			            <tr style="color:#F7BF65"><!-- สีส้ม CO2 สูงกว่าค่ามาตรฐาน มีผลกระทบต่อสุขภาพ โปรดตรวจสอบ (CO2>=1000 PPM.) -->
                   <?php 
                          // แจ้งเตือนทางไลน์ให้ จนท.
                          /*
                          $messageline .= "\n\nขณะนี้ระบบตรวจวัดปริมาณฝุ่นละอองสำนักวิทยบริการพบค่าความผิดปกติระดับสีส้ม (CO2 สูงกว่าค่ามาตรฐาน >=1000 PPM.) ณ ตำแหน่ง ".$row_result['position_name']." วันที่ ".date('d/m/Y', strtotime($row_result['dustrec_date']))." เวลา ".$row_result['dustrec_time']." น. (PM=".$row_result['dustrec_amount_dust']." µg/m³, CO2=".$row_result['dustrec_amount_co2']." PPM.)\n\nตรวจสอบรายละเอียดได้ที่ https://ddr.oas.psu.ac.th";
                          
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
                            $token = "h7GbD4ac0qMXgx6YYqCR4Zt6niD1If0fPJzjOea1Z2t"; //ใส่ Token ของ group line ที่จะแจ้ง
                            $str = $massage1; //ข้อความที่ต้องการส่ง สูงสุด 1000 ตัวอักษร
                            $res = notify_message($str,$token);
                            //print_r($res);
                            */
                             // แจ้งเตือนทางไลน์ให้ จนท.
                      }
                    }else{
                    ?>
                        <!-- 1 block data -->
			             <tr>
                    <?php
                     }
                        ?>
                        <td width="">
                            <center><a href="/reportbydate.php?posname=<?=$row_result['position_name']?>&date=<?=$row_result['dustrec_date']?>" target="_blank"><?php echo date('d/m/Y', strtotime($row_result['dustrec_date'])) ?></a></center>
                        </td>
                        <td width="">
                            <center><?php echo $row_result['dustrec_time'] ?> น.</center>
                        </td>
                        <td width="">
                            <center><?php echo $row_result['position_name'] ?></center>
                        </td>
                        <td width="">
                            <center><?php echo $row_result['dustrec_amount_dust'] ?> µg/m³</center>
                        </td>
                        <td width="">
                            <center><?php echo $row_result['dustrec_temp'] ?> °C</center>
                        </td>
                        <td width="">
                            <center><?php echo $row_result['dustrec_moistness'] ?> %</center>
                        </td>
                        <td width="">
                            <center><?php echo $row_result['dustrec_amount_co2'] ?> PPM.</center>
                        </td>
                    </tr>
			        <!-- 1 block data -->

			        <?php 
                    
                    }
		            
                    ?>
                    
                    </tbody>
                </table> 
		    </div>
	    </div>
	    
	    <!-- ///แบ่งหน้า/// -->
		<!--<div class="row">
			<div class="col-md-12">
				<?php// echo $Num_Pages;?>
				<?php
				if($Prev_Page){
					echo " <ul class='pagination'><li><a href='$_SERVER[SCRIPT_NAME]?Page=$Prev_Page'><< ก่อนหน้า</a></li></ul> ";
				}

				for($i=1; $i<=$Num_Pages; $i++){
					if($i != $Page){
						echo "<ul class='pagination'><li><a href='$_SERVER[SCRIPT_NAME]?Page=$i'>$i</a></li></ul> ";
					}else{
						echo "<ul class='pagination'><li class='active'><a href='#'>$i</a></li></ul> ";
					}
				}

				if($Page!=$Num_Pages){
					echo " <ul class='pagination'><li><a href ='$_SERVER[SCRIPT_NAME]?Page=$Next_Page'>ถัดไป >></a></li></ul>  ";
				}
				?>
			</div>
		</div>-->
		<!-- ///แบ่งหน้า/// -->
		<div class="row">
            <!--<div class="col-md-12">
                <h6><span class="btn btn-xs btn-danger">สีแดง</span> หมายถึง มีปริมาณฝุ่นละอองและก๊าชคาร์บอนไดออกไซค์สูงกว่าเกณฑ์ (>=300 Microns, >=1000 PPM.)<br><span class="btn btn-xs btn-danger disabled">สีชมพู</span> หมายถึง มีปริมาณฝุ่นละอองสูงกว่าเกณฑ์ (>=300 Microns)<br><span class="btn btn-xs btn-warning disabled">สีส้ม</span> หมายถึง มีปริมาณก๊าชคาร์บอนไดออกไซค์สูงกว่าเกณฑ์ (>=1000 PPM.)</h6>
            </div>-->
            <div class="col-md-8" style="font-size: 10px !important;">
                <span class="btn btn-xs btn-danger">สีแดง</span> PM>=37.5 µg/m³, CO2>=1000 PPM. <span class="btn btn-xs btn-danger disabled">สีชมพู</span> PM>=37.5 µg/m³ <span class="btn btn-xs btn-warning disabled">สีส้ม</span> CO2>=1000 PPM.
            </div>
            <div class="col-md-4 text-right" style="font-size: 12px !important;">
                <a data-toggle="modal" data-target="#LoginModal">ข้อมูลทั้งหมด >></a>
            </div>
        </div>
	
<?php 
//}
?> 
