<?php session_start();
    if(!((isset($_SESSION['username']))&&(isset($_SESSION['password'])))){
        header("Location: ../index.php");
        $_SESSION['errors'] = array("Please Login before proceeding.");
    }
    else if($_SESSION['usertype'] != '0'){
        header("Refresh:3;url=../index.php");
        print("Well - You do not have the permission to access this page. You will be redirected to you home page in 3 seconds.");
        exit;
    }
?>
<!DOCTYPE html>
<!-- saved from url=(0049)http://getbootstrap.com/2.3.2/examples/fluid.php -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>View Assignment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../../lib/bootstrap/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
      .in.collapse+a.btn.showdetails:before
      {
          content:'Hide comments «';
      }
      .collapse+a.btn.showdetails:before
      {
          content:'Show comments »';
      }

      @media (max-width: 980px) {
        /* Enable use of floated navbar text */
        .navbar-text.pull-right {
          float: none;
          padding-left: 5px;
          padding-right: 5px;
        }
      }
    </style>
    <link href="../../lib/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://getbootstrap.com/2.3.2/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://getbootstrap.com/2.3.2/assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://getbootstrap.com/2.3.2/assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="http://getbootstrap.com/2.3.2/assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="http://getbootstrap.com/2.3.2/assets/ico/favicon.png">
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">Peer Assessment System</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="workspaceForAdmin.php">Home</a></li>
              <li><a href="../about.php">About</a></li>
            </ul>
            <form class="navbar-form pull-right" action="../logout.php">
              <span class="input-group-addon" id="user-greeting" style="color:white">Hi <?php print($_SESSION['username']);?></span>
              <button type="submit" class="btn">Sign Out</button>
            </form>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span3">
          <div class="well sidebar-nav">
            <ul class="nav nav-list">
              <a href="workspaceForAdmin.php">Main Page</a>
              <li class="nav-header">Student</li>
              <li ><a href="StudentManagement.php">View Students</a></li>
              <li><a href="RegisterStudent.php">Register New Student</a></li>
              <li class="nav-header">Group</li>
              <li><a href="GroupManagement.php">View Groups</a></li>
              <li><a href="addGroups.php">Add/Remove groups</a></li>
              <li><a href="StudentEnrollment.php">Assign Student to groups</a></li>
              <li class="nav-header">Assignment & Assessment</li>
              <li class="active"><a href="AssignmentManagement.php">View Assignments</a></li>
              <li><a href="AssignAssignmentManagement.php">Assign Group Assessments</a></li>
              <li><a href="rank.php">Ranking</a></li>
              <li class="nav-header">My Profile</li>
              <li><a href="AdminChangePassword.php">Change Password</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
          <div class="hero-unit">
            <?php
                $connection = mysqli_connect('localhost','toor','toor','comp3013') or die('Error connecting to mysqli server.'. mysqli_error($connection));
                $gid = $_GET['gid'];
                $flag = 1;
                $test = 0;
                while($flag){
                  if(sha1($test) != $gid){
                    $test += 1;
                  }
                  else{
                    $flag = 0;
                  }
                }
            ?>
            <h1>Assignment Detail</h1>
                      <?php
                      echo '<p>Group '.$test.':</p>';
            $query = "SELECT last_modified ,xml_file FROM REPORTS WHERE group_id = '$gid'";
            $result = mysqli_query($connection, $query)
              or die('Error Query'.mysqli_error($connection));
            $temp = mysqli_fetch_assoc($result);           
            if($temp!=0){  
              echo '<p>Last Upload Date: '.$temp['last_modified']."</p>";            
              echo '<a href="../'.$temp['xml_file'].'" class="btn"> View Assignment File</a>';
            }else{
              echo '<p>Last Upload Date: No File Uploaded</p>';  
            }
          ?>
          </div>
          <h2 class="sub-header">Assessment</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Assessing Group ID</th>
                  <th>Marks Given</th>
                  <th width=70%>Comment</th>
                </tr>
              </thead>
              <tbody>
              <?php
                $query = "SELECT report_id FROM REPORTS where group_id = '$test'";
                $results = mysqli_fetch_assoc(mysqli_query($connection,$query));
                $rid = $results['report_id'];
                $query = "SELECT group_id,grade,comments FROM ASSESSMENTS WHERE report_id = '$rid'";
                $results = mysqli_query($connection,$query);
                while($myrow = mysqli_fetch_assoc($results)) {
                  echo "<tr><td>";
                  print($myrow['group_id']);
                  echo "</td><td>";
                  print($myrow['grade']);
                  echo '</td><td>';
                  print($myrow['comments']);
                  echo '</td></tr>';
                }
                ?>              
              </tbody>
            </table>
          </div>
      <button onclick="history.go(-1);">Go back</button>
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>© Company 2013</p>
      </footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./workspace_files/jquery.js"></script>
    <script src="./workspace_files/bootstrap-transition.js"></script>
    <script src="./workspace_files/bootstrap-alert.js"></script>
    <script src="./workspace_files/bootstrap-modal.js"></script>
    <script src="./workspace_files/bootstrap-dropdown.js"></script>
    <script src="./workspace_files/bootstrap-scrollspy.js"></script>
    <script src="./workspace_files/bootstrap-tab.js"></script>
    <script src="./workspace_files/bootstrap-tooltip.js"></script>
    <script src="./workspace_files/bootstrap-popover.js"></script>
    <script src="./workspace_files/bootstrap-button.js"></script>
    <script src="./workspace_files/bootstrap-collapse.js"></script>
    <script src="./workspace_files/bootstrap-carousel.js"></script>
    <script src="./workspace_files/bootstrap-typeahead.js"></script>

  

 