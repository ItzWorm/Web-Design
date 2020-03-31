<?php
	//include functions php file
	include 'validationUtilities.php';
	
	//This sets values to variables if they are passed
	if (isset($_POST['email'])){
		$email = $_POST['email'];
	} 
	if (isset($_POST['fname'])){
		$fName = $_POST['fname'];
	} 
	if (isset($_POST['bday'])){
		$bDay = $_POST['bday'];
	} 
	if (isset($_POST['age'])){
		$age = $_POST['age'];
		//If age is set check for age error
		$ageError = fIsValidRange($age);
	} 
	if (isset($_POST['state'])){
		$state = $_POST['state'];
	} 
	if (isset($_POST['zip'])){
		$zip = $_POST['zip'];
	} 
	//If any variables not set (bc the field was empty) then throw an error
	if(($email=="")||($fName=="")||($age=="")||($state=="")||($zip=="")){
		echo "<h3>Please enter data in each field!<br>
		Redirecting back to form...</h3>";
		header("Refresh:2;url=validate.php");
	}
	//Check for a valid email
	elseif(!isValidEmail($email)){
		echo "<h3>Please enter a valid email! (something@someplace.domain)<br>
		Redirecting back to form...</h3>";
		header("Refresh:2;url=validate.php");
	}
	elseif(!isValidName($fName)){
		echo "<h3>Please enter a valid name! (No numbers, spaces, or special characters)<br>
		Redirecting back to form...</h3>";
		header("Refresh:2;url=validate.php");
	}
	//I implemented this but it never runs since the HTML automatically returns
	// "" if an invalid date is entered even without validation.
	//To kind of bypass that filtering I'm removing the blank check from the first if statement
	//An empty date returns false like an invalid one so it still checked and returns the
	//correct error
	elseif(!isValidDate($bDay)){
		echo "<h3>Please enter a valid date!<br>
		Redirecting back to form...</h3>";
		header("Refresh:2;url=validate.php");
	}
	//set error output to use for determining problem
	elseif($ageError==0){
		echo "<h3>Entered age is not valid!<br>
		Redirecting back to form...</h3>";
		header("Refresh:2;url=validate.php");
	}
	elseif($ageError==1){
		echo "<h3>You must be over 18 to use this form!<br>
		Redirecting back to form...</h3>";
		header("Refresh:2;url=validate.php");
	}
	elseif($ageError==2){
		echo "<h3>There's no way you're that old!<br>
			Try again!<br>
		Redirecting back to form...</h3>";
		header("Refresh:2;url=validate.php");
	}
	elseif(!isValidState($state)){
		echo "<h3>Please enter a valid state! (Use 2-Digit state code)<br>
		E.g. GA, FL, NY, etc
		Redirecting back to form...</h3>";
		header("Refresh:2;url=validate.php");
	}

	elseif(isValidZipcode($zip)==false){
		echo "<h3>Entered zipcode is not valid!<br>
		Redirecting back to form...</h3>";
		header("Refresh:2;url=validate.php");
	}
	
	//If everything is Kosher(no errors) print the form data
	else{
		echo "<h3>Email: $email<br>
		First Name: $fName<br>
		Birthday: $bDay<br>
		Age: $age<br>
		State: $state<br>
		Zip Code: $zip<br></h3>";	
	}
	
?>