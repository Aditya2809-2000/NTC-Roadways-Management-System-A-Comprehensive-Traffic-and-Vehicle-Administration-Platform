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
	<title>OFFENCE</title>
	<link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">



</head>
<center><h4> Nottingham Transport council</h4></center>
<body bgcolor="dark">
	<div class="container my-5">
		<center><h2> LIST OF OFFENCE</h2>
		<a class="btn btn-primary" href="addoffence.php" role="button">Record Offence</a>
		<left><a class="btn btn-primary" href="home_p.php" role="button">Back</a></left></center>
		<br>
		<table class="table">
			<thead>
				<tr>
					<th>Offence ID</th>
					<th>Offence Description</th>
					<th>Max Fine</th>
					<th>Max Points</th>
				</tr>
			</thead>
		<tbody>
		
			<?php
			// read all row from database
			$sql = "SELECT * FROM Offence";
			$result = $connection->query($sql);

			if (!$result) {
				die("Invalid query: " . $connection->error);
			}

		// read rows from database
			while($row = $result->fetch_assoc()){
				echo "
				<tr>
					<td>$row[Offence_ID]</td>
					<td>$row[Offence_description]</td>
					<td>$row[Offence_maxFine]</td>
					<td>$row[Offence_maxPoints]</td>
					<td>
						<a class= 'btn btn-danger btn-sm' href='deleteoffence.php?Offence_ID=$row[Offence_ID]'>Delete</a>
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
		

