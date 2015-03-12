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
    <title>View Assignments</title>
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
              <li><a href="student_rank.php">Ranking</a></li>
              <!-- <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li> -->
              <li class="nav-header">Assessments</li>
              <li class="active"><a href="view_allocated_assignments.php">Assessing other groups</a></li>
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
            <h3>Upload Assessment</h3>
              <form action="uploadassessments.php" method="POST">
                    <?php
                          if(isset($_SESSION['uass'])){
                              echo '<font color="#FF0000">';
                              print($_SESSION['uass']);
                              echo '<br></br></font>';
                          }
                          unset($_SESSION['uass']);
                    ?>
                      <p><label class="" for="assessedgrp">Group to be assessed</label>
                      <select class="span2" name="assessedgrp" id="assessedgrp">
                      <?php
                        $connection = mysqli_connect('localhost','toor','toor','comp3013') or die('Error connecting to mysql server.'. mysqli_error($connection));
                        $stuid = $_SESSION['userid'];
                        $query = "SELECT * FROM GROUPS WHERE student_1 = '$stuid' OR student_2 = '$stuid' OR student_3 = '$stuid'";
                        $results = mysqli_query($connection,$query);
                        $tmp = mysqli_fetch_assoc($results);
                        $owngrp = $tmp['group_id'];
                        $results = mysqli_query($connection,"SELECT * FROM GROUPS");
                        // while($row = mysqli_fetch_assoc($results)) {                          
                        //     $student1 = $row['student_1'];
                        //     $student2 = $row['student_2'];
                        //     $student3 = $row['student_3'];
                        //     $nos = 3;
                        //   if((string)$student1 == "" ){
                        //     $studentName1['name'] = "Unassigned";
                        //     $nos = $nos-1;
                        //   }
                        //   if((string)$student2 == "" ){
                        //     $studentName2['name'] = "Unassigned";
                        //     $nos = $nos-1;
                        //   }
                        //   if((string)$student3 == "" ){
                        //     $studentName3['name'] = "Unassigned";
                        //     $nos = $nos-1;
                        //   }
                        //   if($nos != 0 && ($row['group_id']!= $owngrp)){
                            $query = "SELECT * FROM ASSIGNATIONS WHERE group_assessing = '$rowgid'";
                            $report = mysqli_query($connection,"SELECT report_id FROM REPORTS WHERE group_id = '$groupID'");
                            if(mysql_num_rows($report) != 0){  
                              while(mysqli_fetch_assoc($report)){                
                                echo '<option value="'.$row['group_to_be_assessed'].'">'.$row['group_to_be_assessed'].'</option>';
                              }
                            }else{
                              echo '<option>No Group Assigned</option>';
                            }
                        //   }//end if
                        // }//end while
                        $_SESSION['owngrp'] = $owngrp;
                      ?>
                      </select>
                      </p>
                      <p><label class="" for"marks">Marks Given</label>
                      <select class="span2" name="marks" id="marks">
                        <?php
                        for($i = 0; $i <= 100; $i+=1){
                          echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                        ?>
                      </select>
                      </p>
                      <p><label class="" for"comments">Comments to the report</label>
                      <textarea name="comments" id="comments" placeholder="Contents Here...." style="resize: none; width:750px ;height: 150px;"></textarea></p>
                      <p><button type="submit" class="btn btn-primary">Upload Assessment</button>
                      <a class="btn" style="float:right" href="view_allocated_assignments.php" onclick="return confirm('Are you sure? You will lose anything unsaved.');">Give up and go back</a>
                     </p>
                    </form>
                  
           </div>
          <?php
            mysqli_close($connection);
          ?>     
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
