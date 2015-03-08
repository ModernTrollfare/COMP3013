<?php
	session_start();
	$connection = mysqli_connect('localhost','toor','toor','comp3013') or die('Error connecting to mysqli server.'. mysqlii_error($connection));
	$results = mysqli_query($connection,"SELECT * FROM GROUPS");
    while($row = mysqli_fetch_array($results)) {
      $student1 = $row['student_1'];
      $student2 = $row['student_2'];
      $student3 = $row['student_3'];
      $nos = 3;
      $studentName1 = mysqli_fetch_row(mysqli_query("SELECT name FROM students WHERE student_id = '$student1'"));
      $studentName2 = mysqli_fetch_row(mysqli_query("SELECT name FROM students WHERE student_id = '$student2'"));
      $studentName3 = mysqli_fetch_row(mysqli_query("SELECT name FROM students WHERE student_id = '$student3'"));
      if(mysqli_num_rows($studentName1) == 0){
        $studentName1['name'] = "Unassigned";
        $nos = $nos-1;
      }
      if(mysqli_num_rows($studentName2) == 0){
        $studentName2['name'] = "Unassigned";
        $nos = $nos-1;
      }
      if(mysqli_num_rows($studentName3) == 0){
        $studentName3['name'] = "Unassigned";
        $nos = $nos-1;
      }
      if($nos == 0){
      	$_SESSION['adderrors'] = "You already have an empty group. Please enroll students to".$row['group_id']."before you add a new group.";
      	header('Location:addGroups.php');
      	exit;
      }
    }
    $query = "SELECT MAX(group_id) FROM GROUPS";
    $results = mysqli_query($connection,$query);
    $newid = mysqli_fetch_assoc($results)['MAX(group_id)']+ 1;
  for($i = 0; $i < $_POST['groupnums']; $i += 1){
    $n = $newid + $i;
    $query = "INSERT INTO GROUPS (group_id) VALUES ('$n');";
  }
	if($_POST['groupnums'] == 1)
    $_SESSION['adderrors'] = "Group ".$newid." is added successfully.";
  else
    $_SESSION['adderrors'] = $_POST['groupnums']." groups are added successfully (Groups ".$newid." to ".($newid+$_POST['groupnums']-1).").";
	header('Location:addGroups.php');
	exit;
?>


