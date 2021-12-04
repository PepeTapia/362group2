<?
if (!isset($_SESSION)){
	session_start();
}
include "session.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Rubbish</title>
		<link type="text/css" rel="stylesheet" href="./resources/stylesheets/style-trash.css"></link>
		<link rel="stylesheet" href="./resources/stylesheets/navbar_style.css"></link>
		<script type="text/javascript" src="./resources/javascript/navbar_script.js"></script>
	</head>

	<body>
	<!-- Navbar -->
	<div id="mySidenav" class="sidenav">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<img src="./resources/images/DSA-campaign-white.png" style="max-width: 50%; max-height: 50%; margin-left: auto; margin-right: auto; display: block;"/>
		<a href="home.php">Home</a>
		<a href="files.php">Files</a>
		<a href="trash.php">Rubbish</a>
		<a id="loginout-link" href="intro.php">Logout</a>

	</div>
	<header>
		<!-- all the content relevant to the header is contained in this div -->
		<div class="header">
		<span style="font-size: 30px; cursor: pointer; float: left;" onclick="openNav()">&#9776;</span>
		 <a href="#default" class="title">My Rubbish Bin</a>
		</div>

	</header>
	</body>
</html>
