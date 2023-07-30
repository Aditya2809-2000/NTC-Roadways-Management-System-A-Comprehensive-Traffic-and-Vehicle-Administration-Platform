<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http=equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Form</title>
	<link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

</head>
<center><h3>Nottingham Transport council</h3></center>
<body bgcolor="dark">
	<div class="container my-5">
		<center><h3>VEHICLE OWNERS</h3></center>
		<a class="btn btn-primary" href="addvehicleowners.php" role="button">Record Owners</a>
		<a class="btn btn-primary" href="home_p.php" role="button">Back</a>
		<br>
		<table class="table">
			<thead>
				<tr>
					<th>People licence</th>
					<th>People Name</th>
					<th>Vehicle ID</th>
					<th>Vehicle Type</th>
					<th>Vehicle Licence</th>


				</tr>
			</thead>
		<tbody>
		
			<?php
			$servername = "mysql.cs.nott.ac.uk";
			$username = "psxas24";
			$password = "abc456";
			$database = "psxas24";

			$connection = new mysqli($servername, $username, $password, $database);

			if ($connection -> connect_error) {
				die("Connetion failed: " . $connection->connect_error);
			}

			// read all row from database
			$sql = "SELECT Vehicle.Vehicle_ID, Vehicle.Vehicle_type,Vehicle.Vehicle_licence, People.People_licence, People_name
FROM Vehicle
JOIN Ownership
  ON Vehicle.Vehicle_ID= Ownership.Vehicle_ID
JOIN People
ON People.People_ID = Ownership.People_ID";
			$result = $connection->query($sql);

			if (!$result) {
				die("Invalid query: " . $connection->error);
			}

		// read rows from database
			while($row = $result->fetch_assoc()){
				echo "
				<tr>
					<td>$row[People_licence]</td>
					<td>$row[People_name]</td>
					<td>$row[Vehicle_ID]</td>
					<td>$row[Vehicle_type]</td>
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
		

