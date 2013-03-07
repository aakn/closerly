<?php

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
			$json = array (
				"username" => $email,
				"email" => $email,
				"name" => $name,
				"regID" => $regid,
				"userID" => $id
			);
		}
		
		
		
		$json = json_encode($json);
		// Jump to secured page
		//header('Location: thread.php');
		print_r($json);

	}
	else {
		// Jump to login page
		//header('Location: index.php');
		echo "LOGIN FAILURE";
	}
	
?>