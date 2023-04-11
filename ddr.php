<!-- Header -->
<?php
session_start();
error_reporting(0); // ปิด error report
//$_SESSION["LOGIN"];
$_SESSION["SEARCHWORD_POSID"] = $_POST['searchword_posid'];
$_SESSION["SEARCHWORD_STDATE"] = $_POST['searchword_stdate'];
$_SESSION["SEARCHWORD_ENDATE"] = $_POST['searchword_endate'];

$_SESSION["SEARCHWORDCOMP_POSIDA"] = $_POST['searchwordcomp_posidA'];
$_SESSION["SEARCHWORDCOMP_POSIDB"] = $_POST['searchwordcomp_posidB'];
$_SESSION["SEARCHWORDCOMP_STDATE"] = $_POST['searchwordcomp_stdate'];
$_SESSION["SEARCHWORDCOMP_ENDATE"] = $_POST['searchwordcomp_endate'];

$PageTitle = "Dashboard";

//header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Origin: http://ddr.oas.psu.ac.th');
session_start();
error_reporting(0); // ปิด error report
$_SESSION["LOGIN"];
$_SESSION["USERNAME"];

include "include/dbconf.php";
include "include/login.php";
//include "dashboard/include/dustrec.php";

if($_POST['username']){
	$username=$_POST['username'];
	$password=$_POST['password'];

	require_once ("include/dbconf.php");
    require_once ("include/function.php");
    require_once ("include/nusoap.php");
    
    $mysqli=db_conn(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

	$query="select staff_id from staff where staff_username='$username'";
	$result = $mysqli->query($query); // ทำการ query คำสั่ง sql   
	$total=$result->num_rows;  // นับจำนวนแถวที่แสดงทั้งหมด 
    
    /*echo $total;
    exit();*/
    
    if($total != '0'){ // พบ username ในฐานข้อมูล เข้าสู่ขั้นตอนการ Login ด้วย PSU Passport
        $list=lib_psulogin_wsdl($username,$password);
        if($list[0]=='true'){
            $_SESSION["LOGIN"]=1;
            $_SESSION["USERNAME"]=$list[1]; // array($str_return,$login,$name,$sname,$staff_id,$sex,$per_id,$a7,$a8,$fac_name,$a10,$campus_name,$a12,$title_name,$email,$a15);
            ?>
		    
		    <!--<script>
		      location='/dashboard/index.php' // Login ผ่าน ให้ไปหน้า dashboard (ปรับใช้เป็น medal)
	       </script>-->
	       <script type="text/javascript">
                $(window).load(function(){
                $('#LoginSuccess').modal({backdrop: 'static', keyboard: false});                        $('#LoginSuccess').modal('show');
                });
            </script>
          
           <?php
            exit();
        }else{ // พบ username ในฐานข้อมูล แต่เชื่อมต่อ PSU Passport ไม่ได้หรือรหัสผ่านผู้ใช้ผิด
            ?>
        
		    <!--<script>
		      alert("ขออภัย การเชื่อมต้อกับ PSU Passport ผิดพลาดหรือ User Account ของท่านไม่ถูกต้อง โปรดตรวจสอบอีกครั้ง!"); // Login ไม่ผ่าน (ปรับใช้เป็น medal)
            </script>-->
            <script type="text/javascript">
                $(window).load(function(){
                $('#ConnectionFalse').modal({backdrop: 'static', keyboard: false});                        $('#ConnectionFalse').modal('show');
                });
            </script>
        
        <?php
            exit();
        }
    }else if($total == '0'){ // ไม่พบ username ในฐานข้อมูล
        ?>
        
		    <!--<script>
		      alert("ขออภัย ท่านไม่มีสิทธิเข้าใช้งานในส่วนนี้!"); // Login ไม่ผ่าน (ปรับใช้เป็น medal)
            </script>-->
            <script type="text/javascript">
                $(window).load(function(){
                $('#LoginFalse').modal({backdrop: 'static', keyboard: false});                        $('#LoginFalse').modal('show');
                });
            </script>
        
        <?php
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="th">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ระบบสถิติปริมาณฝุ่นละอองสำนักวิทยบริการ - <?=$PageTitle?></title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta http-equiv="refresh" content="300" >
    <link rel="shortcut icon" href="http://ddr.oas.psu.ac.th/favicon.ico" type="image/x-icon">
    <link rel="icon" href="http://ddr.oas.psu.ac.th/favicon.ico" type="image/x-icon">
      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script><!--jquery cookie สำหรับโหลด modal login ครั้งแรกที่เปิดเพจ-->
    
    <!-- css / js ซ้อนกับที่ include
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    -->
    
    <!-- Date Picker -->
    <!-- CDN 
    <link href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
    <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
    CDN -->  
     
    <link href="assets/css/bootstrap-datetimepicker.css" rel="stylesheet"> 
    <script src="assets/js/moment-with-locales.js"></script>
    <script src="assets/js/bootstrap-datetimepicker.js"></script> 
    
    <script type="text/javascript">
        $(function () {
            $('#datetimepickerNormal').datetimepicker();
        });
       $(function () {
            $('#datetimepickerLocal').datetimepicker({
                locale: 'th'
            });
        });
        $(function () {
            $('#datetimepickerLocalST').datetimepicker({
                locale: 'th-notime'
            });
        });
        $(function () {
            $('#datetimepickerLocalEN').datetimepicker({
                locale: 'th-notime'
            });
        });
        $(function () {
            $('#datetimepickerLocalCOMPST').datetimepicker({
                locale: 'th-notime'
            });
        });
        $(function () {
            $('#datetimepickerLocalCOMPEN').datetimepicker({
                locale: 'th-notime'
            });
        });
    </script>
     <!-- Date Picker-->
    
  </head>
  
  <body>
        
<style>

.pmvalbox{
    border: 1px solid red;
    margin: 5px;
}

.container-fluid {
  margin-top: 10px;
}

a.ddrlink {
    color: #c7c3c3 !important;
    text-decoration: none !important;
}


</style>
<!-- Header -->

<!-- Body -->
<!--<meta http-equiv="refresh" content="0; url=" />-->

<div class="container-fluid" style="">

<div class="row">
    <div class="col-md-12">
        <div class="container-fluid">
       
            <!-- กล่องแสดงข้อมูลปริมาณฝุ่นละออง-->
           <div class="row">
               <div class="col-md-12">
                    <div class="panel panel-info">
                      <div class="panel-heading">
                          <h2 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;สถานะปริมาณฝุ่นละออง (PM2.5) ภายในสำนักวิทยบริการ วันที่ <?php echo date('d/m/Y')." เวลา ".date('H:i:s')." น."; ?></h2>
                          <div class="text-right" style="margin-top:-20px"><a href="https://ddr.oas.psu.ac.th/" target="_blank" class="ddrlink">ข้อมูลเชิงลึก</a></div>
                      </div>
                      <div class="panel-body">
                         <div class="row">
                            <div class="col-md-6"><!--ชั้น 1 -->
                                <div class="pmvalbox"><?php
                                    include "panel/panel_gaugechart_dustFl1.php";
                                ?></div>
                             </div>
                             <div class="col-md-6"><!--ชั้น 2 -->
                                <div class="pmvalbox"><?php
                                    include "panel/panel_gaugechart_dustFl2.php";
                                ?></div>
                             </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6"><!--ชั้น 3 -->
                                <div class="pmvalbox"><?php
                                    include "panel/panel_gaugechart_dustFl3.php";
                                ?></div>
                             </div>
                             <div class="col-md-6"><!--ตึกเก่า -->
                                <div class="pmvalbox"><?php
                                    include "panel/panel_gaugechart_dustFlob.php";
                                ?></div>
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
<!-- Body -->