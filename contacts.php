<?php
	include('backend/session_start.php');

?>
<!DOCTYPE HTML>
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
<html lang = "en">
	<head>
		<meta charset="utf-8">
		<title>Contacts &middot; Closerly</title>
		<meta http-equiv="content-type" content="text/html"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Contacts page for WebText" />
		<meta name="author" content="Ali" />

		<!-- stylesheet for demo and examples -->
		<style type="text/css">
		<!--
			
			.left-box-content { 
				width:27%;
				position:fixed;top:60px;bottom: 0px;
				overflow:auto; 
			}
			
		-->
		</style>
		<!-- Custom scrollbars CSS -->
		<link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
		<link href=<?php echo $boot_style;?> rel="stylesheet">
		<link href=<?php echo $body_style;?> rel="stylesheet">
		<link href="css/bootstrap-responsive.css" rel="stylesheet">
		<link href=<?php echo $docs_style;?> rel="stylesheet">

		<script src="js/sessionHandler.js"></script>
		<script src="js/contacts.js"></script>
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
							<li class="active"><a href="#">Contacts</a></li>
							<li><a href="changepassword.php">Change Password</a></li>
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
		
		
		<div class = "row" style = "margin-top:20px;">
		</div>
		<div class = "container-fluid">
			<div class="row-fluid">

				<div class = "span4">
				<!-- content block -->
			 		<div id="content_1" class="well well-large left-box-content content_3">
						<div id = "contacts">
							<script>showContacts();</script>
						</div>
					</div>
				</div>
				<div class = "span8">
					<div class="well well-large page-header">
						<h1>
							<img id="logo" alt="Closerly Logo" width = "60" height = "60" src="images/closerly-logo.png" style="padding: 0; border: 0; vertical-align: middle;" />
							Closerly<small>&nbsp;Stay Connected! Always!</small>
						</h1>
					</div>
					<div id = "contact-info" class="well well-large">
						<div >
							<h2 style="margin-bottom: 0px; padding-bottom: 0px;">Contacts</h2>
							<div class = "row-fluid span12 header-underline" style = "margin-left: 0px; margin-top: 0px; padding-top:0px; padding-left:0px; margin-right: 10px;"></div>
							<p>&nbsp;</p>
							<p class = "lead">You can view and edit all the contacts on your phone from the comfort of your PC!
							</p>

							<p class = "lead">Just click on your contacts from the list to your left.</p>
							<p class = "lead">PS: Editing of contacts is coming soon</p> 

						</div>
					</div>
					<hr/>
					<footer>
						<center><p>&copy; <a href="http://closerly.com">Insignia Devs</a> | Developed by: <a href="mailto:ali@closerly.com?subject=Closerly Support">Ali Asgar</a> and <a href="mailto:harshit@closerly.com?subject=Closerly Support">Harshit Jain</a></p></center>
					</footer>
				</div>
			</div>
		</div>


		
		<!-- Get Google CDN's jQuery and jQuery UI with fallback to local -->
	    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.js'></script>
	    <script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.js'></script>

		<!-- mousewheel plugin -->
		<script src="js/jquery.mousewheel.min.js"></script>
		<!-- custom scrollbars plugin -->
		<script src="js/jquery.mCustomScrollbar.js"></script>
		<script src="js/bootstrap.js"></script>
		

		<script>
			(function($){
				$(window).load(function(){
					$("#content_1").mCustomScrollbar({
						set_width:false, /*optional element width: boolean, pixels, percentage*/
						set_height:false, /*optional element height: boolean, pixels, percentage*/
						horizontalScroll:false, /*scroll horizontally: boolean*/
						scrollInertia:0, /*scrolling inertia: integer (milliseconds)*/
						scrollEasing:"easeOutCirc", /*scrolling easing: string*/
						mouseWheel:"auto", /*mousewheel support and velocity: boolean, "auto", integer*/
						autoDraggerLength:true, /*auto-adjust scrollbar dragger length: boolean*/
						scrollButtons:{ /*scroll buttons*/
							enable:false, /*scroll buttons support: boolean*/
							scrollType:"continuous", /*scroll buttons scrolling type: "continuous", "pixels"*/
							scrollSpeed:20, /*scroll buttons continuous scrolling speed: integer*/
							scrollAmount:40 /*scroll buttons pixels scroll amount: integer (pixels)*/
						},
						advanced:{
							updateOnBrowserResize:true, /*update scrollbars on browser resize (for layouts based on percentages): boolean*/
							updateOnContentResize:true, /*auto-update scrollbars on content resize (for dynamic content): boolean*/
							autoExpandHorizontalScroll:true /*auto expand width for horizontal scrolling: boolean*/
						},
						callbacks:{
							onScroll:function(){}, /*user custom callback function on scroll event*/
							onTotalScroll:function(){}, /*user custom callback function on bottom reached event*/
							onTotalScrollOffset:0 /*bottom reached offset: integer (pixels)*/
						}
					});
					//alert($('#content_1').css('margin'));
					//$('#content_1').css('top', $('#top').outerHeight() +20);
					
				});

			})(jQuery);
		</script>
	</body>
</html>