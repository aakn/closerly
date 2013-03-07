var current = 0;

function addThread() {
	var val = $("#number_dropdown_list option:selected").val().trim();
	var num = $("#contact_number").val().trim();
	
	var txt = "";
	if(current == 0) {
	
	
		if(num == "")
			current = 1;
		else
			txt = num;
	
	}
	if(current == 1) {
		if(val == "")
			current = 2;
		else
			txt = val;
	
	}
	if(current == 2) {
		if(num != "")
			txt=num;
	}
	
	//alert(txt);	
	//alert(val+" "+num+"\n"+"selected Number is "+txt);
	if(txt != "") {
		select_number(txt);
		loadthis(txt);
	}
	$( '#myModal' ).modal( "hide" );
	
}

$("#contact_number").click(function() {

	current = 0;
	//$("#damn").html(current);
});
$("#contact_number").on('keyup change', function() {

	current = 0;
	//$("#damn").html(current);
});
$("#name-list").change(function() {

	current = 1;
	//$("#damn").html(current);
});
$("#number_dropdown_list").change(function() {

	current = 1;
	//$("#damn").html(current);
});
$("#number-list").click(function() {

	current = 1;
	//$("#damn").html(current);
});		


	