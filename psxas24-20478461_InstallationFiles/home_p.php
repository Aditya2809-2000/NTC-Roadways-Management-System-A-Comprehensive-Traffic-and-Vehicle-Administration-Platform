<?php
   include('config.php');
   session_start();
 
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
    <center><h3>Nottingham Transport Council</h3></center>
      <!-- Referenced Step by Step Youtube  -->
    <div class="topnav">
        <a class="active" href="home_p.php">Home</a>
        <a href="showincident.php">Incidents</a>
        <a href="showoffence.php">Offence</a>
        <a href="vowners.php">Vehicle Owners</a>
        <a href="showpeople.php">People</a>
        <a href="showvehicle.php">Vehicle</a>
          <?php
        if ($_SESSION ['username'] == 'daniels'){
                  
         ?>
        <a href="police.php">Police Data</a>
         <?php }?>
        <a href="changepasswordpolice.php">Police Password</a>
        <?php
        if ($_SESSION ['username'] == 'daniels'){
                  
         ?>
        <a href="changepasswordadmin.php">Admin Password</a>
         <a href="showfine.php">Fine</a>
         <a href="audit.php">Log Access</a>
         <?php }?>
        
    </div>
    
    
    <div class="form-container">

        <form action="" method="post">
            <div class="container">
                <div class="content">
                    <h3>Hello: <span><?php echo $_SESSION['username']; ?></span></h3>
                    <a href="register_p.php" class="btn">Add Police Officer</a><br><br>
                    <a href="addincident.php" class="btn">Record Incident</a><br><br>
                    <a href="addoffence.php" class="btn">Record Offence</a><br><br>
                 
                    <a href="addvehicleowners.php" class="btn">Add Vehicle Ownership</a><br><br>
                    <a href="addpeople.php" class="btn">Person Registration</a><br><br>
                    <a href="create_vehicle.php" class="btn">Vehicle Registration</a><br><br><br>
                    <?php
                    if ($_SESSION ['username'] == 'daniels'){
                  
                    ?>
                    <a href="Fine.php" class="btn">Record Fine</a><br><br>
                    <?php }?>
                    <a href="logout.php" class="back">logout</a><br>
                </div>
            </div>
        </form>
    </div>
</body>

<footer>
    <div class="row">
        <center>Databases Copyright © 2022 NTC - All rights reserved || Designed By: Aditya Sasmal</center>
    </div>
</footer>
</html>

