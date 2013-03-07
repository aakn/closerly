<?php
	include('config.inc');
	
	$email = $_POST['email'];
	
	$query = "SELECT * FROM registration where email like '" . $email . "'";
	//echo $query;

	$xx = mysql_query($query);
	
	if( $rw = mysql_fetch_row($xx)){
		$id = $rw[0];
		echo $id;
	}
	else
		echo "DOES NOT EXIST";

?>