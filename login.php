<?php
	// Inialize session
	session_start();
	
	// Check, if user is already login, then jump to secured page
	
	if (isset($_SESSION['username']) || isset($_COOKIE['username']) ) {
		header('Location: /');
	}

	/* UNSETTING COOKIES */
	/*
	if (isset($_SERVER['HTTP_COOKIE'])) {
	    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
	    foreach($cookies as $cookie) {
	        $parts = explode('=', $cookie);
	        $name = trim($parts[0]);
	        setcookie($name, '', time()-1000);
	        setcookie($name, '', time()-1000, '/');
	    }
	}
	*/
	
	$app_name = "Closerly";
	$nav_bar_class = "navbar navbar-inverse navbar-fixed-top";
	$boot_style = "css/bootstrap.min.css";
	$body_style = "css/bodyStyle.css";
	$form_style = "css/signin-form.css";
	
	if(!isset($_COOKIE['theme'])) {
		setcookie('theme',"light",time()+60*60*24*30,"/");
	}
	$theme = $_COOKIE['theme'];
	if ($theme == "dark") {
		$nav_bar_class = "navbar navbar-fixed-top";
		$boot_style = "css/bootstrap.cyborg.css";
		$body_style = "css/bodyStyle.cyborg.css";
		$form_style = "css/signin-form.cyborg.css";
	}
	
?>
<!DOCTYPE html>
<!--

  ______  __        ______        _______. _______ .______       __      ____    ____ 
 /      ||  |      /  __  \      /       ||   ____||   _  \     |  |     \   \  /   / 
|  ,----'|  |     |  |  |  |    |   (----`|  |__   |  |_)  |    |  |      \   \/   /  
|  |     |  |     |  |  |  |     \   \    |   __|  |      /     |  |       \_    _/   
|  `----.|  `----.|  `--'  | .----)   |   |  |____ |  |\  \----.|  `----.    |  |     
 \______||_______| \______/  |_______/    |_______|| _| `._____||_______|    |__|     
                                                                                      

Copyrights of Closerly.
Developed by Ali Asgar K.N. and Harshit Jain.

Thanks for being interested in our source code.
If you have any suggestions send them to ali@closerly.com

-->
<html lang="en">
	<head>
		<meta name="google-site-verification" content="MXGtplCoVWZPjW9N_c05GikqC82dH1dzk9HyHNKNsrU" />
		<meta charset="utf-8">
		<title>Sign in &middot; Closerly</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Login Form for WebText">
		<meta name="author" content="Ali">

		<!-- Le styles -->
		<link href=<?php echo $boot_style;?> rel="stylesheet">
		<link href=<?php echo $body_style;?> rel="stylesheet">
		<link href=<?php echo $form_style;?> rel="stylesheet">
		<link href="css/bootstrap-responsive.css" rel="stylesheet">

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Fav and touch icons -->
		<link rel="shortcut icon" href="images/favicon.ico">
		<script src="js/cookie.js"></script>
		<?php include_once("backend/analyticstracking.php"); ?>
	</head>

	<body>

		<div class="navbar navbar-fixed-top" id = "navbar_top">
			<script> 
				setTheme();
			</script>
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="brand" href="http://closerly.com" style="height: 40px; padding-top: 0; padding-bottom: 0;">
						<img id="logo" alt="Closerly Logo" width = "33px" height = "33px" src="images/closerly-logo-navbar.png" style="padding: 0; border: 0; vertical-align: middle;" />
						<span style="line-height: 40px;">Closerly</span>
					</a>
					<div class="nav-collapse collapse">
						<ul class="nav">
							<li class="active"><a href="#">Sign In</a></li>
							<li><a href="signup.php">Sign Up</a></li>
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
					<div class="well well-large page-header">
						<h1>
							<img id="logo" alt="Closerly Logo" width = "60" height = "60" src="images/closerly-logo.png" style="padding: 0; border: 0; vertical-align: middle;" />
							Closerly<small>&nbsp;Stay Connected! Always!</small>
						</h1>
					</div>
				</div>
			</div>

			<div class = "row-fluid">
				<div class = "span8">
					<div class="well well-large">
						
						<p class = "lead" style="margin-bottom: 0px; padding-bottom: 0px;">Welcome to the Closerly Closed Beta</p>
						<div class = "row-fluid span12 header-underline" style = "margin-left: 0px; margin-top: 0px; padding-top:0px; padding-left:0px; margin-right: 10px;"></div>
						<p>&nbsp;</p>
						<p class = "closerly-text">We have tons of awesome features waiting for you inside:</p>

						<ul>
							<li><p class = "closerly-text">Send SMS Messages from your PC using your Android phone number.</p></li>
							<li><p class = "closerly-text">Instant push notifications for both calls and messages!</p></li>
							<li><p class = "closerly-text">All your details are stored securely online with the utmost regard for your safety and privacy</p>
							</li>
						</ul>

						<p class = "closerly-text">So don&rsquo;t wait anymore, start using Closerly now!</p>
						<p></p>
						<p class = "closerly-text">If you have a login ID already, just Log In to your right.</p>
						<p></p>
						<p class = "closerly-text">If you would like to sign up for the closed beta just go to <a href="http://www.closerly.com/signup.php">Our Sign Up Page</a>&nbsp;and enroll for our beta!</p>
						<p></p>
						<p class = "closerly-text">Our app can be downloaded from the 
						<a href="https://play.google.com/store/apps/details?id=com.insignia.web.sms">Google Play Store</a>.</p>
						<p></p>
						<p class = "closerly-text">Cheers!</p>
					</div>
				</div>
				<div class = "span4">
					<section id ="form">
						<form class="form-signin" method = "post" action = "login.php" target="passwordIframe" onsubmit = "return check(this);">
							<h2 class="form-signin-heading">Sign in</h2><br/>
							<input type="email" name="username"  id="email" class="input-block-level" placeholder="Email address">
							<input type="password" name="password" id="user_pass" class="input-block-level" placeholder="Password">
							<p id = "result" style = "color: red;"></p>

							<button class="btn btn-large btn-primary" type="submit">Sign in</button>
						</form>
						<iframe id="passwordIframe" src="blank.html" name="passwordIframe" style='display:none'></iframe>
					</div>
				</div>
			</div>
			<hr/>
			<footer>
				<center><p>&copy; <a href="http://closerly.com">Closerly</a> | Developed by: <a href="mailto:ali@closerly.com?subject=Closerly Support">Ali Asgar</a> and <a href="mailto:harshit@closerly.com?subject=Closerly Support">Harshit Jain</a></p></center>
			</footer>
		</div> <!-- /container -->

		<!-- Le javascript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="http://code.jquery.com/jquery-1.8.2.js"></script>
		<script src="js/sessionHandler.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="js/login.js"></script>
		<script src="js/sha256.js"></script>


	</body>
</html>