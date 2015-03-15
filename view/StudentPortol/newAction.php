<?php
	session_start();
	$connection = mysqli_connect('localhost','toor','toor','comp3013') or die('Error connecting to mysqli server.'. mysqli_error($connection));
	$stuid = $_SESSION['userid'];
  	$gid = mysqli_query($connection,"SELECT group_id FROM GROUPS WHERE student_1 = '$stuid' OR student_2 = '$stuid' OR student_3 = '$stuid'");
  	$gid = mysqli_fetch_assoc($gid)['group_id'];
  	$title = mysqli_real_escape_string($connection,$_POST['title']);
  	$content = mysqli_real_escape_string($connection,$_POST['content']);
    $date = date('Y-m-d H:i:s');		
    $query= "INSERT INTO FORUM (title,message,posttime,lastreplytime,group_id,student_id) VALUES ('$title','$content','$date','$date','$gid','$stuid');";
     $result = mysqli_query($connection, $query) or die('Error' . mysqli_error($connection));
     $_SESSION['errors'] = array("Thread Published Successfully.");
     header('Location:forum_index.php');
?>	