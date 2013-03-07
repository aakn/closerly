<?php
	$app_link = "https://play.google.com/store/apps/details?id=com.insignia.web.sms";
	$key_send_subject = "Your Closerly Secret Code is here";
	$registration_completed_subject = "Welcome To The Closerly Family!";
	$registration_start_subject = "Your Closerly registration is under process";

	function getOldRegistrationEmailBody($code) {
		$part1 = "Hey there,<br/><br/>Welcome to Closerly. We are glad that you are joining our family.<br/>You can complete the registration process by using the code - <strong>".$code."</strong><br/><br/>";
		$part2 = "Hope you enjoy using <a href = 'http://www.closerly.com'>Closerly</a>. You can send your feedback to support@closerly.com<br/>If you find any bugs please report them!!<br/><br/>";
		$part3 = "Again, thank you and welcome to Closerly!<br/><br/>";
		$part4 = "Harshit Jain<br/>CEO and Co-Founder<br/>Closerly.com";
		$body = $part1.$part2.$part3.$part4;
		return $body;
	}
	function getOldRegistrationEmailBodyAlt($code) {
		$part1 = "Hey there,\n\nWelcome to Closerly. We are glad that you are joining our family.\nYou can complete the registration process by using the code - ".$code."\n\n";
		$part2 = "Hope you enjoy using closerly.com . You can send your feedback to support@closerly.com\nIf you find any bugs please report them!!\n\n";
		$part3 = "Again, thank you and welcome to Closerly!\n\n";
		$part4 = "Harshit Jain\nCEO and Co-Founder\nCloserly.com";
		$body = $part1.$part2.$part3.$part4;
		return $body;
	}
	function getRegistrationEmailBodyAlt($code) {
		/*
		$part1 = "Hi,\n\nYour access key is : ".$code."\n\n";
		$part2 = "Just click on the link below to download the app if you haven’t already.\n\n";
		$part3 = $app_link;
		$part4 = "\n\nSteps to register:\n1) Download and open the app\n2) Click on “Register”\n3) Click on “I have a code”\n4) Set your password\nAnd thats it! You’re done! Start using Closerly right away :D\n\n";
		$part5 = "Thanking you\n\nAli Asgar\n\nChief Designer & Co-Founder\nCloserly\nali@closerly.com";
		$body = $part1.$part2.$part3.$part4.$part5;
		*/
		global $app_link;
		$body = file_get_contents('../backend/mailbody/key-send-alt.txt');
		$body = str_replace("<<INSERT_HERE>>", $code, $body);
		$body = str_replace("<<INSERT_LINK_HERE>>", $app_link, $body);
		return $body;
	}
	function getRegistrationEmailBody($code) {
		/*
		$part1 = "Hi,<br/><br/>Your access key is : ".$code."<br/><br/>";
		$part2 = "Just click on the link below to download the app if you haven’t already.<br/><br/>";
		$part3 = "<a href = '$app_link'>Closerly on Google Play Store</a>";
		$part4 = "<br/><br/>Steps to register:<br/><ol><li>Download and open the app</li><li>Click on “Register”</li><li>Click on “I have a code”</li><li>Set your password</li></ol><br/>And thats it! You’re done! Start using Closerly right away :D<br/><br/>";
		$part5 = "Thanking you<br/><br/>Ali Asgar<br/><br/>Chief Designer & Co-Founder<br/>Closerly<br/>ali@closerly.com";
		$body = $part1.$part2.$part3.$part4.$part5;
		*/
		global $app_link;
		$body = file_get_contents('../backend/mailbody/key-send.html');
		$body = str_replace("<<INSERT_HERE>>", $code, $body);
		$body = $body = str_replace("<<INSERT_LINK_HERE>>", $app_link, $body);
		return $body;
	}
	function getRegistrationSubject() {
		global $key_send_subject;
		return $key_send_subject;
	}
	function getRegistrationCompletedSubject() {
		global $registration_completed_subject;
		return $registration_completed_subject;
	}
	function getRegistrationCompletedEmailBodyAlt($name) {
		/*
		$part1 = "Hi $name,\n\nMy name is Harshit and I am the CEO and Co-Founder of Closerly. I wanted to take this opportunity to welcome you to the Closerly family.  I hope that you love your experience with Closerly.\n\n";
		$part2 = "As you have joined a closed beta of the app, we hope that you help us remove the bugs that might have creeped through the development of the app. You can report them by sending a mail to us at : support@closerly.com\n\n";
		$part3 = "We would also highly appreciate you inviting your friends and family to Closerly. There are some exciting things in store for those of you who do and all of them can be checked out at www.closerly.com/invites or by clicking on the invite tab once you are logged into closerly.com\n\n";
		$part4 = "We would also love to hear feedback/suggestions/ideas from you and you can talk to  us directly at:\nharshit@closerly.com (CEO) or\nali@closerly.com (Chief Designer)\n\n\n";
		$part5 = "Thanking you\n\nHarshit Jain\n\nCEO & Co-Founder\nCloserly\nharshit@closerly.com";
		$body = $part1.$part2.$part3.$part4.$part5;
		*/
		$body = file_get_contents('../backend/mailbody/welcome-alt.txt');
		$body = str_replace("<<INSERT_NAME>>", $name, $body);
		return $body;
	}
	function getRegistrationCompletedEmailBody($name) {
		/*
		$part1 = "Hi $name,<br/><br/>My name is Harshit and I am the CEO and Co-Founder of Closerly. I wanted to take this opportunity to welcome you to the Closerly family.  I hope that you love your experience with Closerly.<br/><br/>";
		$part2 = "As you have joined a closed beta of the app, we hope that you help us remove the bugs that might have creeped through the development of the app. You can report them by sending a mail to us at : support@closerly.com<br/><br/>";
		$part3 = "We would also highly appreciate you inviting your friends and family to Closerly. There are some exciting things in store for those of you who do and all of them can be checked out at www.closerly.com/invites or by clicking on the invite tab once you are logged into <a href ='closerly.com'>Closerly</a><br/><br/>";
		$part4 = "We would also love to hear feedback/suggestions/ideas from you and you can talk to  us directly at:<br/>harshit@closerly.com (CEO) or<br/>ali@closerly.com (Chief Designer)<br/><br/><br/>";
		$part5 = "Thanking you<br/><br/>Harshit Jain<br/><br/>CEO & Co-Founder<br/>Closerly<br/>harshit@closerly.com";
		$body = $part1.$part2.$part3.$part4.$part5;
		*/
		$body = file_get_contents('../backend/mailbody/welcome.html');
		$body = str_replace("<<INSERT_NAME>>", $name, $body);
		return $body;
	}
	function getRegistrationStartEmailBodyAlt() {
		/*
		$part1 = "Hi,\n\n";
		$part2 = "Thank you for registering with us.  As you know, we are currently in a closed beta. We are currently processing your request and will be sending you your access key soon. We hope that you love our product as much as we have loved working on it.\n\n";
		$part3 = "Again, thanking you on behalf of all of us at Closerly.\n\n\n";
		$part4 = "Harshit Jain\n\nCEO & Co-Founder\nCloserly\nharshit@closerly.com\n";
		$body = $part1.$part2.$part3.$part4;
		*/
		$body = file_get_contents('../backend/mailbody/pre-registration-alt.txt');
		return $body;
	}
	function getRegistrationStartEmailBody() {
		/*
		$part1 = "Hi,<br/><br/>";
		$part2 = "Thank you for registering with us.  As you know, we are currently in a closed beta. We are currently processing your request and will be sending you your access key soon. We hope that you love our product as much as we have loved working on it.<br/><br/>";
		$part3 = "Again, thanking you on behalf of all of us at Closerly.<br/><br/><br/>";
		$part4 = "Harshit Jain<br/><br/>CEO & Co-Founder<br/>Closerly<br/>harshit@closerly.com<br/>";
		$body = $part1.$part2.$part3.$part4;
		*/
		$body = file_get_contents('../backend/mailbody/pre-registration.html');
		return $body;
	}
	function getRegistrationStartSubject() {
		global $registration_start_subject;
		return $registration_start_subject;
	}
	function getInviteEmailBodyAlt() {
		$body = file_get_contents('../../backend/mailbody/notification/invite-alt.txt');
		return $body;
	}
	function getInviteEmailBody() {
		$body = file_get_contents('../../backend/mailbody/notification/invite.html');
		return $body;
	}
	function getInviteSubject() {
		$subject = file_get_contents('../../backend/mailbody/notification/invite-subject.txt');
		return $subject;
	}
?>