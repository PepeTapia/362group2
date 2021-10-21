<?php

require './vendor/autoload.php';

use Google\Cloud\Storage\StorageClient;

$link = "";
$link_status ="";

class googleStorage{
	private $projectId;
	private $storage;
	private $serviceAccPath;
	public function __construct(){
		$this->projectId = 'titanbin';
	#	$this->projectId = 'nifty-pursuit-326703';
		$this->serviceAccPath = 'keyfile2.json';
	#	$this->serviceAccPath = 'keyfile.json';
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
		$msg = 'Uploaded ' . $objectName . ' to gs://' .$bucketName;
		echo '<div class="uploadMsg">' . $msg . '</div>';
	}
	// function download_object($bucketName, $objectName, $destination){
	// 	$bucket = $this->storage->bucket($bucketName);
	// 	$object = $bucket->object($objectName);
	// 	$object->downloadToFile($destination);
	// 	printf('Downloaded gs://%s/%s to %s' . PHP_EOL, $bucketName, $objectName, basename($destination));
	// }
	// function getUrl($bucketName, $objectName){
	// 	return 'https://storage.cloud.google.com/'. $bucketName . '/' . $objectName;
	// }
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

		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<link type="text/css" rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

		<link rel="stylesheet" type="text/css" href="./resources/stylesheets/style-upload.css">

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
		<a id="loginout-link" href="intro.php">Logout</a>
	</div>
	<header>
		<!-- all the content relevant to the header is contained in this div -->
		<div class="header">
		<span style="font-size: 30px; cursor: pointer; float: left;" onclick="openNav()">&#9776;</span>
		 <a href="home.php" class="title">Welcome!</a>
		</div>
		
		<!-- button to select and upload file -->
		<!-- <div class = "upload_button">
			<form action="home.php" method="post" enctype="multipart/form-data">
			<p>Select file to upload:</p>
			<input type="file" name="file">
			<input type="submit" value="Upload" name="submit">
			</form>
		</div> -->
		<!-- file uploading functionality -->
		<div class ="file_upload_body">
			<div class="file__upload">
				<div class="header">
					<p><i class="fa fa-cloud-upload fa-2x"></i><span><span>Up</span>Load</span></p>			
				</div>
				<form action="" method="POST" enctype="multipart/form-data" class="body">
					<!-- Shareable Link Code -->
					<input type="checkbox" id="link_checkbox">
					<input type="text" value="<?php echo $link; ?>" id="link" readonly>
					<label for="link_checkbox" style="<?php echo $link_status; ?>">Get Shareable Link</label>

					<input type="file" name="file" id="upload" required>
					<label for="upload">
						<i class="fa fa-file-text-o fa-3x"></i>
						<p>
							<strong>Drag and drop</strong> files here<br>
							or <span>browse</span> to begin the upload
						</p>
					</label>
					<button name="submit" class="btn">Upload</button>
					</form>
			</div>
		</div>

		<!-- using googleStorage() class and its upload_object function, upload user file to bucket -->
		<?php 
				$bucket = "titanbin.appspot.com";
			#	$bucket = "titanbin_files";
				$storage = new googleStorage();

				if(isset($_POST['submit'])){
					$storage->upload_object($bucket, $_FILES['file']['name'], $_FILES['file']['tmp_name']);
				}
				#$url = $storage->getUrl($bucket, $_FILES['file']['name']);
		?>

	</header>
	</body>
</html>