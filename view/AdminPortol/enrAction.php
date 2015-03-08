<?php
	session_start();
	$connection = mysqli_connect('localhost','toor','toor','comp3013') or die('Error connecting to mysqli server.'. mysqlii_error($connection));
	$grpid = $_POST['grpid'];
	$results = mysqli_query($connection,"SELECT * FROM GROUPS WHERE group_id = '$grpid'");
	if(mysqli_num_rows($results)== 0){
		$_SESSION['enrerrors'] = "Group doesn't exist. Please double check the group number.";
		header('Location:StudentEnrollment.php');
	}
	//TODO: confirm student exists
	//TODO: confirm student is not in a group
	//TODO: enroll student;
?>