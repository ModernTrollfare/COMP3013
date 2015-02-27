<!DOCTYPE html>
<!-- saved from url=(0049)http://getbootstrap.com/2.3.2/examples/fluid.php -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <?php session_start();
        if(!((isset($_SESSION['user']))&&(isset($_SESSION['password'])))){
            $_SESSION['errors'] = array("Please Login before proceeding.");
            header("Location: ../index.php");
            exit();
        }
        if($_SESSION['Usertype'] != '0'){
            print("Well - You do not have the permission to access this page. You will be redirected to you home page in 5 seconds.");
            header('Refresh: 5; URL= ../index.php');
            exit();
        }
    ?>
    <meta charset="utf-8">
    <title>View Groups</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="http://getbootstrap.com/2.3.2/assets/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
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
    <link href="http://getbootstrap.com/2.3.2/assets/css/bootstrap-responsive.css" rel="stylesheet">

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
            <form class="navbar-form pull-right">
              <span class="input-group-addon" id="user-greeting" style="color:white">Hi User</span>
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
              <a href="student_main.php">Main Page</a>
              <li class="nav-header">Student</li>
              <li><a href="StudentManagement.php">View Students</a></li>
              <li><a href="RegisterStudent.php">Register New Student</a></li>
              <li class="nav-header">Group</li>
              <li class="active"><a href="GroupManagement.php">View Groups</a></li>
              <li class="nav-header">Assignment & Assessment</li>
              <li><a href="AssignmentManagement.php">View Assignments</a></li>
              <li class="nav-header">My Profile</li>
              <li><a href="AdminChangePassword.php">Change Password</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
          <h2 class="sub-header">Group List</h2>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Group ID</th>
                  <th>Student 1</th>
                  <th>Student 2</th>
                  <th>Student 3</th>
                  <th>Assignment Submitted</th>
                </tr>
              </thead>
              <tbody>
                <?php
                    $connect = mysql_connect("localhost","toor", "toor");
                    if (!$connect) {
                        die(mysql_error());
                    }
                    mysql_select_db("comp3013");
                    
                    $results = mysql_query("SELECT * FROM GROUPS");
                    while($row = mysql_fetch_array($results)) {
                      $student1 = $row['student_1'];
                      $student2 = $row['student_2'];
                      $student3 = $row['student_3'];
                      $studentName1 = mysql_fetch_row(mysql_query("SELECT name FROM students WHERE student_id = '$student1'"));
                      $studentName2 = mysql_fetch_row(mysql_query("SELECT name FROM students WHERE student_id = '$student2'"));
                      $studentName3 = mysql_fetch_row(mysql_query("SELECT name FROM students WHERE student_id = '$student3'"));
                      echo "<tr><td>" . $row['group_id'] . "</td><td>" . $studentName1[0]. "</td><td>" . 
                            $studentName2[0] . "</td><td>" . $studentName3[0] . "</td>";
                      $groupID = $row['group_id'];
                      //print($studentID);
                      $report = mysql_query("SELECT report_id FROM REPORTS WHERE group_id = '$groupID'");
                      if(mysql_num_rows($report)==1){
                        echo "<td>&#10004</td></tr>";
                      }else {
                        echo "<td></td></tr>";
                      }
                    }
                    mysql_close();
                ?>

              </tbody>
            </table>
          </div>
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

  

<embed id="xunlei_com_thunder_helper_plugin_d462f475-c18e-46be-bd10-327458d045bd" type="application/thunder_download_plugin" height="0" width="0"></body></html>v