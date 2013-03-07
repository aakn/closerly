function sendInvite() {
	var uid = document.getElementById("email-invite");
	var name = document.getElementById("name-invite");
	var result = document.getElementById("result");
	if(uid.value == "") {
		result.innerHTML = "Please type your email";
		uid.focus();
		return false;
	}
	var progressbar = "<div class = 'row-fluid'><div class = 'span10'><div class='progress progress-striped active'>"+
						"<div class='bar' style='width: 100%;'></div>"+
					"</div></div></div>";
	
	result.innerHTML = progressbar;
	
	//$fromName = $("#fromName option:selected").text();
	//$fromEmail = $("#fromEmail option:selected").text();

	var x = document.getElementById("fromName")
	fromName = x.options[x.selectedIndex].value;;
	var y = document.getElementById("fromEmail")
	fromEmail = y.options[y.selectedIndex].value;
	console.log(fromName+fromEmail);

	var request = $.ajax({
		url: "emailinvite.php",
		type: "POST",
		data: {
			email : uid.value,
			name : name.value,
			from_name : fromName,
			from_email : fromEmail
		}
	});
	
	request.done(function(data) {
		callback(result,uid,data);
	});
	
	request.fail(function(jqXHR, textStatus) {
		console.log( "Request failed: " + textStatus );
	});
	/*
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
	xmlhttp.open("POST","emailinvite.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("email="+uid.value+"&name="+name.value+"&from_name="+fromName+"&from_email="fromEmail);
	*/
	//alert("here");
	return false; //or the form will post your data to login.php

}
function callback(result,uid,text) {
	$("#result").removeClass("text-success").addClass("text-error");
	if(text == "SUCCESS") {
		$("#result").removeClass("text-error").addClass("text-success");
		result.innerHTML = "Secret Code Sent";
		uid.value = "";
	} else if(text == "WAIT") {
		result.innerHTML = "He has already been invited.<br/>Please wait till we mail you your secret code.";
		uid.value = "";
		return false;
	}
	else {
		result.innerHTML = "We couldn't invite that guy. :(<br/>Please try again later."+text;
		uid.focus();
		return false;
	}
}
$(function() {
	
	$("form").submit(function(e){
		e.preventDefault();
		sendInvite();
	});
	document.getElementById('name-invite').onkeypress = function(e) {
		doFocus('email-invite', e);
	};
	document.getElementById('email-invite').onkeypress = function(e) {
		doClick('submit', e);
	};
});
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