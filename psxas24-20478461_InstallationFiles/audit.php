<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http=equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Audit</title>
	<link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">

</head>
<center><h4> Nottingham Transport council</h4></center>
<body bgcolor="dark">
	<div class="container my-5">
		<center><h2> AUDIT</h2></center>
		<a class="btn btn-primary" href="home_p.php" role="button">Home</a>
		<a class="btn btn-primary" href="searchaudit.php" role="button">Search</a>
		<br>
		<table class="table">
			<thead>
				<tr>
					<th>Session ID</th>
					<th>Session Name</th>
					<th>Time Stamp</th>
					<th>Action</th>
				</tr>
			</thead>
		<tbody>

		<?php
		include('config.php');
		session_start();

		$sql = "SELECT * FROM audit";
		$result = $connection->query($sql);

			if (!$result) {
				die("Invalid query: " . $connection->error);
			}

			while($row = $result->fetch_assoc()){
				echo "
				<tr>
					<td>$row[session_ID]</td>
					<td>$row[session_name]</td>
					<td>$row[Time_stamp]</td>
					<td>$row[action]</td>
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