<?php
	session_start();
	$connection = mysqli_connect('localhost','toor','toor','comp3013') or die('Error connecting to mysqli server.'. mysqli_error($connection));
	$stuid = $_SESSION['userid'];
  	$title = mysqli_real_escape_string($connection,$_POST['title']);
  	$content = mysqli_real_escape_string($connection,$_POST['content']);
    $date = date('Y-m-d H:i:s');		
    $query= "INSERT INTO FORUM (title,message,posttime,lastreplytime,student_id) VALUES ('$title','$content','$date','$date','$stuid');";
     $result = mysqli_query($connection, $query) or die('Error' . mysqli_error($connection));
     $_SESSION['errors'] = array("Thread Published Successfully.");
     header('Location:forum_index.php');
?>	