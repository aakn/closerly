<?php
	include('sessionHandler.php');
	$q=$_GET["q"];
	//echo $q."<br/>";
	$id = $_SESSION['userID'];
	include('config.inc');
	
	$sql="SELECT * FROM contacts WHERE name = '" . $q . "' and userid = ".$id;
	//echo $sql;
	$result = mysql_query($sql);
	
	//echo "heyThere();";
	
	echo "<select id = 'number_dropdown_list' name='number_dropdown_list'  class='fromDest' ".
	">"
	//"style='background: #FFF;-webkit-appearance: button;background-image: url(images/bot_arr.png);background-position: 95%;border: 1px solid #5DB1FE;background-repeat: no-repeat;color: #10058F;text-overflow: ellipsis;'>"
	;

	$num_rows = mysql_num_rows($result);
	$val = "";
	if($num_rows>1) 
		echo "<option value=''>Select a number</option>";
	while($row = mysql_fetch_array($result))
	{
		$val = $row['number'];
		  echo "<option value = '" . $val . "'>" . $val . " &nbsp &nbsp &nbsp </option>";
		  //echo "<td>" . $row['name'] . "</td>";
		  //echo "<td>" . $row['number'] . "</td>";
		  //echo "</tr>";
	}
	
	if($num_rows==1) {
		//echo "<script type = \"text/javascript\">loadthis('" . $val . "');</script>";
	}
	echo "</select>";

?>