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
		<title>Manage &middot; Closerly</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Login Form for WebText">
		<meta name="author" content="Ali">

		<!-- Le styles -->
		<link href="../../css/bootstrap.metro.css" rel="stylesheet">
		<link href="../../css/docs.default.css" rel="stylesheet">
		<link href="../../css/bootstrap-responsive.css" rel="stylesheet">

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Fav and touch icons -->
		<link rel="shortcut icon" href="../../images/favicon.ico">
		<?php include_once("../../backend/analyticstracking.php"); ?>

		<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.js'></script>
		<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.js'></script>
		<script src="invite.js"></script>
		<script src="../../js/bootstrap.js"></script>
	</head>

	<body>

		<div class="navbar navbar-fixed-top" id = "navbar_top">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="brand" href="http://closerly.com" style="padding:9px;">
						<img id="logo" alt="Closerly Logo"
							src="../../images/Closerly-White-32.png" />
						Closerly
					</a>
					<div class="nav-collapse collapse">
						<ul class="nav">
							<li class="active"><a href="#">Manage</a></li>
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
		<hr>
		<div class = "row" style = "margin-top:1em;">
		</div>




		<div class="container">
		 
			
			<header class="jumbotron subhead" id="overview">
				<div class="row-fluid">
					<div class="span6 page-header">
						<h1>
							<img id="logo" alt="Closerly Logo" width = "60" height = "60" src="../../images/closerly-logo.png" style="padding: 0; border: 0; vertical-align: middle;" />
							Closerly<small style="color:#AAAAAA;">Control Panel</small>
						</h1>
						
					</div>
				</div>
			</header>

			<div class = "row-fluid">
				<div class="span12">
					

					<section>
						<div class="page-header">
							<h2>Invite Someone</h2>
						</div>
						<div class="row">
							<div class="span7 offset1">
								<form class="form-horizontal well">
									<fieldset>
										<legend>Fill this form</legend>
										<div class="control-group">
											<label class="control-label" for="fromEmail">Send email from</label>
											<div class="controls">
												<select id="fromEmail">
													<option>admin@closerly.com</option>
													<option>support@closerly.com</option>
													<option>ali@closerly.com</option>
													<option>harshit@closerly.com</option>
												</select>
												<p class="help-block">Pick an ID to send the mail from.</p>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="fromName">Send email from</label>
											<div class="controls">
												<select id="fromName">
													<option>Closerly Team</option>
													<option>Harshit Jain</option>
													<option>Ali Asgar</option>
												</select>
												<p class="help-block">Pick a name to send the mail from.</p>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="name-invite">Name</label>
											<div class="controls">
												<input type="text" class="input-xlarge" id="name-invite">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="email-invite">Email</label>
											<div class="controls">
												<input type="text" class="input-xlarge" id="email-invite">
												<p class="help-block">An email invite with the secret code will be sent.</p>
												<p class="help-block" id="result"></p>
											</div>
										</div>
										 <div class="form-actions">
											<button id="submit" type="submit" class="btn btn-primary">Email</button>
											<button type="reset" class="btn">Cancel</button>
										</div>
									</fieldset>
								</form>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</body>
</html>