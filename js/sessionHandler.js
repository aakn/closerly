function checkSessionExpire(xmlhttp) {
	if(xmlhttp.responseText == "SESSION EXPIRE") { 
				window.location = "login.php";
				return;
			}
}