var valid_email = false;
var valid_password = false;
var valid_username = false;
var valid_gamertag = false;
var valid_recruiter = false;

 $(".form-list-item-input").each(function(index){
 	$(this).attr("autocomplete", "off");
 });

$("#input-email, #input-email-confirm").on("change keyup paste", function(){
	var email = $("#input-email").val();
	var email_c = $("#input-email-confirm").val();
	var message_element = $("#form-message-email");

	var request = $.ajax({
		type: 		"GET",
		url: 		"/includes/actions/isValidEmail.php",
		dataType: 	"xml",
		data: 		"email="+email+"&email_confirm="+email_c
	});

	request.done(function(msg){
		message = $(msg).find("message").text();
		message_type = $(msg).find("message").attr("type");
		
		message_element.text(message);
		if(message_type == "bad"){
			message_element.addClass("bad");
			message_element.removeClass("good");
			valid_email = false;
		} else {
			message_element.addClass("good");
			message_element.removeClass("bad");
			valid_email = true;
		}

		updateSubmit();

	});

	request.fail(function(XHR, status){
		alert("AJAX Error : " + status + " " + XHR.responseText);
	});

	

});

$("#input-password, #input-password-confirm").on("change keyup paste", function(){
	var password = $("#input-password").val();
	var password_c = $("#input-password-confirm").val();
	var message_element = $("#form-message-password");

	var request = $.ajax({
		type: 		"GET",
		url: 		"/includes/actions/isValidPassword.php",
		dataType: 	"xml",
		data: 		"password="+password+"&password_confirm="+password_c
	});

	request.done(function(msg){
		message = $(msg).find("message").text();
		message_type = $(msg).find("message").attr("type");
		
		message_element.text(message);
		if(message_type == "bad"){
			message_element.addClass("bad");
			message_element.removeClass("good");
			valid_password = false;
		} else if(message_type == "good"){
			message_element.addClass("good");
			message_element.removeClass("bad");
			valid_password = true;
		}

		updateSubmit();

	});

	request.fail(function(XHR, status){
		alert("AJAX Error : " + status + " " + XHR.responseText);
	});

	

});

$("#input-username").on("change keyup paste", function(){

	var username = $(this).val();
	var message_element = $("#form-message-username");
	var request = $.ajax({
		url: 		"/includes/actions/isValidUsername.php",
		type: 		"GET",
		dataType: 	"xml",
		data: 		"username="+username
	});

	request.done(function(msg){
		var message = $(msg).find("message").text();
		var message_type = $(msg).find("message").attr("type");

		message_element.text(message);
		if(message_type == "bad"){
			message_element.addClass("bad");
			message_element.removeClass("good");
			valid_username = false;
		} else if(message_type == "good"){
			message_element.addClass("good");
			message_element.removeClass("bad");
			valid_username = true;
		}

		updateSubmit();
		
	});

	request.fail(function(xhr, status){
		alert(xhr + " " + status);
	});

	

});

$("#input-gamertag").on("change keyup paste", function(){

	var gamertag = $(this).val();
	var message_element = $("#form-message-gamertag");
	var request = $.ajax({
		url: 		"/includes/actions/isValidGamertag.php",
		type: 		"GET",
		dataType: 	"xml",
		data: 		"gamertag="+gamertag
	});

	request.done(function(msg){
		var message = $(msg).find("message").text();
		var message_type = $(msg).find("message").attr("type");

		message_element.text(message);
		if(message_type == "bad"){
			message_element.addClass("bad");
			message_element.removeClass("good");
			valid_gamertag = false;
		} else if(message_type == "good"){
			message_element.addClass("good");
			message_element.removeClass("bad");
			valid_gamertag = true;
		}

		updateSubmit();
		
	});

	request.fail(function(xhr, status){
		alert(xhr + " " + status);
	});

});

$("#input-recruiter-gamertag").on("change keyup paste", function(){

	var username = $(this).val();
	var message_element = $("#form-message-recruiter-gamertag");
	var request = $.ajax({
		type: 		"GET",
		url: 		"/includes/actions/getRecruiterByUsername.php",
		dataType: 	"xml",
		data: 		"username="+username
	});

	request.done(function(msg){
		var message = $(msg).find("message").text();
		var message_type = $(msg).find("message").attr("type");

		message_element.text(message);
		if(message_type == "bad"){
			message_element.addClass("bad");
			message_element.removeClass("good");
			valid_recruiter = false;
		} else if(message_type == "good"){
			message_element.addClass("good");
			message_element.removeClass("bad");
			valid_recruiter = true;
		}

		updateSubmit();

	});

	request.fail(function(XHR, status){
		alert(XHR.toString() + " " + status);
	});

	

});

function updateSubmit(){
	if(valid_email && valid_password && valid_username && valid_gamertag && valid_recruiter){
		$("#form-submit").attr("disabled", false);
	} else {
		$("#form-submit").attr("disabled", true);
	}
}
