<?php
session_start();
include "config.php";
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
<body>
	<div class="container my-5">
		<form method="post">
			<center><input type="text" placeholder="Enter Incident ID" name="search">
			<button class= "btn btn-primary" name="submit"> Search</button></center>
			<a class="btn btn-outline-primary" href="home_p.php" role="button">Back</a>
		</form>

		<div class="container my-5">
			<table class = "table">
				<?php
if(isset($_POST['submit'])) {
	$search=$_POST['search'];

			$sql = "SELECT * FROM Incident WHERE Incident_ID = '$search'";
			$result = $connection->query($sql);

	if ($result){
	if(mysqli_num_rows($result)>0){
		echo '<thead>
		<tr>
		<th>Incident_ID</th> 
		<th>Vehicle_ID</th>
		<th>People_ID</th>
		<th>Incident_Date</th>
		<th>Incident_Report</th>
		</tr>
		';
		while($row=mysqli_fetch_assoc($result)) {
		echo '<tbody>
		<tr>
		<td>'.$row['Incident_ID'].'</td>
		<td>'.$row['Vehicle_ID'].'</td>
		<td>'.$row['People_ID'].'</td>
		<td>'.$row['Incident_Date'].'</td>
		<td>'.$row['Incident_Report'].'</td>
		</tr>
		</tbody>';
		}
	}else {
		echo '<h2>Data not found</h2>' ;

	}


	}



}





?>





			</table>
		</div>
	</div>
</body>
</html>
