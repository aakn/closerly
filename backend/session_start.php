<?php
	// Inialize session
	session_start();
	$email = $_COOKIE['username'];
	if(!isset($_COOKIE["theme"])) {
		setcookie("theme","light",time()+60*60*24*30,"/");
	}

	if (!isset($_SESSION['username'])) {

		//header('Location: ../login.php');
		//echo "SESSION EXPIRE";
		//exit;
			
		include('config.inc');
		$query = "SELECT * FROM registration WHERE (email like '" . $email . "')";
				
		//echo $query;
		// Retrieve username and password from database according to user's input
		$login = mysql_query($query);
		//echo "<br/>".$login."<br/>".mysql_num_rows($login);
		// Check username and password match
		if (mysql_num_rows($login) == 1) {
			// Set username session variable
			//echo "<br/> setting the username and password...";
			
			while($thisrow=mysql_fetch_row($login))
			{
				$name = $thisrow[1];
				$id = $thisrow[0];
				$phone = $thisrow[3];
				$regid = $thisrow[5];

				
				$_SESSION['username'] = $email;
				$_SESSION['name'] = $name;
				$_SESSION['phone'] = $phone;
				$_SESSION['regID'] = $regid;
				$_SESSION['userID'] = $id;
				$_SESSION['email'] = $email;

			}
		} else {
			//echo "HERE";
			header("Location: login.php");
		}
	}
	$email = $_SESSION['email'];
	$name = $_SESSION['name'];
	$regid = $_SESSION['regID'];  
	$phone = $_SESSION['phone'];
	$id = $_SESSION['userID'];

	$app_name = "Closerly";
	$nav_bar_class = "navbar navbar-inverse navbar-fixed-top";
	$boot_style = "css/bootstrap.min.css";
	$body_style = "css/bodyStyle.css";
	$form_style = "css/signin-form.css";
	$docs_style = "css/docs.css";
	
	$theme = $_COOKIE["theme"];
	if ($theme == "dark") {
		$nav_bar_class = "navbar navbar-fixed-top";
		$docs_style = "css/docs.cyborg.css";
		$boot_style = "css/bootstrap.cyborg.css";
		$body_style = "css/bodyStyle.cyborg.css";
		$form_style = "css/signin-form.cyborg.css";
	}
?>