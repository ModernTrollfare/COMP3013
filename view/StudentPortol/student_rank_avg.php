    <?php session_start();
        if(!((isset($_SESSION['username']))&&(isset($_SESSION['password'])))){
            header("Location: ../index.php");
            $_SESSION['errors'] = array("Please Login before proceeding.");
        }
        else if($_SESSION['usertype'] != '1'){
            header("Refresh:3;url=../index.php");
            print("Well - You do not have the permission to access this page. You will be redirected to your home page in 3 seconds.");
            exit;
        }
      
    ?>
    <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Rankings</title>
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
              <li><a href="student_main.php">Main Page</a></li>
              <li class="nav-header">Assignments</li>
              <li><a href="upload_assignment.php">Uploading Assignments</a></li>
              <li class="active"><a href="student_rank.php">Ranking</a></li>
              <!-- <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li> -->
              <li class="nav-header">Assessments</li>
              <li><a href="view_allocated_assignments.php">Assessing other groups</a></li>
              <li><a href="view_grades_and_comments.php">Viewing Grades and Comments from Others</a></li>
              <!-- <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li> -->
              <li class="nav-header">Personal and Group Details</li>
              <!-- <li><a href="change_group_details.php">Changing Group Details</a></li> -->
              <li><a href="change_password.php">Changing Personal Password</a></li>
              <li class="nav-header">Group Forum</li>
              <li><a href="forum_index.php">Group Forum index page</a></li>
              <!-- <li><a href="#">Link</a></li> -->
            </ul>
          </div><!--/.well -->
        </div><!--/span-->
        <div class="span9">
          <div class="hero-unit">
            <h3>Rankings (By average Marks)</h3>
              <p> Students can only see the rankings of themselves and the groups which assessed them.</p> 
                <?php 
                  if (isset($_SESSION['errors'])){
                    // echo '<font color= "#FF0000">';
                    // echo("{$_SESSION['errors']}"."</font><br />");
                    foreach($_SESSION['errors'] as $error){
                      echo '<font color= "#FF0000">';
                      echo("{$error}"."</font><br />");
                    }
                  }
                  unset($_SESSION['errors']);
                ?>
                <a href="student_rank.php" class="btn">Sort by aggregate marks instead</a>
            <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th style="width: 25%;">Rank</th>
                  <th style="width: 25%;">Group</th>
                  <th style="width: 25%;">Aggregate Marks</th>
                  <th style="width: 25%;">Average Marks</th>
                </tr>
              </thead>
            <?php
              $connection = mysqli_connect('eu-cdbr-azure-west-a.cloudapp.net','b94aada7921f78','cf9ed572','peerassakprqvuge') or die('Error connecting to MySQL server.'. mysqli_error($connection));
              $stuid = $_SESSION['userid'];
              $query = "SELECT * FROM GROUPS WHERE student_1 = '$stuid' OR student_2 = '$stuid' OR student_3 = '$stuid'";
              $result = mysqli_query($connection, $query)
                or die('Error Query'.mysqli_error($connection));
              $tmp = mysqli_fetch_assoc($result);
              $gid = $tmp['group_id'];
                            $query ="SELECT SUM(ASSessments.grade) AS gradesum,
                              AVG(assessments.grade) AS gradeavg,
                              reports.group_id AS rgroup
                      FROM ASSESSMENTS,REPORTS 
                      WHERE assessments.report_id = reports.report_id 
                      GROUP BY assessments.report_id 
                      ORDER BY AVG(ASSessments.grade) DESC";
              $result = mysqli_query($connection, $query)
                or die('Error Query'.mysqli_error($connection));
                $i = 1;
              $query2 = "SELECT assessments.group_id AS agid from ASSessments,REPORTS where Assessments.report_id = reports.report_id AND reports.group_id='$gid'";
               $result2 = mysqli_query($connection,$query2) or die ("ERROR");
              $agrp = array();
              while($row = $result2->fetch_assoc())
                $agrp[] = $row;
              // var_dump($agrp);
              // exit;
              while ($row = mysqli_fetch_assoc($result)) {
                $flag = false;
                if($row['rgroup'] != $gid){
                  for($j = 0; $j < 500; $j += 1){
                    if($agrp[$j]["agid"] == $row['agid']){
                      $flag = TRUE;
                      break;
                    }
                  }
                }
                if($row['rgroup'] == $gid){
                  echo '<tr style="background-color:#00FFFF"><td>'.$i.'</td>';
                  $flag = TRUE;
                }
                else if ($flag){
                  echo '<tr><td>'.$i.'</td>';
                }
                if($flag)
                echo'
                            <td>'.$row["rgroup"].'</td>
                            <td>'.$row["gradesum"].'</td>
                            <td>'.$row["gradeavg"].'</td>
                          </tr>';
                $i += 1;
              };
            mysqli_close($connection);
            ?>
              </tbody>
            </table>
          </div> 
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
