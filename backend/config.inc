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
	
?>
