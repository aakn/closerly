<?php
	//GOTTA REMOVE THE BOTTOM TWO LINES!!
	echo "SUCCESS";
	exit;

	$smsid=$_POST['id'];
	

	include('config.inc');

	$query = "SELECT * FROM sms where id = $smsid";
	$result = mysql_query($query);
	$row = mysql_fetch_row($result);

	$query = "DELETE FROM sms where id = $smsid";
	$result = mysql_query($query);
	if ($result == 1) {
		echo "SUCCESS";

		$id = $row[1];
		$body = $row[6];
		include('../backend/protect.php');
		$body = decrypt($key, $body, $iv);


		include('pusher.inc');
		$pusher = new Pusher($key, $secret, $app_id);
		//alert values -> 1 : force alert. -1 : force no alert. 0 : default
		$array = array(
			'type'	=>	'delete',
			'id'	=>	$id,
			'body'	=>	$body,
			'address'	=>	$row[3],
			'time'	=>	$row[5],
			'ifSent'	=>	$row[4],
			'smsid'		=>	$smsid
			);
		//print_r($array);
		$pusher->trigger('my-channel', 'my-event', $array );

	}
	else echo "FAIL :(";

?>