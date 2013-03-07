<?php
	
	
	

    	$key = md5($id);

	//$iv = mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC), $id);
	$iv = md5(md5($id));
	
	$iv = substr($iv,0,16);

	function encrypt( $secretKey,$message, $initialVector) {
	    return base64_encode(
	        mcrypt_encrypt( 
	            MCRYPT_RIJNDAEL_128,
	            $secretKey,
	            $message,  
	            MCRYPT_MODE_CFB,
	            $initialVector
	        )
	    );
	}
	function decrypt( $secretKey,$message, $initialVector) {
	    return trim(
	        mcrypt_decrypt( 
	            MCRYPT_RIJNDAEL_128,
	            $secretKey,
	            base64_decode($message),  
	            MCRYPT_MODE_CFB,
	            $initialVector
	        )
	    );
	}
	
	
	
	/*
	function decrypt1($key, $text, $iv) { 
	    return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, $key, base64_decode($text), MCRYPT_MODE_CBC, $iv));
	}
	function encrypt1($key, $text, $iv) {
		$t = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $text, MCRYPT_MODE_CBC, $iv);
		echo $t."<br/>";
		$t = base64_encode($t);
		echo $t."<br/>";
		$t = trim($t);
		echo $t."<br/>";
		return $t;
	    	//return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $text, MCRYPT_MODE_CBC, $iv)));
	}
	*/
	
    
?>