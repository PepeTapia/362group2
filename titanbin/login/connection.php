<?php

$dbUsername = getenv('CLOUD_SQL_USERNAME');
$dbPassword = getenv('CLOUD_SQL_PASSWORD');
$dbName = getenv('CLOUD_SQL_DATABASE_NAME');
$dbHost = getenv('CLOUD_SQL_HOST');
$con = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
if(!$con = mysqli_connect($dbHost,$dbUsername,$dbPassword,$dbName))
{
	die("failed to connect!");
}
?>