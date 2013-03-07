<?php
	
	$total = $_POST['total'];
	$email = $_POST['email'];

	include('config.inc');
	
	$query = "SELECT * FROM registration WHERE email like '".$email."'";
	//echo "<br/>".$query."<br/>";
	$result = mysql_query($query);

	$id = 0;

	$row = mysql_fetch_row($result);
	$id = $row[0];

	//echo $id."\n";

	$mini_insert = "INSERT into contacts (userid,name,number) values (" . $id . ",'";

	for ($i = 0; $i < $total; $i++)	 {
		$name = $_POST['name'.$i];
		$number = $_POST['number'.$i];	
		//echo $name." - ";
		//echo $number."\n";	
		
		$insert_sql = $mini_insert . mysql_real_escape_string($name) . "','" . mysql_real_escape_string($number) . "')";

		//echo $insert_sql."\n";		
		
		$result = mysql_query($insert_sql);
		
		//echo $result."\n";
		
	}	

?>