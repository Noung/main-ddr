<?php
$mysqli=new mysqli("localhost","censor","**123censor321**","censor");
$mysqli->set_charset("utf8");

$time1=date("U");
$time2=(date("Y")+543).date("m").date("d")." ".date("His");
$censor=$_GET[censor];
$pm=$_GET[pm];
$temp=$_GET[temp];
$hum=$_GET[hum];

$query="
	insert into
		censor(
			id
			,time1
			,time2
			,censor
			,pm
			,temp
			,hum
		)
		values(
			''
			,'$time1'
			,'$time2'
			,'$censor'
			,'$pm'
			,'$temp'
			,'$hum'
		)
";
$mysqli->query($query);
$mysqli->close();
?>