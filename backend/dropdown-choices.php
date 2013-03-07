<?php

	include('sessionHandler.php');
	//echo "here";	
	$name = $_SESSION['name'];
	$regid = $_SESSION['regID'];	
	$phone = $_SESSION['phone'];
	$id = $_SESSION['userID'];

	include('config.inc');
		
	$sql = mysql_query("SELECT distinct name FROM contacts where userid = ".$id);
	//echo "retard";
	echo "<select id = 'dropdown' name='users' onchange='showUser(this.value);' ".
	//echo "<select class = 'default'  name='users' onchange='showUser(this.value)' ".
	
	"class='fromDest' ".
	//"style='background: #FFF;-webkit-appearance: button;background-image: url(images/bot_arr.png);background-position: 95%;background-repeat: no-repeat;border: 1px solid #5DB1FE;color: #10058F;text-overflow: ellipsis;'".
	">".
	"<option value=''>Select a person</option>";
	
	while ($data = mysql_fetch_assoc($sql)) {
		echo "<option value='".$data['name']."'>".$data['name']."</option>";
	}
	
	echo "</select>";
	//echo "<br/><br/>";
?>