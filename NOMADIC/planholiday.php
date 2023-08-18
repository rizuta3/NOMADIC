<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $destination = $_POST['destination'];
    $date = $_POST['date'];
    $message=$_POST['message'];
        // $desc = $_POST['desc'];
    // $exists=false;

    $server = "localhost";
$username = "root";
$password = "";
$database = "planwebsite";

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
            
            $sql ="INSERT INTO `plan` (`Name`, `Email`,`Destination`,`Date`, `Message`) VALUES ('$name','$email', '$destination','$date', '$message');";
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
  <title>Tour Destination Planner</title>
  <link rel="stylesheet" type="text/css" href="planholiday.css">
</head>
<body>
  <h1>Tour Destination Planner</h1>
  <form method ="post">
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
    </div>
    <div class="form-group">
      <label for="destination">Destination:</label>
      <input type="text" id="destination" name="destination" required>
    </div>
    <div class="form-group">
      <label for="date">Date of Travel:</label>
      <input type="date" id="date" name="date" required>
    </div>
    <div class="form-group">
    <textarea id="message" name="message" row="10" cols="50">Message</textarea><br>
    </div>
    <div class="form-group">
    <button type="submit" value="Sign Up">signup</button><br>
    </div>
  </form>
</body>
</html>
