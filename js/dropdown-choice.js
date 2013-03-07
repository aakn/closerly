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
    	checkSessionExpire(xmlhttp);
    	var res = xmlhttp.responseText;
	    document.getElementById("name-list").innerHTML=res;
	    //document.getElementById("damn").innerHTML=res;
	    //alert(res);
	    //eval(xmlhttp2.responseText);
	}
}
xmlhttp.open("GET","backend/dropdown-choices.php",true);
xmlhttp.send();