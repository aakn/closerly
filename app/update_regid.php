<?php

	$regid=$_POST['regid'];
	$emailid = $_POST['email'];

	include('config.inc');

		
		
	$update_sql = "UPDATE registration set regid = '" .mysql_real_escape_string($regid).
	 "' where email like '" .mysql_real_escape_string($emailid). "'";
	
	$result = mysql_query($update_sql);  //do the query
	if($result==1) {
		$query = "SELECT * FROM registration where regid like '" . $regid . "'";
		$xx = mysql_query($query);
		
		$rw = mysql_fetch_row($xx);
		$id = $rw[0];
		if($id>0)
			echo "SUCCESS";
	}
	else echo "UPDATE FAILURE";


?>