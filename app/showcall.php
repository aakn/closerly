<?php
	

	$email = $_POST['email'];
	$address = $_POST['address'];

	
	include('config.inc');
	
	$query = "SELECT * FROM registration WHERE email like '".$email."'";
	//echo "<br/>".$query."<br/>";
	$result = mysql_query($query);

	$id = 0;

	$row = mysql_fetch_row($result);
	$id = $row[0];

	
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
	
	
	$type = "call";
	$alertval = "1";

	include('SendMessagePushNotification.php');




	echo "sent call broadcast";
?>