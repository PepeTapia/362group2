<?php
	if (!isset($_SESSION)){
		session_start();
	}

	include "session.php";

?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Your Files</title>
	<link rel="stylesheet" href="resources/stylesheets/styles.css"></link>
	<!-- <link rel="stylesheet" href="resources/stylesheets/navbar_style.css"></link> -->
	<script type="text/javascript" src="resources/javascript/navbar_script.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
	<script src="resources/javascript/script-files.js"></script>

	<!-- Font Awesome -->
	<script src="https://kit.fontawesome.com/96cbf68b40.js" crossorigin="anonymous"></script>
	<!-- BootStrap 5 -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
	</script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link type="text/css" rel="stylesheet" href="resources/stylesheets/style-files.css"></link>
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
			<h2 class="offcanvas-title d-none d-sm-block" id="offcanvas"><?php echo $username; ?>'s Files</h2>
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

	<!-- <header>
		all the content relevant to the header is contained in this div
		<div class="header">
		<span style="font-size: 30px; cursor: pointer; float: left;" onclick="openNav()">&#9776;</span>
		 <a href="files.php" class="title">File Manager</a>
		</div>
	</header> -->

	<?php define('FM_THEME', "dark"); ?>

	<?php $tableTheme = (FM_THEME == "dark") ? "text-white bg-dark table-dark" : "bg-white"; ?>
	
	<form action="" method="post" class="pt-3">

    <input type="hidden" name="group" value="1">
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-sm <?php echo $tableTheme; ?>" id="main-table">
            <thead class="thead-white">
            <tr>
                    <th style="width:3%" class="custom-checkbox-header">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="js-select-all-items" onclick="checkbox_toggle()">
                            <label class="custom-control-label" for="js-select-all-items"></label>
                        </div>
                    </th>
                <th>Name</th>
                <th>Size</th>
                <th>Modified</th>
				<th>ContentType</th>
                <th>Actions</th>
            </tr>
            </thead>
		<tbody>
			<?php 
				$storage->list_objects();
			?>
		
    	</tbody>
        </table>
    </div>

	</body>
</html>

<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

<link href='https://fonts.googleapis.com/css?family=Roboto:400,500,300,700' rel='stylesheet' type='text/css'>

<link href='https://fonts.googleapis.com/css?family=Nunito:400,700,300' rel='stylesheet' type='text/css'>