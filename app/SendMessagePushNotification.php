<?php
	$str = $address;
	$rx="SELECT * FROM contacts WHERE userid = ".$id . " and number = '". $str . "'" ;
	
	$xx = mysql_query($rx);
	$name = "";
	
	$rw = mysql_fetch_row($xx);
	$name = $rw[2];
	
	//echo $message;
	include('pusher.inc');
	$pusher = new Pusher($key, $secret, $app_id);
	//alert values -> 1 : force alert. -1 : force no alert. 0 : default
	$array = array('body' => $toSendMsg,
		 'address'=>$address, 
		 'time' => $time, 
		 'id' => $id ,
		 'alert' => $alertval ,
		 'ifSent' => $sent,
		 'type' =>$type,
		 'name'=>$name,
		 'smsid'	=>	$smsid
		 );
	//print_r($array);
	$pusher->trigger('my-channel', 'my-event', $array );

	echo "<br/>done";

?>