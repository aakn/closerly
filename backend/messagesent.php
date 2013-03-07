<?php
	include('sessionHandler.php');
	//echo "hell yeah";
	
	// Replace with real BROWSER API key from Google APIs
	$apiKey = "AIzaSyCJDgN7HMKDOn00fZAETOMfZxMZ3eU8zYk";
	
	// Message to be sent
	$number= $_POST["number"];
	//echo "<p>".$number."</p>";
	if($number[0] == " ")
	{
		$number = "+".substr($number,1);
	}
	//echo "<p>".$number."</p>";
	
	$body=$_POST["body"];
	$messageTime = $_POST["time"];
	//$number= $_GET["number"];
	//$body=$_GET["body"];


	$regid = $_SESSION['regID'];
	
	$id = $_SESSION['userID'];

	
	//echo $number . "- number <br/>".$body." - body <br/>";
	
	include('config.inc');
	include('protect.php');
	
	$body = encrypt($key, $body, $iv);
	
	$data = array(); // create a variable to hold the information

		$data[] = $regid; // add the row in to the results (data) array
		

	//print_r($data);
	//echo '<br/><br/>';
	
	$date = $messageTime;

	$update_sql = "INSERT into sms (userid, other_number, is_send_message, time, body) values ('" 
		. mysql_real_escape_string($id) . "','" 
		. mysql_real_escape_string($number) . "', true ,'" 
		. mysql_real_escape_string($date) . "' , '" 
		. mysql_real_escape_string($body) . "' )";
		
	$result = mysql_query($update_sql);  //do the query
	//echo $result;


	$query = "select * from sms where userid = '$id' and time like '$date' and body like '"
		.mysql_real_escape_string($body)."' and other_number like '".
		mysql_real_escape_string($number)."' and is_send_message = true";

	$result = mysql_query($query);
	$row = mysql_fetch_row($result);
	$smsid = $row[0];

	
	
	
	//$body = str_replace("\'","'",$body);
	$body = stripslashes($body);
	
	$message = 'SendSMS'.$number.':'.$body;
	
	$msg = array(
			'type'		=>	'SENDSMS',
			'number'	=>	$number,
			'body'		=> 	$body,
			'id'		=>	$smsid
		);
	
	//echo $message.'<br/>';
	
	// Set POST variables
	$url = 'https://android.googleapis.com/gcm/send';
	
	$fields = array(
	                'registration_ids'  => $data,
	                'data'              => array( "message" => $msg ),
	                );
	
	$headers = array( 
	                    'Authorization: key=' . $apiKey,
	                    'Content-Type: application/json'
	                );
	
	// Open connection
	$ch = curl_init();
	
	// Set the url, number of POST vars, POST data
	curl_setopt( $ch, CURLOPT_URL, $url );
	
	curl_setopt( $ch, CURLOPT_POST, true );
	curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	
	curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );
	
	// Execute post
	$result = curl_exec($ch);
	
	// Close connection
	curl_close($ch);
	//echo $result;
	echo "<p>";
	if(strpos($result, "\"success\":1") !== false) {
		echo "Sent";
	}
	else
		echo "Sending failed..";
	echo "</p>";
	//header('Location: sendsms.php');
?>