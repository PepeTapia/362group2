<?php
   include_once '../includes/connection.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Rubbish</title>
		<link rel="stylesheet" href="style-trash.css"></link>
		<link rel="stylesheet" href="../Resources/NavBar/navbar_style.css"></link>
		<script src="../Resources/NavBar/navbar_script.js"></script>
		<script src="https://www.gstatic.com/charts/loader.js"></script>
		<script src="script-trash.js"></script>
	</head>

	<body>
	<!-- Navbar -->
	<div id="mySidenav" class="sidenav">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<img src="../Resources/images/DSA-campaign-white.png" style="max-width: 50%; max-height: 50%; margin-left: auto; margin-right: auto; display: block;"/>
		<a href="/Home/home.php">Home</a>
		<a href="/Files/files.php">Files</a>
		<a href="/Trash/trash.php">Rubbish</a>
		<a href="#">Contact</a>
		<a id="loginout-link" href="#">Logout</a>
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