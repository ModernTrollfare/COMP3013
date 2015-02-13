<?php
	session_start();
	$connection = mysqli_connect('localhost','foo','bar','Example') or die('Error connecting to MySQL server.'. mysql_error());
	$usertype = $_POST["UserType"];
	$user = array();
	$user["UserID"] = mysql_real_escape_string($_POST["UserID"]);
	$user["Password"] = mysql_real_escape_string($_POST["Password"]);
	if($usertype == "-1"){
		$message = "Please Select your User Type.";
		//window.history.back();
		header('Location: index.php');
		exit();
	}
	if($usertype == "0")
		$query = "SELECT * FROM ADMINS WHERE admin_id =".$user["UserID"]." AND pwd = ".$user["Password"];
	else
		$query = "SELECT * FROM STUDENTS WHERE student_id =". $user["UserID"]. "AND pwd =". $user["Password"];
		$result = mysqli_query($connection,$query) or die('Error making select users query' . mysql_error());
	if (!$result){
		$_SESSION['errors'] = array("Your Login Credentials Are Incorrect.");
		header('Location: index.php');
		//window.history.back();
		exit;
	}
	else{*/
		header('Location: logged_in.html'); 
	}
?>