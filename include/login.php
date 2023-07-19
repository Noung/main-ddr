<?php
$_SESSION["USERNAME"];
?>

<head>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</head>

<!-- LoginModal -->
<div id="LoginModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- modal-header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h3 class="modal-title"><span class='glyphicon glyphicon-user'></span>&nbsp;&nbsp;เจ้าหน้าที่เข้าสู่ระบบ</h3>
            </div>
            <!-- modal-header -->

            <!-- modal-body -->
            <div class="modal-body">
                <form id="signin" class="" role="form" method="POST" action="">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="username" type="text" class="form-control" name="username" size="10" value="" placeholder="PSU Passport" required>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password" type="password" class="form-control" name="password" size="10" value="" placeholder="PSU Passport" required>
                    </div>
            </div>
            <!-- modal-body -->

            <!-- modal-footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-log-in"></span>&nbsp;&nbsp;เข้าสู่ระบบ</button>
                <button type="reset" class="btn btn-danger"><span class='glyphicon glyphicon-remove'></span> ล้างค่า</button>
            </div>
            <!-- modal-footer -->

            </form>

        </div>
    </div>
</div>
<!-- LoginModal -->

<!-- LoginSuccess -->
<div id="LoginSuccess" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"><span class='glyphicon glyphicon-ok-circle'></span> เข้าสู่ระบบสำเร็จ!</h4>
            </div>
            <div class="modal-body">
                <p>ยินดีต้อนรับเจ้าหน้าที่เข้าสู่ระบบรายงานสภาพอากาศและฝุ่นละอองสำนักวิทยบริการ<br>คลิกปุ่ม "ตกลง" เพื่อไปยังหน้า Dashboard</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" onclick="window.location.href='/dashboard/index.php'"><span class='glyphicon glyphicon-ok'></span> ตกลง</button>
            </div>
        </div>
    </div>
</div>
<!-- LoginSuccess -->

<!-- LoginFalse -->
<div id="LoginFalse" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"><span class='glyphicon glyphicon-remove-circle'></span> เข้าสู่ระบบไม่สำเร็จ!</h4>
            </div>
            <div class="modal-body">
                <p>ขออภัย ท่านไม่มีสิทธิเข้าใช้งานในส่วนนี้<br>คลิกปุ่ม "ตกลง" เพื่อไปยังหน้าหลักของระบบ</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="window.location.href='/index.php'"><span class='glyphicon glyphicon-ok'></span> ตกลง</button>
            </div>
        </div>
    </div>
</div>
<!-- LoginFalse -->

<!-- ConnectionFalse -->
<div id="ConnectionFalse" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title"><span class='glyphicon glyphicon-remove-circle'></span> เข้าสู่ระบบไม่สำเร็จ!</h4>
            </div>
            <div class="modal-body">
                <p>ขออภัย การเชื่อมต้อกับ PSU Passport ผิดพลาดหรือ User Account ของท่านไม่ถูกต้อง โปรดตรวจสอบอีกครั้ง<br>คลิกปุ่ม "ตกลง" เพื่อไปยังหน้าหลักของระบบ</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="window.location.href='/index.php'"><span class='glyphicon glyphicon-ok'></span> ตกลง</button>
            </div>
        </div>
    </div>
</div>
<!-- ConnectionFalse -->