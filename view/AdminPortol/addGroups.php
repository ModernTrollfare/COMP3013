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
    
    require '../rnsession.php';
?>
<!DOCTYPE html>
<!-- saved from url=(0049)http://getbootstrap.com/2.3.2/examples/fluid.php -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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
              <li class="active"><a href="addGroups.php">Add/Remove groups</a></li>
              <li><a href="StudentEnrollment.php">Assign Student to groups</a></li>
              <li class="nav-header">Assignment & Assessment</li>
              <li><a href="AssignmentManagement.php">View Assignments</a></li>
              <li class="nav-header">My Profile</li>
              <li><a href="AdminChangePassword.php">Change Password</a></li>
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
          <h2 class="sub-header">Add new groups</h2>
          <?php
          if(isset($_SESSION['adderrors'])){
                echo '<font color="#FF0000">';
                print($_SESSION['adderrors']);
                echo '<br></br></font>';
            }
            unset($_SESSION['adderrors']);
          ?>
          <form action="addAction.php" method="POST">
            <label for="groupnums" class="sr-only">Number of groups to be enrolled</label>
              <select class="span2" name="groupnums" id ="groupnums">
                <?php
                  for( $i = 1; $i <= 20; $i += 1){
                    echo "<option value=".$i.">".$i."</option>";
                  }
                ?>
              </select>
              <br></br>
              <button type="submit" class="btn">Add Groups</button>
            </form>
          <h2 class="sub-header">Remove Groups</h2>
          <?php
          if(isset($_SESSION['remerrors'])){
                echo '<font color="#FF0000">';
                print($_SESSION['remerrors']);
                echo '<br></br></font>';
            }
            unset($_SESSION['remerrors']);
          ?>
          <form class="form-signin" action="remAction.php" method="POST">
              <label for="input" class="sr-only" >Group to be removed</label>
              <input type="name" id="input" name="input" class="form-control" placeholder="Group ID" required="" autofocus="">         
              <br></br>    
              <button class="btn" type="submit">Remove</button>
            </form>
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