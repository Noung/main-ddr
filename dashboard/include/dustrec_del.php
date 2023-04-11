<?php
error_reporting(0); // ปิด error report
$dustrec_id = $_GET["dustrec_id"];
//echo $dustrec_id;
//exit();

include "dbconf.php";
include "header.php";

$sqlDel = "DELETE FROM dustrec WHERE dustrec_id='$dustrec_id'";
$queryDel = mysqli_query($connection, $sqlDel);

if ($queryDel == TRUE) {
    ?>
    <head>
        <link href="http://ddr.oas.psu.ac.th/dashboard/assets/css/bootstrap.css" rel="stylesheet">
        <link href="http://ddr.oas.psu.ac.th/dashboard/assets/assets/css/style.css" rel="stylesheet">
    
        <script src="http://ddr.oas.psu.ac.th/dashboard/assets/js/jquery.min.js"></script>
        <script src="http://ddr.oas.psu.ac.th/dashboard/assets/js/bootstrap.min.js"></script>
        <script src="http://ddr.oas.psu.ac.th/dashboard/assets/js/scripts.js"></script>
    </head>
    <script type="text/javascript">
            $(window).load(function(){
            $('#DelSuccess').modal({backdrop: 'static', keyboard: false}); //ปิดการคลิกเพื่อปิดกล่อง modal
            $('#DelSuccess').modal('show');
            });
    </script>
    <!-- DelSuccess -->
         <div id="DelSuccess" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                       <h3 class="modal-title"><span class='glyphicon glyphicon-ok-circle'></span> ลบข้อมูลสำเร็จ!</h4>
                    </div>
                    <div class="modal-body">
                        <p>คลิกปุ่ม "ตกลง" เพื่อไปยังหน้าแสดงข้อมูลปริมาณฝุ่นละออง</p>
                    </div>
                    <div class="modal-footer">
                       <button type="button" class="btn btn-success" onclick="window.location.href='/dashboard/dustreclist.php'"><span class='glyphicon glyphicon-ok'></span> ตกลง</button>
                    </div>
                </div>
            </div>
        </div> 
    <!-- DelSuccess -->
    <?php
} else {
    echo "Error deleting record: " . $conn->error;
}
?>