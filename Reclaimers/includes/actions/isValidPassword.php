<?php
	include '../core/Init.php';

	header("Content-type: application/xml");

	echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';

	$message = "";
	$type = "bad";

	$password 		= $_GET["password"];
	$password_c	= $_GET["password_confirm"];

	$MIN_PASSWORD_LENGTH = 6;
	$MAX_PASSWORD_LENGTH = 17;


	if(strlen($password) > $MIN_PASSWORD_LENGTH){
		if(strlen($password) < $MAX_PASSWORD_LENGTH){
			if(!($password === $password_c)){
				$message = "Password do not match";
				$type = "bad";
			} else {
				$message = "Passwords match";
				$type= "good";
			}
		} else {
			$message = "Password too long";
			$type = "bad";
		}
	} else {
		$message = "Password too short";
		$type = "bad";
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