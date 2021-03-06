<!DOCTYPE html>
<html lang="en">
  <head>
    <?php 
        session_start();
        if(isset($_COOKIE['uinf'])){
            $cookie = $_COOKIE['uinf'];
            $cookie = stripslashes($cookie);
            $user = json_decode($cookie, true);   
            session_unset();
            $_SESSION['userid'] = $user["userid"];
            $_SESSION['username'] = $user["username"];
            $_SESSION['password'] = $user["Password"];
            $_SESSION['usertype'] = $user["usertype"];
            $json = json_encode($user);
            setcookie("uinf", $json, time()+(60*60*6),$_SERVER['DOCUMENT_ROOT']."/master/view/");
            }
    ?>
    <meta charset="utf-8">
    <title>Peer Assessment System - About Us</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../lib/bootstrap/css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet">

    <link href="../lib/css/signin.css" rel="stylesheet">
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
          <?php
          if(isset($_COOKIE['uinf'])){
            if ($_SESSION['usertype'] == '0')
                echo '<a class="brand" href="AdminPortol/workspaceForAdmin.php">Peer Assessment System</a>'."\n";
            else
                echo '<a class="brand" href="StudentPortol/student_main.php">Peer Assessment System</a>'."\n";
          }
          else
            echo '<a class="brand" href="index.php">Peer Assessment System</a>'."\n";
          ?>
          <div class="nav-collapse collapse">
            <ul class="nav">
                <?php
                    if(isset($_COOKIE['uinf'])){
                        if ($_SESSION['usertype'] == '0')
                            echo '<li><a href="AdminPortol/workspaceForAdmin.php">Home</a>'."\n";
                        else
                            echo '<li><a href="StudentPortol/student_main.php">Home</a>'."\n";
                    }
                    else{
                        echo '<li><a href="index.php">Home</a></li>'."\n";
                    }
                ?>
              <li class="active"><a href="about.php">About</a></li>
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
            <?php
            if(isset($_COOKIE['uinf'])){
                echo '<form class="navbar-form pull-right" action="logout.php">'."\n";
                echo '<span class="input-group-addon" id="user-greeting" style="color:white">Hi '.$_SESSION['username'].'</span>'."\n";
                echo '<button type="submit" class="btn">Sign Out</button>'."\n";
                echo '</form>'."\n";
            }
            else{
                echo '<form class="navbar-form pull-right" action="login.php" method="POST">'."\n";
                echo  '<select class="span2" name="UserType">'."\n";
                echo  '<option value="-1">Select...</option>'."\n";
                echo  '<option value="0">Teacher</option>'."\n";
                echo  '<option value="1">Student</option>'."\n";
                echo  '</select>'."\n";
                echo  '<input class="span2" type="text" placeholder="UserID" name="UserID" required="" autofocus="">'."\n";
                echo  '<input class="span2" type="password" placeholder="Password" name="Password" required="">'."\n";
                echo  '<button type="submit" class="btn">Sign in</button>'."\n";
                echo  '</form>'."\n";
            }
            ?>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
        <h1>Virtual Learning Environment</h1>
        <h2>Peer Assessment</h2>
        <p>Each group makes assessments of the reports created by several other groups and each group receives several assessments of their own report from other groups. The assessments each group provides are gradings (e.g., 1 to 5) against a small number of criteria (e.g., the report has identified the most important review sources, etc). Comments are provided to explain the gradings.</p>
        <p><a href="#" class="btn btn-primary btn-large">Learn more &raquo;</a></p>
      </div>

      <!-- Example row of columns -->
      <!-- <div class="row">
        <div class="span4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
        </div>
        <div class="span4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
       </div>
        <div class="span4">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
        </div>
      </div> -->

      <hr>

      <footer>
        <p>Peer Assessment System</p>
      </footer>

    </div> <!-- /container -->

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
