<?php

	$email = $_POST['email'];
	$json = $_POST['messages'];
	$true_key = $_POST['junk'];
	$messages = json_decode($json);
	
	include('config.inc');
	
	
	$query = "SELECT * FROM registration WHERE email like '".$email."'";
	//echo "<br/>".$query."<br/>";

	$result = mysql_query($query);
	if(mysql_num_rows($result) == 0){
		echo "NO USER FOUND";
	}
	else {
		$id = 0;

		$row = mysql_fetch_row($result);
		$true_id = $row[0];
		$new_key = md5($true_id);
		$new_iv = md5(md5($true_id));
		$new_iv = substr($new_iv, 0,16);
		$id = $true_key;

		include('../backend/protect.php');

		$ct = 0;

		foreach ($messages as $message) {
			//*
			$arr = array();
			foreach ($message as $name => $value) {
				$arr[] = $value;
				//echo 
				switch ($name) {
					case 'type': $type = $value; break;
					case 'address': $address = $value; break;
					case 'body': $body = $value; break;
					case 'time': $time = $value; break;				
				}
			}
			//*/
			/*
			$type = $message['type'];
			$address = $message['address'];
			$body = $message['body'];
			$time = $message['time'];
			*/
			
			$body = decrypt($key, $body, $iv);
			$body = encrypt($new_key, $body, $new_iv);

			$query = "SELECT * from sms where userid = '".$true_id."' and is_send_message = '".$type."' and other_number = '".$address."' and body = '".$body."' and time = '".$time."'";
			$result = mysql_query($query);
			$row_num = mysql_num_rows($result);
			if($row_num == 0) {
				$mini_insert = "INSERT into sms (userid,is_send_message,other_number,body,time) values (" . $true_id . ", ".$type.", '";
				
				$insert_sql = $mini_insert . mysql_real_escape_string($address) . "','" . mysql_real_escape_string($body) . "','" . mysql_real_escape_string($time) . "')";
				//echo $insert_sql."\n";
				$result = mysql_query($insert_sql);

				$ct++;
			}
			//echo $result;

		}
		echo "INSERTION DONE $ct";

		$alertval = 1000;
		include('pusher.inc');
		$pusher = new Pusher($key, $secret, $app_id);
		//alert values -> 1 : force alert. -1 : force no alert. 0 : default
		$array = array(
		 'id' => $id ,
		 'alert' => $alertval 
		 );
		//print_r($array);
		$pusher->trigger('my-channel', 'my-event', $array );
	}
?>