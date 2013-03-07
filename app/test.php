<?php
	$name = $_GET['name'];
	$number = $_GET['number'];
	$email = $_GET['email'];	
	echo $name." - ";
	echo $number."<br/>";	
	echo $email;
	
	include('config.inc');
	
	$query = "SELECT * FROM registration WHERE email like '".$email."'";
	echo "<br/>".$query."<br/>";
	$result = mysql_query($query);

	$id = 0;

	$row = mysql_fetch_row($result);
	$id = $row[0];
	
	echo "<br/>".$id."<br/>";
	
	$insert_sql = "INSERT into contacts (userid,name,number) values (" 
	. $id . ",'" . mysql_real_escape_string($name) . "','" . mysql_real_escape_string($number) . "')";
	
	echo "<br/>".$insert_sql."<br/>";
	
	$result = mysql_query($insert_sql);
	
	echo "result ".$result."<br/>";
?>