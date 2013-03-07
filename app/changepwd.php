<?php
	// Inialize session
	session_start();
	
	if (!isset($_SESSION['username'])) {

		header('Location: ../login.php');
	}
	
	
	
	$name = $_SESSION['name'];
	$regid = $_SESSION['regID'];	
	$phone = $_SESSION['phone'];
	$id = $_SESSION['userID'];
	
	
	$password = $_GET['password'];
	$old = $_GET['old_password'];
	
	$password=hash("sha256",$password);
	$old=hash("sha256",$old);
	
	
	include('config.inc');
	
	$check_query = "SELECT * from registration where id = " . $id . " and pwd like '" . $old . "';" ;
	$result = mysql_query($check_query);
	if( $rw != mysql_fetch_row($result)) {
		echo "incorrect password";
	}
	else {
		
		$update_sql = "UPDATE registration SET pwd = '" . $pwd . "' where id = '" . $id . "' and pwd like '" . $old . "';";
		
		//echo $update_sql.'<br/>';
		//mysql_query($update_sql, $connection);
		$result = mysql_query($update_sql) or die(mysql_error());  //do the query
		echo $result;
	}
?>