<?php

	// Inialize session
	session_start();

	// Include database connection settings
	include('config.inc');
	
	$email = mysql_real_escape_string($_POST['username']);
	$password = mysql_real_escape_string($_POST['password']);
	$password = strtoupper($password);
	//$password = hash("sha256", $password);
	$query = "SELECT * FROM registration WHERE (email like '" . $email . "') and (pwd like '" . $password . "')";
		
	//echo $query;
	// Retrieve username and password from database according to user's input
	$login = mysql_query($query);
	
	// Check username and password match
	if (mysql_num_rows($login) == 1) {
		// Set username session variable
		
		
		while($thisrow=mysql_fetch_row($login))
		{
			$name = $thisrow[1];
			$id = $thisrow[0];
			$phone = $thisrow[3];
			$regid = $thisrow[5];
			$active = $thisrow[6];
			if($active == 0) {
				echo "INACTIVE";
				return;
			}
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['name'] = $name;
			$_SESSION['phone'] = $phone;
			$_SESSION['regID'] = $regid;
			$_SESSION['userID'] = $id;
			$_SESSION['email'] = $email;

			$expire=time()+60*60*24*14;
			setcookie('username',$_POST['username'],$expire,"/");


		}
		
		
		
		
		// Jump to secured page
		//header('Location: thread.php');
		echo "SUCCESS";
	}
	else {
		// Jump to login page
		//header('Location: index.php');
		echo "The email or password you entered is incorrect.";
	}
	
?>