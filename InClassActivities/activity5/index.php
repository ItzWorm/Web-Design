<html>
<head>
	<title>Activity 5: PHP </title>
	<H1>PHP Page for Activity 5</H1>
</head>

<body>
<h2>Question 1: HAL 9000</h2>
	<?php
		echo "\"Good morning, Dave,\" said HAL.";
		echo "I'm sorry Dave, I can't do that";
	?> 

<h2>Question 2: Radius</h2>

	<?php
		$radius = 5;
		$a = pi()*$radius*2;
		echo "The area of a circle with a radius of $radius units is $a units.";
	?>

<h2>Question 3: Degrees F to C</h2>

	<?php
		$celFahr1 =  (float) 71;
		$celFahr2 =  (float) 72;
		$temp1c = (5/9)*($celFahr1 - 32);
		$temp2c = (5/9)*($celFahr2 - 32);
		
		echo "Most people are comfertable with a room temperature between $celFahr1 and $celFahr2 degrees F";
		echo "<br>";
		echo "Across the pond people prefer a temperature between $temp1c and $temp2c degrees C";
	?>

		
<h2>Question 4: Triming White Space</h2>

	<?php
		$testString = " PHP is fun ";
		$trimString = trim($testString);
		$strLength = strlen($trimString);
		echo "The string \"$testString\" has $strLength characters";

	?>		
		
<h2>Question 5: Find position in string</h2>

	<?php
		$testString = "WDWWLWWWLDDWDLL";
		$sequence = "WWW";
		$seqLoc = strpos($testString, $sequence);
		$firstLetter = $seqLoc+3;
		echo "For the sequence \"$testString\" and substring \"$sequence\" the first occurance of the substring is $seqLoc. 
		<br>The first letter after this is $testString[$firstLetter].";
	?>			
		
<h2>Question 6: isPalindrome() = true?</h2>

	<?php
		$testString1 = "WDWWLWWWLDDWDLL";
		$testString2 = " PHP is fun ";
		$testString3 = "kayak";
		$testString4 = "Hannah";
		$testString5 = "Able was I ere I saw Elba";
		$testString6 = "Not A palindrome";
		$rTS1 = strrev(strtolower($testString1));
		$rTS2 = strrev(strtolower($testString2));
		$rTS3 = strrev(strtolower($testString3));
		$rTS4 = strrev(strtolower($testString4));
		$rTS5 = strrev(strtolower($testString5));
		$rTS6 = strrev(strtolower($testString6));
		if (strtolower($testString1)==$rTS1) {
			echo "\"$testString1\" is a palindrome";
		}	else {
			echo "\"$testString1\" is NOT a palindrome";
		}
		echo "<br>";
		if (strtolower($testString2)==$rTS2) {
			echo "\"$testString2\" is a palindrome";
		}	else {
			echo "\"$testString2\" is NOT a palindrome";
		}
		echo "<br>";
		if (strtolower($testString3)==$rTS3) {
			echo "\"$testString3\" is a palindrome";
		}	else {
			echo "\"$testString3\" is NOT a palindrome";
		}
		echo "<br>";
		if (strtolower($testString4)==$rTS4) {
			echo "\"$testString4\" is a palindrome";
		}	else {
			echo "\"$testString4\" is NOT a palindrome";
		}
		echo "<br>";
		if (strtolower($testString5)==$rTS5) {
			echo "\"$testString5\" is a palindrome";
		}	else {
			echo "\"$testString5\" is NOT a palindrome";
		}
		echo "<br>";
		if (strtolower($testString6)==$rTS6) {
			echo "\"$testString6\" is a palindrome";
		}	else {
			echo "\"$testString6\" is NOT a palindrome";
		}
	?>		
		
<h2>Question 7: isOdd</h2>

	<?php
		$num = 7;
		$num2 = 8;
		$num3 = 770;
		$num4 = 33;
		if ($num%2 == 0) {
			echo "$num is a even";
		}	else {
			echo "$num is a odd";
		}
		echo "<br>";
		if ($num2%2 == 0) {
			echo "$num2 is a even";
		}	else {
			echo "$num2 is a odd";
		}
		echo "<br>";
		if ($num3%2 == 0) {
			echo "$num3 is a even";
		}	else {
			echo "$num3 is a odd";
		}
		echo "<br>";
		if ($num4%2 == 0) {
			echo "$num4 is a even";
		}	else {
			echo "$num4 is a odd";
		}

	?>			
		
<h2>Question 8: isLeapYear</h2>

	<?php

		$year1 = 1999;
		$date1 = mktime(0, 0, 0, 1, 1, $year1);
		$date2 = strtotime("last year");
		$year2 = date("Y",$date2);
		$year3 = date("Y");

		if (date('L',date1)==1) {
			echo "The year $year1 <strong>IS</strong> a leap year";
		}	else {
			echo "The year $year1 is <strong>NOT</strong> a leap year";
		}
		echo "<br>";
		if (date('L',date2)==1) {
			echo "The year $year2 <strong>IS</strong> a leap year";
		}	else {
			echo "The year $year2 is <strong>NOT</strong> a leap year";
		}
		echo "<br>";
		if (date('L')==1) {
			echo "The year $year3 <strong>IS</strong> a leap year";
		}	else {
			echo "The year $year3 is <strong>NOT</strong> a leap year";
		}

	?>				
		
		
		
		
		
		
		
		
		
		
		
		
		
</body>

</html>