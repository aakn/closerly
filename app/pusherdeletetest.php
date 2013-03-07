<?php
	// Inialize session
	session_start();
	
	// Check, if username session is NOT set then this page will jump to login page
	if (!isset($_SESSION['username'])) {
		header('Location: ../login.php');
	}
	
	$id = $_SESSION['userID'];
	$phone = $_SESSION['phone'];
	include('config.inc');
	include('../backend/protect.php');
	//include('smilify.php');

	$body = "Hello world :D :D";
	//Smilify(&$body);

	//alert values -> 1 : force alert. -1 : force no alert. 0 : default
	$alert_val = 1;
	//type -> either <sms> or <call>
	$type = 'delete';
	$address = "09916180344";
	$time = "2012/12/02 14:05:49";
	$toSendMsg = $body;
	$sent = false;
	include('SendMessagePushNotification.php');
	
	
?>