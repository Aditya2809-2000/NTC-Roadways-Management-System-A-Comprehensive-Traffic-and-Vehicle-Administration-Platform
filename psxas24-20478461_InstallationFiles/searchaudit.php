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
<center><h4> Nottingham Transport council</h4><center>
<body bgcolor="dark">
<body>
	<div class="container my-5">
		<form method="post">
			<center><input type="text" placeholder="Enter name" name="search">
			<button class= "btn btn-primary" name="submit"> Search</button></center>
			<a class="btn btn-outline-primary" href="audit.php" role="button">Back</a>
		</form>

		<div class="container my-5">
			<table class = "table">
				<?php
if(isset($_POST['submit'])) {
	$search=$_POST['search'];

	$sql = "SELECT * FROM audit WHERE lower(session_name) LIKE lower('%$search%')";
	$result = mysqli_query($connection, $sql);

	if ($result){
	if(mysqli_num_rows($result)>0){
		echo '<thead>
		<tr>
		<th>session_ID</th> 
		<th>session_name</th>
		<th>Time_stamp</th>
		<th>action</th>
		</tr>
		';
		while($row=mysqli_fetch_assoc($result)) {
		echo '<tbody>
		<tr>
		<td>'.$row['session_ID'].'</td>
		<td>'.$row['session_name'].'</td>
		<td>'.$row['Time_stamp'].'</td>
		<td>'.$row['action'].'</td>
		</tr>
		</tbody>';
		$sql = "INSERT INTO audit(session_name, Time_stamp, action) VALUES ( '".$_SESSION['username']."','".$currentDateTime."','People Searched');";
		$run = mysqli_query($connection, $sql);
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




