<?php
//$dt = new DateTime($utc);
//$tz = new DateTimeZone('Asia/Bangkok'); // or whatever zone you're after
//$dt->setTimezone($tz);
//$showdate = $dt->format('d/m/Y H:i:s');
//$showdate = $dt->format('Y-m-d');
$showdate = date('Y-m-d');
$showdatebefore = date('Y-m-d', strtotime(' -30 days'));

echo "วันนี้ ".$showdate."<br>";
echo "1 เดือนก่อนหน้า ".$showdatebefore."<br>";

?>