<?php
	include('sessionHandler.php');
	//echo "here";	
	$name = $_SESSION['name'];
	$regid = $_SESSION['regID'];	
	$phone = $_SESSION['phone'];
	$id = $_SESSION['userID'];

	include('config.inc');
	echo "<ul class='nav nav-list'>";
	echo "<li class='nav-header'>Contacts</li>";
	$sql = mysql_query("SELECT DISTINCT name FROM contacts where userid = ".$id);
	while ($data = mysql_fetch_assoc($sql)) {
		$n = $data['name'];
		echo "<li id = '".$n."'><a id = '".$n."' href='#' onclick = 'showDude(this.id);'>".$n."</a></li>";
	}
?>