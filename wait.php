<?php

  // Inialize session
  session_start();
  
  // Check, if user is already login, then jump to secured page
  if (isset($_SESSION['username'])) {
    header('Location: thread.php');
  }

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Gotta wait &middot; WebText</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        
        padding: 19px 29px 49px;
      
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="email"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="shortcut icon" href="images/favicon.ico">
   
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">WebText</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="/login">Sign In</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <!--
    <header class="jumbotron subhead" id="overview">
      <img src = "images/banner1.png"/>
    </header>
  -->
    <div class = "row" style = "margin-top:1em;">
    </div>




    <div class="container">
     
      
      <div class = "row-fluid">
        <div class = "span12">
          <div class="hero-unit">
            <h1>WebText<small>&nbsp;Stay Connected! Always!</small></h1>
          </div>
        </div>
      </div>

      <div class = "row-fluid">
        <div class = "span8">
          <div class="hero-unit" style ="height:100%;" >
            
            <p>							
				Your account has not been activated yet...<br/>
				Please wait for an administrator to activate your account.<br/>
				Sorry for the inconvenience. :(
			</p>
            
          </div>
        </div>
        <div class = "span4">

          <form class="form-signin" onsubmit = "check();">
            <h2 class="form-signin-heading">Sign in</h2><br/>
            <input type="email" name="username"  id="email" class="input-block-level" placeholder="Email address">
            <input type="password" name="password" id="user_pass" class="input-block-level" placeholder="Password">
            <p id = "result" style = "color: red;"></p>

            <button class="btn btn-large btn-primary" type="submit">Sign in</button>
          </form>
        </div>
      </div>
      <hr/>
      <footer>
        <center><p>&copy; <a href="http://insigniadevs.com">Insignia Devs</a> | Developed by: <a href="mailto:ali@insigniadevs.com?subject=WebText Support">Ali Asgar</a> and <a href="mailto:harshit@insigniadevs.com?subject=WebText Support">Harshit Jain</a></p></center>
      </footer>
    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/login.js"></script>
    <script src="js/sha256.js"></script>

  </body>
</html>