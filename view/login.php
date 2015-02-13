<?php
	$connection = mysqli_connect('localhost','test','test','comp3013') or die('Error connecting to MySQL server.'. mysql_error());
	$usertype = $_POST["UserType"];
	$user = array();
	$user["UserID"] = $_POST["UserID"];
	$user["Password"] = $_POST["Password"];
	if($usertype == "-1"){
		$message = "Please Select your User Type.";
		header('Location: index.php?message='.$message);
		exit();
	}
	if($usertype == "0")
		$query = "SELECT * FROM ADMINS WHERE admin_id = ".$user["UserID"]." AND pwd = ".$user["Password"];
	else
		$query = "SELECT * FROM STUDENTS WHERE student_id = ". $user["UserID"]. " AND pwd = ". $user["Password"];
	$result = mysqli_query($connection,$query) or die('Error making select users query' . mysql_error());
	if (!$result){
		$message = "Your Login Credentials Are Incorrect. Check it again!";
		header('Location: index.php?message='.$message);
		exit;
	}
	else{
		session_start();
		header('Location: logged_in.html'); 
	}
?>