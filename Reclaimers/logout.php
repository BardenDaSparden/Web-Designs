<?php
	include 'includes/core/Init.php';
	$user = new User();
	$user->logout();

	Redirect::to('index.php');

?>