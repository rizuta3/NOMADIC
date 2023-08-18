<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $message=$_POST['message'];
        // $desc = $_POST['desc'];
    // $exists=false;

    $server = "localhost";
$username = "root";
$password = "";
$database = "querywebsite";

$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn){
//     echo "success";
// }
// else{
    die("Error". mysqli_connect_error());
}

    // Check whether this username exists
    // $existSql = "SELECT * FROM `query` WHERE FirstName = '$firstname'";
    // $result = mysqli_query($conn, $existSql);
    // $numExistRows = mysqli_num_rows($result);
    // if($numExistRows > 0){
    //     // $exists = true;
    //     $showError = "Username Already Exists";
    // }
    else{
    //     // $exists = false; 
            
            $sql ="INSERT INTO `query` (`FirstName`,`LastName`, `Email`, `Message`) VALUES ('$firstname','$lastname', '$email', '$message');";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo '<div class="alert alert-success alert-dismissible fade show"
                    role="alert">
                    <strong>Success!</strong> Your entry has been submitted
                    successfully!
                    <button type="button" class="close" data-dismiss="alert"
                        aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>';
                }
                else {
                echo '<div class="alert alert-danger alert-dismissible fade show"
                    role="alert">
                    <strong>Error!</strong>Our severs are facing some issues and your
                    entry was not submitted successfully!
                    We regret the inconvenience caused.
                    <button type="button" class="close" data-dismiss="alert"
                        aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>';
                }
    }
}

    
?>


<!DOCTYPE html>
<html>
<head>
  <title>Contact us </title>
  <link rel="stylesheet" type="text/css" href="contact.css">
</head>
<body>
<div class="container">
    <form method="post">
	<h3>Contact Form</h3>
	<form action="#" name="contact_form">
		<label for="firstname">First Name</label>
		<input name="firstname" id="firstname" type="text" required>
		<br>
		<label for="lastname">Last Name</label>
		<input name="lastname" id="lastname" type="text" required>
		<br>
		<label for="email">Email</label>
		<input name="email"  id="email" type="email" required>
		<br>
		<textarea id="message" name="message" row="10" cols="50">Message</textarea><br>
		<div class="center">
        <button type="submit" value="Sign Up">signup</button><br>
		</div>
	</form>	
</form>
</div>
</body>
</html>