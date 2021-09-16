<?php
$dbServername = "db";
$dbUsername = "root";
$dbPassword = "password";
$dbName = "login_sample";
$con = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if (!$con){
	die("Connection failed: " . mysqli_connect_error());
}
?>
