<?php
	session_start();
	$connection = mysqli_connect('localhost','toor','toor','comp3013') or die('Error connecting to mysqli server.'. mysqlii_error($connection));
	$results = mysqli_query($connection,"SELECT * FROM GROUPS");
	//TODO: find student's group;
	//IF student is not in group ERROR;
	//ELSE unenroll student;
?>