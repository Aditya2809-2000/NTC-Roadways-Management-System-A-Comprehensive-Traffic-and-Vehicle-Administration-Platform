<?php

include('config.php');
session_start();




$Vehicle_type ="";
$Vehicle_colour ="";
$Vehicle_licence ="";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$Vehicle_type = $_POST["Vehicle_type"];
	$Vehicle_colour = $_POST["Vehicle_colour"];
	$Vehicle_licence = $_POST["Vehicle_licence"];

	$errorMessage = ""; 
	$successMessage  = "";


	do {
		if  (empty($Vehicle_type) || empty($Vehicle_colour) || empty($Vehicle_licence) ){
			$errorMessage = "All fields are required";
			break;
		}

		$sql1 = "select * from Vehicle where People_licence = '$Vehicle_licence'";
		$result1 = $connection->query($sql1);

		
		 if (mysqli_num_rows($result1)>1){
			$errorMessage = "Vehicle already present";
			break;
		 }
		

		$sql = "INSERT INTO Vehicle ( Vehicle_type, Vehicle_colour, Vehicle_licence)".
			"VALUES ('$Vehicle_type', '$Vehicle_colour', '$Vehicle_licence')";
		$result = $connection->query($sql);
		
		
		if (!$result) {
			$errorMessage = "Invalid query" . $connection->error;
			break;
		}

		
		$Vehicle_type ="";
		$Vehicle_colour ="";
		$Vehicle_licence ="";

		$successMessage = "Vehicle added successfully";
		$sql = "INSERT INTO audit(session_name, Time_stamp, action) VALUES ( '".$_SESSION['username']."','".$currentDateTime."','Vehicle Added');";
		$run = mysqli_query($connection, $sql);
		

	} while (false);

}

?>




 







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Nottingham Transport Council: Add Vehicle</title>
	<link rel="stylesheet" href="css/style.css">
<body>
	<center><h3>Nottingham Transport Council</h3></center>
	<div class="form-container">
	<form action="" method="post">
		<h3>Record Vehicle</h3>
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
		<input type="text" name="Vehicle_type" required placeholder="enter Vehicle Type:">
		<input type="text" name="Vehicle_colour" required placeholder="enter vehicle Colour:">
        <input type="int" name="Vehicle_licence" required placeholder="enter Vehicle Licence">


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
			<input type="submit" name="submit" value="Register Vehicle" class="form-btn">
			<a href="home_p.php" class="form-btn">back</a>


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















