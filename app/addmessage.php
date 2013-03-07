<?php
	
	$body = $_POST['body'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$time = $_POST['time'];
	$sent = $_POST['sent'];
	if($sent == "sent") 
		$sent =1;
	else $sent = 0;
	echo $sent."\n";
	
	include('config.inc');
	
	
	$query = "SELECT * FROM registration WHERE email like '".$email."'";
	//echo "<br/>".$query."<br/>";
	$result = mysql_query($query);

	$id = 0;

	$row = mysql_fetch_row($result);
	$id = $row[0];
	
	include('../backend/protect.php');
	$toSendMsg = decrypt($key, $body, $iv);

	//echo $id."\n";
	if($sent == "") $sent =0;

	$mini_insert = "INSERT into sms (userid,is_send_message,other_number,body,time) values (" . $id . ", ".$sent.", '";
	
	$insert_sql = $mini_insert . mysql_real_escape_string($address) . "','" . mysql_real_escape_string($body) . "','" . mysql_real_escape_string($time) . "')";
	//echo $insert_sql;
	//echo "<br/>";
	$result = mysql_query($insert_sql);
	echo $result;

	$query = "SELECT * FROM sms where userid = $id and is_send_message = $sent and body = $body and time like '$time' and address like '$address'";
	$result = mysql_query($query);
	$row = mysql_fetch_row($result);
	$smsid = $row[0];
	
	
	if($sent == 1) $alertval = -1;
	$type = 'sms';
	include('SendMessagePushNotification.php');
	
?>