<?php
 include('config.php');
 session_start();

 if (count($_POST)>0) {
$sql = "UPDATE Incident SET Incident_ID ='" .$_POST['Incident_ID'] ."' , Vehicle_ID = '" . $_POST['Vehicle_ID'] ."' ,
People_ID = '" . $_POST['People_ID'] . "', Incident_Date = '" .$_POST['Incident_Date'] ."',
Incident_Report = '" .$_POST['Incident_Report'] . "',
Offence_ID = '" . $_POST['Offence_ID'] . "' WHERE Incident_ID = '" . $_POST['Incident_ID'] . "'";
 
$result = $connection->query($sql);
$message = "Record updated Successfully";
$sql = "INSERT INTO audit(session_name, Time_stamp, action) VALUES ( '".$_SESSION['username']."','".$currentDateTime."','Incident udated');";
$run = mysqli_query($connection, $sql);
}

$sql2 = "SELECT * FROM Incident WHERE Incident_ID = '" . $_GET['Incident_ID'] ."' ";
$result2 = $connection->query($sql2);
$row = mysqli_fetch_array($result2);

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

	<center><h1>Nottingham Transport Council</h1></center>

<div class="form-container">
	<form action="" method="post">
	<div><?php if (isset($message)) {echo $message;} ?>
		<h3>Update People</h3>
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
		<input type="text" name="Incident_ID" required placeholder="enter Incident ID">
		<input type="text" name="Vehicle_ID" required placeholder="enter vehicle ID:">
        <input type="int" name="People_ID" required placeholder="enter People ID">
		<input type="date" name="Incident_Date" required placeholder="enter Incident Date">
		<input type="text" name="Incident_Report" required placeholder="enter Incident report">
		<input type="int" name="Offence_ID" required placeholder="enter People Offence ID">

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
			<input type="submit" name="submit" value="Update People" class="form-btn">
			 <a href="showincident.php" class="form-btn">back</a>

			
		</div>
	</form>
	</body>
	</html>