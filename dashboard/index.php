<!-- Header -->
<?php
session_start();
error_reporting(0); // ปิด error report
$_SESSION["LOGIN"];
$_SESSION["SEARCHWORD_POSID"] = $_POST['searchword_posid'];
$_SESSION["SEARCHWORD_STDATE"] = $_POST['searchword_stdate'];
$_SESSION["SEARCHWORD_ENDATE"] = $_POST['searchword_endate'];

$_SESSION["SEARCHWORDCOMP_POSIDA"] = $_POST['searchwordcomp_posidA'];
$_SESSION["SEARCHWORDCOMP_POSIDB"] = $_POST['searchwordcomp_posidB'];
$_SESSION["SEARCHWORDCOMP_STDATE"] = $_POST['searchwordcomp_stdate'];
$_SESSION["SEARCHWORDCOMP_ENDATE"] = $_POST['searchwordcomp_endate'];

if($_SESSION["LOGIN"]!=1){
?>

	<script>
		location='http://ddr.oas.psu.ac.th'
	</script>
	
<?php
}else{
    
$PageTitle = "Dashboard";
include "include/header.php";
?>
<!-- Header -->

<!-- Body -->
<!--<meta http-equiv="refresh" content="0; url=" />-->

<div class="container-fluid">
   <div class="row">
    <div class="col-md-12">
        <div class='alert alert-dismissible alert-warning fade in'>
            <button type='button' class='close' data-dismiss='alert'>&times;</button>
            <span class='glyphicon glyphicon-info-sign'></span> บันทึกปริมาณฝุ่นละอองในตำแหน่งต่าง ๆ ของสำนักวิทยบริการ โดยการระบุวัน เวลา ปริมาณฝุ่น อุณหภูมิ ความชื้น และก๊าซคาร์บอนไดออกไซค์
            <div class="hidden-xs text-right">
                <button type='button' class='btn btn-info' data-toggle='modal' href='#DustRecModal' ><span class="glyphicon glyphicon-pencil"></span> บันทึกปริมาณฝุ่นละออง</button>
            </div>
            <div class="visible-xs-block text-center">
                <button type='button' class='btn btn-info' data-toggle='modal' href='#DustRecModal' ><span class="glyphicon glyphicon-pencil"></span> บันทึกปริมาณฝุ่นละออง</button>
            </div>                        
        </div>                
    </div>
</div>

<div class="row">
    <div class="col-md-7">
       <div class="container-fluid">
       <!-- กล่องแสดงข้อมูลปริมาณฝุ่นละออง -->
       <div class="row">
        <div class="panel panel-info">
          <div class="panel-heading">
            <h2 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;ข้อมูลปริมาณฝุ่นละออง</h2>
          </div>
          <div class="panel-body">
            <?php
            include "panel/panel_dustreclist.php";
            ?>
          </div>              
        </div>
        </div>
        <!-- กล่องแสดงข้อมูลปริมาณฝุ่นละออง -->
        
        
        
     </div>
    </div>

    <div class="col-md-5">
       <div class="container-fluid">
       <!-- กล่องแสดงตัวอย่างกราฟ -->
       <div class="row">
        <div class="panel panel-success">
          <div class="panel-heading">
            <h2 class="panel-title"><span class="glyphicon glyphicon-equalizer"></span>&nbsp;แผนภูมิข้อมูลพื้นฐานเฉลี่ยตามตำแหน่งและช่วงเวลา</h2>
          </div>
          <div class="panel-body" id="searchbasic">
               
               <form class="form-inline" role="ViewBasicChartForm" method="POST" action="">
                  <div class="row">
                       <div class="col-md-12">
                          <div class="form-group">
                            
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
                            
                            <div class='input-group date' id='datetimepickerLocalST'>
                                <input type='text' class='form-control' size='9' name='searchword_stdate' placeholder='ระบุวันเริ่มต้น' required=''/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                            
                            <div class='input-group date' id='datetimepickerLocalEN'>
                                <input type='text' class='form-control' size='9' name='searchword_endate' placeholder='ระบุวันสิ้นสุด' required=''/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>

				    	   <button type="submit" class="btn btn-default">
					    	    <span class="glyphicon glyphicon-search"></span> 
						    </button> 
                            
                        </div>
                       </div>
                   </div>
              </form>
               
               <hr>
          </div>
          <div class="panel-body" style="margin-top:-30px">
            <ul class="nav nav-tabs nav-justified">
              <li class="active"><a href="#dust" data-toggle="tab" aria-expanded="true">ปริมาณฝุ่น</a></li>
              <li ><a href="#temp" data-toggle="tab" aria-expanded="false">อุณหภูมิ</a></li>
              <li ><a href="#moistness" data-toggle="tab" aria-expanded="false">ความชื้น</a></li>
              <li ><a href="#co2" data-toggle="tab" aria-expanded="false">ปริมาณก๊าช CO<sub>2</sub></a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
              <!-- tab ฝุ่น -->
              <div class="tab-pane fade active in" id="dust">
               <!--<?php
                if(!$_SESSION["SEARCHWORD_POSID"] || !$_SESSION["SEARCHWORD_STDATE"] || !$_SESSION["SEARCHWORD_ENDATE"]){
                ?>
                   <br>
                    <div class='alert alert-dismissible alert-danger fade in'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <span class='glyphicon glyphicon-warning-sign'></span> กรุณาระบุตำแหน่ง วันเริ่มต้นและสิ้นสุด                 
                    </div> 
                <?php
                }
                ?>-->
                <div class="panel-body" id="container1">
                    <?php
                        include "panel/panel_basicchart_dust.php";
                    ?>
                </div>
              </div>
              <!-- tab ฝุ่น -->
              <!-- tab อุณหภูมิ -->
              <div class="tab-pane fade" id="temp">
                <div class="panel-body" id="container2">
                    <?php
                        include "panel/panel_basicchart_temp.php";
                    ?>
                </div>
              </div> 
              <!-- tab อุณหภูมิ -->
              <!-- tab ความชื้น -->
              <div class="tab-pane fade" id="moistness">
                <div class="panel-body" id="container3">
                    <?php
                        include "panel/panel_basicchart_moistness.php";
                    ?>
                </div>
              </div> 
              <!-- tab ความชื้น -->
              <!-- tab ก๊าชคาร์บอนไดออกไซค์ -->
              <div class="tab-pane fade" id="co2">
                <div class="panel-body" id="container4">
                    <?php
                        include "panel/panel_basicchart_co2.php";
                    ?>
                </div>
              </div> 
              <!-- tab ก๊าชคาร์บอนไดออกไซค์ -->
            </div>             
          </div>              
        </div>
        </div>
        <!-- กล่องแสดงตัวอย่างกราฟ -->
        
        <div class="row">
            <div class="panel panel-success">
              <div class="panel-heading">
                <h2 class="panel-title"><span class="glyphicon glyphicon-equalizer"></span>&nbsp;แผนภูมิข้อมูลพื้นฐานเฉลี่ยเปรียบเทียบตามตำแหน่งและช่วงเวลา</h2>
              </div>
              <div class="panel-body" id="searchcomp">
               
               <form class="form-inline" role="ViewCompareChartForm" method="POST" action="">
                  <div class="row">
                       <div class="col-md-12">
                          <div class="form-group">
                            
				            <select class='form-control' id='searchwordcomp_posidA' style="width:120px;" name='searchwordcomp_posidA' required=''>
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
				            </select>
                           
                           <select class='form-control' id='searchwordcomp_posidB' style="width:120px;" name='searchwordcomp_posidB' required=''>
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
				            </select>
                           
                            <!--<br><br>-->
                            
                            <div class='input-group date' id='datetimepickerLocalCOMPST'>
                                <input type='text' class='form-control' size='6' name='searchwordcomp_stdate' placeholder='ระบุวันเริ่มต้น' required=''/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                            
                            <div class='input-group date' id='datetimepickerLocalCOMPEN'>
                                <input type='text' class='form-control' size='6' name='searchwordcomp_endate' placeholder='ระบุวันสิ้นสุด' required=''/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>

				    	   <button type="submit" class="btn btn-default">
					    	    <span class="glyphicon glyphicon-search"></span> 
						    </button> 
                            
                        </div>
                       </div>
                   </div>
              </form>
               
               <hr>
               
          </div>
           <div class="panel-body" style="margin-top:-30px">
            <ul class="nav nav-tabs nav-justified">
              <li class="active"><a href="#dustcomp" data-toggle="tab" aria-expanded="true">ปริมาณฝุ่น</a></li>
              <li ><a href="#tempcomp" data-toggle="tab" aria-expanded="false">อุณหภูมิ</a></li>
              <li ><a href="#moistnesscomp" data-toggle="tab" aria-expanded="false">ความชื้น</a></li>
              <li ><a href="#co2comp" data-toggle="tab" aria-expanded="false">ปริมาณก๊าช CO<sub>2</sub></a></li>
            </ul>
            <div id="myTabContent" class="tab-content">
              <!-- tab ฝุ่น -->
              <div class="tab-pane fade active in" id="dustcomp">
               <?php
                if(!$_SESSION["SEARCHWORDCOMP_POSIDA"] || !$_SESSION["SEARCHWORDCOMP_POSIDB"] || !$_SESSION["SEARCHWORDCOMP_STDATE"] || !$_SESSION["SEARCHWORDCOMP_ENDATE"]){
                ?>
                   <br>
                    <div class='alert alert-dismissible alert-danger fade in'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <span class='glyphicon glyphicon-warning-sign'></span> กรุณาระบุตำแหน่งเปรียบเทียบ วันเริ่มต้นและสิ้นสุด                 
                    </div> 
                <?php
                }
                ?>
                <div class="panel-body" id="container5">
                    <?php
                        include "panel/panel_compchart_dust.php";
                    ?>
                </div>
              </div>
              <!-- tab ฝุ่น -->
              <!-- tab อุณหภูมิ -->
              <div class="tab-pane fade" id="tempcomp">
               <?php
                if(!$_SESSION["SEARCHWORDCOMP_POSIDA"] || !$_SESSION["SEARCHWORDCOMP_POSIDB"] || !$_SESSION["SEARCHWORDCOMP_STDATE"] || !$_SESSION["SEARCHWORDCOMP_ENDATE"]){
                ?>
                   <br>
                    <div class='alert alert-dismissible alert-danger fade in'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <span class='glyphicon glyphicon-warning-sign'></span> กรุณาระบุตำแหน่งเปรียบเทียบ วันเริ่มต้นและสิ้นสุด                 
                    </div> 
                <?php
                }
                ?>
                <div class="panel-body" id="container6">
                    <?php
                        include "panel/panel_compchart_temp.php";
                    ?>
                </div>
              </div> 
              <!-- tab อุณหภูมิ -->
              <!-- tab ความชื้น -->
              <div class="tab-pane fade" id="moistnesscomp">
               <?php
                if(!$_SESSION["SEARCHWORDCOMP_POSIDA"] || !$_SESSION["SEARCHWORDCOMP_POSIDB"] || !$_SESSION["SEARCHWORDCOMP_STDATE"] || !$_SESSION["SEARCHWORDCOMP_ENDATE"]){
                ?>
                   <br>
                    <div class='alert alert-dismissible alert-danger fade in'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <span class='glyphicon glyphicon-warning-sign'></span> กรุณาระบุตำแหน่งเปรียบเทียบ วันเริ่มต้นและสิ้นสุด                 
                    </div> 
                <?php
                }
                ?>
                <div class="panel-body" id="container7">
                    <?php
                        include "panel/panel_compchart_moistness.php";
                    ?>
                </div>
              </div> 
              <!-- tab ความชื้น -->
              <!-- tab ก๊าชคาร์บอนไดออกไซค์ -->
              <div class="tab-pane fade" id="co2comp">
               <?php
                if(!$_SESSION["SEARCHWORDCOMP_POSIDA"] || !$_SESSION["SEARCHWORDCOMP_POSIDB"] || !$_SESSION["SEARCHWORDCOMP_STDATE"] || !$_SESSION["SEARCHWORDCOMP_ENDATE"]){
                ?>
                   <br>
                    <div class='alert alert-dismissible alert-danger fade in'>
                        <button type='button' class='close' data-dismiss='alert'>&times;</button>
                        <span class='glyphicon glyphicon-warning-sign'></span> กรุณาระบุตำแหน่งเปรียบเทียบ วันเริ่มต้นและสิ้นสุด                 
                    </div> 
                <?php
                }
                ?>
                <div class="panel-body" id="container8">
                    <?php
                        include "panel/panel_compchart_co2.php";
                    ?>
                </div>
              </div> 
              <!-- tab ก๊าชคาร์บอนไดออกไซค์ -->
            </div>             
          </div> 
            </div>
        </div>
    </div>
    </div>

</div>
<div class="row">
    <div class="col-md-12">
        <div class="container-fluid">
            <div class="row">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h2 class="panel-title"><span class="glyphicon glyphicon-equalizer"></span>&nbsp;แผนภูมิข้อมูลอื่น ๆ</h2>
                        </div>
                        <div class="panel-body">

                            <div class="col-md-12">
                              <div class="panel panel-success">
                                   <!--<div class="panel-heading">
                                        <h2 class="panel-title"><span class="glyphicon glyphicon-equalizer"></span>&nbsp;แผนภูมิข้อมูล</h2>
                                    </div>-->
                                    <div class="panel-body" id="containerpos">
                                        <?php
                                            include "panel/panel_compchart_pos.php";
                                        ?>
                                    </div>
                                </div>
                            </div>  


                         </div>

                        <div class="panel-body">  

                            <div class="col-md-12">
                              <div class="panel panel-success">
                                   <!--<div class="panel-heading">
                                        <h2 class="panel-title"><span class="glyphicon glyphicon-equalizer"></span>&nbsp;แผนภูมิข้อมูล</h2>
                                    </div>-->
                                    <div class="panel-body" id="containerover">
                                        <?php
                                            include "panel/panel_compchart_over.php";
                                        ?>
                                    </div>
                                </div>
                            </div>  
                        </div> 
                    </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Body -->

<!-- Footer -->
<?php 
}

include "include/footer.php"; ?> 
<!-- Footer -->