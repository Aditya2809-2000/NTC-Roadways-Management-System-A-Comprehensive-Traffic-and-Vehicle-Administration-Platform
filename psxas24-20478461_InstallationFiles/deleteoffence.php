
<?php
 include('config.php');
 session_start();
if ( isset($_GET["Offence_ID"]) ) {
	$id = $_GET["Offence_ID"];

 




$sql = "DELETE FROM Offence WHERE Offence_ID=$id";
$connection->query($sql);




if ($connection -> connect_error) {
	die("Connetion failed: " . $connection->connect_error);
	}
}

header("location: showoffence.php");
exit;
?>
