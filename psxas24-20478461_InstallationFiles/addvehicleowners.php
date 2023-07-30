<?php
 include('config.php');
 session_start();



if(isset($_POST["submit"])) {
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$People_licence = $_POST["People_licence"];
	$Vehicle_type = $_POST["Vehicle_type"];
	$Vehicle_colour = $_POST["Vehicle_colour"];
	$Vehicle_licence = $_POST["Vehicle_licence"];

	$errorMessage = ""; 
	$successMessage  = "";






	do {
		if  ( empty($People_licence)  || empty($Vehicle_type) || empty($Vehicle_colour) || empty($Vehicle_licence) ){
			$errorMessage = "All fields are required";
			break;
		}
	


		$sql = "INSERT INTO Vehicle (Vehicle_type, Vehicle_colour, Vehicle_licence)" .
			  " VALUES ( '$Vehicle_type', '$Vehicle_colour', '$Vehicle_licence')";
		$result = $connection->query($sql);
		
		
		$sql1 = "SELECT * FROM People WHERE People_licence='$People_licence'";
		$result1 = $connection->query($sql1);
		$ab = mysqli_fetch_assoc($result1);
		
		$sql2 = "SELECT * FROM Vehicle WHERE Vehicle_licence='$Vehicle_licence'";
		$result2 = $connection->query($sql2);
		$vb = mysqli_fetch_assoc($result2);

		$People_ID = $ab['People_ID'];
		$Vehicle_ID = $vb['Vehicle_ID'];




		$sql2 = "INSERT INTO Ownership (People_ID, Vehicle_ID) VALUES($People_ID, $Vehicle_ID)";
		$result2 = $connection->query($sql2);
		
		
		if (!$result) {
			$errorMessage = "Invalid query" . $connection->error;
			break;
		}



		$People_licence = "";
		$Vehicle_ID ="";
		$Vehicle_type ="";
		$Vehicle_colour ="";
		$Vehicle_licence ="";

		$successMessage = "Vehicle Owner added successfully";
		$sql = "INSERT INTO audit(session_name, Time_stamp, action) VALUES ( '".$_SESSION['username']."','".$currentDateTime."','Vehcile Owner Added');";
		$run = mysqli_query($connection, $sql);

		



	} while (false);

}
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
		<h3>Record Vehicle Owners</h3>
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
		  <!-- Referenced by Previous pages  -->

            <?php
            
            $query = " SELECT * FROM People ";
             $result = mysqli_query($connection, $query);
            
            echo  " <datalist id='list'> ";
            while ($value = mysqli_fetch_array($result)) {     
                 echo "<option>$value[People_licence]</option>";
            }
            echo " </datalist> ";
            echo "<input  type = 'search'  name = 'People_licence' list = 'list'/
			placeholder = 'Select People Licence No.' required >";
                ?>    
  

	
            <?php
            
            $query = " SELECT * FROM Vehicle ";
             $result = mysqli_query($connection, $query);
            
            echo  " <datalist id='list1'> ";
            while ($value = mysqli_fetch_array($result)) {     
                 echo "<option>$value[Vehicle_licence]</option>";
            }
            echo " </datalist> ";
            echo "<input  type = 'search'  name = 'Vehicle_licence' list = 'list1'/
			placeholder = 'Select Vehicle Licence No.' required >";
                ?>    
     
		
		
			<input type="text" name="Vehicle_type" required placeholder="Vehicle Type">
			<input type="text" name="Vehicle_colour" required placeholder=" Enter Vehicle Colour">
			

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
			<a href="home_p.php" class="form-btn">Cancel</a></center><br>
			<a href="addpeople.php" class="form-btn">Add People</a></center><br>
			<a href="create_vehicle.php" class="form-btn">Add Vehicle</a></center><br>
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














