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
			<center><input type="text" placeholder="Enter Vehicle Licence" name="search">
			<button class= "btn btn-primary" name="submit"> Search</button></center>
			<a class="btn btn-outline-primary" href="home_p.php" role="button">Back</a>
		</form>

		<div class="container my-5">
			<table class = "table">
				<?php
if(isset($_POST['submit'])) {
	$search=$_POST['search'];

	$sql = "SELECT * FROM Vehicle NATURAL LEFT JOIN Ownership NATURAL LEFT JOIN People  WHERE Vehicle_licence like '$search'";
	$result = mysqli_query($connection, $sql);

	if ($result){
	if(mysqli_num_rows($result)>0){
		echo '<thead>
		<tr>
		<th>People Licence</th>
		<th>People Name</th>
		<th>Vehicle ID</th> 
		<th>Vehicle type</th>
		<th>Vehicle Colour</th>
		<th>Vehicle Licence</th>
		</tr>
		';
		while($row=mysqli_fetch_assoc($result)) {
		echo '<tbody>
		<tr>
		<td>'.$row['People_licence'].'</td>
		<td>'.$row['People_name'].'</td>
		<td>'.$row['Vehicle_ID'].'</td>
		<td>'.$row['Vehicle_type'].'</td>
		<td>'.$row['Vehicle_colour'].'</td>
		<td>'.$row['Vehicle_licence'].'</td>
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
