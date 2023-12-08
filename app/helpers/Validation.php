<?php
class Validation {

	static public function validate($string){
		$string = htmlspecialchars($string, ENT_QUOTES);
		$string = trim($string);
		$string = stripslashes($string);
		$string = nl2br($string);
		return $string;
		// addslashes
	}

}