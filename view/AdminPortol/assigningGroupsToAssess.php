<?php
	session_start();
	$connection = mysqli_connect('localhost','toor','toor','comp3013') or die('Error connecting to mysqli server.'. mysqlii_error($connection));
	$group_be_viewed = mysqli_real_escape_string($connection,$_POST['group_be_viewed']);
	$group_be_assigned =mysqli_real_escape_string($connection, $_POST['group_be_assigned']);


	// Checking the input values are not null
	if (($group_be_assigned == NULL) || ($group_be_viewed == NULL)) {
		ob_start();
		echo "<script type='text/javascript'>alert('Neither of them can be empty. Going back in 3 Sec');</script>";
		header('Refresh: 3; url=AssignAssignmentManagement.php');
		ob_end_flush();
		exit;
	};

	// Checking the input values are not the same
	if ($group_be_assigned == $group_be_viewed) {
		ob_start();
		echo "<script type='text/javascript'>alert('They Cannot be the Same. Going back in 3 Sec');</script>";
		header('Refresh: 3; url=AssignAssignmentManagement.php');
		ob_end_flush();
		exit;
	};

	$query = "SELECT MAX(group_id) FROM GROUPS";
	  $results = mysqli_query($connection,$query);
	  $maxid = mysqli_fetch_assoc($results)['MAX(group_id)'];

	  if(is_null($maxid)){
	  		ob_start();
			echo "<script type='text/javascript'>alert('There are no groups. Please add groups before proceeding. Going back in 3 Sec');</script>";
			header('Refresh: 3; url=AssignAssignmentManagement.php');
			ob_end_flush();
			exit;
	  }
	  // Checking the input values are not unvalid
	  if (($group_be_assigned > $maxid) || ($group_be_viewed > $maxid)) {
	  		ob_start();
			echo "<script type='text/javascript'>alert('The Group is not Existed. Going back in 3 Sec');</script>";
			header('Refresh: 3; url=AssignAssignmentManagement.php');
			ob_end_flush();
			exit;
		};

		$query = "SELECT * FROM ASSIGNATIONS WHERE group_to_be_assessed = '$group_be_viewed' AND group_assessing = '$group_be_assigned';";
		$results = mysqli_query($connection,$query);

	// Checking that does the pair is alraeady existed
	if (mysqli_fetch_assoc($results) == TRUE) {
		ob_start();
		echo "<script type='text/javascript'>alert('The Relation is already Existed. Going back in 3 Sec');</script>";
		header('Refresh: 3; url=AssignAssignmentManagement.php');
		ob_end_flush();
		exit;
	}

	$query = "INSERT INTO ASSIGNATIONS (group_to_be_assessed, group_assessing) VALUES ('$group_be_viewed', '$group_be_assigned');";

	$results = mysqli_query($connection,$query) or die('Error Assigning');

	if ($results != FALSE){
		ob_start();
		echo "<script type='text/javascript'>alert('Assign Sucessful. Going back in 3 Sec');</script>";
		header('Refresh: 3; url=AssignAssignmentManagement.php');
		ob_end_flush();
		exit;
	} else {
		ob_start();
		echo "<script type='text/javascript'>alert('Something Wrong. Going back in 3 Sec');</script>";
		header('Refresh: 3; url=AssignAssignmentManagement.php');
		ob_end_flush();
		exit;
	}
?>