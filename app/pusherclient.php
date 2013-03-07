<?php
	// Inialize session
	session_start();
	
	// Check, if username session is NOT set then this page will jump to login page
	if (!isset($_SESSION['username'])) {
		header('Location: ../login.php');
	}
	$id = $_SESSION['userID'];
	echo $id;
?>
	

<html>
	<body>
		<script src="http://js.pusher.com/1.12/pusher.min.js"></script>
		<script type="text/javascript">
			
			var id = <?php echo $id; ?>;
			
			/*						
			var message = "1:9916180344$$$watsup bro??$$$2012/05/05 14:05:49";
			document.write("<p>"+message+"</p>");
			var pos = message.indexOf(id+":");
			if(pos === 0) {
				var check = id + ":";
				pos = check.length;
				message = message.substr(pos);
				
				var items = message.split("$$$");
				
				var stuff = "";
				
				for (var prop in items) {
					document.write("<p>"+items[prop]+"</p>");
				}
				
				
			}
			
			*/
			
			var pusher = new Pusher('4cad32101583ed2e042c'); // Replace with your app key
			var channel = pusher.subscribe('my-channel');
			channel.bind('my-event', function(data) {
				var message = data.message;
				document.write("<p>"+message+"</p>");
				var pos = message.indexOf(id+":");
				if(pos === 0) {
					var check = id + ":";
					pos = check.length;
					message = message.substr(pos);
					
					var items = message.split("$$$");
					if(items.length!==3) return;
					var number = items[0];
					var body = items[1];
					var time = items[2];
					
					loadthis(number);
					
					
				}
			});
			function loadthis(str) {
				//enable();
				ct = 0;
				if(str=="") {
					document.getElementById("conversation_list").innerHTML="";
					return;
				}
				
				document.getElementById("messageresult").innerHTML = "";
				
				currentNumber = str;
				
				//document.getElementById("number_header").value = str;
				
				//alert(document.getElementById("number_header").value);
				
				
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
					    document.getElementById("conversation_list").innerHTML=xmlhttp.responseText;
					}
				}
				xmlhttp.open("GET","backend/conversation.php?q="+str,true);
				xmlhttp.send();
			
			}
		</script>
	</body>
</html>