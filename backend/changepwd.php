<?php
	include('sessionHandler.php');
	
	
	$name = $_SESSION['name'];
	$regid = $_SESSION['regID'];	
	$phone = $_SESSION['phone'];
	$id = $_SESSION['userID'];
	
	
	$password = $_POST['password'];
	$old = $_POST['old_password'];
	
	
	$pwd = $password;
	//$pwd=hash("sha256",$password);
	//$old=hash("sha256",$old);
	
	//echo md5($password)."<br/>".$old."<br/>";
	include('config.inc');
	
	//$green = "348017";
	//$red = "CA226B";
	//$f = "<br/><span style=\"font-size: 0.75em;font-weight: bold;color: #";
	//$r = ";\">";
	//$wr = $f.$red.$r;
	//$rt = $f.$green.$r;
	$check_query = "SELECT * from registration where id = " . $id . " and pwd like '" . $old . "';" ;
	$result = mysql_query($check_query);
	if( $rw = mysql_fetch_row($result) ) {
		if($rw[0] != $id) {
			echo $wr."Incorrect Password";
		}
	
		else {
			//echo "OLD Password correct<br/>";
			$update_sql = "UPDATE registration SET pwd = '" . $pwd . "' where id = '" . $id . "' and pwd like '" . $old . "';";
			
			//echo $update_sql.'<br/>';
			//mysql_query($update_sql, $connection);
			$result = mysql_query($update_sql) or die(mysql_error());  //do the query
			if($result == 1)
				echo "SUCCESS";
			else
				echo "LATER";
		}
	}
	else {
		echo "FAIL";
	}
	//echo "</span>";
?>