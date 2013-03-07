var ct;
var currentNumber = "";
var selected_number ;
var selected_name;
var SENT_COLOR="blue";
var previousNumber = "";
var logID = -1;
var stack_bottomright = {"dir1": "up", "dir2": "left", "firstpos1": 25, "firstpos2": 25, "spacing1": 25, "spacing2": 25};
var notif_time = 20; //in seconds;

var title1 = "Home · Closerly";
var title2 = title1;
var title = title1;
$hasfocus = false;
$toNotify = false;
$notifNumber = "";
$deleteIndex = -1;




function disable() {
	document.getElementById("body").disable = true;
}
function enable() {
	document.getElementById("body").disable = false;			
}
function select_number(str) {
	selected_number = str;
}
function loadthis(str) {
	//enable();
	ct = 0;
	if(str=="") {
		document.getElementById("conversation_list").innerHTML="";
		return;
	}
	setActiveThread(str);
	//document.getElementById("messageresult").innerHTML = "";
	
	currentNumber = str;
	
	//if(currentNumber.search("904340") != -1) return;
	
	$("#contact_chooser").dialog("close");
	$("#conversation_list").slideDown();
	
	//var toPut = "<div id='loading'/>";
	var progressbar = "<div class = 'row-fluid'><div class = 'span6 offset3'><div class='progress progress-danger progress-striped active'>"+
						"<div class='bar' style='width: 100%;'></div>"+
					"</div></div></div>";
	//var toPut = "<p align=center> <img src = 'images/ajax-loader.gif'/> </p>";
	//document.getElementById("conversation_list").innerHTML=toPut;
	document.getElementById("conversation_list").innerHTML=progressbar;
	
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
	    		checkSessionExpire(xmlhttp);
			    document.getElementById("conversation_list").innerHTML=xmlhttp.responseText;
			    conversationThreadLoaded(str);
			    $("#conversation_list_items").slideDown("slow");
		}
	}

	xmlhttp.open("GET","backend/conversation.php?q="+str,true);
	xmlhttp.send();
	*/
	var request = $.ajax({
		url: "backend/conversation_json.php",
		type: "POST",
		dataType:"json",
		data: {num : str}
	});
	
	request.done(function(data) {
		conversationThreadRequestCompleted(data);
	});
	
	request.fail(function(jqXHR, textStatus) {
		console.log( "Request failed: " + textStatus );
	});

}
function sendMessage() {
	
	var number = currentNumber;
	var body = document.getElementById("body").value;		

	
	if (number=="") {
		customNotify("Select a number!",2,"Error");
		return;
	}
	if (/^\s+$/.test(body) || body == "") {
		customNotify("Type in something!",2,"Error");
		return;				
	}
	
	
	
		
	var time = getCurrentTime();
	
	appendMessage(body,time);
	 
	if (window.XMLHttpRequest) {
		  // code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
	}
	else {
		  // code for IE6, IE5
	  	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  	}
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200){
			checkSessionExpire(xmlhttp);
		    //document.getElementById("send_result"+ct).innerHTML=xmlhttp.responseText;
		}
	}
	
	xmlhttp.open("POST","/backend/messagesent.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("number="+number+"&time="+time+"&body="+body);
	
	document.getElementById("body").value = "";
	$("#char_count").text("0/160");

}
function heyThere() {
	customNotify("boss",1);
}
function showUser(str)
{

	selected_number = "";
	selected_name = str;
	if (str=="") {
		document.getElementById("numberlist").innerHTML="";
		return;
	} 
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
		   document.getElementById("number-list").innerHTML=res;
		   //document.getElementById("damn").innerHTML=res;
		   //alert(res);
		   //checkTotalNumbers();
		}
	}
	xmlhttp.open("GET","backend/getNumbers.php?q="+str,true);
	xmlhttp.send();
}
function checkTotalNumbers() {
	var list = document.getElementById("number_dropdown_list");
	var len = list.length;
	if(len == 1 ) {
		var str = list.options[list.selectedIndex].value;
		loadthis(str);
	}
		
}
function addNewThread() {
	var number = selected_number;
	if(selected_name != "")
	{
		if(selected_number == "")
		{
			//alert("hi");
			number = document.getElementById("number_dropdown_list").value;
			//alert("in here - "+number);
		}
	}
	if(selected_name == "")
	{
		return;
	}
	loadthis(number);
	
}
function messageHandler(data) {

	var recv_alert = data.alert;
	if(recv_alert == 1000) {
		//RELOAD THE ENTIRE THREAD!!!
		//RATHER RELOAD THE SIDEBAR!!!
		showThread();
	} else {
		
		//document.write("<p>"+message+"</p>");
		var recv_body = stripslashes(data.body);
		var recv_address = data.address;
		var recv_time = data.time;
		var recv_type = data.type;
		var recv_name = data.name;
		var recv_isSent = data.ifSent;
		var recv_smsID = data.smsid;

		if(recv_type == 'delete') {
			//DO SOMETHING
			if(recv_address != currentNumber) return;

			console.log("Gotta delete - "+recv_time+ " " + recv_body + " " + recv_isSent );

			var sent = "sent";
			if(!recv_isSent) sent = "recv";
			recv_body = replaceEmoticons(recv_body);

			var index = -1;
			for (i in contents) {
				if (contents[i]['time'] == recv_time && contents[i]['body'] == recv_body && contents[i]['sent'] == sent ) {
					index = i;
					console.log("Found item at " + i +".. Deleting it now..");
					break;
				}
			}
			if(index != -1) {
				contents.splice(index,1);
			}

			//setConversationThread();
			/*
			var smsid = data.id;
			var index = -1;
			for (i in contents) {
				if (contents[i]['id'] == id) {
					index = i;
					break;
				}
			}
			if(index != -1) {
				contents.splice(index,1);
			}

			setConversationThread();
			*/
			//DONE
			return;
		}
		
		console.log("notified!! message by "+recv_address);
		
		//alert values -> 1 : force alert. -1 : force no alert. 0 : default
		var toShow = recv_address;

		$notifName = recv_address;
		if(recv_name != null) {
			toShow = recv_name + " ("+recv_address+")";
			$notifName = recv_name;
		}

		if(recv_type == 'call') {
			customNotify("You are receiving a call from " + toShow,1);
			return;
		}
		showThread();
		if(recv_address == currentNumber) {
			setActiveThread(recv_address);
			var recv_true = true;
			if (recv_isSent == 1) recv_true = false;
			appendMessage(recv_body,recv_time,recv_true);
		}
		else if( currentNumber == "") {
			currentNumber = recv_address;
			loadthis(recv_address);
		}
		/*
		//Old alert type
		else {
			
			currentNumber = recv_address;
			loadthis(recv_address);
			
		}
		*/
		var display_message = "New message from "+toShow;
		var header = "You have a new text";
		
		if(recv_alert != -1) {
			$.pnotify({
				title: header,
				text: display_message,
				animate_speed: 700,
				type: 'info',
				addclass: 'custom',
				icon: false,
				delay: notif_time*1000,
				stack: stack_bottomright,
				animation: {
					'effect_in': 'scale',
					'options_in': {easing: 'easeOutElastic'},
					'effect_out': 'scale',
					'options_out': {easing: 'easeOutElastic'}
				},
				opacity: .8,
				nonblock: true,
		    	nonblock_opacity: .2
			});

			title2 = $notifName + ' says...';
			$toNotify = true;
			$notifNumber = recv_address;
			titleNotification();
		}
		
		/*
		//Old alert type..
		if(recv_alert == 0) {
			if(document.hidden || document.webkitHidden) {
				customNotify(display_message+recv_body,3,header);
			}
		}
		else if (recv_alert = 1) {
			customNotify(display_message,3,header);
		}
		*/
	}

}
function appendMessage(myBody,myTime,myRecv,mySMSID) {

	console.log("Time - "+myTime +"   Body - "+myBody);
	var mySent = "sent";
	if(myRecv == true) mySent = "recv";

	if(mySMSID == null) mySMSID = -1;

	myBody = replaceEmoticons(myBody);

	var item = {
		body: myBody,
		time: myTime,
		id: mySMSID,
		sent: mySent

	};
	insertContents(item);
	setConversationThread();


}
function stripslashes (str) {
  
	return (str + '').replace(/\\(.?)/g, function (s, n1) {
		switch (n1) {
		    case '\\':
		      return '\\';
		    case '0':
		      return '\u0000';
		    case '':
		      return '';
		    default:
		      return n1;
		}
	});
}
function replaceEmoticons(text) {
	  var emoticons = {
		    ':-D'	:	'emo_im_laughing',
			':-)'	:	'emo_im_happy',
			':-/'	:	'emo_im_smirk',
			':/'	:	'emo_im_smirk',
			':-\\'	:	'emo_im_undecided',
			':\\'	:	'emo_im_undecided',
			':)'	:	'emo_im_happy',
			':P'	:	'emo_im_tongue_sticking_out',
			':p'	:	'emo_im_tongue_sticking_out',
			':-p'	:	'emo_im_tongue_sticking_out',
			':-P'	:	'emo_im_tongue_sticking_out',
			':-|'	:	'emo_im_pokerface',
			':D'	:	'emo_im_laughing',
			':|'	:	'emo_im_pokerface',
			'B)'	:	'emo_im_cool',
			'B-)'	:	'emo_im_cool',
			'<3'	:	'emo_im_heart',
			'o_O'	:	'emo_im_wtf',
			'oO'	:	'emo_im_wtf',
			':-('	:	'emo_im_sad',
			':('	:	'emo_im_sad',
			';-)'	:	'emo_im_winking',
			';)'	:	'emo_im_winking',
			':*'	:	'emo_im_kissing',
			':-*'	:	'emo_im_kissing',
			':O'	:	'emo_im_yelling',
			':-O'	:	'emo_im_yelling',
			':\'('	:	'emo_im_crying',
			':-['	:	'emo_im_embarrassed',
			':-X'	:	'emo_im_lips_are_sealed',
			':X'	:	'emo_im_lips_are_sealed',
			'X-('	:	'emo_im_mad',
			'X('	:	'emo_im_mad',
			':$'	:	'emo_im_money_mouth',
			':-$'	:	'emo_im_money_mouth'
	  }, url = "smiley/", patterns = [],
	     metachars = /[[\]{}()*+?.\\|^$\-,&#\s]/g;
	
	  // build a regex pattern for each defined property
	  for (var i in emoticons) {
	    if (emoticons.hasOwnProperty(i)){ // escape metacharacters
	      patterns.push('('+i.replace(metachars, "\\$&")+')');
	    }
	  }
	var size = 20;
	  // build the regular expression and replace
	  return text.replace(new RegExp(patterns.join('|'),'g'), function (match) {
	    return typeof emoticons[match] != 'undefined' ?
	           '<img style = "margin-bottom:0px;" src="'+url+emoticons[match]+'.png'+'" alt = "' + match + '" width = "' + size + '" height = "' + size +   '"/>' :
	           match;
	  });
}
function conversationThreadLoaded() {
	$("#delete_thread").fadeOut();
	$("#user_info").hover(function(){
		$("#delete_thread").fadeToggle();
	});
	$("#delete_thread").click(function() {
		var question = confirm("Are you sure you want to delete this thread?");
		if(question) {
			$("#weirdness_bar li#"+escapeStr(currentNumber)).remove();
			$("#conversation_list").slideUp();
			var conlist = document.getElementById("conversation_list");
			
			$("#conversation_list").slideDown("fast");
			var progressbar = "<div class = 'row-fluid'><div class = 'span6 offset3'><div class='progress progress-striped active'>"+
								"<div class='bar' style='width: 100%;'></div>"+
							"</div></div></div>";
			//conlist.innerHTML = "<p align=center> <img src = 'images/ajax-loader.gif'/> </p>";
			conlist.innerHTML = progressbar;
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
				    //$("#conversation_list").slideUp();
				    if(res == "SUCCESS")
					    conlist.innerHTML = "<p align=center class = 'lead'>Successfully deleted</p>";
				    //alert("Result of delete operation\n"+res);
				}
			}
			
			xmlhttp.open("POST","/backend/delete-thread.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send("number="+currentNumber);	
		}
	});
}
$(document).ready(function() {
	$("div#header").fadeIn("slow");
	$("#contactheader").button();
});
function escapeStr( str) {
 if( str)
     return str.replace(/([ #;&,.+*~\':"!^$[\]()=>|\/@])/g,'\\$1')
 else
     return str;
}
function bodyCharacterCount() {
	var count = $("#body").val().length;

	if(count<=130 && $("#char_count").hasClass("text-warning"))
		$("#char_count").addClass("text-info").removeClass("text-warning");	
	else if(count>130 && $("#char_count").hasClass("text-info"))
		$("#char_count").addClass("text-warning").removeClass("text-info");

	var suffix = Math.ceil(count/160)*160;
	if(suffix == 0) suffix = 160;
	suffix = "/"+suffix;
	$("#char_count").text(count+suffix);
}

function showThread(){
	var request = $.ajax({
		url: "backend/showthread.php",
		type: "GET",
		dataType:"json"
	});
	request.done(function(data) {

		//<li id = '" . $str . "'><a id = '" . $str . "' href=\"#\" onclick = 'loadthis(this.id);'\"><i class='icon-chevron-right'></i>" . $name . "</a></li>";
		
		var msg="";
		var part1 = "<li id = '";
		var part2 = "'><a id = '";
		var part3 = "' href = '#' onclick = 'loadthis(this.id);'><i class = 'icon-chevron-right'></i>";
		var part4 = "</a></li>";
		for(contactKey in data) {
			var number = data[contactKey].number;
			var name = data[contactKey].name;
			msg+=part1 + number + part2+ number+part3+name+part4;	
		}
		$("#nav #weirdness_bar").html(msg);
		setActiveThread(currentNumber);
		
	});
	
	request.fail(function(jqXHR, textStatus) {
		console.log( "Show Thread Request failed: " + textStatus );
	});

}
function setActiveThread(str) {
	if(previousNumber.className=="active") {
		previousNumber.className = "";
	}
	var listitem;
	if(listitem = document.getElementById(str)) {
		listitem.className = "active";
		previousNumber = listitem;
	}
}
$(function() {
	$("div#conversation_list").slideDown("slow");
});

function customNotify (msg, type, header) {
	//TYPE -> 1 : alert, 2 : MODAL, 3 : MODAL WITH BROWSER NOTIFICATION

	console.log(type+" "+header+ " "+ msg);

	if(type == null || type == 0 )
		type = 2;

	if(type == 1) {
		alert(msg);
	}
	else if (type == 2) {
		//function to show dialog...
		modalNotification(msg,header);

	}
	else if (type == 3) {
		//function to show dialog...
		modalNotification(msg,header);
		//function to show browser notication...


	}
	else if (type = 10) {
		$.pnotify({
			title: header,
			text: msg
		});
	}
}

function modalNotification(msg,header) {
	//console.log("Header - "+header+"  Message - "+msg);
	if(header == null || header == "") {
		$("#alertText").text(msg);
		$('#myAlert').modal('show');
	} else {
		console.log("prev head - " + $("#alertHeader").text());
		if (header == "Error" && $("#customAlertButton-withHeader").hasClass("btn-primary"))
			$("#customAlertButton-withHeader").addClass("btn-danger").removeClass("btn-primary");
		else if($("#customAlertButton-withHeader").hasClass("btn-danger"))
			$("#customAlertButton-withHeader").addClass("btn-primary").removeClass("btn-danger");
		$("#alertText-withHeader").text(msg);
		$("#alertHeader").text(header);
		$('#myAlertWithHeader').modal('show');
	}
}
function getCurrentTime() {
	var today = new Date();
	var dd = today.getDate();
	var mm = today.getMonth()+1; //January is 0!
	
	var yyyy = today.getFullYear();
	var hh = today.getHours();
	var mins = today.getMinutes();
	var ss = today.getSeconds();
	if(dd<10) dd = "0" + dd;
	if(mm<10) mm = "0" + mm;
	if(hh<10) hh = "0" + hh;
	if(mins<10) mins  = "0" + mins;
	if(ss<10) ss  = "0" + ss;
	var time = yyyy+"/"+mm+"/"+dd+ " " + hh + ":"+mins + ":"+ ss;
	return time;
}
//Handling of opening and closing of pages for logs

$(function() {
	var startTime = getCurrentTime();
	$.ajax({
		type: "POST",
		url: "backend/log.php",
		data: { time: startTime, mode: "start" }
	}).done(function( msg ) {
		logID = msg;
		console.log("Log ID Received - "+logID);

		setTimeout(function () {
                logUpdater();
            }, 1000);
	});
	
});
var logUpdater = function() {

	var endTime = getCurrentTime();
	$.ajax({
		type: "POST",
		url: "backend/log.php",
		timeout: 60000,
		data: { time: endTime, id: logID, mode: "done" },
		error: function(xhr, textStatus, errorThrown){
			console.log("Log Failed to Updated after one minute... :-(");	
			setTimeout(function () {
                logUpdater();
            }, 60000);	
    	}
	}).done(function(){
		console.log("Log Updated after one minute...");
		setTimeout(function () {
                logUpdater();
            }, 60000);
	});

	$.pnotify.defaults.history = false;
	
	//$.pnotify("NOTIFICATION TEST");
	/*
	$.pnotify({
			title: "hello",
			text: "there"
	});
	*/
	
	/*
	$.pnotify({
		title: 'Custom notication',
		text: 'Just another notication.',
		animate_speed: 700,
		type: 'info',
		addclass: 'custom',
		icon: false,
		stack: stack_bottomright,
		animation: {
			'effect_in': 'scale',
			'options_in': {easing: 'easeOutElastic'},
			'effect_out': 'scale',
			'options_out': {easing: 'easeOutElastic'}
		},
		opacity: .8,
		nonblock: true,
    	nonblock_opacity: .2
	});
	*/
	//alert("You sure bro?");
}
$(function() {
				
	$(window)
		.bind('focus', function (ev) {
			$hasfocus = true;
			//$toNotify = false;
			//title2 = title1;
			/*
			if(currentNumber == $notifNumber) {
				$toNotify = false;
				title2 = title1;
				document.title = title1;
			}
			*/
		})
		.bind('blur', function (ev) {
			$hasfocus = false;
		})
		.trigger('focus');

});
function titleNotification() {
	if($toNotify) {
		if($hasfocus && currentNumber == $notifNumber) {
			$toNotify = false;
			title2 = title1;
			document.title = title1;
			return;
		}
		if(title == title1) title = title2;
		else title = title1;
		document.title = title;
		//$('#here').append('<p>'+'No focus at '+(new Date()).getTime()+'</p>');
		setTimeout(function () {
			titleNotification();
		}, 2000);
	}
}


