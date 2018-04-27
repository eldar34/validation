<?php


class testField {
	
	function forName($props){

		$len = strlen($props);

		if($len<=12){
		
			if(preg_match('/^[a-zа-яё]{1}[a-zа-яё]*[a-zа-яё\d]{1}$/i', $props)){
				return True;
			}else{
				return False;
			}

		}else{
			return False;
		}
	}


	function forEmail($props){

		if (filter_var($props, FILTER_VALIDATE_EMAIL)) {
   	 		return True;
		}else {
   			 return False;
		}
	}

	function forToken($props){

		$new_value = round ($props,2);

		if (is_float ($new_value)){
   	 		return $new_value;
		}else {
   			 return False;
		}
	}

	function forEther($props){

		if(preg_match('/^(0x)?[0-9a-f]{40}$/i', $props)){
				return True;
			}else{
				return False;
			}
	}




}







?>