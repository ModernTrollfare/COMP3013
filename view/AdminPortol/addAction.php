<?php
	session_start();
	$connection = mysqli_connect('eu-cdbr-azure-west-a.cloudapp.net','b94aada7921f78','cf9ed572','peerassakprqvuge') or die('Error connecting to mysqli server.'. mysqlii_error($connection));
	$results = mysqli_query($connection,"SELECT * FROM GROUPS");
    while($row = mysqli_fetch_assoc($results)) {
      $student1 = $row['student_1'];
      $student2 = $row['student_2'];
      $student3 = $row['student_3'];
      $nos = 3;
      if((string)$student1 == "" ){
        $nos = $nos-1;
      }
      if((string)$student2 == "" ){
        $nos = $nos-1;
      }
      if((string)$student3 == "" ){
        $nos = $nos-1;
      }
      if($nos == 0){
      	$_SESSION['adderrors'] = "You already have an empty group. Please enroll students to group ".$row['group_id']." before you add a new group.";
        header('Location:addGroups.php');
      	exit;
      }
    }
    $query = "SELECT MAX(group_id) FROM GROUPS";
    $results = mysqli_query($connection,$query);

    //var_dump(mysqli_fetch_assoc($results)['MAX(group_id)']);
    if(!is_null($tmp=mysqli_fetch_assoc($results)['MAX(group_id)'])){
      $newid = $tmp+ 1;
    }
    else
      $newid = 0;
  for($i = 0; $i < $_POST['groupnums']; $i += 1){
    $n = $newid + $i;
    $query = "INSERT INTO GROUPS (group_id) VALUES ('$n');";
    $result = mysqli_query($connection,$query) or die('Error making insert query' . mysqli_error($connection));
  }
	if($_POST['groupnums'] == 1)
    $_SESSION['adderrors'] = "Group ".$newid." is added successfully.";
  else
    $_SESSION['adderrors'] = $_POST['groupnums']." groups are added successfully (Groups ".$newid." to ".($newid+$_POST['groupnums']-1).").";
	header('Location:addGroups.php');
	exit;
?>


