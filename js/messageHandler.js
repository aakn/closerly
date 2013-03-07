//var id = <?php echo $id; ?>;					
var id = user_id;
//alert(id);
//var message = "1:9916180344$$$watsup bro??$$$2012/05/05 14:05:49";
//message = "1:990-205-6362$$$This is sparta!!$$$2012/05/05 14:05:49";
//loadthis("990-205-6362");
//messageHandler(message);

var pusher = new Pusher('4cad32101583ed2e042c'); // Replace with your app key
var channel = pusher.subscribe('my-channel');
channel.bind('my-event', function(data) {
	var message = data.message;
	//alert("got a message - " + message);
	messageHandler(message);				
});