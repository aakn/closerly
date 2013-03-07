<?php

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
			':-p'	=>	'emo_im_tongue_sticking_out',
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