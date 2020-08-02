<?php

	class Navigation{

		private static $pageNum = -1;

		public static function setActivePage($num){
			self::$pageNum = $num;
		}

		public static function isActive($page){
			return self::$pageNum === $page;
		}

		public static function redirect($url){
			echo "<script> window.location =". $url ."; <script/>";
		}

	}

?>