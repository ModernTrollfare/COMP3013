<?php
	session_start();
	$connection = mysqli_connect('eu-cdbr-azure-west-a.cloudapp.net','b94aada7921f78','cf9ed572','peerassakprqvuge') or die('Error connecting to MySQL server.'. mysqli_error($connection));
	$usertype = $_POST["UserType"];
	$user = array();
	$user["userid"] = mysqli_real_escape_string($connection,$_POST["UserID"]);
	$user["Password"] = mysqli_real_escape_string($connection,$_POST["Password"]);
	//var_dump($user["Password"]);
	$user["Password"] = sha1(md5($user["Password"]));
	$user["usertype"] = mysqli_real_escape_string($connection,$usertype);
	$uid = $user["userid"];
	$upwd = sha1(md5($user["Password"]));
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

	session_unset();
	//var_dump($myrow);
	//exit;
	$_SESSION['userid'] = $user["userid"];
	$_SESSION['username'] = $myrow["name"];
	$user['username'] = $myrow["name"];
	$_SESSION['password'] = $user["Password"];
	$_SESSION['usertype'] = $usertype;
	$json = json_encode($user);

	setcookie("uinf", $json, time()+(60*60*6),$_SERVER['DOCUMENT_ROOT']."/master/view/");	
	if($usertype == '0'){
		header('Location: AdminPortol/workspaceForAdmin.php');
	}
	else{
		header('Location: StudentPortol/student_main.php');
	}
?>