<?php
	$host = 'localhost';

	$host = 'localhost';
	$db = 'uchat';
	$user = 'root';
	$pass = 'Sik9=Xnaqhe';

			$conn = mysqli_connect($host, $user, $pass, $db);
			if(!$conn) {
				die("Connection failed: " . mysqli_connect_error());
			}
			//echo"Hello database";
?>



