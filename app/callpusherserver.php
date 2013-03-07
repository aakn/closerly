<?php
	// Inialize session
	session_start();
	
	// Check, if username session is NOT set then this page will jump to login page
	if (!isset($_SESSION['username'])) {
		header('Location: index.php');
	}
	
	$id = $_SESSION['userID'];
	$phone = $_SESSION['phone'];
	include('config.inc');
	
	
	$address = "990-205-6362";
	
	
	$str = $address;
	$rx="SELECT * FROM contacts WHERE userid = ".$id . " and number = '". $str . "'" ;
	
	$xx = mysql_query($rx);
	$name = "";
	
	$rw = mysql_fetch_row($xx);
	$temp = $rw[2];
	
	if($temp != "")
		$temp = $temp."(".$address.")";
	else
		$temp = $address;
	
	$message = $id.":"."CALL_ALERT$$$".$temp;
	
	//$message = "1:Swapna Srinivasan(+91 98 86 346242)$$$CALL_ALERT";
	
	echo $message;
	
	include('pusher.inc');
	$pusher = new Pusher($key, $secret, $app_id);
	$pusher->trigger('my-channel', 'my-event', array('message' => $message) );

	//echo "sent call broadcast";
?>