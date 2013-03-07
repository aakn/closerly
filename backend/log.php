<?php
	include('sessionHandler.php');
	$mode=$_POST["mode"];
	$time = $_POST["time"];
	//echo $q."<br/>";
	$id = $_SESSION['userID'];
	include('config.inc');

	if($mode == "start") {
		$update_sql = "INSERT into logs (userid, start) values ('" 
		. $id . "','" 
		. $time . "' )";
		
		$result = mysql_query($update_sql);

		$query = "select * from logs where userid = '".$id ."' and start = '" . $time . "' ";
		$result = mysql_query($query);
		$row = mysql_fetch_row($result);
		$logid = $row[0];

		echo $logid;


	} else if($mode == "done") {
		$logid = $_POST["id"];
		$update_sql = "UPDATE logs SET end = '".$time."' where id = '" .$logid. "'";
		mysql_query($update_sql);
	}


?>