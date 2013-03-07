$(function() {
	$( "input[type=submit], button")
		.button()
		;
	$("form").submit(function(e){
		e.preventDefault();
		
	});
});

window.onload = function() {
	document.getElementById('email').onkeypress = function(e) {
		doFocus('user_pass',e);
	};
	document.getElementById('user_pass').onkeypress = function(e) {
		doClick('submit', e);
	};
};
function doFocus(name,e) {
	var ev = e || window.event;
	var key = ev.keyCode;
	
	if (key == 13) {
		document.getElementById(name).focus();
	}
}
function doClick(buttonName,e) {
	//the purpose of this function is to allow the enter key to 
	//point to the correct button to click.
	var ev = e || window.event;
	var key = ev.keyCode;
	
	if (key == 13) {
		//Get the button the user wants to have clicked
		var btn = document.getElementById(buttonName);
		if (btn != null) { 
			//If we find the button click it
			btn.click();
			ev.preventDefault(); 
		}
	}
}

function check(form) {
	var username = form.username.value;
	var password = form.password.value;

	//console.log(username+password);
	//var uid = document.getElementById("email");
	//var pwd = document.getElementById("user_pass");
	var uid = form.username;
	var pwd = form.password;
	var result = document.getElementById("result");
	if(uid.value == "") {
		result.innerHTML = "Please type your email";
		uid.focus();
		return false;
	}
	if(pwd.value == "") {
		result.innerHTML = "Please type your password";
		pwd.focus();
		return false;
	}
	
	//var toPut = "<p align=center> <img src = 'images/ajax-loader.gif'/> </p>";
	var progressbar = "<div class = 'row-fluid'><div class = 'span10 offset1'><div class='progress progress-danger progress-striped active'>"+
						"<div class='bar' style='width: 100%;'></div>"+
					"</div></div></div>";
	
	result.innerHTML = progressbar;
	
	if (window.XMLHttpRequest) {
		  // code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
	}
	else {
		  // code for IE6, IE5
	  	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
	    	{
	    		var res_text;
		    	res_text=xmlhttp.responseText;
			callback(result,uid,pwd,res_text);
		}
	}
	passwordHash = SHA256(pwd.value);
	//console.log(passwordHash);
	xmlhttp.open("POST","/backend/signin.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("username="+uid.value+"&password="+passwordHash);
	
	//alert("here");
	return false; //or the form will post your data to login.php

}
function callback(result,uid,pwd,text) {
	if(text == "SUCCESS") {
		window.location = "/";
	}
	else if (text == "INACTIVE") {
		window.location = "wait.php";
	}
	else {
		result.innerHTML = text;
		pwd.value = "";
		pwd.focus();
		return false;
	}
}