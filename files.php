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
		<link type="text/css" rel="stylesheet" href="./resources/stylesheets/style-files.css"></link>
		<link rel="stylesheet" href="./resources/stylesheets/navbar_style.css"></link>
		<script type="text/javascript" src="./resources/javascript/navbar_script.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.min.js"></script>
		<script src="./resources/javascript/script-files.js"></script>
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
		 <a href="#default" class="title">File Manager</a>
		</div>
	</header>

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
				// $bucketName = "test3928103";
			#	$bucketName = "cloud-site-325604.appspot.com";
			#	$directoryPrefix = 'myDirectory/';

				$storage->list_objects();
			?>
		
    	</tbody>
        </table>
    </div>

	</body>
</html>