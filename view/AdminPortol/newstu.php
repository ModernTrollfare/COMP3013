<?php
	session_start();
	$connection = mysqli_connect('localhost','toor','toor','comp3013') or die('Error connecting to MySQL server.'. mysqli_error($connection));
	$randpw = substr(str_shuffle(MD5(microtime())), 0, 10);
	$name = $_POST['inputName'];
	$query = "SELECT MAX(student_id) FROM STUDENTS";
	$result = mysqli_query($query) or die('Error making select users query' . mysqli_error($connection));
	$array = mysqli_fetch_assoc($result);
	$newid = $array[0] + 1;
	$query = "INSERT INTO STUDENTS (student_id,name,pwd) VALUES ('$newid','$name','$randpw');";
	$result = mysqli_query($query) or die('Error making select users query' . mysqli_error($connection));
	header('Location: RegisterStudentDone.php')
?>



