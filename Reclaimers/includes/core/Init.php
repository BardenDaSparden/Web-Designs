<?php

session_start();

$GLOBALS['config'] = array(
	'mysql' => array(
		'host' => "127.0.0.1",
		'username' => "root",
		'password' => "xxhalofreakxx",
		'database' => "reclaimers"
	),
	'cookie' => array(
		'name' => 'hash',
		'expiry' => 604800
	),
	'session' => array(
		'name' => "name",
		'token_name' => 'token'
	),
	'navigation' => array(
		'home' => 1,
		'members' => 2, 
		'events' => 3,
		'branches' => 4,
		'recruitment' => 5,
		'challenges' => 6
	), 
	'mail' => array(
		'smtp_auth' => true,
		'smtp_secure' => "ssl",
		'host' =>	"smtp.gmail.com",
		'port'	=>	"25",
		'username' => "torqueocrispo@gmail.com",
		'password' => "Xxh@lofreakxx"
	)
); 

function autoload_classes($classname){
	$file = $_SERVER['DOCUMENT_ROOT'].'/includes/classes/'.$classname.'.php';
	if(file_exists($file)){
		include $file;
	}
}

spl_autoload_register('autoload_classes');

if(Cookie::exists(Config::get('config.cookie.name')) && !Session::exists(Config::get('config.session.name'))){
	//Users needs to be remebered
	$hash = Cookie::get(Config::get('config.cookie.name'));
	$hashCheck = Database::instance()->get('users_session', array('hash', '=', $hash));

	if($hashCheck->getCount()){
		$user = new User($hashCheck->first()->user_id);
		$user->login();
	}

}

?>