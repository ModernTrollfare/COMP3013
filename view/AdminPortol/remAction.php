<?php
	session_start();
	$rnum = $_POST['input'];
	// var_dump($_POST['input']);
	// exit;
	$connection = mysqli_connect('localhost','toor','toor','comp3013') or die('Error connecting to mysqli server.'. mysqlii_error($connection));
	$query = "DELETE FROM GROUPS WHERE group_id = '$rnum'";
	$results = mysqli_query($connection,$query) or die('Error removing');
	$_SESSION['remerrors'] = "Group ".$rnum." is deleted(if it exists).";
	header('Location: addGroups.php');
?>