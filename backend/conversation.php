<?php
	include('sessionHandler.php');
	
	include('smilify.php')
	include('config.inc');
	$id = $_SESSION['userID'];
	include('protect.php');
	
	$q=$_GET["q"];
	
	if($q[0] == " ")
	{
		$q = "+".substr($q,1);
	}
	
	$str = $q;
	$rx="SELECT * FROM contacts WHERE userid = ".$id . " and number = '". $str . "' LIMIT 50" ;
	
	$xx = mysql_query($rx);
	$name = $str;
	
	$rw = mysql_fetch_row($xx);
	$temp = $rw[2];
	
	headerEcho($temp,$str);
	
	
	
	$sql="SELECT * FROM sms WHERE other_number = '" . $q . "' and userid = ".$id . " ORDER BY time DESC ";
	//echo $sql;
	$result = mysql_query($sql);
	
	$part1 = "<div class = 'span12' style = 'margin-left:0px;'>".
			"<blockquote><p class = 'conversation-recv-color'>";
	$part2 = "</p>".
			"<br/>".
			"<small>";
			//"<strong><p align=right>&nbsp;&nbsp;";
	//$part3 = "</p></strong>".
	$part3 = "</small>".
			"</blockquote>".
			"<p></p>".
			//"<div class='ballon-bgbtm'>&nbsp;</div>".
			"</div>";
	
	$part1_other = "<div class = 'span12' style = 'margin-left:0px;'>".
			"<blockquote class='pull-right'><p class = 'conversation-sent-color'>";
	$part2_other = "</p>".
			"<br/>".
			//"<strong><p align=left>&nbsp;&nbsp;";
			"<small>";
	//$part3_other = "</strong>".
	$part3_other = "</small>".
			"</blockquote>".
			"<p></p>".
			//"<div class='ballon-bgbtm-other'>&nbsp;</div>".
			"</div>";
	echo "<div class = 'row-fluid' id = 'conversation_list_items' hidden = 'true'>";
	echo "<div class = 'span12'></div>";
	while($row = mysql_fetch_array($result))
	{
		$i = $i + 1;
		$pr = "";
		$body = $row['body'];
		$time = $row['time'] ;
		$time = date('F j, Y - g:i:s A',strtotime($time));
		$body = decrypt($key, $body, $iv);
		$body = stripslashes($body);
		Smilify($body);

		  $sent = $row['is_send_message'];
		  if($sent == 1)
			echo $part1_other.$body.$part2_other.$time.$part3_other;
		  else
			echo $part1.$body.$part2.$time.$part3;
		
	}
	echo "</div>";
	
	
	
	function headerEcho($head, $num) {
		$var = "<div>".
			"<div class='row-fluid'>".
			"	<div class = \"span4\" id='content'>".
			"		<div id = 'user_info'>".

			"				<div class = 'row-fluid'>".
			"					<div style = 'padding-top:0px;margin-top:0px;' class = 'span9 page-header'>".
			"						<h2>" . $head . 
			"						<br/><small>" . $num . "</small></h2>".
			"					</div>".
			"					<div class = 'span3'>".
			"						<button id = 'delete_thread' class = 'btn btn-danger' >Delete</button>".
			"					</div>".
			"				</div>".

			"		</div>".
			"	</div>".
			"	<div class=\"span5\" id=\"sidebar1\">".


			"				<textarea  placeholder = 'Type your message and hit Sent!' onkeyup='bodyCharacterCount();' id = \"body\" name=\"body\" style=\"width:100%; resize:none;\" rows = \"3\"></textarea>".


			"	</div>".
			"	<div class=\"span2\" id=\"sidebar2\">".
			
			//"				<input type=\"image\" src = \"images/send.png\" alt=\"&nbsp Send &nbsp\" onclick = \"sendMessage();\" style= \"width: 8em;\" align=\"center\">".
			"				<input type='button' class = 'btn btn-info btn-large btn-block' value='&nbsp Send &nbsp' onclick = 'sendMessage();>".
			"				<small><br/><p id = 'char_count' class='text-info' style='margin-top:0px;padding-top:0px'>0/160</p></small>".
			"	</div>".
			"</div>".
			"</div>";
		echo $var;
	}
	

?>