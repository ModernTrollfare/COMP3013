<?php
	session_start();
	$connection = mysqli_connect('eu-cdbr-azure-west-a.cloudapp.net','b94aada7921f78','cf9ed572','peerassakprqvuge') or die('Error connecting to mysql server.'. mysqli_error($connection));
	$agrp = mysqli_real_escape_string($connection,$_POST['assessedgrp']);
	$query = "SELECT report_id FROM REPORTS WHERE group_id = '$agrp'";
	$result = mysqli_query($connection,$query);
	$temp = mysqli_fetch_assoc($result);
	$rid = $temp['report_id'];
	$grade = mysqli_real_escape_string($connection,$_POST['marks']);
	$cm = mysqli_real_escape_string($connection,$_POST['comments']);
	$owngrp = $_SESSION['owngrp'];
	$query = "SELECT assessment_id FROM ASSESSMENTS WHERE report_id = '$rid' AND group_id = '$owngrp'";
	$result = mysqli_query($connection,$query);
	if (mysqli_num_rows($result) != 0){
		$temp = mysqli_fetch_assoc($result);
		$nid = $temp['assessment_id'];
		$query = "UPDATE ASSESSMENTS SET grade = '$grade', comments = '$cm' WHERE assessment_id = '$nid'";
	}
	else{ 
		$query = "SELECT MAX(assessment_id) AS max FROM ASSESSMENTS";
		$result = mysqli_fetch_assoc(mysqli_query($connection,$query));
		$nid = $result['max']+1;
		$query = "INSERT INTO ASSESSMENTS (assessment_id,grade,comments,group_id,report_id) VALUES ('$nid','$grade','$cm','$owngroup','$rid');";
	}
	$result = mysqli_query($connection,$query) or die("ERROR inserting".$query.mysqli_error($connection));
	mysqli_close($connection);
	$_SESSION['uass'] = "Assessment ".$nid." is added/updated successfully.";
	header('Location: addAssess.php');
?>