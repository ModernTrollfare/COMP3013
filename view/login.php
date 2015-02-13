<?php
	session_start();
	$connection = mysqli_connect('localhost','toor','toor','comp3013') or die('Error connecting to MySQL server.'. mysqli_error($connection));
	$usertype = $_POST["UserType"];
	$user = array();
	$user["UserID"] = $_POST["UserID"];
	$user["Password"] = $_POST["Password"];
	$user["Usertype"] = $usertype;
	$uid = $user["UserID"];
	$upwd = $user["Password"];
	if($usertype == "-1"){
		$_SESSION['errors'] = array("Please Select your User Type.");
		//window.history.back();
		header('Location: index.php');
		exit();
	}
	if($usertype == "0")
		$query = "SELECT * FROM ADMINS WHERE admin_id ='$uid' AND pwd = '$upwd'";
		//$query = "SELECT userid, username FROM tuser WHERE username = '$user_username' AND password = SHA('$user_password')";
	else
		$query = "SELECT * FROM ADMINS WHERE student_id ='$uid' AND pwd = '$upwd'";
	$result = mysqli_query($connection,$query) or die('Error making select users query' . mysqli_error($connection));
	if (mysqli_num_rows($result) != 1){
		$_SESSION['errors'] = array("Your Login Credentials Are Incorrect.");
		header('Location: index.php');
		//window.history.back();
		exit;
	}
	else{
		session_unset();
		$_SESSION['user'] = $user["UserID"];
		$_SESSION['password'] = $user["Password"];
		$_SESSION['usertype'] = $usertype;
		$json = json_encode($user);
		setcookie("uinf", $json, time()+(60*60*6));
		header('Location: logged_in.html'); 
	}
?>