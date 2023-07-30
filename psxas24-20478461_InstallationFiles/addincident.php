<?php
include("config.php");
session_start();



$error_message="";
$success_message="";

if ($_SERVER['REQUEST_METHOD']=='POST'){

$Incident_Date=$_POST["Incident_Date"];
$Incident_Report=$_POST["Incident_Report"];
$Vehicle_licence=$_POST["Vehicle_licence"];
$People_licence=$_POST["People_licence"];

$errorMessage = ""; 
$successMessage  = "";


do{
if (empty($Incident_Date)||empty($Incident_Report)||empty($Vehicle_licence)||empty($People_licence)) {
$error_message="All the fields are required";
break;
}


$sql1="select People_ID from People where People_licence like '$People_licence'";
$result1 = $connection->query($sql1);
$row1 = mysqli_fetch_assoc($result1);

$sql2="select Vehicle_ID from Vehicle where Vehicle_licence like '$Vehicle_licence'";
$result2 = $connection->query($sql2);
$row2 =mysqli_fetch_assoc($result2);


$People_ID=$row1['People_ID'];
$Vehicle_ID=$row2['Vehicle_ID'];



$sql="INSERT INTO Incident(Vehicle_ID,People_ID,Incident_Date,Incident_Report)"."VALUES('$Vehicle_ID','$People_ID','$Incident_Date','$Incident_Report')";
$result=$connection->query($sql);



if (!$result){
$error_message="Invalid query:".$connection->error;
$errorMessage="Incident addition failed";
break;
}else{
	$successMessage="Incident added successfully";
}


$Incident_Date=$_POST["Incident_Date"];
$Incident_Report=$_POST["Incident_Report"];
$Vehicle_licence=$_POST["Vehicle_licence"];
$People_licence=$_POST["People_licence"];


$successMessage="Incident added successfully";
 $sql = "INSERT INTO audit(session_name, Time_stamp, action) VALUES ( '".$_SESSION['username']."','".$currentDateTime."','Incident Added');";
$run = mysqli_query($connection, $sql);

}while(false);
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Nottingham Transport Council: Add People</title>
<link rel="stylesheet" href="css/style.css">
<body>

	<center><h3>Nottingham Transport Council</h3></center>
	<div class="form-container">
			<form action="" method="post">
		<h3>Record Incident</h3>
		<?php
		if ( !empty($errorMessage)) {
			echo "
			<div class = 'alert alert-warning alert-dismissible fade show' role='alert'>
			<strong>$errorMessage</strong>
			<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'</button>
			</div>
			";
		}

		?>
            
            <?php
            
            $query = " SELECT * FROM People ";
             $result = mysqli_query($connection, $query);
            
            echo  " <datalist id='list'> ";
            while ($value = mysqli_fetch_array($result)) {     
                 echo "<option>$value[People_licence]</option>";
            }
            echo " </datalist> ";
            echo "<input  type = 'search'  name = 'People_licence' list = 'list'/
			placeholder = 'Select People Licence No.' required >";
                ?>    

            <?php
            
            $query = " SELECT * FROM Vehicle ";
             $result = mysqli_query($connection, $query);
            
            echo  " <datalist id='list1'> ";
            while ($value = mysqli_fetch_array($result)) {     
                 echo "<option>$value[Vehicle_licence]</option>";
            }
            echo " </datalist> ";
            echo "<input  type = 'search'  name = 'Vehicle_licence' list = 'list1'/
			placeholder = 'Select Vehicle Licence No.' required >";
                ?>    


            
		
			 <input type="date" name="Incident_Date" required placeholder="enter Date ">
			 <input type="type" name="Incident_Report" required placeholder="enter Incident Report">

		
		<?php
			if ( !empty($successMessage)) {
				echo "
				<div class='row mb-3'>
				<div class='offset-sm-3 col-sm-6'>
					<div class='alert alert-success alert-dismissible fade show' role='alert'>
					<strong>$successMessage</strong>
					<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'</button>
					</div>
				</div>
				";

			}

			?>




		<input type="submit" name="submit" value="Register People" class="form-btn">
		<a href="addpeople.php" class="form-btn">Add People</a></center><br>
		<a href="showincident.php" class="form-btn">back</a>
	
			</div>
	</form>
</div>
</body>
<footer>
    <div class="row">
        <center>Databases Copyright © 2022 NTC - All rights reserved || Designed By: Aditya Sasmal</center>
    </div>
</footer>
</html>

