<!-- <!DOCTYPE html>
<html>
<head>
	<title>TOUR MANAGEMENT</title>
	<link rel="stylesheet" type="text/css" href="frontpage.css">
</head>
<body>
	<h1>FREEDOM TO LIVE YOURSELF</h1>
	<div class="animate">
	      <form>
	      	<button class="sign-up-button" formaction="signup.html">SIGN UP</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<button class="login-button" formaction="login.html">LOGIN </button> 
		</form>
	</div>
</body>
</html>
 -->

 <!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>TOUR MANAGEMENT</title>
	<link rel="stylesheet" type="text/css" href="frontpage.css">
</head>
<body>
	<h1>FREEDOM TO ENJOY YOURSELF</h1>
	<div class="animate">
	      <form method="post">
	      	<button class="sign-up-button" type="submit" name="submit1" >SIGN UP</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<button class="login-button" type="submit" name="submit" >LOGIN </button> 
			</form>
			<?php
  // Check if the form was submitted
  if(isset($_POST['submit1'])){
    // Redirect to page2.html
    header("Location: signup.php");
    exit(); // Ensure that no other code is executed
  }
  ?>
  	<?php
  // Check if the form was submitted
  if(isset($_POST['submit'])){
    // Redirect to page2.html
    header("Location: login.php");
    exit(); // Ensure that no other code is executed
  }
  ?>
		
	</div>
	<div id="footer">
    &copy; All rights reserved
    </div>
	
</body>
</html>
