<?php
	
	class Config{

		public static function get($path = null){

			if($path == null || $path == '' || $path == ' '){
				return;
			}

			$indices = explode('.', $path);
			$selector = '';
			$size = count($indices);

			$values = $GLOBALS[$indices[0]];

			for($i = 1; $i < $size; $i++){
				$values = $values[$indices[$i]];
			}
			
			return $values;

		}

	}

?>