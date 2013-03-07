<?php


	include('config.inc');
	include_once "../backend/email_body.php";
	include_once "../backend/phpmailer.php";
	$query = "SELECT name,email FROM registration";
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result)) {
	
		$name = $row['name'];
		$email = $row['email'];
		



		$body = file_get_contents('../backend/mailbody/notification/notify.html');
		$altBody = file_get_contents('../backend/mailbody/notification/notify-alt.txt');
		$body = str_replace("<<INSERT_NAME>>", $name, $body);
		$altBody = str_replace("<<INSERT_NAME>>", $name, $altBody);
		
		
		$from = "ali@closerly.com";
		$from_name = "Closerly Team";
		
		$to = $email;
		$subject = file_get_contents('../backend/mailbody/notification/subject.txt');

		$mail_error="";

		$success = send_mail($from, $from_name, $to, $subject, $body, $altBody);
	}
	echo "DONE";

?>