<?php
	session_start();
	$connection = mysqli_connect('eu-cdbr-azure-west-a.cloudapp.net','b94aada7921f78','cf9ed572','peerassakprqvuge') or die('Error connecting to mysqli server.'. mysqli_error($connection));
	$stuid = $_SESSION['userid'];
  	$title = mysqli_real_escape_string($connection,$_POST['title']);
  	$content = mysqli_real_escape_string($connection,$_POST['content']);
    $date = date('Y-m-d H:i:s');		
    $query= "INSERT INTO FORUM (title,message,posttime,lastreplytime,student_id) VALUES ('$title','$content','$date','$date','$stuid');";
     $result = mysqli_query($connection, $query) or die('Error' . mysqli_error($connection));
     $_SESSION['errors'] = array("Thread Published Successfully.");
     header('Location:forum_index.php');
?>	