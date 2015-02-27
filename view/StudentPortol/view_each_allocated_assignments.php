<!DOCTYPE html>
<html lang="en">
  <?php session_start();
        if(!((isset($_SESSION['user']))&&(isset($_SESSION['password'])))){
            $_SESSION['errors'] = array("Please Login before proceeding.");
            header("Location: ../index.php");
        }
        if($_SESSION['Usertype'] != '1'){
            print("Well - You do not have the permission to access this page. You will be redirected to you home page in 5 seconds.");
            header('Refresh: 5; URL= ../index.php');
        }
    ?>
  <head>
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
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
                                   <link rel="shortcut icon" href="../assets/ico/favicon.png">
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
              <li class="active"><a href="student_main.php">Home</a></li>
              <li><a href="about.php">About</a></li>
              <!-- <li><a href="#contact">Contact</a></li> -->
              <!-- <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li class="nav-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li> -->
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
              <li><a href="student_main.php">Main Page</a></li>
              <li class="nav-header">Assignments</li>
              <li><a href="upload_assignment.php">Uploading</a></li>
              <!-- <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li> -->
              <li class="nav-header">Assessments</li>
              <li class="active"><a href="view_allocated_assignments.php">Viewing Allocated Assignments</a></li>
              <li><a href="view_grades_and_comments.php">Viewing Grades and Comments from Others</a></li>
              <!-- <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li> -->
              <li class="nav-header">Personal and Group Details</li>
              <li><a href="change_group_details.php">Changing Group Details</a></li>
              <li><a href="change_password.php">Changing Personal Password</a></li>
              <!-- <li><a href="#">Link</a></li> -->
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
          <div class="hero-unit">
            <h3>[Group Number]</h3>
            <p> Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... Lots of Contents... </p>
            <!-- <p><a href="#" class="btn btn-primary btn-large">Upload </a></p> -->
          </div>

          <div class="hero-unit">
            <select class="span2" name="grade">
              <option value="-1">Grade</option>
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>
            <p><input class="span9" type="text" placeholder="Comment" name="comment" required=""></p>
            <p></p>
            <p><a href="#" class="btn btn-primary btn-large">Submit </a></p>
          </div>
          
          
          
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; Peer Assessment System</p>
      </footer>

    </div><!--/.fluid-container-->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
    <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script>

  </body>
</html>