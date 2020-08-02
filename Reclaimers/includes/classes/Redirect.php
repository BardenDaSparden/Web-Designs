<?php
class Redirect{

	public static function to($location = null){
		if($location){
			if(is_numeric($location)){
				switch($location){
					case 404:
						header("HTTP/1.0 404 Not Found");
						include "{$_SERVER['DOCUMENT_ROOT']}/includes/error/404.php";
						exit();
					break;
				}
			} else {
				echo '<script type="text/javascript">window.location.href="' . $location . '";</script>';
				exit();
			}
		}
	}

}
?>