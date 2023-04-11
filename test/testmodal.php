<!DOCTYPE html>
<html>
<head>
    <title>Untitled Document</title>
    <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ระบบสถิติปริมาณฝุ่นละอองสำนักวิทยบริการ - <?=$PageTitle?></title>
    <meta name="description" content="">
    <meta name="author" content="">
</head>
<body>
<?php
include "include/login.php";
    
$a = 1;
$b = 2;
$c = $a+$b;
    
echo $a." ".$b." ".$c;

if($c == 4){
    echo "<br>HA HA HA";
    ?>
    <script type="text/javascript">
        $(window).load(function(){
        $('#ConnectionFalse').modal({backdrop: 'static', keyboard: false});                        $('#ConnectionFalse').modal('show');
        });
    </script>
    <?php
}else{
    echo "<br>FUCK";
    ?>
    <script type="text/javascript">
        $(window).load(function(){
        /*$('#LoginModal').modal({backdrop: 'static', keyboard: false}); */                       $('#LoginSuccess').modal('show');
        });
    </script>
    <?php
} 
?>
</body>
</html>