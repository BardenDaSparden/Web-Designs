<?php
	
	include '../core/Init.php';

	header("Content-type: application/xml");
	echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';

	$username = $_GET['username'];
	$length = strlen($username);
	$message = "";
	$type = "bad";

	$database = Database::instance();

	$MIN_USERNAME_LENGTH = 5;
	$MAX_USERNAME_LENGTH = 17;
	$USERNAME_PATTERN = "/^[a-zA-Z0-9-_]+$/";

	if($length > $MIN_USERNAME_LENGTH){
		if($length < $MAX_USERNAME_LENGTH){
			if(preg_match($USERNAME_PATTERN, $username)){
				
				$database->get('users', array('username', '=', $username));
				$count = $database->getCount();

				if($count == 0){

					$message = "Username valid";
					$type = "good";

				} else {
					$message = "Username taken";
					$type = "bad";
				}

			} else {
				$message = "Username invalid";
				$type = "bad";
			}
		} else {
			$message = "Username is too long";
			$type = "bad";
		}
	} else {
		$message = "Username is too short";
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