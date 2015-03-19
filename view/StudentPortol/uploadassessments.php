<?php
	session_start();
	$connection = mysqli_connect('reqnmfsycv.database.windows.net:1433','toor','rooT1234','comp3013') or die('Error connecting to mysqli server.'. mysqli_error($connection));
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
		$query = "INSERT INTO ASSESSMENTS (assessment_id,grade,comments) VALUES ('$nid','$grade','$cm');";
	}
	$result = mysqli_query($connection,$query) or die("ERROR inserting".$query.mysqli_error($connection));
	mysqli_close($connection);
	$_SESSION['uass'] = "Assessment ".$nid." is added/updated successfully.";
	header('Location: addAssess.php');
?>