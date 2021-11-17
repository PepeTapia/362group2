<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Contact Us</title>
      <link type="text/css" rel="stylesheet" href="./resources/stylesheets/contactus.css"/>
      <link rel="stylesheet" href="./resources/stylesheets/navbar_style.css"></link>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
   <div id="mySidenav" class="sidenav">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
		<img src="./resources/images/DSA-campaign-white.png" style="max-width: 50%; max-height: 50%; margin-left: auto; margin-right: auto; display: block;"/>
		<a href="home.php">Home</a>
		<a href="files.php">Files</a>
		<a href="trash.php">Rubbish</a>
		<a href="#">Contact</a>
		<a id="loginout-link" href="intro.php">Logout</a>
	</div>


    <div class="container">
        <div class="text">Contact Us</div>
        <form action="mailto:raispuro@csu.fullerton.edu"
        method="POST"
        enctype="multipart/form-data"> 
           <div class="form-row">
              <div class="input-data">
                 <input type="text" required>
                 <div class="underline"></div>
                 <label for="">First Name</label>
              </div>
              <div class="input-data">
                 <input type="text" required>
                 <div class="underline"></div>
                 <label for="">Last Name</label>
              </div>
           </div>
           <div class="form-row">
              <div class="input-data">
                 <input type="text" required>
                 <div class="underline"></div>
                 <label for="">Email Address</label>
              </div>
              <!-- <div class="input-data">
                 <input type="text" required>
                 <div class="underline"></div>
                 <label for="">Website Name</label>
              </div> -->
           </div>
           <div class="form-row">
              <div class="input-data textarea">
                 <textarea rows="8" cols="80" required></textarea>
                 <br />
                 <div class="underline"></div>
                 <label for="">Write your message</label>
                 <br />
                 <div class="form-row submit-btn">
                    <div class="input-data">
                       <div class="inner"></div>
                       <input type="submit" value="submit">
                    </div>
                 </div>
              </div>
           </div>
        </form>
     </div>
   </body>
</html>