<?php
	session_start();
	$connection = mysqli_connect('localhost','toor','toor','comp3013') or die('Error connecting to MySQL server.'. mysqli_error($connection));
	$oldpw = $_POST['OldPassword'];
	$new1  = $_POST['NewPassword1'];
	$new2  = $_POST['NewPassword2'];
	$uid = $_SESSION['uacc'];
	if ($new1 != $new2){
		$_SESSION['errors'] = array('You new passwords does not match.');
		if($_SESSION['usertype'] == '0'){
			header('Location: AdminPortol/AdminChangePassword.php');
		}
		else{
			header('Location: StudentPortol/change_password.php');
		}
		exit;
	 }
	if($usertype == "0")
		$query = "SELECT admin_id FROM ADMINS WHERE admin_id ='$uid' AND pwd = '$oldpw'";
		//$query = "SELECT userid, username FROM tuser WHERE username = '$user_username' AND password = SHA('$user_password')";
	else
		$query = "SELECT student_id FROM STUDENTS WHERE student_id ='$uid' AND pwd = '$oldpw'";
	$result = mysqli_query($connection,$query) or die('Error making select users query' . mysqli_error($connection));
	if (mysqli_num_rows($result) != 1){
		$_SESSION['errors'] = array("Your old password is incorrect.");
		if($_SESSION['usertype'] == '0'){
			header('Location: AdminPortol/AdminChangePassword.php');
		}
		else{
			header('Location: StudentPortol/change_password.php');
		}
		exit;
	}
	if($oldpw == $new1){
		$_SESSION['errors'] = array("Your old password and new password must be different.");
		if($_SESSION['usertype'] == '0'){
			header('Location: AdminPortol/AdminChangePassword.php');
		}
		else{
			header('Location: StudentPortol/change_password.php');
		}
		exit;
	}
	$temp = mysqli_fetch_assoc($result);
	if($usertype == "0")
		$tempuid = $temp["admin_id"];
	else
		$tempuid = $temp["student_id"];
	// echo '<pre>';
 //    var_dump($_SESSION['errors']);
 //    echo '</pre>';
	// var_dump($tempuid);
	if($usertype == "0")
		$sql = "UPDATE ADMINS SET pwd ='$new1' WHERE admin_id = '$tempuid'";
	else
		$sql = "UPDATE STUDENTS SET pwd ='$new1' WHERE student_id = '$tempuid'";
	$result = mysqli_query($connection,$sql) or die('Error making updating user pwd' . mysqli_error($connection));

	$_SESSION['errors'] = array("Your password is updated.");
	if($_SESSION['usertype'] == '0'){
		header('Location: AdminPortol/AdminChangePassword.php');
	}
	else{
		header('Location: StudentPortol/change_password.php');
	}
	exit;
?>