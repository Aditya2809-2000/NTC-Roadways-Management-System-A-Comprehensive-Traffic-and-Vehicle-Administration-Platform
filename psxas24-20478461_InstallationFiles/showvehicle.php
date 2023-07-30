<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http=equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Form</title>
	<link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

</head>
   <center><h4>Nottingham Transport Council</h4></center>
<body bgcolor="dark">
	<div class="container my-5">
		<center><h2>LIST OF VEHICLES</h2>
		<a class="btn btn-primary" href="create_vehicle.php" role="button">Add Vehicle</a>
		<a class="btn btn-primary" href="searchvehicle.php" role="button">Search vehicle</a></center>
		<br>
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Vehicle Type</th>
					<th>Vehicle Colour</th>
					<th>Vehicle Licence</th>
				</tr>
			</thead>
		<tbody>
		
			<?php
			include('config.php');
			session_start();

			// read all row from database
			$sql = "SELECT * FROM Vehicle";
			$result = $connection->query($sql);

			if (!$result) {
				die("Invalid query: " . $connection->error);
			}

		// read rows from database
			while($row = $result->fetch_assoc()){
				echo "
				<tr>
					<td>$row[Vehicle_ID]</td>
					<td>$row[Vehicle_type]</td>
					<td>$row[Vehicle_colour]</td>
					<td>$row[Vehicle_licence]</td>
			</tr>
			";
		}
		?>
	</tbody>
		</table>
	</div>
</body>
</head>
</html>
		

