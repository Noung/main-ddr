<!-- Header -->
<?php
session_start();
error_reporting(0); // ปิด error report
$_SESSION["LOGIN"];
if($_SESSION["LOGIN"]!=1){
?>

	<script>
		location='http://ddr.oas.psu.ac.th'
	</script>
	
<?php
}else{
include "include/dbconf.php";
include "include/header.php";
$PageTitle = "ข้อมูลปริมาณฝุ่นละออง";
    
$dustrec_id = $_GET["dustrec_id"]; // รับค่า dustrec_id เพื่อใช้แก้ไข
        if($dustrec_id){
            $sqlEdit = "SELECT * FROM dustrec as a, position as b WHERE a.dustrec_id = '$dustrec_id' and a.dustrec_position_id = b.position_id";
            $queryEdit = mysqli_query($connection, $sqlEdit);

            if ($queryEdit == TRUE) {
            $rowEdit_result = mysqli_fetch_array($queryEdit, MYSQLI_ASSOC); 
        ?>
        <head>
            <link href="http://ddr.oas.psu.ac.th/dashboard/assets/css/bootstrap.css" rel="stylesheet">
            <link href="http://ddr.oas.psu.ac.th/dashboard/assets/assets/css/style.css" rel="stylesheet">
    
            <script src="http://ddr.oas.psu.ac.th/dashboard/assets/js/jquery.min.js"></script>
            <script src="http://ddr.oas.psu.ac.th/dashboard/assets/js/bootstrap.min.js"></script>
            <script src="http://ddr.oas.psu.ac.th/dashboard/assets/js/scripts.js"></script>
            
            <!-- Date Picker -->
            <link href="assets/css/bootstrap-datetimepicker.css" rel="stylesheet"> 
            <script src="assets/js/moment-with-locales.js"></script>
            <script src="assets/js/bootstrap-datetimepicker.js"></script>    
            <script type="text/javascript">
                $(function () {
                    $('#datetimepickerLocal').datetimepicker({
                        locale: 'th'
                    });
                });
            </script>
             <!-- Date Picker -->
        </head>
        <script type="text/javascript">
            $(window).load(function(){
            $('#DustRecEdit').modal({backdrop: 'static', keyboard: false}); //ปิดการคลิกเพื่อปิดกล่อง modal
            $('#DustRecEdit').modal('show');
            });
        </script>
        <!-- DustRecEdit -->
        <div id="DustRecEdit" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
              <div class="modal-header">
                <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
                <h3 class="modal-title"><span class='glyphicon glyphicon-pencil'></span> แก้ไขปริมาณฝุ่นละออง</h3>
              </div>
              <div class="modal-body">
                <form role="DustRecForm" method="POST" action="include/dustrec_edit.php">
                  <div class="row">
				    <div class="col-md-12">
				        <div class="form-group">
                           <label class='control-label' for='dustrec_id'>ลำดับ</label>
                           <input disabled type="number" class='form-control' name='dustrec_id' value='<?php echo $rowEdit_result["dustrec_id"] ?>' />
                           
                           <input type='hidden' name='dustrec_id_hidden' value='<?php echo $rowEdit_result["dustrec_id"] ?>'/>
                           
                            <label class='control-label' for='dustrec_position_id'>ตำแหน่ง</label>
				            <select disabled class='form-control' id='dustrec_position_id' name='dustrec_position_id' required=''>
				                <option value='<?php echo $rowEdit_result["dustrec_position_id"] ?>' selected><?php echo $rowEdit_result["position_name"] ?></option>
				                <option value='1'>A1</option>
				                <option value='2'>A2</option>
				                <!--<option value='3'>A3</option>
				                <option value='4'>A4</option>
				                <option value='5'>A5</option>-->
				            </select>
                                
				            <label class='control-label' for='dustrec_datetime'>วันและเวลา</label>
                            <div class='input-group date' id='datetimepickerLocal'>
                                <input disabled type='text' class='form-control' name='dustrec_datetime' value='<?php echo $rowEdit_result["dustrec_date"]." ".$rowEdit_result["dustrec_time"] ?>' required=''/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                       
				            <label class='control-label' for='dustrec_amount_dust'>ปริมาณฝุ่น (µg/m³)</label>
                            <input type="number" step="0.001" class='form-control' name='dustrec_amount_dust' value='<?php echo $rowEdit_result["dustrec_amount_dust"] ?>' required=''/>
                        
                            <label class='control-label' for='dustrec_temp'>อุณหภูมิ (°C)</label>
                            <input type="number" step="0.001" class='form-control' name='dustrec_temp' value='<?php echo $rowEdit_result["dustrec_temp"] ?>' required=''/>
                    
                            <label class='control-label' for='dustrec_moistness'>ความชื้น (%)</label>
                            <input type="number" step="0.001" class='form-control' name='dustrec_moistness' value='<?php echo $rowEdit_result["dustrec_moistness"] ?>' required=''/>
                        
                            <label class='control-label' for='dustrec_amount_co2'>ปริมาณก๊าชคาร์บอนไดออกไซค์ (PPM.)</label>
                            <input type="number" step="0.001" class='form-control' name='dustrec_amount_co2' value='<?php echo $rowEdit_result["dustrec_amount_co2"] ?>' required=''/>
                        
                            <?php
                            $dt = new DateTime($utc);
                            $tz = new DateTimeZone('Asia/Bangkok'); // or whatever zone you're after
                            $dt->setTimezone($tz);
                            $showdate = $dt->format('Y-m-d H:i:s');
                            //echo $showdate;
                            ?>
                       
                            <!--<label class='control-label' for='dustrec_timestamp'>วันที่บันทึกข้อมูล</label>-->
                            <input type="hidden" name="dustrec_timestamp" value="<?php echo $showdate;?>"/>         
                        </div>
                    </div>
                </div>
                    
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success" onclick=""><span class='glyphicon glyphicon-edit'></span> แก้ไข</button>
                <button type="reset" class="btn btn-danger" onclick="window.location.href='/dashboard/dustreclist.php'"><span class='glyphicon glyphicon-remove'></span> ยกเลิก</button>
              </div>
            </form>
            </div>
          </div>
        </div>
    <!-- DustRecEdit -->
        <?php
            } else {
        echo "Error deleting record: " . $conn->error;
            }
    }else if(!$dustrec_id){
    }
    ?>
<!-- Header -->     
  
<!-- เปิดใช้งาน tooltip -->
<script type="text/javascript">
	$(function () {
		$("[rel='tooltip']").tooltip();
    });
</script>
<!-- เปิดใช้งาน tooltip -->

<?php
	  //เรียงข้อมูล
	  $sort = $_GET[sort];
	  if(!$sort){
		  $sort = 'dustrec_id';
	  }
	  //echo $sort;
	  //exit();
	  //เรียงข้อมูล
      
	  //$browsebook = $_POST[browsebook];//รับคำค้นจากโมดูลการค้นหาหนังสือ
      //$tagsearch = $_GET[tagsearch];//รับคำค้นจากการคลิก tag
        $searchword = $_GET[searchword];
        $searchword_posid = $_GET[searchword_posid];
      
      ///แบ่งหน้า///
			$sqlrownum = "select * from dustrec";//คำนวณหาจำนวนเรคคอร์ดทั้งหมดเพื่อใช้คิดจำนวนหน้า
			$queryrownum = mysqli_query($connection, $sqlrownum);
			$rownum = mysqli_num_rows($queryrownum);
			//echo $rownum;
			//exit();

			$Per_Page = 1000;// จำนวนที่แสดงต่อ 1 หน้า
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
  
<!-- adsearchModal -->
    <div id="adsearchModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3 class="modal-title"><span class='glyphicon glyphicon-floppy-save'></span> การค้นหาทรัพยากรขั้นสูง</h3>
          </div>
          <div class="modal-body">
            <form role="formSearch" method="POST" action="#">
              <div class="row">
				<div class="col-md-12">
				    <div class="form-group">
                       <label class='control-label' for='searchword'>คำค้น</label>
				        <input type='text' class='form-control' name='searchword' placeholder='ระบุคำค้น' required=''>
                      
                      	<label class='control-label' for='filter'>ขอบเขต</label>
                        	<select class="form-control" id="filter" name="filter" required=''>
                         		<option value='' selected>ระบุขอบเขต</option>
                           		<option value='book_name'>ชื่อเรื่อง</option>
                           		<option value='book_author'>ผู้แต่ง</option>
                           		<option value='book_year'>ปีที่พิมพ์</option>
                        	</select>
                       
                        <label class='control-label' for='major_id'>ภาควิชา</label>
				            <select class='form-control' id='major_id' name='major_id' required=''>
								<option value='' selected>ระบุภาควิชา</option>
								<option value='1'>ภาควิชา ก</option>
								<option value='2'>ภาควิชา ข</option>
								<option value='3'>ภาควิชา ค</option>
								<option value='4'>ภาควิชา ง</option>
								<option value='5'>ภาควิชา จ</option>
				            </select>
                                
				        <label class='control-label' for='subject_id'>รหัสวิชา</label>
                        <input class='form-control' id='subject_id' name='subject_id' type='text' placeholder='123-456' required=''>
								
				        <label for='edu_year' class='control-label'>ปีการศึกษา</label>
				            <select class='form-control' id='edu_year' name='edu_year' required=''>
								<option value='' selected>ระบุปีการศึกษา</option>
								<option value='2558'>2558</option>
								<option value='2559'>2559</option>
								<option value='2560'>2560</option>
								<option value='2561'>2561</option>
								<option value='2562'>2562</option>
				            </select>
								
				        <label for='edu_term' class='control-label'>ภาคการศึกษา</label><br>
				        <input type='radio' name='edu_term' id='edu_term' value='1' checked='checked'> 1
				        <input type='radio' name='edu_term' id='edu_term' value='2'> 2
				        <input type='radio' name='edu_term' id='edu_term' value='3'> ฤดูร้อน (Summer)
                    </div>
                </div>
            </div>
                    
          </div>
          <div class="modal-footer">
           	<div class="btn-group">
            	<button type="submit" class="btn btn-success"><span class='glyphicon glyphicon-search'></span> ค้นหา</button>
  				</button>
			</div>
            <button type="reset" class="btn btn-danger"><span class='glyphicon glyphicon-remove'></span> ล้างค่า</button>
          </div>
        </form>
        </div>
      </div>
    </div>
<!-- adsearchModal -->
   
   <?php
    if($searchword){
        //echo "$searchword";
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
        <div class="container-fluid"> 
        <div class="row">
            <div class="col-md-5">
                <h3><span class="text-info"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;ข้อมูลปริมาณฝุ่นละออง<br><h4>วันที่ <?=$searchword;?> ตำแหน่ง <?=$_SESSION['posname'];?></h4></span></h3>
            </div>
            <!--<div class="col-md-3">
				<div class="text-right"><br><small><span class="glyphicon glyphicon-sort-by-attributes"></span> เรียงตาม: <a href="?sort=dustrec_id">ลำดับ</a> | <a href="?sort=dustrec_date">วันที่</a> | <a href="?sort=dustrec_position_id">ตำแหน่ง</a> | <a href="?sort=dustrec_amount_dust">ปริมาณฝุ่น</a> | <a href="?sort=dustrec_temp">อุณหภูมิ</a> | <a href="?sort=dustrec_moistness">ความชื้น</a> | <a href="?sort=dustrec_amount_co2">ปริมาณก๊าชคาร์บอนไดออกไซค์</a> | <a href="?sort=dustrec_timestamp">วันที่บันทึก</a></small></div>
            </div>-->
            <div class="col-md-7" style="text-align:right;">
            	<form class="navbar-form navbar-right" role="search" style="">
                    
				    <div class="input-group-btn"><!-- input-append -->
                        <select class='form-control' id='searchword_posid' style="width:200px;" name='searchword_posid' required=''>
				                <option value='' disabled selected>ระบุตำแหน่ง</option>
				                <option disabled>*อาคาร 22 ชั้น 1</option>
				                <option value='1'>บริการยืม-คืน</option>
				                <option value='2'>บริการตอบคำถามฯ</option>
				                <option value='3'>โถงอ่านหนังสือชั้น 1</option>
				                <option value='4'>ชั้นวารสารใหม่</option>
				                <option value='5'>ชั้นวารสารล่วงเวลา</option>
				                <option value='6'>สำนักงานเลขานุการ</option>
				                <option disabled>*อาคาร 22 ชั้น 2</option>
				                <option value='7'>ชั้นหนังสือภาษาไทย</option>
				                <option value='8'>ชั้นหนังสือภาษาอังกฤษ</option>
				                <option value='9'>โถงอ่านหนังสือชั้น 2</option>
				                <option value='10'>ทางเดินหน้าห้องจดหมายเหตุฯ</option>
				                <option value='11'>ทางเดินไปอาคาร 17</option>
				                <option value='12'>ทางเดินโซนห้องประชุม</option>
				                <option disabled>*อาคาร 22 ชั้น 3</option>
				                <option value='13'>IT-Zone</option>
				                <option value='14'>ห้องวิทยานิพนธ์</option>
				                <option value='15'>บริการโสตฯ</option>
				                <option value='16'>American Corner Pattani</option>
				                <option value='17'>ทางเข้าห้องมินิเธียเตอร์</option>
				                <option value='18'>ทางเข้าห้องบริการคอมพิวเตอร์ 1</option>
				                <option disabled>*อาคาร 17 ชั้น 1</option>
				                <option value='19'>งานวิเคราะห์ทรัพยากรฯ</option>
				                <option value='20'>งานธุรการ</option>
				                <option value='21'>งานห้องสมุดดิจิทัล</option>
				                <option value='22'>งานซ่อมฯ</option>
				                <option value='23'>ชั้นหนังสือ</option>
				                <option disabled>*อาคาร 17 ชั้น 2</option>
				                <option value='24'>ชั้นหนังสือภาษาเกาหลี</option>
				                <option value='25'>ชั้นหนังสือภาษาอังกฤษ</option>
                                <option value='26'>ชั้นหนังสือภาษาไทย</option>
                                <option value='27'>ชั้นหนังสือภาษาอิสลาม</option>
                                <option value='28'>ชั้นหนังสือนวนิยาย</option>
                                <option value='29'>ที่นั่งอ่านหนังสือด้านตะวันตก</option>
                                <option value='30'>ที่นั่งอ่านหนังสือด้านตะวันออก</option>
                                <option value='31'>ที่นั่งอ่านหนังสือด้านทิศใต้</option>
				                <option value='all'>ทุกตำแหน่ง</option>
				            </select>
					    <input type="date" class="form-control" name="searchword" placeholder="ระบุวันที่ ปปปป-ดด-วว" required>
				    	<button type="submit" class="btn btn-default" >
					    	<span class="glyphicon glyphicon-search"></span> 
						</button> 
						<!--<button type="button" class="btn btn-default" data-toggle="modal" data-target="#adsearchModal">
					    	ขั้นสูง
						</button>-->
					</div>
				</form>	
            </div>
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
                                pageLength: 1000
                                //recordsTotal: 50
                            });
                        });
                </script>
               
                <table id="dustdatatable" class="table table-striped table-hover table-responsive">
                  <thead>
                    <tr>
                       <th><center>ลำดับ</center></th>
                        <th><center>วันที่</center></th>
                        <th><center>เวลา</center></th>
                        <th><center>ตำแหน่ง</center></th>
                        <th><center>ปริมาณฝุ่น</center></th>
                        <th><center>อุณหภูมิ</center></th>
                        <th><center>ความชื้น</center></th>
                        <th><center>ปริมาณก๊าชคาร์บอนไดออกไซค์</center></th>
                        <th><center>บันทึกข้อมูล</center></th>
                        <th><center>ดำเนินการ</center></th>
                    </tr>
                  </thead>
                  <tbody>
                 <?php
                    //if((!$browsecourse) && (!$tagsearch)){//กรณีไม่มีการป้อนคำค้น
                    if($sort == 'dustrec_id'){
                        $sql = "SELECT * from dustrec as a, position as b where a.dustrec_position_id = b.position_id and a.dustrec_date like '%$searchword%' and a.dustrec_position_id = '$searchword_posid' order by $sort desc LIMIT 10000";//กำหนดจำนวนการแสดงผลต่อ 1 หน้า
                    }else if($sort != 'dustrec_id'){
                        $sql = "SELECT * from dustrec as a, position as b where a.dustrec_position_id = b.position_id and a.dustrec_date like '%$searchword%' and a.dustrec_position_id = '$searchword_posid' order by $sort asc LIMIT 10000";//กำหนดจำนวนการแสดงผลต่อ 1 หน้า
                    }
                    
			        $query = mysqli_query($connection, $sql);
			        $row = mysqli_num_rows($query);

			        while($row_result = mysqli_fetch_array($query, MYSQLI_ASSOC)){ 
                                            
                    if(($row_result['dustrec_amount_dust'] >= '37.5') || ($row_result['dustrec_amount_co2'] >= '1000')){
                      if($row_result['dustrec_amount_dust'] >= '37.5' && $row_result['dustrec_amount_co2'] >= '1000'){
                      ?>
                        <!-- 1 block data -->
			            <tr style="color:#E74C3C;font-weight:bold">
                      <?php
                      }
                      if($row_result['dustrec_amount_dust'] >= '37.5' && $row_result['dustrec_amount_co2'] < '1000'){
                      ?>
                        <!-- 1 block data -->
			            <tr style="color:#EF8B80">
                      <?php
                      }
                      if($row_result['dustrec_amount_dust'] < '37.5' && $row_result['dustrec_amount_co2'] >= '1000'){ 
                       ?>
                        <!-- 1 block data -->
			            <tr style="color:#F7BF65">
                   <?php 
                      }
                    }else{ //ถ้าค่าไม่เข้าข่าย ไม่ต้องใส่สี
                    ?>
                        <!-- 1 block data -->
			             <tr>
                    <?php
                     }
                        
                        $_SESSION['posname'] = $row_result['position_name'];
                        
                        ?>
                        <td width="">
                            <center><?php echo $row_result['dustrec_id'] ?></center>
                        </td>
                        <td width="">
                            <center><a href="/dashboard/reportbydate.php?posname=<?=$row_result['position_name']?>&date=<?=$row_result['dustrec_date']?>" target="_blank"><?php echo date('d/m/Y', strtotime($row_result['dustrec_date'])) ?></a></center>
                        </td>
                        <!--<td width="">
                            <center><?php echo date('d/m/Y', strtotime($row_result['dustrec_date'])) ?></center>
                        </td>-->
                        <td width="">
                            <center><?php echo $row_result['dustrec_time'] ?> น.</center>
                        </td>
                        <td width="">
                            <center><?php echo $_SESSION['posname'] ?></center>
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
                        <td width="">
                            <center><?php echo $row_result['dustrec_timestamp'] ?></center>
                        </td>                       
                        <td width="10%">
                           <center>
                            <div class="col-md-6 text-right">
                                <a href="?dustrec_id=<?php echo $row_result['dustrec_id'] ?>" rel="tooltip" title="แก้ไข" data-placement="top"><h4><span class="text-info"><span class="glyphicon glyphicon-edit"></span></span></h4></a>
                            </div>
                            <div class="col-md-6 text-left">
                                <a href="include/dustrec_del.php?dustrec_id=<?php echo $row_result['dustrec_id'] ?>" rel="tooltip" title="ลบ" data-placement="top" data-toggle='modal'><h4><span class="text-danger"><span class="glyphicon glyphicon-trash"></span></span></h4></a>
                            </div>
                            </center>
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
				/*if($Prev_Page){
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
				}*/
				?>
			</div>
		</div>-->
		<!-- ///แบ่งหน้า/// -->
		<div class="row">
            <div class="col-md-12">
                <h6><span class="btn btn-xs btn-danger">สีแดง</span> หมายถึง มีปริมาณฝุ่นละอองและก๊าชคาร์บอนไดออกไซค์สูงกว่าเกณฑ์ (>=37.5 µg/m³, >=1000 PPM.) <span class="btn btn-xs btn-danger disabled">สีชมพู</span> หมายถึง มีปริมาณฝุ่นละอองสูงกว่าเกณฑ์ (>=37.5 µg/m³) <span class="btn btn-xs btn-warning disabled">สีส้ม</span> หมายถึง มีปริมาณก๊าชคาร์บอนไดออกไซค์สูงกว่าเกณฑ์ (>=1000 PPM.)</h6>
            </div>
        </div>
</div>
   <?php
    }else if(!$searchword){
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
            
        <div class="container-fluid"> 
        <div class="row">
            <div class="col-md-5">
                <h3><span class="text-info"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;ข้อมูลปริมาณฝุ่นละออง</span></h3>
            </div>
            <!--<div class="col-md-3">
				<div class="text-right"><br><small><span class="glyphicon glyphicon-sort-by-attributes"></span> เรียงตาม: <a href="?sort=dustrec_id">ลำดับ</a> | <a href="?sort=dustrec_date">วันที่</a> | <a href="?sort=dustrec_position_id">ตำแหน่ง</a> | <a href="?sort=dustrec_amount_dust">ปริมาณฝุ่น</a> | <a href="?sort=dustrec_temp">อุณหภูมิ</a> | <a href="?sort=dustrec_moistness">ความชื้น</a> | <a href="?sort=dustrec_amount_co2">ปริมาณก๊าชคาร์บอนไดออกไซค์</a> | <a href="?sort=dustrec_timestamp">วันที่บันทึก</a></small></div>
            </div>-->
            <div class="col-md-7" style="text-align:right;">
            	<form class="navbar-form navbar-right" role="search" style="">
				    <div class="input-group-btn"><!-- input-append -->
                        <select class='form-control' id='searchword_posid' style="width:200px;" name='searchword_posid' required=''>
				                <option value='' disabled selected>ระบุตำแหน่ง</option>
				                <option disabled>*อาคาร 22 ชั้น 1</option>
				                <option value='1'>บริการยืม-คืน</option>
				                <option value='2'>บริการตอบคำถามฯ</option>
				                <option value='3'>โถงอ่านหนังสือชั้น 1</option>
				                <option value='4'>ชั้นวารสารใหม่</option>
				                <option value='5'>ชั้นวารสารล่วงเวลา</option>
				                <option value='6'>สำนักงานเลขานุการ</option>
				                <option disabled>*อาคาร 22 ชั้น 2</option>
				                <option value='7'>ชั้นหนังสือภาษาไทย</option>
				                <option value='8'>ชั้นหนังสือภาษาอังกฤษ</option>
				                <option value='9'>โถงอ่านหนังสือชั้น 2</option>
				                <option value='10'>ทางเดินหน้าห้องจดหมายเหตุฯ</option>
				                <option value='11'>ทางเดินไปอาคาร 17</option>
				                <option value='12'>ทางเดินโซนห้องประชุม</option>
				                <option disabled>*อาคาร 22 ชั้น 3</option>
				                <option value='13'>IT-Zone</option>
				                <option value='14'>ห้องวิทยานิพนธ์</option>
				                <option value='15'>บริการโสตฯ</option>
				                <option value='16'>American Corner Pattani</option>
				                <option value='17'>ทางเข้าห้องมินิเธียเตอร์</option>
				                <option value='18'>ทางเข้าห้องบริการคอมพิวเตอร์ 1</option>
				                <option disabled>*อาคาร 17 ชั้น 1</option>
				                <option value='19'>งานวิเคราะห์ทรัพยากรฯ</option>
				                <option value='20'>งานธุรการ</option>
				                <option value='21'>งานห้องสมุดดิจิทัล</option>
				                <option value='22'>งานซ่อมฯ</option>
				                <option value='23'>ชั้นหนังสือ</option>
				                <option disabled>*อาคาร 17 ชั้น 2</option>
				                <option value='24'>ชั้นหนังสือภาษาเกาหลี</option>
				                <option value='25'>ชั้นหนังสือภาษาอังกฤษ</option>
                                <option value='26'>ชั้นหนังสือภาษาไทย</option>
                                <option value='27'>ชั้นหนังสือภาษาอิสลาม</option>
                                <option value='28'>ชั้นหนังสือนวนิยาย</option>
                                <option value='29'>ที่นั่งอ่านหนังสือด้านตะวันตก</option>
                                <option value='30'>ที่นั่งอ่านหนังสือด้านตะวันออก</option>
                                <option value='31'>ที่นั่งอ่านหนังสือด้านทิศใต้</option>
				                <option value='all'>ทุกตำแหน่ง</option>
				            </select>
					    <input type="date" class="form-control" name="searchword" placeholder="ระบุวันที่ ปปปป-ดด-วว" required>
				    	<button type="submit" class="btn btn-default" >
					    	<span class="glyphicon glyphicon-search"></span> 
						</button> 
						<!--<button type="button" class="btn btn-default" data-toggle="modal" data-target="#adsearchModal">
					    	ขั้นสูง
						</button>-->
					</div>
				</form>	
            </div>
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
                                pageLength: 1000
                                //recordsTotal: 50
                            });
                        });
                </script>
                
                <table  id="dustdatatable" class="table table-striped table-hover table-responsive">
                  <thead>
                    <tr>
                       <th><center>ลำดับ</center></th>
                        <th><center>วันที่</center></th>
                        <th><center>เวลา</center></th>
                        <th><center>ตำแหน่ง</center></th>
                        <th><center>ปริมาณฝุ่น</center></th>
                        <th><center>อุณหภูมิ</center></th>
                        <th><center>ความชื้น</center></th>
                        <th><center>ปริมาณก๊าชคาร์บอนไดออกไซค์</center></th>
                        <th><center>บันทึกข้อมูล</center></th>
                        <th><center>ดำเนินการ</center></th>
                    </tr>
                  </thead>
                  <tbody>
                 <?php
                    //if((!$browsecourse) && (!$tagsearch)){//กรณีไม่มีการป้อนคำค้น
                    if($sort == 'dustrec_id'){
                        $sql = "SELECT * from dustrec as a, position as b where a.dustrec_position_id = b.position_id order by $sort desc LIMIT 10000";//กำหนดจำนวนการแสดงผลต่อ 1 หน้า
                    }else if($sort != 'dustrec_id'){
                        $sql = "SELECT * from dustrec as a, position as b where a.dustrec_position_id = b.position_id order by $sort asc LIMIT 10000";//กำหนดจำนวนการแสดงผลต่อ 1 หน้า
                    }
                    
			        $query = mysqli_query($connection, $sql);
			        $row = mysqli_num_rows($query);

			        while($row_result = mysqli_fetch_array($query, MYSQLI_ASSOC)){ 
                                            
                    if(($row_result['dustrec_amount_dust'] >= '37.5') || ($row_result['dustrec_amount_co2'] >= '1000')){
                      if($row_result['dustrec_amount_dust'] >= '37.5' && $row_result['dustrec_amount_co2'] >= '1000'){
                      ?>
                        <!-- 1 block data -->
			            <tr style="color:#E74C3C;font-weight:bold">
                      <?php
                      }
                      if($row_result['dustrec_amount_dust'] >= '37.5' && $row_result['dustrec_amount_co2'] < '1000'){
                      ?>
                        <!-- 1 block data -->
			            <tr style="color:#EF8B80">
                      <?php
                      }
                      if($row_result['dustrec_amount_dust'] < '37.5' && $row_result['dustrec_amount_co2'] >= '1000'){ 
                       ?>
                        <!-- 1 block data -->
			            <tr style="color:#F7BF65">
                   <?php 
                      }
                    }else{ //ถ้าค่าไม่เข้าข่าย ไม่ต้องใส่สี
                    ?>
                        <!-- 1 block data -->
			             <tr>
                    <?php
                     }
                        ?>
                        <td width="">
                            <center><?php echo $row_result['dustrec_id'] ?></center>
                        </td>
                        <td width="">
                            <center><a href="/dashboard/reportbydate.php?posname=<?=$row_result['position_name']?>&date=<?=$row_result['dustrec_date']?>" target="_blank"><?php echo date('d/m/Y', strtotime($row_result['dustrec_date'])) ?></a></center>
                        </td>
                        <!--<td width="">
                            <center><?php echo date('d/m/Y', strtotime($row_result['dustrec_date'])) ?></center>
                        </td>-->
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
                        <td width="">
                            <center><?php echo $row_result['dustrec_timestamp'] ?></center>
                        </td>                       
                        <td width="10%">
                           <center>
                            <div class="col-md-6 text-right">
                                <a href="?dustrec_id=<?php echo $row_result['dustrec_id'] ?>" rel="tooltip" title="แก้ไข" data-placement="top"><h4><span class="text-info"><span class="glyphicon glyphicon-edit"></span></span></h4></a>
                            </div>
                            <div class="col-md-6 text-left">
                                <a href="include/dustrec_del.php?dustrec_id=<?php echo $row_result['dustrec_id'] ?>" rel="tooltip" title="ลบ" data-placement="top" data-toggle='modal'><h4><span class="text-danger"><span class="glyphicon glyphicon-trash"></span></span></h4></a>
                            </div>
                            </center>
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
				/*if($Prev_Page){
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
				}*/
				?>
			</div>
		</div>-->
		<!-- ///แบ่งหน้า/// -->
		<div class="row">
            <div class="col-md-12">
                <h6><span class="btn btn-xs btn-danger">สีแดง</span> หมายถึง มีปริมาณฝุ่นละอองและก๊าชคาร์บอนไดออกไซค์สูงกว่าเกณฑ์ (>=37.5 µg/m³, >=1000 PPM.) <span class="btn btn-xs btn-danger disabled">สีชมพู</span> หมายถึง มีปริมาณฝุ่นละอองสูงกว่าเกณฑ์ (>=37.5 µg/m³) <span class="btn btn-xs btn-warning disabled">สีส้ม</span> หมายถึง มีปริมาณก๊าชคาร์บอนไดออกไซค์สูงกว่าเกณฑ์ (>=1000 PPM.)</h6>
            </div>
        </div>
</div>
        <?php
    }
    ?>
    
    
    <!-- Footer -->
<?php 
}

include "include/footer.php"; ?> 
<!-- Footer -->