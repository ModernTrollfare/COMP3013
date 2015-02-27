<?php
	session_start();
	$connection = mysqli_connect('localhost','toor','toor','comp3013') or die('Error connecting to MySQL server.'. mysqli_error($connection));
	