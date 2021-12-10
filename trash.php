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
		<link type="text/css" rel="stylesheet" href="resources/stylesheets/style-trash.css"></link>
		<link rel="stylesheet" href="resources/stylesheets/styles.css"></link>
		<script type="text/javascript" src="resources/javascript/navbar_script.js"></script>
		<!-- Font Awesome -->
		<script src="https://kit.fontawesome.com/96cbf68b40.js" crossorigin="anonymous"></script>
		<!-- BootStrap 5 -->
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
		</script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
			integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
		<!-- <link rel="stylesheet" href="resources/stylesheets/style.css"> -->
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
					<a class="nav-link">Link 2</a>
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
			<h2 class="offcanvas-title d-none d-sm-block" id="offcanvas"><?php echo $username; ?>'s Trash</h2>
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
						<i class="fas fa-sign-out-alt fa-2x"></i><span class="ms-1 d-none d-sm-inline span-sidenav">Logout</span></a>
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
	</body>
</html>
