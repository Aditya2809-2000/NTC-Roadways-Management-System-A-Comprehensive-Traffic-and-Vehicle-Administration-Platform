<?php
 include('config.php');
   session_start();
 ?>

<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http=equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Form</title>
	<link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

</head>
<center><h4> Nottingham Transport council</h4></center>
<body bgcolor="dark">
	<div class="container my-5">
		<center><h2> LIST OF INCIDENTS</h2><center>
		<a class="btn btn-primary" href="addincident.php" role="button">Record Incident</a>
		<a class="btn btn-primary" href="searchincident.php" role="button">Search Incident</a>
		<a class="btn btn-primary" href="home_p.php" role="button">Back</a>
		<br><br><br>
		<table class="table">
			<thead>
				<tr>
					<th>Vehicle ID</th>
					<th>Vehicle licence</th>
					<th>People ID</th>
					<th>People licence</th>
					<th>Incident ID</th>
					<th>Incident Date</th>
					<th>Incident Report</th>
					<th>Offence ID</th>
				</tr>
			</thead>
		<tbody>
		
			<?php
			

			
			$sql = "SELECT Vehicle.Vehicle_ID, Vehicle.Vehicle_licence,People.People_ID, People.People_licence, Incident.Incident_ID,
					Incident.Incident_Date, Incident.Incident_Report, Incident.Offence_ID FROM
					Vehicle 
					JOIN Incident
					ON Vehicle.Vehicle_ID = Incident.Vehicle_ID
					JOIN People
					ON People.People_ID = Incident.People_ID";
			$result = $connection->query($sql);

			if (!$result) {
				die("Invalid query: " . $connection->error);
			}

		
			while($row = $result->fetch_assoc()){
				echo "
				<tr>
					<td>$row[Vehicle_ID]</td>
					<td>$row[Vehicle_licence]</td>
					<td>$row[People_ID]</td>
					<td>$row[People_licence]</td>
					<td>$row[Incident_ID]</td>
					<td>$row[Incident_Date]</td>
					<td>$row[Incident_Report]</td>
					<td>$row[Offence_ID]</td>
					<td>
						<a class='btn btn-primary btn-sm' href='updateincident.php?Incident_ID=$row[Incident_ID]'>Edit</a>
						
					</td>
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
		

