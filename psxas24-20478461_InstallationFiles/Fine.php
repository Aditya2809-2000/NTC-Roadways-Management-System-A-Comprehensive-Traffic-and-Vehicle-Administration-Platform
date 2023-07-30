
<?php
 include('config.php');
 session_start();



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$Fine_Amount = $_POST["Fine_Amount"];
	$Fine_Points = $_POST["Fine_Points"];
	$Incident_ID = $_POST["Incident_ID"];

	$errorMessage = ""; 
	$successMessage  = "";






	do {
		if  ( empty($Fine_Amount) || empty($Fine_Points) || empty($Incident_ID) ) {
			$errorMessage = "All fields are required";
			break;
		}


		 $select = " SELECT * FROM Fines WHERE Incident_ID = '$Incident_ID'";

		$result = mysqli_query($connection, $select);

   if(mysqli_num_rows($result) > 0){
      $errorMessage = "Incident ID is present";
	  break;
   }else{
         $insert = "INSERT INTO Fines ( Fine_Amount, Fine_Points, Incident_ID)".
			"VALUES ( '$Fine_Amount', '$Fine_Points', '$Incident_ID')";
         $result7 = mysqli_query($connection, $insert);

		 if ($result7) {
		$successMessage = "Fine added successfully"; 
		mysqli_query($connection, $successMessage);
		
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
	<title>Nottingham Transport Council: Add People</title>
	<link rel="stylesheet" href="css/style.css">
<body>

	<center><h3>Nottingham Transport Council</h3></center>
	<div class="form-container">
	<form action="" method="post">
		<h3>Record Fine</h3>
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


				<input type="int" name="Fine_Amount" required placeholder="enter Fine">
				<input type="int" name="Fine_Points" required placeholder="enter Fine Points">
				<input type="int" name="Incident_ID" required placeholder="enter Incident ID">
				
			

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
			<input type="submit" name="submit" value="Register People" class="form-btn">
			<a href="showfine.php" class="form-btn">Cancel</a>
			


			
		</div>
	</form>
</div>
</body>
</html>















