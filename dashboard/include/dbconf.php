<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'ddr');
define('DB_PASSWORD', '**123ddr321**');
define('DB_DATABASE', 'ddr');

$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die (mysql_error());
$connection->set_charset('utf8');
?>
