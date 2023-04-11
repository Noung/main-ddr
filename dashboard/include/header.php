<?php
session_start();
error_reporting(0); // ปิด error report
$_SESSION["LOGIN"];
$_SESSION["USERNAME"];

include "include/dbconf.php";
include "include/dustrec.php";

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
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    

    
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
     <!-- Date Picker -->
  </head>
  
  <body>
        
    <div class="container-fluid" style="margin-bottom:20px">
	    <div class="row">
		    <div class="col-md-12">
			    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
				    <div class="navbar-header">					 
					    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						     <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
					    </button> 
					    <a class="navbar-brand hidden-xs" href="/dashboard/index.php"><span class='glyphicon glyphicon-stats'></span> ระบบสถิติปริมาณฝุ่นละอองสำนักวิทยบริการ</a>
					    <a class="navbar-brand visible-xs-block" style="font-size:12px;" href="/dashboard/index.php"><span class='glyphicon glyphicon-stats'></span> ระบบสถิติปริมาณฝุ่นละอองสำนักวิทยบริการ</a>
				    </div>
				    
				    <?php
		              if(!$_SESSION["LOGIN"]){
			        ?>	
			        
			        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="margin-right:15px;">
					    <form id="signin" class="navbar-form navbar-right" role="form" method="POST" action="">
                        	<div class="input-group">
                            	<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            	<input id="username" type="text" class="form-control" name="username" size="10" value="" placeholder="PSU Passport" required>                                        
                        	</div>
                        	<div class="input-group">
                            	<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            	<input id="password" type="password" class="form-control" name="password" size="10" value="" placeholder="PSU Passport" required>                                        
                        	</div>
                        	<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;เข้าสู่ระบบ</button>
                   		</form>
				    </div>
			        
			        <?php
		              }else{
			        ?>	
			        	
				    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="margin-right:15px;">
					    <ul class="nav navbar-nav">
            				<li><a href="/dashboard/index.php"><span class="glyphicon glyphicon-dashboard"></span>&nbsp;Dashboard</a></li>
						    <li class="dropdown">
          						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="glyphicon glyphicon-th"></span>&nbsp;เลือกการทำงาน <span class="caret"></span></a>
          						<ul class="dropdown-menu" role="menu">
            						<li><a data-toggle='modal' href='#DustRecModal'><span class="glyphicon glyphicon-pencil"></span>&nbsp;บันทึกปริมาณฝุ่นละออง</a></li>
            						<li class="divider"></li>
            						<li><a data-toggle='modal' href='/dashboard/dustreclist.php'><span class="glyphicon glyphicon-list-alt"></span>&nbsp;ข้อมูลปริมาณฝุ่นละออง</a></li>
          						</ul>
        					</li>
					    </ul>
					    <form id="signin" class="navbar-form navbar-right" role="form" action="/dashboard/logout.php">
				            <div class="input-group">
                                <span style="color:#ffffff"><i class="glyphicon glyphicon-user"></i>&nbsp;สวัสดี <?php echo $_SESSION["USERNAME"]; ?>, </span>
								<button type="submit" class="btn btn-danger"><span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>&nbsp;&nbsp;ออกจากระบบ</button>
				            </div>
				        </form>
				        
			        <?php
		              }
		            ?>
		            
				    </div>
			    </nav>
            </div>
        </div>
        <div class="row" style="margin-top:80px"></div>