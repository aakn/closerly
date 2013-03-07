<?php

	include('backend/session_start.php');
	

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
		<meta charset="utf-8">
		<title>Change Password &middot; Closerly</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Change Password form for WebText">
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

	</head>

	<body>
		<?php include_once("backend/analyticstracking.php"); ?>

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
						<ul class ="nav pull-right">
							<li>
								<p class="navbar-text">
									Logged in as <a href="#" class="navbar-link"><?php echo $email; ?></a>
								</p>
							</li>
							<li><a href="logout.php">Logout</a></li>
						</ul>
						<ul class="nav">
							<li><a href="/">Home</a></li>
							<li><a href="contacts.php">Contacts</a></li>
							<li class="active"><a href="#">Change Password</a></li>
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">Theme <b class="caret"></b></a>
								<ul class="dropdown-menu" id="swatch-menu">
									<li><a href="#" onclick = "setSiteTheme('light');">Light</a></li>
									<li><a href="#" onclick = "setSiteTheme('dark');">Dark</a></li>
								</ul>
							</li>
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

						<h2 style="margin-bottom: 0px; padding-bottom: 0px;">Change Your Password</h2>
						<div class = "row-fluid span12 header-underline" style = "margin-left: 0px; margin-top: 0px; padding-top:0px; padding-left:0px; margin-right: 10px;"></div>
						<p>&nbsp;</p>
						<p class = "lead">You can instantaneously change your password by filling in the form to your right 
						</p>
						

						<p class = "lead">Since, this is a closed preview, we would absolutely love to get any kind of feedback that you may have on Closerly.
							It may be a bug or an improvement to a current feature or heck it might even be an entirely new feature itself :P</p>
						<p class = "lead">You can mail the bug reports or any feedback to <a href="mailto:support@closerly.com?subject=Bug Report" target="_blank">support@closerly.com</a>.</p> 
						
					</div>
				</div>
				<div class = "span4">

					<form class="form-signin" id="myForm">
						<h2 class="form-signin-heading">Change Password</h2><br/>
						<input type="password" id="old_pass" class="input-block-level" placeholder="Old Password">
						<input type="password" id="user_pass" class="input-block-level" placeholder="New Password">
						<input type="password" id="confirm_pass" class="input-block-level" placeholder="Confirm Password">
						<p class = "text-error" id = "result"></p>
						<button class="btn btn-large btn-primary" type="submit">Change Password</button>
					</form>
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
		<script src="js/cpwd.js"></script>
		<script src="js/sha256.js"></script>

	</body>
</html>