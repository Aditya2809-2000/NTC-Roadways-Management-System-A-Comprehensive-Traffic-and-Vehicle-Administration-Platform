<?php
			$servername = "mysql.cs.nott.ac.uk";
			$username = "psxas24";
			$password = "abc456";
			$database = "psxas24";

			$connection = new mysqli($servername, $username, $password, $database);

			if ($connection -> connect_error) {
				die("Connetion failed: " . $connection->connect_error);
			}
?>
<?php
	date_default_timezone_set('Europe/London');
	$currentDateTime = date('Y-m-d  H:i:s');
	#$audFile = fopen('data_audit.txt', 'a');
?>