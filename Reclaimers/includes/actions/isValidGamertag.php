<?php
	include '../core/Init.php';

	$MIN_GAMERTAG_LENGTH = 1;
	$MAX_GAMERTAG_LENGTH = 17;
	$GAMERTAG_PATTERN = "/^[a-zA-Z0-9\s]+$/";

	$gamertag = $_GET['gamertag'];
	$length = strlen($gamertag);
	$message = "";
	$type = "bad";

	if($length > $MIN_GAMERTAG_LENGTH){
		
		if($length < $MAX_GAMERTAG_LENGTH){
			
			if(preg_match($GAMERTAG_PATTERN, $gamertag)){

				$message = "Gamertag valid";
				$type = "good";

			} else {
				$message = "Gamertag invalid";
				$type = "bad";
			} 

		} else {
			$message = "Gamertag too long";
			$type = "bad";
		}

	} else {
		$message = "Gamertag too short";
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