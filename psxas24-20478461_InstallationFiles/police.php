
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http=equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Form</title>
	<link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

</head>
<center><h3> Nottingham Transport council</h3></center>
<body bgcolor="dark">
	<div class="container my-5">
		<center><h2> LIST OF POLICE</h2></center>
		<a class="btn btn-primary" href="home_p.php" role="button">Back</a>

		<br>
		<table class="table">
			<thead>
				<tr>
					<th>Poeple Username</th>
					<th>Poeple Password</th>
				</tr>
			</thead>
		<tbody>
		
			<?php
			 include('config.php');
			session_start();

			// read all row from database
			$sql = "SELECT * FROM police";
			$result = $connection->query($sql);

			if (!$result) {
				die("Invalid query: " . $connection->error);
			}

		// read rows from database
			while($row = $result->fetch_assoc()){
				echo "
				<tr>
					<td>$row[username]</td>
					<td>$row[password]</td>
					
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
		

