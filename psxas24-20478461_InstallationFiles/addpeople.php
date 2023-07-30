

<?php
 include('config.php');
 session_start();




if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$People_name = $_POST["People_name"];
	$People_address = $_POST["People_address"];
	$People_licence = $_POST["People_licence"];

	$errorMessage = ""; 
	$successMessage  = "";


	do {
		if  (empty($People_name) || empty($People_address) || empty($People_licence) ){
			$errorMessage = "All fields are required";
			break;
		}

	
		$sql1 = "select * from People where People_licence = '$People_licence'";
		$result1 = $connection->query($sql1);

		
		 if (mysqli_num_rows($result1)>1){
			$errorMessage = "People licence already present";
			break;
		 }

		$sql = "INSERT INTO People (People_name, People_address, People_licence)".
			"VALUES ('$People_name', '$People_address', '$People_licence')";
		$result = $connection->query($sql);
		
		
		if (!$result) {
			$errorMessage = "Invalid query" . $connection->error;
			break;
		}

		
		$People_name ="";
		$People_address ="";
		$People_licence ="";

		$successMessage = "Client added successfully";
		$sql = "INSERT INTO audit(session_name, Time_stamp, action) VALUES ( '".$_SESSION['username']."','".$currentDateTime."','People Added');";
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
	<title>Nottingham Transport Council: Add People</title>
	<link rel="stylesheet" href="css/style.css">
<body>

	<center><h3>Nottingham Transport Council</h3></center>
	<div class="form-container">
	<form action="" method="post">
		<h3>Record People</h3>
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
		<input type="text" name="People_name" required placeholder="enter People name">
		<input type="text" name="People_address" required placeholder="enter People Address:">
        <input type="int" name="People_licence" required placeholder="enter People Licence">

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















