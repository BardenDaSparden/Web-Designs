<?php
	
	class Validation{
		public static function clean($string){
			$string = htmlentities(strip_tags(trim($string)), ENT_QUOTES, "UTF-8");
			return $string;
		}

		public static function clean_MYSQL($string){
			return mysql_real_escape_string(strip_tags(trim($string)));
		}

		public static function isValidEmail($email){
			return filter_var($email, FILTER_VALIDATE_EMAIL);
		}
	}

?>