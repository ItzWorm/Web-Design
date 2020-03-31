<!–– This code is almost exactly like the code from Order.PHP except
it doesnt need to package multiple variables into the cookie. ––>
<html>
   <head>
      <title>Select Color</title>
      <link href="style.css" rel="stylesheet" type="text/css">
   </head>
   <body>
      <div class="pageContainer centerText">

<p></p>
         <h2 class="centerText">Select Color</h2>


         <div class="pageContainer">
            <form method="post" class="formLayout">
               <div class="formGroup">
                  <label>Car color:</label>
                  <div class="formElements">
                     <select name="color" required >
                        <option  value=""></option>
                        <option style="background-color: blue" value="blue">Blue</option>
                        <option style="background-color: red" value="red">Red</option>
                        <option style="background-color: yellow" value="yellow">Yellow</option>
						<option style="background-color: #f1eada" value="pearl">Pearl</option>
                     </select> 

                  </div>
               </div>
               <div class="formGroup">
                  <label></label>
                  <input type="submit" name="submitPart2" value="View Car">
               </div>
               <div class="centerText vertGap55">
                  <button type="submit" name="nonValidSubmitPart2" formnovalidate>Submit without validation</button><br><br>
                  <a href="?">Reload page</a>
               </div>
            </form>
         </div>
      </div>
	  

<?php
//If one of the buttons is pressed
if(isset($_POST['submitPart2']) || isset($_POST['nonValidSubmitPart2'])){
	//Set variable for paint color choice
	if ($_POST['color'] == "blue"){
		$paint = "blue";
	}
	elseif ($_POST['color'] == "red"){
		$paint = "red";
	}
	elseif ($_POST['color'] == "yellow"){
		$paint = "yellow";
	}
	elseif ($_POST['color'] == "pearl"){
		$paint = "pearl";
	}
	//Set the cookie based on the selection
	setcookie("p2Cookie", $paint);
	//go to final PHP page
	header("Location:Order3.php");
}

?>

   </body>
</html>