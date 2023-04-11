<!-- Header -->
<?php
session_start();
error_reporting(0); // ปิด error report
//$_SESSION["LOGIN"];
$_SESSION["SEARCHQUERY_POSNAME"] = $_GET['posname'];
$_SESSION["FIXDATE"] = date("Y-m-d");

$newDate = date("d/m/Y", strtotime($_SESSION["SEARCHQUERY_DATE"]));  

$_SESSION["SEARCHWORD_POSID"] = $_POST['searchword_posid'];
$_SESSION["SEARCHWORD_STDATE"] = $_POST['searchword_stdate'];
$_SESSION["SEARCHWORD_ENDATE"] = $_POST['searchword_endate'];

$_SESSION["SEARCHWORDCOMP_POSIDA"] = $_POST['searchwordcomp_posidA'];
$_SESSION["SEARCHWORDCOMP_POSIDB"] = $_POST['searchwordcomp_posidB'];
$_SESSION["SEARCHWORDCOMP_STDATE"] = $_GET['searchwordcomp_stdate'];
$_SESSION["SEARCHWORDCOMP_ENDATE"] = $_GET['searchwordcomp_endate'];

$PageTitle = "Dashboard";
include "include/header.php";
?>
<style>

.pmvalbox{
    border: 1px solid red;
    margin: 5px;
}

</style>
<!-- Header -->

<!-- Body -->
<!--<meta http-equiv="refresh" content="0; url=" />-->

<div class="container-fluid">

