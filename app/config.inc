<?php
	$services_json = json_decode(getenv("VCAP_SERVICES"),true);
	$mysql_config = $services_json["mysql-5.1"][0]["credentials"];

	$username_database = $mysql_config["username"];
	$password_database = $mysql_config["password"];
	$hostname = $mysql_config["hostname"];
	$port = $mysql_config["port"];
	$db_database = $mysql_config["name"];

	$connection = mysql_connect("$hostname:$port", $username_database, $password_database) or DIE("Connection error");
	$db_selected = mysql_select_db($db_database) or die("selection error");
	
	/*
	$hostname = 'localhost';        // Your MySQL hostname. Usualy named as 'localhost', so you're NOT necessary to change this even this script has already online on the internet.
	$dbname   = 'insigmvn_websms'; // Your database name.
	$username = 'insigmvn_smsadm';             // Your database username.
	$password = 'webmaster';                 // Your database password. If your database has no password, leave it empty.
	
	// Let's connect to host
	$connection = mysql_connect($hostname, $username, $password) or DIE('Connection to host is failed, perhaps the service is down!');
	// Select the database
	mysql_select_db($dbname) or DIE('Database name is not available!');
	*/
?>