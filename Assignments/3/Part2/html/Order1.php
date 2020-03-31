<!–– The majority of this HTML is from the example with minor modifications.
The PHP is simple form reading and redirection ––>
<html>
   <head>
      <title>Select Model</title>
      <link href="style.css" rel="stylesheet" type="text/css">
   </head>
   <body>
      <div class="pageContainer">
	
         <h2 class="centerText">Select Model</h2>

         <form method="post" class="formLayout">
            <div class="formGroup">
               <label>First name:</label>
               <input type="text" name="fname" class="textbox" autofocus required  
                      placeholder="First name" title="first name" maxlength="20" pattern="[A-Za-z'-]{2,20}" />
            </div>
            <div class="formGroup">
               <label> Car model:</label>
               <div class="formElements">
                  <input type="radio" name="model" required value="Mustang">Ford Mustang<br>
                  <input type="radio" name="model" required value="Subaru">Subaru WRX STI<br>
                  <input type="radio" name="model" required value="Corvette">Corvette<br>
				  <input type="radio" name="model" required value="Infiniti">Infiniti Q60<br>
               </div>

            </div>
            <div class="formGroup">
               <label></label>
			   <input type="submit" name="submitPart1" value="Continue">
               

            </div>
            <div class="centerText vertGap55">
								<!–– If you like breaking things press this ––>
                              <button type="submit" name="nonValidSubmitPart1" formnovalidate>Submit without validation</button>
                              <br><br>
            <a href="?">Reload page</a>            
            </div>
      </div>

   </form>
<?php

//If one of the buttons is pressed
if(isset($_POST['submitPart1']) || isset($_POST['nonValidSubmitPart1'])){
	//Save name to cookie
	$fname = $_POST['fname'];
	if ($_POST['model'] == "Mustang"){
		$model = "Mustang";
	}
	elseif ($_POST['model'] == "Subaru"){
		$model = "Subaru";
	}
	elseif ($_POST['model'] == "Corvette"){
		$model = "Corvette";
	}
	elseif ($_POST['model'] == "Infiniti"){
		$model = "Infiniti";
	}
	//Set the cookie based on the radio button seleted
	//Package multiple pieces into a cookie
	//This code was learned from Berserkguard on stackoverflow
	setcookie("p1Cookie", $fname . "," . $model);
	//go to next PHP page
	header("Location:Order2.php");
}

?>


</div>
</body>
</html>