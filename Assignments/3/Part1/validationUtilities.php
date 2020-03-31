<?php
/* This is the PHP file cotaining the required functions */

	//Checks if a name has any numbers. If it does, It returns false
	function isValidName($name){
		$test = preg_replace("/[^A-Za-z]/", '', $name);
		//If nothing changed after removing everything except letters
		if($name == $test){
			return true;
		}
		else{
			return false;
		}
	}
	
	//Checks for a valid date per date
	function isValidDate($date, $format = 'Y-m-d'){
		$d = DateTime::createFromFormat($format, $date);
		return $d && $d->format($format) == $date;
	}
	
	
	//Uses the built in function filter_var to determain if an email is valid
	function isValidEmail($email){
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			return false;
		}
		else{
			return true;
		}
	}

	function fIsValidRange($age){
		$min = 18;
		$max = 120;
		//If age is not a number return 0 error
		if(is_numeric($age)!=1){
			return 0;
		}
		elseif($age<$min){
			return 1; 
		}
		elseif($age>$max){
			
			return 2;
		}
		else return 3;
	}


	function isValidZipcode($zCode){
		if((is_numeric($zCode)==1) && (strlen($zCode)==5)){
			return true;
		}
		else{
			return false;
		}
	}
	
	//Checks if a state is 2 letter in length and has all upper case(which also fails w/ number)
	function isValidState($state){
		if((strlen($state)==2) && ctype_upper($state)){
			return true;
		}
		else{
			return false;
		}
	}
	
	//Decided I didnt really need this but im leaving incase i need in the future
	//Sanitize data by trimming spaces,new lines, and html code from the input
	//function sanitize($data) {
	//	$data = trim($data);
	//	$data = stripslashes($data);
	//	$data = htmlspecialchars($data);
	//return $data;


?>