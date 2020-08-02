<?php
	include '../core/Init.php';

	header("Content-type: application/xml");

	echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';

	$message = "";
	$type = "bad";

	$email 		= $_GET["email"];
	$email_c	= $_GET["email_confirm"];

	$MAX_EMAIL_LENGTH = 50;
	$MIN_EMAIL_LENGTH = 10;


	if(strlen($email) > $MIN_EMAIL_LENGTH){
		if(strlen($email) < $MAX_EMAIL_LENGTH){
			if(!($email === $email_c)){
				$message = "Emails do not match";
				$type = "bad";
			} else {
				$message = "Emails match";
				$type= "good";
			}
		} else {
			$message = "Email too long";
			$type = "bad";
		}
	} else {
		$message = "Email too short";
		$type = "bad";
	}

	if($type === "good"){
		$valid = Validation::isValidEmail($email);
		if($valid){
			$message = "Email is valid";
			$type = "good";
		} else {
			$message = "Email is invalid";
			$type = "bad";
		}
	}

	echo
	'
	<response>
		<message type="'.$type.'">
			'.$message.'
		</message>
	</response>
	';

?>