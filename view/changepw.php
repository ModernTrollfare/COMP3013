<?php
	session_start();
	$connection = mysqli_connect('localhost','toor','toor','comp3013') or die('Error connecting to MySQL server.'. mysqli_error($connection));
	$oldpw = $_POST['OldPassword'];
	$new1  = $_POST['NewPassword1'];
	$new2  = $_POST['NewPassword2'];
	$uid = $_SESSION['uacc'];
	if ($new1 != $new2){
		$_SESSION['errors'] = 'You new passwords does not match.'
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
	$temp = mysql_fetch_row($result);
	$tempuid = $temp[0];
	if($usertype == "0")
		$sql = "UPDATE ADMINS SET pwd ='$new1' WHERE admin_id = '$tempuid'";
	else
		$sql = "UPDATE STUDENTS SET pwd ='$new1' WHERE student_id = '$tempuid'";
	$_SESSION['errors'] = array("Your password is updated.");
	if($_SESSION['usertype'] == '0'){
		header('Location: AdminPortol/AdminChangePassword.php');
	}
	else{
		header('Location: StudentPortol/change_password.php');
	}
	exit;
?>