<div class="row">
    <div class="col-md-12">
        <div class="container-fluid">
            <!-- กล่องแสดงข้อมูลปริมาณฝุ่นละออง-->
           <div class="row">
               <div class="col-md-12">
                    <div class="panel panel-info">
                      <div class="panel-heading">
                        <h2 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;สถานะสภาพอากาศ ตำแหน่ง <?=$_SESSION["SEARCHQUERY_POSNAME"]?> วันที่ 
                        
                        <?php 
                            if($_SESSION["SEARCHWORDCOMP_STDATE"]){
                                echo date("d/m/Y", strtotime($_SESSION["SEARCHWORDCOMP_STDATE"]))." - ".date("d/m/Y", strtotime($_SESSION["SEARCHWORDCOMP_ENDATE"]));
                            }else if(!$_SESSION["SEARCHWORDCOMP_STDATE"]){
                                echo date("d/m/Y", strtotime($_SESSION["FIXDATE"]));
                            }
                            $onclick = "https://ddr.oas.psu.ac.th/reportbydatevr.php?posname=".$_SESSION["SEARCHQUERY_POSNAME"]."&date=".date("Y-m-d");
                        ?>
                        </h2>
                        
                        <form class="form-inline text-right" method="GET" action="" style="margin-top:-20px">
                            <div class="form-group">

                                <select class='form-control' id='searchword_posid' style="" name='posname' required=''>
                                    <option value='' disabled selected>ระบุตำแหน่ง</option>
                                    <option disabled>*อาคาร 22 ชั้น 1</option>
                                    <option value='บริการยืม-คืน'>บริการยืม-คืน</option>
                                    <option value='บริการตอบคำถามฯ'>บริการตอบคำถามฯ</option>
                                    <option value='โถงอ่านหนังสือชั้น 1'>โถงอ่านหนังสือชั้น 1</option>
                                    <option value='ชั้นวารสารใหม่'>ชั้นวารสารใหม่</option>
                                    <option value='ชั้นวารสารล่วงเวลา'>ชั้นวารสารล่วงเวลา</option>
                                    <option value='สำนักงานเลขานุการ'>สำนักงานเลขานุการ</option>
                                    <option disabled>*อาคาร 22 ชั้น 2</option>
                                    <option value='ชั้นหนังสือภาษาไทย'>ชั้นหนังสือภาษาไทย</option>
                                    <option value='ชั้นหนังสือภาษาอังกฤษ'>ชั้นหนังสือภาษาอังกฤษ</option>
                                    <option value='โถงอ่านหนังสือชั้น 2'>โถงอ่านหนังสือชั้น 2</option>
                                    <option value='ทางเดินหน้าห้องจดหมายเหตุฯ'>ทางเดินหน้าห้องจดหมายเหตุฯ</option>
                                    <option value='ทางเดินไปอาคาร 17'>ทางเดินไปอาคาร 17</option>
                                    <option value='ทางเดินโซนห้องประชุม'>ทางเดินโซนห้องประชุม</option>
                                    <option disabled>*อาคาร 22 ชั้น 3</option>
                                    <option value='IT-Zone'>IT-Zone</option>
                                    <option value='ห้องวิทยานิพนธ์'>ห้องวิทยานิพนธ์</option>
                                    <option value='บริการโสตฯ'>บริการโสตฯ</option>
                                    <option value='American Corner Pattani'>American Corner Pattani</option>
                                    <option value='ทางเข้าห้องมินิเธียเตอร์<'>ทางเข้าห้องมินิเธียเตอร์</option>
                                    <option value='ทางเข้าห้องบริการคอมพิวเตอร์ 1'>ทางเข้าห้องบริการคอมพิวเตอร์ 1</option>
                                    <option disabled>*อาคาร 17 ชั้น 1</option>
                                    <option value='งานวิเคราะห์ทรัพยากรฯ'>งานวิเคราะห์ทรัพยากรฯ</option>
                                    <option value='งานธุรการ'>งานธุรการ</option>
                                    <option value='งานห้องสมุดดิจิทัล'>งานห้องสมุดดิจิทัล</option>
                                    <option value='งานซ่อมฯ'>งานซ่อมฯ</option>
                                    <option value='ชั้นหนังสือ'>ชั้นหนังสือ</option>
                                    <option disabled>*อาคาร 17 ชั้น 2</option>
                                    <option value='ชั้นหนังสือภาษาเกาหลี'>ชั้นหนังสือภาษาเกาหลี</option>
                                    <option value='ชั้นหนังสือภาษาอังกฤษ'>ชั้นหนังสือภาษาอังกฤษ</option>
                                    <option value='ชั้นหนังสือภาษาไทย'>ชั้นหนังสือภาษาไทย</option>
                                    <option value='ชั้นหนังสือภาษาอิสลาม'>ชั้นหนังสือภาษาอิสลาม</option>
                                    <option value='ชั้นหนังสือนวนิยาย'>ชั้นหนังสือนวนิยาย</option>
                                    <option value='ที่นั่งอ่านหนังสือด้านตะวันตก'>ที่นั่งอ่านหนังสือด้านตะวันตก</option>
                                    <option value='ที่นั่งอ่านหนังสือด้านตะวันออก'>ที่นั่งอ่านหนังสือด้านตะวันออก</option>
                                    <option value='ที่นั่งอ่านหนังสือด้านทิศใต้'>ที่นั่งอ่านหนังสือด้านทิศใต้</option>
                                    <!--<option value='all'>ทุกตำแหน่ง</option>-->
                                </select>

                                <!--<div class='input-group date' id='datetimepickerLocalST'>
                                    <input type='text' class='form-control' size='9' name='date' placeholder='ระบุวัน' required=''/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>-->
                                
                                <div class='input-group date' id='datetimepickerLocalCOMPST'>
                                    <input type='text' class='form-control' size='9' name='searchwordcomp_stdate' placeholder='ระบุวันเริ่มต้น' required=''/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>

                                <div class='input-group date' id='datetimepickerLocalCOMPEN'>
                                    <input type='text' class='form-control' size='9' name='searchwordcomp_endate' placeholder='ระบุวันสิ้นสุด' required=''/>
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                                </div>

                               <button type="submit" class="btn btn-default">
                                    <span class="glyphicon glyphicon-search"></span> 
                                </button> 
                                <button type="button" class="btn btn-default" onClick="window.location.href='<?=$onclick?>'">
                                    <span class="glyphicon glyphicon-refresh"></span> 
                                </button>

                            </div>
                        </form>
                         <!--<form class="form-inline text-right" method="GET" action="" style="margin-top:-20px">
                             <div class='input-group date' id=''>
                               <input type='hidden' class='form-control'name='posname' value='<?=$_SESSION["SEARCHQUERY_POSNAME"]?>'/>
                                <input type='date' class='form-control' size='9' name='date' placeholder='ระบุวันที่'/>
                            </div>
                            <button type="submit" class="btn btn-default">
					    	    <span class="glyphicon glyphicon-search"></span> 
						    </button> 
                          </form>-->
                      </div>
                      <div class="panel-body">
                          <div class="row" style="padding:15px" id="containerbydate">
                              <?php
                                include "panel/panel_dustreclist_bydate.php";
                                ?>
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
<!-- Body -->

<!-- Footer -->
<?php 

include "include/footer.php"; ?> 
<!-- Footer -->