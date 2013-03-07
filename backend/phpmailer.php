<?php
	function send_mail($from, $from_name, $to, $subject, $body, $altBody) {
		require_once 'phpmailer/class.phpmailer.php';
		global $mail_error;

		$mail = new PHPMailer();  // create a new object
		$mail->IsSMTP(); // enable SMTP
		$mail->IsHTML(true);
		$mail->SMTPDebug = 0;  // debugging: 1 = errors and messages, 2 = messages only
		$mail->SMTPAuth = true;  // authentication enabled
		$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 465; 
		$mail->Username = "support@closerly.com";  
		$mail->Password = "harshit123";           
		$mail->SetFrom($from, $from_name);
		$mail->Subject = $subject;
		$mail->Body = $body;
		$mail->AltBody = $altBody;
		$mail->AddAddress($to);
		if(!$mail->Send()) {
			$mail_error = 'Mail error: '.$mail->ErrorInfo; 
			return false;
		} else {
			$mail_error = 'Message sent to '.$to;
			return true;
		}
	}
?>