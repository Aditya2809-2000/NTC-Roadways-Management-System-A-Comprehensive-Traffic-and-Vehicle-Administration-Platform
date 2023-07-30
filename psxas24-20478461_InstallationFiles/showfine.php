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
		<center><h2> LIST OF FINES</h2></center>
		   <?php
        if ($_SESSION ['username'] == 'daniels'){
                 
		?>
		<a class="btn btn-primary" href="Fine.php" role="button">Record Fine</a>
		 <?php }?>
		<a class="btn btn-primary" href="home_p.php" role="button">Home</a>
		<br>
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Fine Amount</th>
					<th>Fine Points</th>
					<th>Incident ID</th>
				</tr>
			</thead>
		<tbody>
		
			<?php
			

			$sql = "SELECT * FROM Fines";
			$result = mysqli_query($connection, $sql);

			if (!$result) {
				die("Invalid query: " . $result->error);
			}

		
			while($row = $result->fetch_assoc()){
				echo "
				<tr>
					<td>$row[Fine_ID]</td>
					<td>$row[Fine_Amount]</td>
					<td>$row[Fine_Points]</td>
					<td>$row[Incident_ID]</td>
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