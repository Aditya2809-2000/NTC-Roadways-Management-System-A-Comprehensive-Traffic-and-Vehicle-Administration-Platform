

<?php
 include('config.php');
 session_start();



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$Offence_ID = $_POST["Offence_ID"];
	$Offence_description = $_POST["Offence_description"];
	$Offence_maxFine = $_POST["Offence_maxFine"];
	$Offence_maxPoints = $_POST["Offence_maxPoints"];

	$errorMessage = ""; 
	$successMessage  = "";


	do {
		if  ( empty($Offence_ID) || empty($Offence_description) || empty($Offence_maxFine) || empty($Offence_maxPoints) ){
			$errorMessage = "All fields are required";
			break;
		}


		 $select = " SELECT * FROM Offence WHERE Offence_ID = '$Offence_ID'";

   $result = mysqli_query($connection, $select);

   if(mysqli_num_rows($result) > 0){

      $errorMessage = "Offence ID is present";
	  break;

   }else{
         $insert = "INSERT INTO Offence (Offence_ID, Offence_description, Offence_maxFine, Offence_maxPoints)".
			"VALUES ('$Offence_ID', '$Offence_description', '$Offence_maxFine', '$Offence_maxPoints')";
         $result7 = mysqli_query($connection, $insert);

		 if ($result7) {
		$successMessage = "Fine added successfully";
		$sql = "INSERT INTO audit(session_name, Time_stamp, action) VALUES ( '".$_SESSION['username']."','".$currentDateTime."','Fine Added');";
		$run = mysqli_query($connection, $sql);
		 }
      }

	} while (false);

}

?>




 








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Nottingham Transport Council</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<center><h3>Nottingham Transport Council</h3></center>
	<div class="form-container">
	<form action="" method="post">
		<h3>record Offence</h3>
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
		<input type="int" name="Offence_ID" required placeholder="enter Offence ID">
		<input type="text" name="Offence_description" required placeholder="enter Offence description">
        <input type="int" name="Offence_maxFine" required placeholder="enter Max Fine" />
        <input type="int" name="Offence_maxPoints" required placeholder="enter max Points" />

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
			<input type="submit" name="submit" value="Register Offence" class="form-btn">
			 <a href="showoffence.php" class="form-btn">back</a>
			
	</form>
</div>
</body>
<footer>
    <div class="row">
        <center>Databases Copyright © 2022 NTC - All rights reserved || Designed By: Aditya Sasmal</center>
    </div>
</footer>
</html>















