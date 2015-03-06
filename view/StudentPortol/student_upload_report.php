<?php
	session_start();
	$connection = mysqli_connect('localhost','toor','toor','comp3013') or die('Error connecting to MySQL server.'. mysqli_error($connection));
	// $title = $_GET[report_title];
	$content = $_GET[report_content];
	$userid = $_SESSION['userid'];
	$date = date('Y-m-d H:i:s');

	$query = "SELECT group_id FROM groups WHERE sid_1 = '$userid' OR sid_2 = '$userid' OR sid_3 = '$userid'"

	$realuid = mysqli_fetch_row(mysqli_query($query));
	$groupid = $realuid[0];

	$query = "INSERT INTO reports (text_file, group_id, last_modified) VALUES ($content, $groupid, $date)"

	echo '<script language="javascript">
alert("upload successful! It will direct you back to Main Page in 5 secs")
</script>';

	header('refresh:5; url=student_main.php');

?>