<?php
	// Inialize session
	session_start();
	include('config.inc');
	if (!isset($_SESSION['username'])) {

		//header('Location: ../login.php');
		//echo "SESSION EXPIRE";
		//exit;
		$email = $_COOKIE['username'];

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
			echo "SESSION EXPIRE";
			exit;
		}
	}
?>