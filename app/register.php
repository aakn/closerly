<?php
	$emailid = $_POST['email'];
	$regid=$_POST['regid'];
	$password = $_POST['password'];
	$name = $_POST['username'];
	$phone = $_POST['phone'];
	$code = $_POST['code'];
	//$connection = mysql_connect("localhost","insigmvn_smsadm","webmaster");
	//echo $emailid.'<br/>'.$regid.'<br/>';
	include('config.inc');
		//$random_hash = md5(uniqid(rand(), true));
		//mysql_select_db($db_name, $connection) or die("died");
		//$password=hash("sha256",$password);
		
	
	if($code == "") $code = "1";

	$update_sql = "INSERT into registration(regid,email,name,pwd,phone,joincode) values ('"
	.mysql_real_escape_string($regid)."','"
	.mysql_real_escape_string($emailid)."','"
	.mysql_real_escape_string($name)."','"
	.$password."','"
	.mysql_real_escape_string($phone)."','"
	.mysql_real_escape_string($code)."')";
	//echo $update_sql.'\n';
	//mysql_query($update_sql, $connection);
	$result = mysql_query($update_sql, $connection) or die(mysql_error());  //do the query
	if($result==1) {
		$query = "SELECT * FROM registration where regid like '" . $regid . "' and email like '".$email."'";
		$xx = mysql_query($query, $connection);
		
		$rw = mysql_fetch_row($xx);
		$id = $rw[0];
		echo $id;

		$delete_sql = "DELETE FROM wait_list where email like '".$email."'";
		$delete_res = mysql_query($delete_sql);
		

		/*
		 * Sending Mail...
		*/

		include_once "../backend/email_body.php";
		include_once "../backend/phpmailer.php";


		$body = getRegistrationCompletedEmailBody($name);
		$altBody = getRegistrationCompletedEmailBodyAlt($name);

		$from = "harshit@closerly.com";
		$from_name = "Closerly Team";
		
		$to = $emailid;
		$subject = getRegistrationCompletedSubject();

		$mail_error="";

		$success = send_mail($from, $from_name, $to, $subject, $body, $altBody);
		
		//echo "SUCCESS<br/>";
		
	}
	else echo "REGISTRATION FAILURE";

?>