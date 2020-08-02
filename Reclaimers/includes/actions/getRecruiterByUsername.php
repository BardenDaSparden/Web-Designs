<?php

	include '../core/Init.php';

	header("Content-type: application/xml");
	echo '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>';

	$database = Database::instance();

	$username = $_GET['username'];
	
	$database->get('users', array('username', '=', $username));
	$count = $database->getCount();

	$type = ($count < 1) ? "bad" : "good";
	$message = ($count < 1) ? "Recruiter invalid" : "Recruiter valid";

	echo 
	'
	<response>
		<message type="'.$type.'">
			'.$message.'
		</message>
	</response>
	';

?>