<?php
	session_start();
	$connection = mysqli_connect('localhost','toor','toor','comp3013') or die('Error connecting to MySQL server.'. mysqli_error($connection));
	$usertype = $_POST["UserType"];
	$user = array();
	$user["userid"] = $_POST["UserID"];
	$user["Password"] = $_POST["Password"];
	$user["usertype"] = $usertype;
	$uid = $user["userid"];
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
	$myrow = mysqli_fetch_assoc($result);
	//var_dump($myrow);
	//exit;
	$_SESSION['userid'] = $user["userid"];
	$_SESSION['username'] = $myrow["name"];
	$user['username'] = $myrow["name"];
	$_SESSION['password'] = $user["Password"];
	$_SESSION['usertype'] = $usertype;
	$json = json_encode($user);
	var_dump($user);
	exit;
	setcookie("uinf", $json, time()+(60*60*6));	
	if($usertype == '0'){
		header('Location: AdminPortol/workspaceForAdmin.php');
	}
	else{
		header('Location: StudentPortol/student_main.php');
	}
?>