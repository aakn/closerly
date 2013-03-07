 $(function() {
	$( "input[type=submit], button")
		.button()
		;
	$("form").submit(function(e){
		e.preventDefault();
		changePassword();
	});
});
function changePassword() {
	
	var pwd = document.getElementById("user_pass").value;
	var opwd = document.getElementById("old_pass").value;
	var cpwd = document.getElementById("confirm_pass").value;
	var result = document.getElementById("result");
	if(opwd == "") {
		result.innerHTML = "Please type your old password";
		//alert("please type your old password");
		return;
	}
	else if(pwd !== cpwd) {
		result.innerHTML = "The new passwords are not the same";			
		//alert("b");
		return;
	}
	else if(/^\s*$/.test(pwd)) {
		result.innerHTML = "Not a valid password";
		//alert("Not a valid password");
		return;
	}
	else if (pwd == opwd) {
		result.innerHTML = "Your old password and the new password cannot be the same";
		//alert("Your old password and the new password cannot be the same");
		return;
	}
	var sha_old_pwd = SHA256(opwd);
	var sha_pwd = SHA256(pwd);
	conpwd(sha_old_pwd, sha_pwd);
	//alert("sha 256 of "+pwd +" is " + SHA256(pwd));

}
function conpwd(old, pwd) {
	if (window.XMLHttpRequest) {
		  // code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
	}
	else {
		  // code for IE6, IE5
	  	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
  	var result = document.getElementById("result");
  	var toPut = "<p align=center> <img src = 'images/ajax-loader.gif'/> </p>";
	result.innerHTML = toPut;
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    	{
	    		checkSessionExpire(xmlhttp);
	    		var restext;
		    	restext=xmlhttp.responseText;
		    	callback(restext,result);
		}
	}
	xmlhttp.open("POST","backend/changepwd.php",true);
	
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("old_password="+old+"&password="+pwd);

}
function callback(res,result) {
	var pwd = document.getElementById("user_pass");
	var opwd = document.getElementById("old_pass");
	var cpwd = document.getElementById("confirm_pass");
	if(res == "FAIL" || res == "LATER") {
		if(res == "FAIL")
			result.innerHTML = "Incorrect password";
		else
			result.innerHTML = "Unable to change password now. Please try again later.";

		opwd.focus();
	}
	else if (res == "SUCCESS") {
		$("#result").removeClass("text-error").addClass("text-success");
		//result.style.color = "green";
		result.innerHTML = "Password Changed Successfully";
	}
	pwd.value= "";
	opwd.value="";
	cpwd.value="";
}