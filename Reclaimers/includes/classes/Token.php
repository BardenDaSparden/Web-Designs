<?php
	class Token{
		
		public static function generate(){
			return Session::put(Config::get('config.session.token_name'), md5(uniqid()));
		}

		public static function check($token){
			$tokenName = Config::get('config.session.token_name');

			if(Session::exists($tokenName) && $token === Session::get($tokenName)){
				Session::delete($token);
				return true;
			}
			echo'f';
			return false;
		}

	}
?>