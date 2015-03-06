<?php
	session_start();
	$connection = mysqli_connect('localhost','toor','toor','comp3013') or die('Error connecting to MySQL server.'. mysqli_error($connection));
	// $title = $_GET[report_title];
	$content = $_GET[report_content];
	$userid = $_SESSION['userid'];
	$date = date('Y-m-d H:i:s');

	$query = "SELECT group_id FROM groups WHERE sid_1 = '$userid' OR sid_2 = '$userid' OR sid_3 = '$userid'";
	$result = mysqli_query($connection, $query) or die('Error' . mysqli_error($connection));

	if (mysqli_num_rows($result) != 1){
		$_SESSION['errors'] = array("cannot find group_id");
		header('Location: upload_report_2.php');
		exit;
	}

	$realuid = mysqli_fetch_row($result);
	$groupid = $realuid[0];

	$query = "INSERT INTO reports (text_file, group_id, last_modified) VALUES ($content, $groupid, $date)";

	if (mysqli_query($query) != true) {
		echo '<script language="javascript">'
		echo'alert("upload unsuccessful! It will direct you backe in 5 secs")'
		echo '</script>'
		header('refresh:5; url=upload_report_2.php')
	}

	echo '<script language="javascript">'
	echo 'alert("upload successful! It will direct you back to Main Page in 5 secs")'
	echo '</script>';

	header('refresh:5; url=student_main.php');

?>