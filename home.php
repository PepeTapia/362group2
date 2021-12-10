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
	<link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu" rel="stylesheet">

	<link type="text/css" rel="stylesheet" href="./resources/stylesheets/style-home.css">
	</link>
	<link rel="stylesheet" href="./resources/stylesheets/styles.css">
	</link>
	<script type="text/javascript" src="./resources/javascript/navbar_script.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript" src="./resources/javascript/script-home.js"></script>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link type="text/css" rel="stylesheet"
		href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="./resources/stylesheets/style-upload.css">
	<!-- Font Awesome -->
	<script src="https://kit.fontawesome.com/96cbf68b40.js" crossorigin="anonymous"></script>
	<!-- BootStrap 5 -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
	</script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">


</head>

<body style="background-color: #4F6072;">
	<!-- Nav Bar -->
	<nav class="shadow navbar navbar-expand-lg navbar-dark navbar-custom">
		<button class="btn float-end" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" role="button">
			<i class="fas fa-bars fa-1x" data-bs-toggle="offcanvas" data-bs-target="#offcanvas"></i>
		</button>
		<a class="navbar-brand" href="">TitanBin</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav ms-auto">
				<li class="nav-item">
					<a class="nav-link" href="home.php">User page</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#exampleModal" data-bs-toggle="modal"
						data-bs-target="#exampleModal">Contact Us</a>
				</li>
			</ul>
		</div>
	</nav>
	<!-- Nav Bar -->
	<!-- sidenav -->
	<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvas" data-bs-keyboard="false"
		data-bs-backdrop="false">
		<div class="offcanvas-header">
			<h2 class="offcanvas-title d-none d-sm-block" id="offcanvas">Welcome <?php echo $username; ?>!</h2>
			<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
		</div>
		<div class="offcanvas-body px-0">
			<ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-start" id="menu">
				<li>
					<a href="home.php" class="nav-link text-truncate">
						<i class="fas fa-home fa-2x"></i><span class="ms-1 d-none d-sm-inline span-sidenav">Home</span>
					</a>
				</li>
				<li>
					<a href="files.php" class="nav-link text-truncate">
						<i class="fas fa-folder fa-2x"></i><span
							class="ms-1 d-none d-sm-inline span-sidenav">Files</span> </a>
				</li>
				<li>
					<a href="trash.php" class="nav-link text-truncate">
						<i class="fa fa-trash fa-2x" aria-hidden="true"></i></i><span
							class="ms-1 d-none d-sm-inline span-sidenav">Rubbish</span></a>
				</li>
				<li>
					<a href="logout.php" class="nav-link text-truncate" id="loginout-link">
						<i class="fas fa-sign-out-alt fa-2x"></i><span
							class="ms-1 d-none d-sm-inline span-sidenav">Logout</span></a>
				</li>
			</ul>
		</div>
	</div>
	<!-- <div class="container-fluid">
		<div class="row">
			<div class="col min-vh-100 p-4">

			</div>
		</div>
	</div> -->
	<!-- end of sidenav -->
	<!-- Modal Contact us -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Contact Us</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<p class="lead">Please get in touch!</p>
					<form method="post" id="myForm">
						<div class="form-group">
							<label for="name">Your name:</label>
							<input type="text" name="name" id="name" class="form-control" placeholder="contact-name"
								value="" required />
						</div>
						<div class="form-group">
							<label for="email">Your email:</label>
							<input type="email" name="email" id="email" class="form-control" placeholder="contact-email"
								value="" required />
						</div>
						<div class="form-group">
							<label for="comment">Your comment:</label>
							<textarea class="form-control" id="comment" name="comment" required></textarea>
						</div>
						<input type="submit" name="contact-submit" class="btn btn-success btn-md " value="submit">
					</form>
				</div>
				<div class="modal-footer">
					<!--<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>-->
				</div>
			</div>
		</div>
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
			<button name="submit" class="button">Upload</button>
		</form>
		<div class="image-preview" id="imagePreview">
			<img src = "" alt="Image Preview" class="image-preview__image">
			<span class="image-preview__deault-text"><!--Image Preview--></span>
		</div>
	</div>

	<script>
		const upload = document.getElementById("upload");
		const previewContainer = document.getElementById("imagePreview");
		const previewImage = previewContainer.querySelector(".image-preview__image");
		const previewDefaultText = previewContainer.querySelector(".image-preview__default-text");

		upload.addEventListener("change", function () {
			const file = this.files[0];

			if (file) {
				const reader = new FileReader();

				// previewDefaultText.style.display = "none";
				previewImage.style.display = "block";

				reader.addEventListener("load", function () {
					console.log(this);
					previewImage.setAttribute("src", this.result);
				});
				reader.readAsDataURL(file);
			}

		});
	</script>
</body>

</html>