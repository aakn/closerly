<?php
	include('sessionHandler.php');
	$q=$_POST["userid"];
	//echo $q."<br/>";
	$id = $_SESSION['userID'];
	include('config.inc');
	
	$sql="SELECT * FROM contacts WHERE name = '" . $q . "' and userid = ".$id;
	//echo $sql;
	$result = mysql_query($sql);
	
	//echo "heyThere();";
	
	

	$num_rows = mysql_num_rows($result);
	$val = "";
	//echo "<div class = 'hero-unit'>";
	echo "<h2>".$q."</h2>";
	$i = 1;
	//echo "<form class='form-horizontal'>";
	while($row = mysql_fetch_array($result))
	{
		$val = $row['number'];
		//echo "<div class = 'control-group'>";
		//echo "<label class='control-label lead' for='num".$i."'>Number ".$i." </label>";
		//echo "<div class = 'controls'>";
		echo "<div class = 'row-fluid'>";
			echo "<div class = 'span2'";
				echo "<p class='lead text-info' ><strong>Number ".$i." </strong></p>";
			echo "</div>";
			echo "<div class = 'span3'";
				echo "<p id = 'num".$i."' class = 'lead'>" . $val . "</p>";
			echo "</div>";
		echo "</div>";
		$i++;
	}
	
	if($num_rows==1) {
		//echo "<script type = \"text/javascript\">loadthis('" . $val . "');</script>";
	}
	//echo "</form>";
	//echo "</div>";

?>