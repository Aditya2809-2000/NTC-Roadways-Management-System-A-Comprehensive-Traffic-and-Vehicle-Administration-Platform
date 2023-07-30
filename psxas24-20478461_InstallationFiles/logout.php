<?php
include('config.php');
 session_start();

   $sql = "INSERT INTO audit(session_name, Time_stamp, action) VALUES ( '".$_SESSION['username']."','".$currentDateTime."','logged out');";
	$run = mysqli_query($connection, $sql);
   
   if(session_destroy()) {
      header("Location: user_page.html");
   }
?>