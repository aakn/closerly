<?php

	$code = $_POST["code"];
	include('config.inc');

	$query = "SELECT * FROM codes where code like '"
		.mysql_real_escape_string($code)."'";

	$result = mysql_query($query);
	$row = mysql_num_rows($result);
	if($row == 0)
		echo "DOES NOT EXIST";
	else {
		$rx = mysql_fetch_row($result);
		echo $rx[0];
	}



?>