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
		<meta name="google-site-verification" content="MXGtplCoVWZPjW9N_c05GikqC82dH1dzk9HyHNKNsrU" />
		<meta charset="utf-8">
		<title>Home &middot; Closerly</title>
		<meta http-equiv="content-type" content="text/html"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Messaging Thread for WebText" />
		<meta name="author" content="Ali" />

		<link href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" rel="stylesheet">
		<link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
		<link href=<?php echo $boot_style;?> rel="stylesheet">
		<link href="css/bootstrap-responsive.css" rel="stylesheet">
		<link href="css/jquery.pnotify.default.css" rel="stylesheet">
		<link href="css/jquery.pnotify.default.icons.css" rel="stylesheet">
		<link href=<?php echo $docs_style;?> rel="stylesheet">
		<link href=<?php echo $body_style;?> rel="stylesheet">

		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<!-- Fav and touch icons -->
		<link rel="shortcut icon" href="images/favicon.ico">
		
		
		<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.js'></script>
		<script src="js/sessionHandler.js"></script>
		<script src="js/thread.js"></script>
		<script src="js/cookie.js"></script>
		<script src="js/jquery.pnotify.js"></script>

	
		<!--[if IE 9]><link rel="stylesheet" href="css/style-ie9.css" /><![endif]-->
	
		<style type="text/css">
			
			#contact-button {
				position: fixed;
				top: 60px;
			}
			.bs-docs-sidenav {
				width: 100%;
			}
			.left-box-content { 
				width:24%;
				position:fixed;top:100px;bottom: 25px;
				overflow:auto; 
			}
			.ui-pnotify.stack-bottomright {
				/* These are just CSS default values to reset the pnotify CSS. */
				right: auto;
				top: auto;
			}
			.ui-pnotify.custom {
				left: auto;
				top: auto;
			}
			
		</style>
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
					<!--
					<a class="brand" href="#">Closerly</a>
					-->
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
							<li class="active"><a href="#">Home</a></li>
							<li><a href="contacts.php">Contacts</a></li>
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
		<!--
		<header class="jumbotron subhead" id="overview">
			<!--<img src = "images/banner1.png"/>--
			<div class="page-header">
				<h1>WebText<small>&nbsp;Stay Connected! Always!</small></h1>
			</div>
		</header>
		-->
		
		<div class = "row" style = "margin-top:1em;">
		</div>

		<div class="container-fluid">

			<div class = "row-fluid">
				<div class="span3">
					<a id="contact-button" href="#myModal" role="button" class="btn btn-primary" data-toggle="modal"><i class="icon-user icon-white"></i> Choose a Contact</a>
					<div id="content_1" class="left-box-content content_3">
						<div id = "nav">
							<ul class="nav nav-list bs-docs-sidenav" id = "weirdness_bar">
								
							</ul>
						
							<script> showThread(); </script>
						</div>
					</div>
				
					
				</div>
						
				<div class="span9">

						<div class="well well-large page-header">
							<div id = "conversation_head">
								<h1>
									<img id="logo" alt="Closerly Logo" width = "60" height = "60" src="images/closerly-logo.png" style="padding: 0; border: 0; vertical-align: middle;" />
									Closerly<small>&nbsp;Stay Connected! Always!</small>
								</h1>
							</div>
						</div>
							
						<div class = "well well-large">
							<div id = "conversation_list">
								<!--
								<script> 
									//$("div#conversation_list").slideUp(); 
								</script>
								<div>
									<div class="row-fluid">
										<div class = "span5" id="content">
											<div id = "user_info">
												<section>
													<div class = 'row-fluid'>
														<div class = 'span9'>
															
														</div>
														<div class = 'span3'>
															<button id = 'delete_thread' hidden='true' style = 'position: relative; top: 50%; left: 50%'>Delete</button>
														</div>
													</div>
												</section>
											</div>
										</div>
									</div>
								</div>
								-->
								<h2>Hello <?php echo $name ?></h2>
								<p class="lead" style="margin-bottom: 0px; padding-bottom: 0px;">Welcome to the Closerly Closed Beta!</p>
								<div class = "row-fluid span12 header-underline" style = "margin-left: 0px; margin-top: 0px; padding-top:0px; padding-left:0px; margin-right: 10px;"></div>
								<p>&nbsp;</p>
								<p class="closerly-text">To start using Closerly, just choose one of your messaging threads from the left.</p>
								<p class = "closerly-text">Once the thread is open you can send messages as normal from the text box that will appear above the thread.</p>
								<p class = "closerly-text">That’s all there is to it! </p>
								<p>&nbsp;</p>
								<p class = "closerly-text">You also get push notifications for any calls or messages that you get.</p>
								<p class = "closerly-text">Also, needless to say all your data is encrypted and utmost regard is paid to your privacy.</p>
								<p>&nbsp;</p>
								<p class = "closerly-text">Since, this is a closed preview, we would absolutely love to get any kind of feedback that you may have on Closerly.<br/>
									It may be a bug or an improvement to a current feature or heck it might even be an entirely new feature itself! :P</p>
								<p class = "closerly-text">You can mail the bug reports or any feedback to <a href="mailto:support@closerly.com?subject=Bug Report" target="_blank">support@closerly.com</a>.</p> 
								
							</div>
						</div>
						<hr/>
						<footer>
							<center><p>&copy; <a href="http://www.closerly.com" target="_blank">Closerly</a> | Developed by: <a href="mailto:ali@closerly.com?subject=Closerly Support" target="_blank">Ali Asgar</a> and <a href="mailto:harshit@closerly.com?subject=Closerly Support" target="_blank">Harshit Jain</a></p></center>
						</footer>
				</div>	
			</div>			
		</div> <!-- /container -->


		<!-- Alert With Header -->
		<div id = "myAlertWithHeader" class = "modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="alertHeader">Head</h3>
			</div>
			<div class ="modal-body">
				<p class = "lead" id ="alertText-withHeader"></p>
			</div>
			<div class="modal-footer">
				<button id = "customAlertButton-withHeader" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Close</button>
			</div>
		</div>
		<!-- Alert WithOUT Header -->
		<div id = "myAlert" class = "modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

			<div class ="modal-body">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<p class = "lead" id ="alertText"></p>
			</div>
			<div class="modal-footer">
				<button id = "customAlertButton" class="btn btn-primary" data-dismiss="modal" aria-hidden="true">Close</button>
			</div>
		</div>

		<!-- Modal -->
		<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
				<h3 id="myModalLabel">Create a New Thread</h3>
			</div>
			<div class="modal-body">

				<form class="form-horizontal">
					<div class="control-group">
						<label class="control-label" for="contact_number">Enter a number</label>
						<div class="controls">
							<input type="text" name="number" id="contact_number" class="text ui-widget-content ui-corner-all" />
						</div>
					</div>
					<div class="control-group">
						<div class = "controls">

							<p class = "lead">OR</p>
						</div>
					</div>
					<div class = "control-group">
						<label class="control-label" for = "name_dropdown_list">Select a Contact</label>
						<div class = "controls">
							<ul class="unstyled">
								<li>
				
										<div id = "name-list">
											
										</div>
						
				
									<script src = "js/dropdown-choice.js"></script>
								</li>
								<li><div style = "padding:0.2em;"></div></li>
								<li>
				
										<div id = "number-list"> 
											<select id = "number_dropdown_list" name="number_dropdown_list" class="fromDest">
												<option value="">Select a number </option>
											</select>
										</div>
				
									
								</li>
							</ul>
						</div>
					</div>
						<!--<p id = "damn"></p>-->

			

				</form>
			</div>
			<div class="modal-footer">
				<button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
				<button class="btn btn-primary" onclick = "addThread();">Create Thread</button>
			</div>
		</div>

		<!-- Conversation Header -->
		<div id = "conversation_header_contents_hidden" hidden = "true">
			<div>
				<div class='row-fluid'>
					<div class = 'span4' id='content'>
						<div id = 'user_info'>
								<div class = 'row-fluid'>
									<div id = 'conversation_header_namenumber' 
										style = 'padding-top:0px;margin-top:0px;' 
										class = 'span9'>
									</div>
									<div class = 'span3'>
										<button id = 'delete_thread' class = 'btn btn-danger' >Delete</button>
									</div>
								</div>
						</div>
					</div>
					<div class='span5' id='sidebar1'>
						<textarea  placeholder = 'Type your message and hit Sent!' onkeyup='bodyCharacterCount();' id = 'body' name='body' style='width:100%; resize:none;' rows = '3'></textarea>
					</div>
					<div class='span2' id='sidebar2'>	
						<input type='button' class = 'btn btn-info btn-large btn-block' value='&nbsp Send &nbsp' onclick = 'sendMessage();'>
						<small><br/><p id = 'char_count' class='text-info' style='margin-top:0px;padding-top:0px'>0/160</p></small>
					</div>
				</div>
			</div>
		</div>

		<script src="js/dialog.js"></script>
		<script src="js/jquery.mousewheel.min.js"></script>
		<!-- custom scrollbars plugin -->
		<script src="js/jquery.mCustomScrollbar.js"></script>

		<script src="js/bootstrap.js"></script>
		<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.js'></script>
		<script src="http://js.pusher.com/1.12/pusher.min.js"></script>

		<script src="js/date.js"></script>
		<script src="js/conversation.js"></script>

		<script>
		
			var id = <?php echo $id; ?>;
			var pusher = new Pusher('586d367b2343fda70d81'); // Replace with your app key
			var channel = pusher.subscribe('my-channel');
			channel.bind('my-event', function(data) {
				//alert(data);
				//var message = data.message;
				var recv_id = data.id;
				if(id != recv_id) {
					return;
				}

				//alert("got a message - " + message);
				messageHandler(data);				
			});

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
				});

			})(jQuery);
		</script>
	</body>
</html>