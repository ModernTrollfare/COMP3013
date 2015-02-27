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
		$query = "SELECT * FROM STUDENTS WHERE student_id ='$uid' AND pwd = '$upwd'";
	$result = mysqli_query($connection,$query) or die('Error making select users query' . mysqli_error($connection));
	if (mysqli_num_rows($result) != 1){
		$_SESSION['errors'] = array("Your Login Credentials Are Incorrect.");
		header('Location: index.php');
		//window.history.back();
		exit;
	}
	else{
		if($usertype == "0")
		$query = "SELECT name FROM ADMINS WHERE admin_id ='$uid' AND pwd = '$upwd'";
		//$query = "SELECT userid, username FROM tuser WHERE username = '$user_username' AND password = SHA('$user_password')";
	else
		$query = "SELECT name FROM STUDENTS WHERE student_id ='$uid' AND pwd = '$upwd'";
		$realuid = mysqli_fetch_row(mysqli_query($query));
		$user["UserID"] = $realuid[0];
		$user["uacc"] = $_POST["UserID"];
		$_SESSION['uacc'] = $_POST["UserID"];
		$_SESSION['user'] = $user["UserID"];
		$_SESSION['password'] = $user["Password"];
		$_SESSION['usertype'] = $usertype;
		$json = json_encode($user);
		setcookie("uinf", $json, time()+(60*60*6));	
		if($usertype == '0'){
			header('Location: AdminPortol/workspaceForAdmin.php');
		}
		else{
			header('Location: StudentPortol/student_main.php');
		}
	}
?>