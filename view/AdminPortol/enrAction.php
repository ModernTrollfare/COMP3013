<?php
	session_start();
	$connection = mysqli_connect('localhost','toor','toor','comp3013') or die('Error connecting to mysqli server.'. mysqlii_error($connection));
	$grpid = mysqli_real_escape_string($connection,$_POST['grpid']);
	$results = mysqli_query($connection,"SELECT * FROM GROUPS WHERE group_id = '$grpid'");
	if(mysqli_num_rows($results)== 0){
		$_SESSION['enrerrors'] = "Group doesn't exist. Please double check the group number.";
		header('Location:StudentEnrollment.php');
		exit;
	}
	//confirm student exists
	$stuid = mysqli_real_escape_string($connection,$_POST['stuid']);
	$query = "SELECT * from STUDENTS WHERE student_id = '$stuid'";
	$results = mysqli_query($connection,$query);
	if(mysqli_num_rows($results)== 0){
		$_SESSION['enrerrors'] = "Student doesn't exist. Please double check the group number.";
		header('Location:StudentEnrollment.php');
		exit;
	}
	//confirm student is not in a group
	$query = "SELECT * FROM GROUPS WHERE student_1 = '$stuid' OR student_2 = '$stuid' OR student_3 = '$stuid'";
	$results = mysqli_query($connection,$query);
	if(mysqli_num_rows($results)> 0){
		$_SESSION['enrerrors'] = "Student is already in a group. Please unenroll him from his original group first.";
		header('Location:StudentEnrollment.php');
		exit;		
	}
	//enroll student;
	$myrow = mysqli_fetch_assoc($results);
	if(is_null($myrow['student_1'])){
		$query = "UPDATE GROUPS SET student_1 ='$stuid' WHERE group_id = '$grpid'";
	}
	else{
		if(is_null($myrow['student_2'])){
			$query = "UPDATE GROUPS SET student_2 ='$stuid' WHERE group_id = '$grpid'";
		}
		else{
			$query = "UPDATE GROUPS SET student_3 ='$stuid' WHERE group_id = '$grpid'";
		}
	}
	$results = mysqli_query($connection,$query);
	$_SESSION['enrerrors'] = "Student ID ".$stuid." is enrolled to group ".$grpid." successfully.";
	header('Location:StudentEnrollment.php');
	exit;		
?>