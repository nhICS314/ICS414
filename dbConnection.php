<?php
include_once('myTimerConfig.php');
$sqlUser = constant("sqlUser");
$sqlHost = constant("sqlHost");
$sqlDatabase = constant("sqlDatabase");
$sqlPass = constant("sqlPass");

$conn = mysql_connect($sqlHost, $sqlUser, $sqlPass) or die("Couldn't connect to MySQL server on $sqlHost: " . mysql_error() . '.');

$db = mysql_select_db($sqlDatabase, $conn) or die("Couldn't select database $sqlDatabase: " . mysql_error() . '.');
?>