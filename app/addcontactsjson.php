<?php
	
	
	$email = $_POST['email'];
	$json = $_POST['contacts'];
	$contacts = json_decode($json);


	include('config.inc');
	
	$query = "SELECT * FROM registration WHERE email like '".$email."'";
	//echo "<br/>".$query."<br/>";
	$result = mysql_query($query);

	$id = 0;

	$row = mysql_fetch_row($result);
	$id = $row[0];

	//echo $id."\n";
	//print_r($contacts);
	//print_r($json);
	//$ct = 0;

	$query = "DELETE FROM contacts where userid = $id";
	mysql_query($query);

	$mini_insert = "INSERT into contacts (userid,name,number) values (" . $id . ",'";

	foreach($contacts as $contact)	 {
		$name = $contact['name'];
		$number = $contact['number'];	
		//echo $name." - ";
		//echo $number."\n";	
		
		$insert_sql = $mini_insert . mysql_real_escape_string($name) . "','" . mysql_real_escape_string($number) . "')";

		//echo $insert_sql."\n";		
		
		$result = mysql_query($insert_sql);
		//$ct++;
		//echo $result."\n";
		
	}	
	//echo "hello".$ct;

?>