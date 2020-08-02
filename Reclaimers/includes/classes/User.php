<?php

class User{
	
	private $database;
	private $data;
	private $sessionName;
	private $cookieName;

	private $isLoggedIn = false;

	public function __construct($user = null){
		$this->database = Database::instance();
		$this->sessionName = Config::get('config.session.name');
		$this->cookieName = Config::get('config.cookie.name');
		if(!$user){
			if(Session::exists($this->sessionName)){
				$user = Session::get($this->sessionName);

				if($this->find($user)){
					$this->isLoggedIn = true;
				} else {
					//process logout
				}
			}
		} else {
			$this->find($user);
		}
	}

	public function create($fields = array()){
		if(!$this->database->insert('users', $fields)){
			throw new Exception('An error has occured creating an account.');
		}
	}

	public function find($user = null){
		if($user){
			$field = (is_numeric($user)) ? 'id' : 'username';
			$data = $this->database->get('users', array($field, '=', $user));

			if($data->getCount()){
				$this->data = $data->first();
				return true;
			}
		}
		return false;
	}

	public function login($username = null, $password = null, $remember = false){
		

		//if username and password are not defined
		if(!$username && !$password && $this->exists()){
			Session::put($this->sessionName, $this->getData()->id);
		} else {
			$user = $this->find($username);
			//user exists
			if($user){
				if($this->getData()->password == Hash::make($password, $this->getData()->salt)){
					Session::put($this->sessionName, $this->getData()->id);

					if($remember){
						$hash = Hash::unique();
						$hashCheck = $this->database->get('users_session', array('user_id', '=', $this->getData()->id));

						//if hash exists in DB
						if(!$hashCheck->getCount()){
							$this->database->insert('users_session', array(
								'user_id' => $this->getData()->id,
								'hash' => $hash
							));
						} else {
							$hash = $this->database->first()->hash;
						}

						Cookie::put($this->cookieName, $hash, Config::get('config.cookie.expiry'));

					}

					return true;
				}
			}
		}

		return false;
	}

	public function exists(){
		return (!empty($this->data)) ? true : false;
	}

	public function logout(){

		$this->database->delete('users_session', array('user_id', '=', $this->getData()->id));

		Session::delete($this->sessionName);
		Cookie::delete($this->cookieName);
	}

	public function getData(){
		return $this->data;
	}

	public function isLoggedIn(){
		return $this->isLoggedIn;
	}

}

?>