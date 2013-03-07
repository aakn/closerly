<?php

	include('backend/session_start.php');
	

?>

<!DOCTYPE HTML>
<html>
	<head>

		<link href=<?php echo $boot_style;?> rel="stylesheet">
		<link href=<?php echo $body_style;?> rel="stylesheet">
		<link href="css/bootstrap-responsive.css" rel="stylesheet">
		<link href=<?php echo $docs_style;?> rel="stylesheet">

		<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.js'></script>


		<script src="js/bootstrap.js"></script>



		<title>Test</title>
	</head>
	<body>
		
		<div class = "container-fluid">
			<div class = "row-fluid">
				<div class = "span3">
					<input type = "text" name = "number" id = "input_number"/><br/>
					<button class="btn btn-primary" id = "button" onclick = 'getNumber();'>Click</button>
				</div>
				<div class = "span9 well well-large">
					<div id = "conversation_head">
					</div>
					<div id = 'conversation_list'>
					</div>
				</div>
			</div>
		</div>

		<div id = "conversation_header_contents_hidden" hidden = "true">
			<div>
				<div class='row-fluid'>
					<div class = 'span4' id='content'>
						<div id = 'user_info'>
								<div class = 'row-fluid'>
									<div id = 'conversation_header_namenumber' style = 'padding-top:0px; margin-top:0px;' class = 'span9 page-header'>
									</div>
									<div class = 'span3'>
										<button id = 'delete_thread' class = 'btn btn-danger' >Delete</button>
									</div>
								</div>
						</div>
					</div>
					<div class='span5' id='sidebar1'>
						<textarea  placeholder = 'Type your message and hit Sent!' onkeyup='bodyCharacterCount();' id = 'body' name='body' style='width:100%; resize:none;' rows = '3'></textarea>
					</div>
					<div class='span2' id='sidebar2'>	
						<input type='button' class = 'btn btn-info btn-large btn-block' value='&nbsp Send &nbsp' onclick = 'sendMessage();'>
						<small><br/><p id = 'char_count' class='text-info' style='margin-top:0px; padding-top:0px'>0/160</p></small>
					</div>
				</div>
			</div>
		</div>
		
		<script src="js/date.js"></script>
		<script src="js/conversation.js"></script>

		<script>
			function getNumber() {
				var number = $("#input_number").val();
				loadThread(number);
			}
			function loadThread(number) {

				var request = $.ajax({
					url: "backend/conversation_json.php",
					type: "POST",
					dataType:"json",
					data: {num : number}
				});
				
				request.done(function(data) {
					conversationThreadRequestCompleted(data);
				});
				
				request.fail(function(jqXHR, textStatus) {
					console.log( "Request failed: " + textStatus );
				});
			}
			$(function() {
				//setConversationHeader();
			});
		</script>

	</body>
</html>