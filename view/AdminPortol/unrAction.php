<?php
	session_start();
	$connection = mysqli_connect('eu-cdbr-azure-west-a.cloudapp.net','b94aada7921f78','cf9ed572','peerassakprqvuge') or die('Error connecting to mysqli server.'. mysqlii_error($connection));
	$stuid = mysqli_real_escape_string($connection,$_POST['stuid']);
	$query = "SELECT * FROM GROUPS WHERE student_1 = '$stuid' OR student_2 = '$stuid' OR student_3 = '$stuid'";
	//find student's group;
	$results = mysqli_query($connection,$query);
	//IF student is not in group ERROR;
	if(mysqli_num_rows($results) == 0){
		$_SESSION['unrerrors'] = "The student does not exist or is not in a group.";
		header('Location: StudentEnrollment.php');
		exit;
	}
	else
	//ELSE unenroll student;
	{
		$myrow = mysqli_fetch_assoc($results);
		$grpid = $myrow['group_id'];
		if($stuid ==$myrow['student_1']){
			$query = "UPDATE GROUPS SET student_1 = NULL WHERE group_id = '$grpid'";
		}
		else{
			if($stuid ==$myrow['student_2']){
				$query = "UPDATE GROUPS SET student_2 = NULL WHERE group_id = '$grpid'";
			}
			else{
				$query = "UPDATE GROUPS SET student_3 = NULL WHERE group_id = '$grpid'";
			}
		}
		$result = mysqli_query($connection,$query) or die('Error making update query' . mysqli_error($connection));
		$_SESSION['unrerrors'] = "The student is unenrolled successfully.";
		header('Location: StudentEnrollment.php');
		exit;
	}
?>