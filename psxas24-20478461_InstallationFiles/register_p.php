<?php
@include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $username = mysqli_real_escape_string($connection, $_POST['username']);
   $password = ($_POST['password']);
   $confirmpassword = ($_POST['confirmpassword']);

   $errorMessage = ""; 
    $successMessage  = "";

   $select = " SELECT * FROM police WHERE username = '$username' && password = '$password' ";

   $result = mysqli_query($connection, $select);

   if(mysqli_num_rows($result) > 0){

     $errorMessage = "user already present"; 
     

   }else{

      if($password != $confirmpassword){
       $errorMessage = "password not matched"; 
      }else{
         $insert = "INSERT INTO police (username, password) VALUES('$username','$password')";
         mysqli_query($connection, $insert);
           $successMessage  = "Registered successfully";
           $sql = "INSERT INTO audit(session_name, Time_stamp, action) VALUES ( '".$_SESSION['username']."','".$currentDateTime."','New Police Added');";
		$run = mysqli_query($connection, $sql);
        
         header('location:home_p.php');
      }
   }

};


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add In Information by the Police</title>

    
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<center><h3>Nottingham Transport Council</h3></center>

    <div class="form-container">

        <form action="" method="post">
            <h3>Add Police Officer</h3>
            <?php
		if ( !empty($errorMessage)) {
			echo "
			<div class = 'alert alert-warning alert-dismissible fade show' role='alert'>
			<strong>$errorMessage</strong>
			<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'</button>
			</div>
			";
		}
        ?>
            <input type="text" name="username" required placeholder="enter username of the Police:">
            <input type="text" name="password" required placeholder="enter password" />
            <input type="text" name="confirmpassword" required placeholder="enter password again" />
        <?php
			if ( !empty($successMessage)) {
				echo "
				<div class='row mb-3'>
				<div class='offset-sm-3 col-sm-6'>
					<div class='alert alert-success alert-dismissible fade show' role='alert'>
					<strong>$successMessage</strong>
					<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'</button>
					</div>
				</div>
				";

			}
			?>
            </select>
            <input type="submit" name="submit" value="Register the Police Officer Now" class="form-btn">
            <a class="form-btn" href="home_p.php" role="button">Back</a>

        </form>

    </div>

</body>
<footer>
    <div class="row">
        <center>Databases Copyright © 2022 NTC - All rights reserved || Designed By: Aditya Sasmal</center>
    </div>
</footer>
</html>