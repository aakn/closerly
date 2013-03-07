<?php

	$email = $_POST["email"];
	include('config.inc');

	$query = "SELECT * FROM registration where email like '"
		.mysql_real_escape_string($email)."'";

	$result = mysql_query($query);
	$row = mysql_num_rows($result);
	if($row == 1)
		echo "ALREADY EXIST";
	else {
		$query = "SELECT * FROM wait_list where email like '"
			.mysql_real_escape_string($email)."'";
		//echo $query;
		$result = mysql_query($query);
		$row = mysql_num_rows($result);

		if($row == 0) {
			$query = "SELECT * FROM codes where id = 1 ";

			$result = mysql_query($query);
			$row = mysql_fetch_row($result);
			$code = $row[1];

			$insert_sql = "INSERT into wait_list (email,code) values ('".
				mysql_real_escape_string($email) . "','".
				$code ."')" ;

			$result = mysql_query($insert_sql);


			if ($result) {
				echo "SUCCESS";


				include_once "../backend/email_body.php";
				include_once "../backend/phpmailer.php";


				$body = getRegistrationStartEmailBody();
				$altBody = getRegistrationStartEmailBodyAlt();

				$from = "admin@closerly.com";
				$from_name = "Closerly Team";
				
				$to = $email;
				$subject = getRegistrationStartSubject();

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