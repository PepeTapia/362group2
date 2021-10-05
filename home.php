<?php

require './vendor/autoload.php';

use Google\Cloud\Storage\StorageClient;

class googleStorage{
	private $projectId;
	private $storage;
	public function __construct(){
	#	$this->projectId = 'titanbin';
		$this->projectId = 'nifty-pursuit-326703';
	#	$this->serviceAccPath = 'keyfile2.json';
		$this->serviceAccPath = 'keyfile.json';
		$this->storage = new StorageClient([
			'keyFilePath' => $this->serviceAccPath,
			'projectId' => $this->projectId
		]);
		$this->storage->registerStreamWrapper();
	}
	function upload_object($bucketName, $objectName, $source){
		$file = fopen($source, 'r');
		$bucket = $this->storage->bucket($bucketName);
		$object = $bucket->upload($file, [
			'name' => $objectName
		]);
		printf('Uploaded %s to gs://%s/%s' . PHP_EOL, $objectName, $bucketName, $objectName);
		#echo "Upload success!";
	}
}


?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Home</title>
		<link type="text/css" rel="stylesheet" href="./resources/stylesheets/style-home.css"></link>
		<link rel="stylesheet" href="./resources/stylesheets/navbar_style.css"></link>
		<script type="text/javascript" src="./resources/javascript/navbar_script.js"></script>
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript" src="./resources/javascript/script-home.js"></script>
	</head>
	<!-- <body onload="getLogsStatus();"> -->
	<body>
	<!-- Navbar -->
	<div id="mySidenav" class="sidenav">
	<!--	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a> -->
		<a class="closebtn" onclick="closeNav()">&times;</a>
		<img src="./resources/images/DSA-campaign-white.png" style="max-width: 50%; max-height: 50%; margin-left: auto; margin-right: auto; display: block;"/>
		<!--
		<a href="/home.html">Home</a>
		<a href="/Create/create.html">Create</a>
		<a href="/Compare/compare.html">Compare</a>
		<a href="#">Contact</a>
		-->
		<a id="loginout-link" href="intro.php">Logout</a>
	</div>
	<header>
		<!-- all the content relevant to the header is contained in this div -->
		<div class="header">
		<span style="font-size: 30px; cursor: pointer; float: left;" onclick="openNav()">&#9776;</span>
		 <a href="home.php" class="title">Welcome!</a>
		</div>
		
		<!-- button to select and upload file -->
		<form action="home.php" method="post" enctype="multipart/form-data">
		Select file to upload:
		<input type="file" name="file">
		<input type="submit" value="Upload" name="submit">
		</form>
	  
		<!-- file uploading functionality -->
		<?php 
		#	$bucket = "titanbin.appspot.com";
			$bucket = "titanbin_files";
			$storage = new googleStorage();

			if(isset($_POST['submit'])){
				$storage->upload_object($bucket, $_FILES['file']['name'], $_FILES['file']['tmp_name']);
			}


		// // $fileDir = "./uploads/";
		// if (isset($_POST['submit'])) {
		// 	$file = $_FILES['file'];
		// 	$fileName = $_FILES['file']['name'];
		// 	$fileSize = $_FILES['file']['size'];
		// 	$fileType = $_FILES['file']['type'];
		// 	$fileTmpName = $_FILES['file']['tmp_name'];
		// 	$fileError = $_FILES['file']['error'];
		// 	$fileNameSplit = explode('.', $fileName);
		// 	$fileExt = strtolower(end($fileNameSplit));

		// 	if($fileError === 0){
		// 		$fileIDName = uniqid('', true);
		// 		$fileIDExt = $fileIDName . "." . $fileExt;
		// 		// $fileLoc = $fileDir . $fileIDExt;
		// 		$fileLoc = $fileIDExt;
		// 		move_uploaded_file($fileTmpName, $fileLoc);

		// 		echo "Upload success! <br>";
		// 	}
		// 	else if ($fileError === 1){
		// 		echo "File is too large. Max is 5MB.";
		// 	}
		// 	else{
		// 		echo "File Error.";
		// 	}
		// }
        
		?>
	</header>
	</body>
</html>