<?php

	include('../backend/config.inc');

	$query = "SELECT name,email FROM registration";
	$result = mysql_query($query);
	echo "<table>";
	while ($row = mysql_fetch_array($result)) {
	
		$name = $row['name'];
		$email = $row['email'];
		echo "<tr><td>$name</td><td>$email</td></tr>";


	}

?>
