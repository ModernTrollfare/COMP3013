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
            if($user["usertype"] == '0'){
                header('Location: AdminPortol/workspaceForAdmin.php');
            }
            else{
                header('Location: StudentPortol/student_main.php');
            }
            }
    ?>
    <meta charset="utf-8">
    <title>Peer Assessment System - index</title>
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
    <link href="../lib/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- Custom styles for login template -->
    <link href="../lib/bootstrap/css/signin.css" rel="stylesheet">

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
          <a class="brand" href="index.php">Peer Assessment System</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="index.php">Home</a></li>
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
            <form class="navbar-form pull-right" action="login.php" method="POST">
              <select class="span2" name="UserType">
                  <option value="-1">Select...</option>
                  <option value="0">Teacher</option>
                  <option value="1">Student</option>
              </select>
              <input class="span2" type="text" placeholder="UserID" name="UserID" required="" autofocus="">
              <input class="span2" type="password" placeholder="Password" name="Password" required="">
              <button type="submit" class="btn">Sign in</button>

            </form>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container">

      <!-- Main hero unit for a primary marketing message or call to action -->
      <div class="hero-unit">
            <?php if (isset($_SESSION['errors'])){
                    foreach($_SESSION['errors'] as $error){
            ?>
            <p font color= "#FF0000">
            <?php
                        print($error."\n");
                    }
            }
            ?>
            </p>
        <h1>Virtual Learning Environment</h1>
        <h2>Peer Assessment</h2>
        <p>Hi. Welcome to the Peer Assessment System.</p>
        <h3>Please Login at the top right hand corner.</h3>
        <img src="../resources/pic/homework.jpg" alt="Doing Homework..."> 
        <!-- s -->
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
        <p>Peer Asssessment System</p>
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