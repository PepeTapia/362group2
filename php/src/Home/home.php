<?php
   include_once '../includes/connection.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Home</title>
		<link rel="stylesheet" href="style-home.css"></link>
		<link rel="stylesheet" href="../Resources/NavBar/navbar_style.css"></link>
		<script src="../Resources/NavBar/navbar_script.js"></script>
		<script src="https://www.gstatic.com/charts/loader.js"></script>
		<script src="script-home.js"></script>
	</head>
	<!-- <body onload="getLogsStatus();"> -->
	<body>
	<!-- Navbar -->
	<div id="mySidenav" class="sidenav">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<img src="../Resources/images/DSA-campaign-white.png" style="max-width: 50%; max-height: 50%; margin-left: auto; margin-right: auto; display: block;"/>
		<a href="/Home/home.html">Home</a>
		<a href="/Create/create.html">Create</a>
		<a href="/Compare/compare.html">Compare</a>
		<a href="#">Contact</a>
		<a id="loginout-link" href="#">Logout</a>
	</div>
	<header>
		<!-- all the content relevant to the header is contained in this div -->
		<div class="header">
		<span style="font-size: 30px; cursor: pointer; float: left;" onclick="openNav()">&#9776;</span>
		 <a href="#default" class="title">Welcome!</a>
		</div>
		
		<!-- button to select and upload file -->
		<form action="home.php" method="post" enctype="multipart/form-data">
		Select file to upload:
		<input type="file" name="file">
		<input type="submit" value="Upload" name="submit">
		</form>
	  
		<!-- file uploading functionality -->
		<?php 
		$fileDir = "../uploads/";

		if (isset($_POST['submit'])) {
			$file = $_FILES['file'];
			$fileName = $_FILES['file']['name'];
			$fileSize = $_FILES['file']['size'];
			$fileType = $_FILES['file']['type'];
			$fileTmpName = $_FILES['file']['tmp_name'];
			$fileError = $_FILES['file']['error'];
			$fileNameSplit = explode('.', $fileName);
			$fileExt = strtolower(end($fileNameSplit));

			if($fileError === 0){
				$fileIDName = uniqid('', true) . "." . $fileExt;
				$fileLoc = $fileDir . $fileIDName;
				move_uploaded_file($fileTmpName, $fileLoc);
				echo "Upload success!";
			}
			else if ($fileError === 1){
				echo "File is too large. Max is 5MB.";
			}
			else{
				echo "File Error.";
			}
		}
		?>
	</header>
	</body>
</html>