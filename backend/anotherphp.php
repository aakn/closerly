<?php

	include('sessionHandler.php');
	$id = $_SESSION['userID'];
	
	include('protect.php');
	
	//$text = "12345 is supposed to be a super long string okay? 12345 is supposed to be a super long string okay? 12345 is supposed to be a super long string okay? 12345 is supposed to be a super long string okay?";
	
	$text = "FUCK this shit bro! $$$ @( * &^% More of this is bullshit!! &*%^$*&^%&^(*)( THIS IS A ENCRYPTION TEST!!!";
	
	echo "Plain Number : " . $text . "<br><br>";
	
	echo "KEY : " . $key . "<br/>IV : " . $iv . "<br/>";
	$encrypted = encrypt($key, $text, $iv);
	echo "AES Number : " . $encrypted . "<br><br>";
	
	echo "Plain Number : ". decrypt($key, $encrypted, $iv) . "<br><br>";
?>