<?php
	$q = $_GET["email"];

	//Setting Parameters for sending of mail. :D
	$from = "ali@closerly.com";
	$from_name = "Closerly Support";
	if($q == "" || $q == null)
		$to = "harshit040591@gmail.com";
	else $to = $q;
	$subject = "Bitches!";
	$body = "<strong>Hi Bitches and Whores,</strong><br/><br/>This is a test fucking message!!<br/>Shouldn't fucking go to fucking spam!<br/>Don't fucking reply!! Its a fucking automated message.<br/><br/>Regards<br/>Jain, Fucking CEO of Fucking Insignia Devs.";
	$altBody = "Hi Bitches and Whores,\n\nThis is a test fucking message!!\nShouldn't fucking go to fucking spam!\nDon't fucking reply!! Its a fucking automated message.\n\nRegards\nJain, Fucking CEO of Fucking Insignia Devs.";
	$mail_error="";
	include_once "phpmailer.php";
	$success = send_mail($from, $from_name, $to, $subject, $body, $altBody);
	echo $success."<br/>".$mail_error;

?>