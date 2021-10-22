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
	<body>
	<!-- Navbar -->
	<div id="mySidenav" class="sidenav">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<img src="./resources/images/DSA-campaign-white.png" style="max-width: 50%; max-height: 50%; margin-left: auto; margin-right: auto; display: block;"/>
		<a href="home.php">Home</a>
		<a href="files.php">Files</a>
		<a href="trash.php">Rubbish</a>
		<a href="#">Contact</a>
		<a id="loginout-link" href="login.php">Logout</a>
	</div>
	<header>
		<!-- all the content relevant to the header is contained in this div -->
		<div class="header">
		<span style="font-size: 30px; cursor: pointer; float: left;" onclick="openNav()">&#9776;</span>
		 <a href="home.php" class="title">Welcome (username placeholder)!</a>
		</div>
		
		<!-- button to select and upload file -->
		<div class = "upload_button">
			<form action="home.php" method="post" enctype="multipart/form-data">
			<p>Select file to upload:</p>
			<input type="file" name="file" class="btn">
			<input type="submit" value="Upload" name="submit" class="btn">
			</form>
		</div>
		<!-- file uploading functionality -->
		<?php 
		#	$bucket = "titanbin.appspot.com";
			$bucket = "titanbin_files";
			$storage = new googleStorage();

			if(isset($_POST['submit'])){
				$storage->upload_object($bucket, $_FILES['file']['name'], $_FILES['file']['tmp_name']);
			}
		?>
	</header>
	</body>
</html>