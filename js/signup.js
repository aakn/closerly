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

	//console.log(username+password);
	//var uid = document.getElementById("email");
	//var pwd = document.getElementById("user_pass");
	var uid = form.username;
	var result = document.getElementById("result");
	if(uid.value == "") {
		result.innerHTML = "Please type your email";
		uid.focus();
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
			callback(result,uid,res_text);
		}
	}

	//console.log(passwordHash);
	xmlhttp.open("POST","/app/storeusercode.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("email="+uid.value);
	
	//alert("here");
	return false; //or the form will post your data to login.php

}
function callback(result,uid,text) {
	$("#result").removeClass("text-success").addClass("text-error");
	if(text == "SUCCESS") {
		$("#result").removeClass("text-error").addClass("text-success");
		result.innerHTML = "Thank you for signing up.<br/>Please wait till we mail you your secret code.";
		uid.value = "";
	} else if(text == "WAIT") {
		result.innerHTML = "You have already signed up before.<br/>Please wait till we mail you your secret code.";
		uid.value = "";
		return false;
	}
	else {
		result.innerHTML = "We couldn't sign you up.<br/>Please try again later.";
		uid.focus();
		return false;
	}
}