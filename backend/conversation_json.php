<?php
	include('sessionHandler.php');
	

	include('config.inc');
	$id = $_SESSION['userID'];
	include('protect.php');
	
	$q=$_POST["num"];
	
	if($q[0] == " ")
	{
		$q = "+".substr($q,1);
	}
	
	$str = $q;
	$rx="SELECT * FROM contacts WHERE userid = ".$id . " and number = '". $str . "' LIMIT 100" ;
	
	$xx = mysql_query($rx);
	$name = $str;
	
	$rw = mysql_fetch_row($xx);
	$temp = $rw[2];
	
	$name = $temp;
	$number = $str;
	
	$sql="SELECT * FROM sms WHERE other_number = '" . $q . "' and userid = ".$id . " ORDER BY time DESC LIMIT 1000 ";
	//echo $sql;
	$result = mysql_query($sql);

	$contents = array();
	
	while($row = mysql_fetch_array($result))
	{
		$i = $i + 1;
		$pr = "";
		$smsid = $row['id'];
		$body = $row['body'];
		$time = $row['time'];
		//$time = date('F j, Y - g:i:s A',strtotime($time));
		$body = decrypt($key, $body, $iv);
		$body = stripslashes($body);
		//Smilify($body);

		$sent = $row['is_send_message'];

		$item = array(
			'id'	=>	$smsid,
			'body'	=>	$body,
			'time'	=>	$time,
			'sent'	=>	$sent,
			);
		$contents[] = $item;
	}

	$thread = array(
		'name'		=>	$name,
		'number'	=>	$number,
		'contents'	=>	$contents
		);

	$json = json_encode($thread);
	echo $json;

	
	function Smilify(&$subject)
	{
		$smilies = array(
		   ':-D'	=>	'emo_im_laughing',
			':-)'	=>	'emo_im_happy',
			':-/'	=>	'emo_im_smirk',
			':/'	=>	'emo_im_smirk',
			':-\\'	=>	'emo_im_undecided',
			':-\\'	=>	'emo_im_undecided',
			':)'	=>	'emo_im_happy',
			':P'	=>	'emo_im_tongue_sticking_out',
			':p'	=>	'emo_im_tongue_sticking_out',
			':-P'	=>	'emo_im_tongue_sticking_out',
			':-|'	=>	'emo_im_pokerface',
			':D'	=>	'emo_im_laughing',
			':|'	=>	'emo_im_pokerface',
			'B)'	=>	'emo_im_cool',
			'B-)'	=>	'emo_im_cool',
			'<3'	=>	'emo_im_heart',
			'o_O'	=>	'emo_im_wtf',
			'oO'	=>	'emo_im_wtf',
			':-('	=>	'emo_im_sad',
			':('	=>	'emo_im_sad',
			';-)'	=>	'emo_im_winking',
			';)'	=>	'emo_im_winking',
			':*'	=>	'emo_im_kissing',
			':-*'	=>	'emo_im_kissing',
			':O'	=>	'emo_im_yelling',
			':-O'	=>	'emo_im_yelling',
			':\'('	=>	'emo_im_crying',
			':-['	=>	'emo_im_embarrassed',
			':-X'	=>	'emo_im_lips_are_sealed',
			':X'	=>	'emo_im_lips_are_sealed',
			'X-('	=>	'emo_im_mad',
			'X('	=>	'emo_im_mad',
			':$'	=>	'emo_im_money_mouth',
			':-$'	=>	'emo_im_money_mouth',
		);

	
		$replace = array();
		foreach ($smilies as $smiley => $imgName)
		{
			$size = "25";
			array_push($replace, '<img style = "margin-bottom:0px;" src="smiley/'.$imgName.'.png" '.
			'alt="'.$smiley.'" '.
			'width="'.$size.'" height="'.$size.'"'.
			' />');
		}
		$subject = str_replace(array_keys($smilies), $replace, $subject);
	}
	
	
	

?>