<?php

	$email = $_POST["email"];
	$name = $_POST["name"];
	$from_name = $_POST["from_name"];
	$from = $_POST["from_email"];
	include('../config.inc');

	$query = "SELECT * FROM registration where email like '"
		.mysql_real_escape_string($email)."'";

	$result = mysql_query($query);
	$row = mysql_num_rows($result);
	if($row == 1)
		echo "ALREADY EXIST";
	else {
		$query = "SELECT * FROM invited where email like '"
			.mysql_real_escape_string($email)."'";
		//echo $query;
		$result = mysql_query($query);
		$row = mysql_num_rows($result);

		if($row == 0) {
			$query = "SELECT * FROM codes where id = 3 ";

			$result = mysql_query($query);
			$row = mysql_fetch_row($result);
			$code = $row[1];

			$insert_sql = "INSERT into invited (name,email,code) values ('".
				mysql_real_escape_string($name) . "','". mysql_real_escape_string($email) . "','".
				$code ."')" ;

			$result = mysql_query($insert_sql);


			if ($result) {
				echo "SUCCESS";


				include_once "../../backend/email_body.php";
				include_once "../../backend/phpmailer.php";


				$body = getInviteEmailBody();
				$altBody = getInviteEmailBodyAlt();

				//$from = "admin@closerly.com";
				//$from_name = "Closerly Team";
				
				$to = $email;
				$subject = getInviteSubject();

				$mail_error="";

				$success = send_mail($from, $from_name, $to, $subject, $body, $altBody);
				//echo $mail_error."<br/>".$success;
			}
			else echo "FAIL";
		}
		else
			echo "WAIT";
	}

?>