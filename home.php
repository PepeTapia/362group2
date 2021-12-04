<?php
if (!isset($_SESSION)){
	session_start();
}
include "session.php";

$link = "";
$link_status ="display: none;";

if(isset($_POST['submit'])){
	$storage->upload_object($_FILES['file']['name'], $_FILES['file']['tmp_name']);
	$link_status = "display: block;";
	$link = $storage->getUrl($_FILES['file']['name']);
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
		<a id="loginout-link" href="logout.php">Logout</a>
	</div>
	<header>
		<!-- all the content relevant to the header is contained in this div -->
		<div class="header">
		<span style="font-size: 30px; cursor: pointer; float: left;" onclick="openNav()">&#9776;</span>
		 <a href="home.php" class="title">Welcome <?php echo $username; ?>!</a>
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
				<div class="image-preview" id="imagePreview">
					<img src = "" alt="Image Preview" class="image-preview__image">
					<span class="image-preview__deault-text"><!--Image Preview--></span>
				</div>
			</div>
		</div>
	</header>

	<script>
		const upload = document.getElementById("upload");
		const previewContainer = document.getElementById("imagePreview");
		const previewImage = previewContainer.querySelector(".image-preview__image");
		const previewDefaultText = previewContainer.querySelector(".image-preview__default-text");

		upload.addEventListener("change", function(){
			const file = this.files[0];

			if (file) {
				const reader = new FileReader();

				// previewDefaultText.style.display = "none";
				previewImage.style.display = "block";

				reader.addEventListener("load", function() {
					console.log(this);
					previewImage.setAttribute("src", this.result);
				});
				reader.readAsDataURL(file);
			}

		});

	</script>
	</body>
</html>
