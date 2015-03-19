<?php
	session_start();
	$pid = $_GET['pid'];
	$connection = mysqli_connect('eu-cdbr-azure-west-a.cloudapp.net','b94aada7921f78','cf9ed572','peerassakprqvuge') or die('Error connecting to mysqli server.'. mysqli_error($connection));
	$stuid = $_SESSION['userid'];
  	$reply = mysqli_real_escape_string($connection,$_POST['reply']);
    $date = date('Y-m-d H:i:s');		
    $query= "INSERT INTO FORUM (message,parentThread,posttime,lastreplytime,student_id) VALUES ('$reply','$pid','$date','$date','$stuid');";
     $result = mysqli_query($connection, $query) or die('Error' . mysqli_error($connection)); 		
    $query= "UPDATE FORUM SET lastreplytime = '$date' WHERE thread_id='$pid'";
     $result = mysqli_query($connection, $query) or die('Error' . mysqli_error($connection));
     $_SESSION['errors'] = array("Thread Published Successfully.");
     header('Location:viewthread.php?tid='.$pid);
?>	