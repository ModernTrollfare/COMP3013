<?php
	session_start();
	$connection = mysqli_connect('eu-cdbr-azure-west-a.cloudapp.net','b94aada7921f78','cf9ed572','peerassakprqvuge') or die('Error connecting to MySQL server.'. mysqli_error($connection));
	$randpw = substr(str_shuffle(MD5(microtime())), 0, 10);
	$name = mysqli_real_escape_string($connection,$_POST['inputName']);
	$query = "SELECT MAX(student_id) FROM STUDENTS";
	$result = mysqli_query($connection,$query) or die('Error making select users query' . mysqli_error($connection));
	$array = mysqli_fetch_assoc($result);
	if(!is_null($array["MAX(student_id)"]))
		$newid = $array["MAX(student_id)"] + 1;
	else
		$newid = 0;
	$_SESSION['realpw'] = $randpw;
	$randpw = sha1(md5($randpw));
	$randpw = sha1(md5($randpw));
	$query = "INSERT INTO STUDENTS (student_id,name,pwd) VALUES ('$newid','$name','$randpw');";
	$result = mysqli_query($connection,$query) or die('Error making select users query' . mysqli_error($connection));
	header('Location: RegisterStudentDone.php')
?>



