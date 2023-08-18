<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $fullname = $_POST['fullname'];
        // $desc = $_POST['desc'];
        $email=$_POST['email'];
        $phonenumber=$_POST['phonenumber'];
        $address=$_POST['address'];
        $date=$_POST['date'];
        $fpassword=$_POST['fpassword'];
    // $exists=false;

    $server = "localhost";
$username = "root";
$password = "";
$database = "rizuta";

$conn = mysqli_connect($server, $username, $password, $database);
if (!$conn){
//     echo "success";
// }
// else{
    die("Error". mysqli_connect_error());
}

    // Check whether this username exists
    $existSql = "SELECT * FROM `signup` WHERE FullName = '$fullname'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if($numExistRows > 0){
        // $exists = true;
        $showError = "Username Already Exists";
    }
    else{
        // $exists = false; 
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql ="INSERT INTO `signup` (`FullName`, `Email`, `Phone Number`, `Address`, `Date Of Birth`, `Password`) VALUES ('$fullname', '$email', '$phonenumber', '$address', '$date', '$fpassword');";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                
                header("location:home.php");
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

<!doctype html>
<html lang="en">
  <head>
  <title>Family Tour Sign Up</title>
        <link rel="stylesheet" type="text/css" href="signup.css">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>SignUp</title>
  </head>
  <body style="background-image:url('loginimage.jpeg');">
    
    <?php
    if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your account is now created and you can login
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> ';
    }
    ?>

<div class="container" style="border:1px solid black; background-color:#E5D1FA;" >
            <form method="post">
                <h2 style="text-decoration: underline;">SIGN UP</h2><br>
                <label for="name">Full Name:</label>
                <input type="text" id="fullname" name="fullname" style="border:1px solid black;" required>

                <label for="email">Email:</label>
                <input type="text" id="email" name="email" style="border:1px solid black;" required>

                <label for="number">Phone Number:</label>
                <input type="number" id="number" name="number" style="border:1px solid black;"required><br>

                Address:<textarea id="address" name="address" row="10" cols="100" style="border:1px solid black;"></textarea><br>
                
                <label for="date">Date Of Birth:</label>
                <input type="date" id="date" name="date"  style="border:1px solid black;" required><br>
                <!-- <label for="password">Password:</label>
                <input type="password" id="password" name="password" required> -->
                <!-- <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" -->
                    <!-- name="confirm_password" required> -->
                    
                Password:<input type="password"  id="fpassword" name="fpassword" style="border:1px solid black;" required>
                
                <button type="submit" value="Sign Up" style="background-color: #007a96;;
	color: #fff;
	padding: 15px;
	border: none;
	border-radius: 3px;
	box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
	cursor: pointer;">Sign Up</button><br>

                <p>Already have an account? <a href="login.php">LOGIN HERE </a></p>
            </form>
        </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>