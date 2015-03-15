<?php
	session_start();
	$pid = $_GET['pid'];
	$connection = mysqli_connect('localhost','toor','toor','comp3013') or die('Error connecting to mysqli server.'. mysqli_error($connection));
	$stuid = $_SESSION['userid'];
  	$gid = mysqli_query($connection,"SELECT group_id FROM GROUPS WHERE student_1 = '$stuid' OR student_2 = '$stuid' OR student_3 = '$stuid'");
  	$gid = mysqli_fetch_assoc($gid)['group_id'];
  	$reply = mysqli_real_escape_string($connection,$_POST['reply']);
    $date = date('Y-m-d H:i:s');		
    $query= "INSERT INTO FORUM (message,parentThread,posttime,lastreplytime,group_id,student_id) VALUES ('$reply','$pid','$date','$date','$gid','$stuid');";
     $result = mysqli_query($connection, $query) or die('Error' . mysqli_error($connection)); 		
    $query= "UPDATE FORUM SET lastreplytime = '$date' WHERE thread_id='$pid'";
     $result = mysqli_query($connection, $query) or die('Error' . mysqli_error($connection));
     $_SESSION['errors'] = array("Thread Published Successfully.");
     header('Location:viewthread.php?tid='.$pid);
?>	