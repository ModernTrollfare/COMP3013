<?php
	session_start();
	$connection = mysqli_connect('localhost','toor','toor','comp3013') or die('Error connecting to mysqli server.'. mysqlii_error($connection));
	$group_be_viewed = $_POST['group_be_viewed'];
	$group_be_assigned = $_POST['group_be_assigned'];


	// Checking the input values are not null
	if (($group_be_assigned == NULL) || ($group_be_viewed == NULL)) {
		echo "<script type='text/javascript'>alert('Neither of them can be empty. Going back in 3 Sec');</script>";
		header('Refresh: 3; url=AssignAssignmentManagement.php');
		exit;
	};

	// Checking the input values are not the same
	if ($group_be_assigned == $group_be_viewed) {
		echo "<script type='text/javascript'>alert('They Cannot be the Same. Going back in 3 Sec'');</script>";
		header('Refresh: 3; url=AssignAssignmentManagement.php');
		exit;
	};

	$query = "SELECT MAX(group_id) FROM GROUPS";
  $results = mysqli_query($connection,$query);
  $maxid = mysqli_fetch_assoc($results)['MAX(group_id)'];

  // Checking the input values are not unvalid
  if (($group_be_assigned > $maxid) || ($group_be_viewed > $maxid)) {
		echo "<script type='text/javascript'>alert('The Group is not Existed. Going back in 3 Sec');</script>";
		header('Refresh: 3; url=AssignAssignmentManagement.php');
		exit;
	};

	$query = "SELECT * FROM ASSIGNATIONS WHERE group_to_be_assessed = '$group_be_viewed' AND group_assessing = '$group_be_assigned';";
	$results = mysqli_query($connection,$query);

	// Checking that does the pair is alraeady existed
	if (mysqli_fetch_assoc($results) == TRUE) {
		echo "<script type='text/javascript'>alert('The Relation is already Existed. Going back in 3 Sec');</script>";
		header('Refresh: 3; url=AssignAssignmentManagement.php');
		exit;
	}

	$query = "INSERT INTO ASSIGNATIONS (group_to_be_assessed, group_assessing) VALUES ('$group_be_viewed', '$group_be_assigned');";

	$results = mysqli_query($connection,$query) or die('Error Assigning');

	if ($results != FALSE){
		echo "<script type='text/javascript'>alert('Assign Sucessful. Going back in 3 Sec');</script>";
		header('Refresh: 3; url=AssignAssignmentManagement.php');
		exit;
	} else {
		echo "<script type='text/javascript'>alert('Something Wrong. Going back in 3 Sec');</script>";
		header('Refresh: 3; url=AssignAssignmentManagement.php');
		exit;
	}
?>