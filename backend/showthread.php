<?php
	include('sessionHandler.php');
	//$q=$_GET["q"];
	//echo $q."<br/>";
	$id = $_SESSION['userID'];
	include('config.inc');
	
	$sql="SELECT other_number,id FROM sms WHERE userid = ".$id." ORDER BY time DESC";
	//echo $sql;
	$result = mysql_query($sql);
	
	
	
	$contacts = array();
	$numbers = array();
	while($row = mysql_fetch_array($result))
	{

		$str = $row['other_number'];
		//if (strpos($str,'904340') !== false) continue;
		if(in_array($str, $numbers)) {
			continue;
		}
		else {
			$numbers[] = $str;
			$pair[] = $str;
		} 
		
		
		
		$rx="SELECT * FROM contacts WHERE userid = ".$id . " and number = '". $str . "'" ;
		
		$xx = mysql_query($rx);
		$name = $str;
		
		$rw = mysql_fetch_row($xx);
		$temp = $rw[2];
		
		if($temp != "")
			$name = $temp. " (" . $str . ")";
		$pair = array('number' => $str, 'name' => $name);
		//echo "<li id = '" . $str . "'><a id = '" . $str . "' href=\"#\" onclick = 'loadthis(this.id);'\"><i class='icon-chevron-right'></i>" . $name . "</a></li>";
		//echo "<li class='divider'></li>";
		$contacts[] = $pair;
	}

	$json = json_encode($contacts);
	echo $json;
?>