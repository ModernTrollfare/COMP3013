<?php
	session_start();
	// Set Session data to an empty array
	$_SESSION = array();
	// Expire their cookie files
	if(isset($_COOKIE["uinf"])) {
		setcookie("uinf",'',1,$_SERVER['DOCUMENT_ROOT']."/master/view/");
		unset($_COOKIE["uinf"]);
		sleep(1);
	}
	// Destroy the session variables
	session_unset();
	// Double check to see if their sessions exists
	if(isset($_SESSION['username'])){
		header("location: error.html");
	} else {
		header("location: index.php");
		exit();
	} 
?>