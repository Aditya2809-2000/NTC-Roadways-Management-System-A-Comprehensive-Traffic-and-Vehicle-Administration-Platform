 <?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $username = mysqli_real_escape_string($connection, $_POST['username']);
   $password = ($_POST['password']);
   $newpassword = ($_POST['newpassword']);
   $confirmnewpassword = ($_POST['confirmnewpassword']);

   $select = " SELECT * FROM admin WHERE username = '$username' && password = '$password' ";

   $result = mysqli_query($connection, $select);
   
   
   if(mysqli_num_rows($result)<1){
    header("Location: changepasswordpolice.php?$=Old Password is required");
	  exit();
   }
   else if($newpassword != $confirmnewpassword){
         header("Location: changepasswordpolice.php?error= Password does not matched");
	  exit();

      }else{
         $update = "UPDATE admin SET password='$newpassword' where username='$username'";
         mysqli_query($connection, $update);
         $error[] = 'record updated!';
       
         header('location:user_page.html');
         $sql = "INSERT INTO audit(session_name, Time_stamp, action) VALUES ( '".$_SESSION['username']."','".$currentDateTime."','Password Changed');";
		$run = mysqli_query($connection, $sql);
         
      }

};


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<div class="form-container">

    <form action="changepasswordpolice.php" method="post">
        <h3>Change Police Password <span><?php echo $_SESSION['username']; ?></span></h3>
        <input type="text" name="username" required placeholder="enter username:">
        <input type="password" name="password" required placeholder="enter password:">
        <input type="password" name="newpassword" required placeholder="enter new password:">
        <input type="password" name="confirmnewpassword" required placeholder="enter password again:">
        <input type="submit" name="submit" value="Change Password" class="form-btn">
        <a class="btn btn-primary" href="home_p.php" role="button">Back</a>
        <a class="btn btn-primary" href="user_page.html" role="button">Redirect</a>
    </form>

</div>

</body>
</html>