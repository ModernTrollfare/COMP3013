<?php
	session_start();
	$connection = mysqli_connect('localhost','toor','toor','comp3013') or die('Error connecting to MySQL server.'. mysqli_error($connection));

	$gid = '123';

	$query = "SELECT REPORTS.group_id FROM ASSESMENTS AND REPORTS WHERE ASSESMENTS.report_id = REPORTS.report_id AND ASSESMENTS.group_id ='$gid'";
	$result = mysqli_query($connection, $query)
		or die('Error Query'.mysql_error());

	$row = mysqli_fetch_array($result);
	
	while ($row != NULL) {
		echo '<p>Group $row</p>';
		$row = mysqli_fetch_array($result);
	};
	

	mysqli_close($connection);
?>