var contents;
$name = "";
$num = "";

function conversationThreadRequestCompleted(data) {
	$name = data.name;
	$num = data.number;
	contents = data.contents;
	//Indices -> id,body,time,sent

	var crap = "";

	var i=0,j=0;

	for(content in contents) {

		for(item in contents[content] ) {
			var crap = contents[content][item];
			if(item == 'body') {
				contents[content][item] = replaceEmoticons(contents[content][item]);
			}
			if(item == 'sent') {
				if(crap == 1) 
					crap = "sent";
				else crap = "recv";
				contents[content][item] = crap;
			}
		}
	}

	setConversationHeader();	
	setConversationThread();
}
function setConversationThread() {

	var part0 = "<div id = '";
	var part1Sent = "' class = 'span12' style = 'margin-left:0px;'>"+
		"<blockquote class='pull-right'><p class = 'conversation-sent-color'>";
	
	var part1Recv = "' class = 'span12' style = 'margin-left:0px;'>"+
			"<blockquote><p class = 'conversation-recv-color'>";
	
	var part2 = "</p>"+
			"<br/>"+
			"<small>";
	var part3 = "</small>"+
			"</blockquote>"+
			"<p></p>"+
			"</div>";
	var divContents = "<div class = 'row-fluid' id = 'conversation_list_items'>";
	divContents += "<div class = 'span12'></div>";


	for (content in contents) {

		var id = contents[content]['id'];
		var body = contents[content]['body'];
		var time = contents[content]['time'];
		var send = contents[content]['sent'];

		var date = Date.parse(time);
		time = date.toString("MMMM d, yyyy - hh:mm:ss tt");

		time = time.replace(/ - 00:/, " - 12:");

		if(send == "recv") 
			var part1 = part1Recv;
		else part1 = part1Sent;

		divContents += part0 + id + part1 + body + part2 + time + part3;

	}
	divContents += "</div>";
	$("#conversation_list").html(divContents);

	//$("#conversation_list_items").slideDown("slow");

}

function insertContents(item) {
	var time = item['time'];
	var length = contents.length;
	for (var i =0; i<length;i++) {
		var current = contents[i];
		if(item['id'] != -1 && current['id'] == item['id']) return;
		else if(current['time'] == item['time'] && current['body'] == item['body'] && current['sent'] == item['sent'])
			return;
		else if(checkTime(time, current['time']) == 1) {
			console.log("inserting item at " + current['time']);
			contents.splice(i,0,item);
			break;
		}
	}
}
function checkTime(str1 , str2) {
	var len = str1.length;
	
	for (var i =0; i<len;i++){
		if(str1[i] < str2[i]) {
			return -1;
		}
		else if( str1[i] > str2[i]) {
			return 1;
		}
	}
	return 0;
}
function setConversationHeader() {
	var data = $("#conversation_head").html();
	data=data.trim();

	var tempdata = data + "";

	if(data == "" || tempdata.indexOf("<h1>") == 0) {
		$convHead = $("#conversation_header_contents_hidden").html();
		$("#conversation_head").html($convHead);
		conversationThreadLoaded();
	}
	setConversationNameAndNumber();
}
function setConversationNameAndNumber() {
	if($name == null ) {
		$name = "";
	}
	var con = "<h2>" + $name + "<br/><small>" + $num + "</small></h2>";
	$("#conversation_header_namenumber").html(con);
}