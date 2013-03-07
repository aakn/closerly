<?php


	include('config.inc');
	include_once "../backend/email_body.php";
	include_once "../backend/phpmailer.php";
	$query = "SELECT * FROM wait_list";
	$result = mysql_query($query);
	while ($row = mysql_fetch_array($result)) {
	

		$email = $row['email'];
		$code = $row['code'];



		$body = getRegistrationEmailBody($code);
		$altBody = getRegistrationEmailBodyAlt($code);

		
		
		$from = "ali@closerly.com";
		$from_name = "Closerly Team";
		
		$to = $email;
		$subject = getRegistrationSubject();

		$mail_error="";

		$success = send_mail($from, $from_name, $to, $subject, $body, $altBody);
		if ($success) {
			$delete_sql = "DELETE FROM wait_list where email like '".$email."'";
			$delete_res = mysql_query($delete_sql);
			echo "SUCCESS<br/>";
		} else {
			echo "FAIL $mail_error <br/>";
		}


	}

?>