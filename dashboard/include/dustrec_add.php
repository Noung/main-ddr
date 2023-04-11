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
?>

<head>
    <link href="http://ddr.oas.psu.ac.th/dashboard/assets/css/bootstrap.css" rel="stylesheet">
    <link href="http://ddr.oas.psu.ac.th/dashboard/assets/assets/css/style.css" rel="stylesheet">
    
    <script src="http://ddr.oas.psu.ac.th/dashboard/assets/js/jquery.min.js"></script>
    <script src="http://ddr.oas.psu.ac.th/dashboard/assets/js/bootstrap.min.js"></script>
    <script src="http://ddr.oas.psu.ac.th/dashboard/assets/js/scripts.js"></script>
</head>

<?php
include "dbconf.php";
    
//รับข้อมูล
$dustrec_position_id = $_POST["dustrec_position_id"];
$dustrec_datetime = $_POST["dustrec_datetime"];
$dustrec_amount_dust = $_POST["dustrec_amount_dust"];
$dustrec_temp = $_POST["dustrec_temp"];
$dustrec_moistness = $_POST["dustrec_moistness"];
$dustrec_amount_co2 = $_POST["dustrec_amount_co2"];
$dustrec_timestamp = $_POST["dustrec_timestamp"];

$explodeDatetime = explode(" ", $dustrec_datetime); // แยกวันและเวลาออกจากกันด้วยช่องว่าง " "
$dateadd = $explodeDatetime[0]; // วันที่วัด
$timeadd = $explodeDatetime[1]; // เวลาที่วัด
	
/*echo $dustrec_position_id."<br>".$dateadd."<br>".$timeadd."<br>".$dustrec_amount_dust."<br>".$dustrec_temp."<br>".$dustrec_moistness."<br>".$dustrec_amount_co2."<br>".$dustrec_timestamp;
exit(); // --> เช็คผ่าน*/
    
$sql = "INSERT INTO dustrec (dustrec_id, dustrec_date, dustrec_time, dustrec_position_id, dustrec_amount_dust, dustrec_temp, dustrec_moistness, dustrec_amount_co2, dustrec_timestamp) VALUES ('', '$dateadd', '$timeadd', '$dustrec_position_id', '$dustrec_amount_dust', '$dustrec_temp', '$dustrec_moistness', '$dustrec_amount_co2', '$dustrec_timestamp')"; 

/*echo $sql;
exit(); // --> เช็คผ่าน*/
    
$query = mysqli_query($connection, $sql);
    
    if($query === TRUE) {
        ?>
        <script type="text/javascript">
            $(window).load(function(){
            $('#AddSuccess').modal({backdrop: 'static', keyboard: false}); //ปิดการคลิกเพื่อปิดกล่อง modal
            $('#AddSuccess').modal('show');
            });
        </script>
        <!-- AddSuccess -->
         <div id="AddSuccess" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title"><span class='glyphicon glyphicon-ok-circle'></span> บันทึกข้อมูลสำเร็จ!</h4>
                    </div>
                    <div class="modal-body">
                        <p>บันทึกปริมาณฝุ่นละอองสำเร็จ<br>คลิกปุ่ม "ตกลง" เพื่อไปยังหน้าแสดงข้อมูลปริมาณฝุ่นละออง</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success" onclick="window.location.href='/dashboard/dustreclist.php'"><span class='glyphicon glyphicon-ok'></span> ตกลง</button>
                    </div>
                </div>
            </div>
        </div> 
        <!-- AddSuccess -->
        <?php
        exit();
    }else{
        ?>
        <script type="text/javascript">
            $(window).load(function(){
            $('#AddFalse').modal({backdrop: 'static', keyboard: false}); //ปิดการคลิกเพื่อปิดกล่อง modal
            $('#AddFalse').modal('show');
            });
        </script>
        <!-- AddFalse -->
         <div id="AddFalse" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title"><span class='glyphicon glyphicon-remove-circle'></span> บันทึกข้อมูลไม่สำเร็จ!</h4>
                    </div>
                    <div class="modal-body">
                        <p>ขออภัย บันทึกปริมาณฝุ่นละอองไม่สำเร็จ โปรดตรวจสอบอีกครั้ง<br>คลิกปุ่ม "ตกลง" เพื่อไปยังหน้า Dashboard</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" onclick="window.location.href='/dashboard/index.php'"><span class='glyphicon glyphicon-ok'></span> ตกลง</button>
                    </div>
                </div>
            </div>
        </div> 
        <!-- AddFalse -->
        <?php
        exit();
    }

}
?>