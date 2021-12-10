<?php

  if (!isset($_SESSION)){
    session_start();
  }

	include "./login/connection.php";
	include "./login/functions.php";

  if(isset($_POST['login-submit'])) {
		//something was posted
		$user_name = $_POST['login-user_name'];
		$password = $_POST['login-password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

			//read from database
      $query = $con->prepare("select * from users where user_name = ? limit 1");
      $query->bind_param('s', $user_name);
      $query->execute();
      $result = $query->get_result();

			if($result && mysqli_num_rows($result) > 0) {
				$user_data = mysqli_fetch_assoc($result);
				
				if($user_data['password'] === $password) {

					$_SESSION['user_id'] = $user_data['user_id'];
			
					echo "<script> window.location.href='home.php'; </script>";
				}
			}
		}
		echo "wrong username or password!";
	}

	if(isset($_POST['sign-submit'])) {
		//something was posted
		$user_name = $_POST['sign-user_name'];
		$password = $_POST['sign-password'];

		if(!empty($user_name) && !empty($password) && !is_numeric($user_name)) {

			//save to database
			$user_id = random_num(20);
      $query = $con->prepare("insert into users (user_id,user_name,password) values (?,?,?)");
      $query->bind_param("sss", $user_id, $user_name, $password);
      $query->execute();

			echo "<script> location.href='intro.php'; </script>"; 
    }
		echo "Please enter some valid information!";
	}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <title>TitanBin</title>
  <link href="https://fonts.googleapis.com/css?family=Montserrat|Ubuntu" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="./resources/stylesheets/styles.css">
  <link rel="stylesheet" href="./resources/stylesheets/styles-intro.css">
  <!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@1,300&display=swap" rel="stylesheet">


  <script src="https://kit.fontawesome.com/96cbf68b40.js" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>

  
</head>
<body>
  <!-- Nav Bar -->
  <nav class="shadow navbar navbar-expand-lg navbar-dark navbar-custom">
    <a class="navbar-brand" href="">TitanBin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link nav-link-custom" href="">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">Link 2</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#exampleModal" data-bs-toggle="modal" data-bs-target="#exampleModal">Contact Us</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- End of Navbar -->

  <div class="background-pic"></div>

  <!-- Login/signup form -->
  <br>
<br>
    <div class="cont">
        <div class="form sign-in">
            <h2>Welcome</h2>
            <form method="post">
              <label>
                  <span>Username</span>
                  <input id="text" type="text" name="login-user_name"/>
              </label>
              <label>
                  <span>Password</span>
                  <input id="text" type="password" name="login-password"/>
              </label>
              <p class="forgot-pass">Forgot password?</p>
              <button type="submit" class="submit" name="login-submit">Sign In</button>
            </form>
         
        </div>
        <div class="sub-cont">
            <div class="img">
                <div class="img__text m--up">
                 
                    <h3>Don't have an account? Sign up!<h3>
                </div>
                <div class="img__text m--in">
                
                    <h3>If you already has an account, just sign in.<h3>
                </div>
                <div class="img__btn">
                    <span class="m--up">Sign Up</span>
                    <span class="m--in">Sign In</span>
                </div>
            </div>
            <div class="form sign-up">
                <h2>Create your Account</h2>
                <form method="post">
                  <label>
                      <span>Name</span>
                      <input type="text" />
                  </label>
                  <label>
                      <span>Username</span>
                      <input type="text" name="sign-user_name"/>
                  </label>
                  <label>
                      <span>Password</span>
                      <input type="password" name="sign-password"/> 
                  </label>
                  <button type="submit" class="submit" name="sign-submit">Sign Up</button>
                </form>
                
            </div>
        </div>
    </div>

    <script>
        document.querySelector('.img__btn').addEventListener('click', function() {
            document.querySelector('.cont').classList.toggle('s--signup');
        });
    </script>
  <!-- end of login/signup form -->

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
            <input type="text" name="name" id="name" class="form-control" placeholder="contact-name" value="" required/>
          </div>
          <div class="form-group">
            <label for="email">Your email:</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="contact-email" value="" required/>
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
  <!-- End of modal contact us -->


  <!-- Background image -->
  <!-- <div class="background-pic"></div> -->
  <!-- end of Background image -->

  <!--features-->
  <!-- <section id="features">
    <div class="container-fluid">
      <div class="row">
        <div class="feature-box col-lg-4">
          <i class="icon fas fa-cloud-upload-alt fa-4x"></i>
          <h3>Easy to use.</h3>
          <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor inc .</p>
        </div>
        <div class="feature-box col-lg-4">
          <i class="icon fas fa-hdd fa-4x"></i>
          <h3>Secure Servers</h3>
          <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididuntullamco laboris
          </p>
        </div>
        <div class="feature-box col-lg-4">
          <i class="icon fas fa-share-square fa-4x"></i>
          <h3>Easy to share.</h3>
          <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et do
        </div>
      </div>

      
  </section> -->
  <!-- End of features -->

<section id="intro">
  <h2>Hello There,</h2>
  <h1>Welcome To TitanBin</h1>
  <p>At TitanBin We want to provide a easy to use, easy to share, and secure service for our users</p>
</section>

<section id="bottomdivs">
  <div class="row">
    <div class="col">
      <i class="icon fa fa-desktop fa-3x" aria-hidden="true"></i>
      <h2>Titanbin is easy to use</h2>
      <p>Just drag and drop from your files and you're ready to upload</p>
    </div>
    <div class="col-4"></div>
    <div class="col">
      <i class="icon fa fa-share-square fa-3x" aria-hidden="true"></i>
      <h2>Easy to share</h2>
      <p>Two easy clicks and you'll be able to share all your files with friends and family </p>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <i class="icon fa fa-lock fa-3x" aria-hidden="true"></i>
      <h2>TitanBin is Secure</h2>
      <p>TitanBin uses Google's State Of The Art Service that has multiple layers of securities for its users</p>
    </div>
      <div class="col-4 div-image">
    </div>
    <div class="col">
      <i class="icon fa fa-phone-square fa-3x" aria-hidden="true"></i>

      <h2>Customer Support is just around the corner</h2>
      <p>At TitanBin we make customer support one of our top priorities, someone is always ready to help</p>
    </div>
  </div>
</section>






  <!-- <div class="footer-basic">
    <footer>
        <div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i class="icon ion-social-snapchat"></i></a><a href="#"><i class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a></div>
        <ul class="list-inline">
            <li class="list-inline-item"><a href="#">Home</a></li>
            <li class="list-inline-item"><a href="#">Services</a></li>
            <li class="list-inline-item"><a href="#">About</a></li>
            <li class="list-inline-item"><a href="#">Terms</a></li>
            <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
        </ul>
        <p class="copyright">Company Name Â© 2018</p>
    </footer> -->
</div>

</body>


</html>