var previousNumber = "";
function showContacts() {
	if (window.XMLHttpRequest) {
		  // code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
	}
	else {
		  // code for IE6, IE5
	  	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			checkSessionExpire(xmlhttp);
		    document.getElementById("contacts").innerHTML=xmlhttp.responseText;
		}
	}

	//xmlhttp.open("GET","samplephp.php?q=Dad",true);
	//xmlhttp.open("GET","messagesent.php?number="+number+"&body="+body,true);
	//xmlhttp.open("GET","messagesent.php?number="+number+"&body=hello+world",true);
	xmlhttp.open("GET","/backend/showallcontacts.php",true);
	xmlhttp.send();
}
function showDude(userid) {
	if(previousNumber.className=="active") {
		previousNumber.className = "";
	}
	var listitem;
	if(listitem = document.getElementById(userid)) {
		listitem.className = "active";
		previousNumber = listitem;
	}
	var progressbar = "<div class = 'row-fluid'><div class = 'span6 offset3'><div class='progress progress-danger progress-striped active'>"+
							"<div class='bar' style='width: 100%;'></div>"+
						"</div></div></div>";
	document.getElementById("contact-info").innerHTML = progressbar;
	if (window.XMLHttpRequest) {
		  // code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
	}
	else {
		  // code for IE6, IE5
	  	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  	$('#element').popover('show')
	}
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			checkSessionExpire(xmlhttp);
		    document.getElementById("contact-info").innerHTML=xmlhttp.responseText;
		}
	}

	//xmlhttp.open("GET","samplephp.php?q=Dad",true);
	//xmlhttp.open("GET","messagesent.php?number="+number+"&body="+body,true);
	//xmlhttp.open("GET","messagesent.php?number="+number+"&body=hello+world",true);
	xmlhttp.open("POST","/backend/showsinglecontact.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("userid="+userid);
	
}