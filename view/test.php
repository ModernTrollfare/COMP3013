<?php
	$server = 'localhost';
	$username = 'test';
	$password = 'test';
	$database = 'comp3013';

	$connection = mysqli_connect($server, $username, $password, $database);

	if (!$connectoin) {
		echo "Not Connected\n";
		echo "Server: ", $server, "\n";
		echo "User ", $username, "\n";
		echo "Password: ", $password, "\n";
		echo "Database: ", $database, "\n";
	}
?>