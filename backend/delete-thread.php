<?php
	include('sessionHandler.php');
	
	
	include('config.inc');
	$id = $_SESSION['userID'];
	
	
	$q=$_POST["number"];
	
	if($q[0] == " ")
	{
		$q = "+".substr($q,1);
	}
	
	
	
	$sql="DELETE FROM sms WHERE other_number like '" . $q . "' and userid = ".$id ;
	
	//echo $sql;
	$result = mysql_query($sql) or die ("FAILURE");
	//echo $result."<br/>";
	if($result == 1)
		echo "SUCCESS";
	else
		echo "FAILURE";

	
	

?>