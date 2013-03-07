<?php
	include('sessionHandler.php');
	$q=$_GET["q"];
	//echo $q."<br/>";
	$id = $_SESSION['userID'];
	include('config.inc');
	
	$sql="SELECT * FROM contacts WHERE name = '" . $q . "' and userid = ".$id;
	//echo $sql;
	$result = mysql_query($sql);
	
	echo "<table>
	<tr>
	<th>Name</th>
	<th>Number</th>
	</tr>";
	
	while($row = mysql_fetch_array($result))
	{
		  echo "<tr>";
		  echo "<td>" . $row['name'] . "</td>";
		  echo "<td>" . $row['number'] . "</td>";
		  echo "</tr>";
	}
	echo "</table>";

?>