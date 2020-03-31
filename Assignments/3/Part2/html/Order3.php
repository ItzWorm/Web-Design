<html>
		 
<?php

//How to read a packaged cookie
//This code was learned from Berserkguard on stackoverflow
if(isset($_COOKIE["p1Cookie"])){
    $pieces = explode(",", $_COOKIE["p1Cookie"]);
    $fname = $pieces[0];
    $modelName = $pieces[1];
	if($modelName == "Mustang"){
		$model = "mustang";
	}
	elseif($modelName == "Subaru"){
		$model = "WRX";
	}
	elseif($modelName == "Corvette"){
		$model = "corvette";
	}	
	elseif($modelName == "Infiniti"){
		$model = "infiniti";
	}
}
if(isset($_COOKIE["p2Cookie"])){
	$paint = $_COOKIE["p2Cookie"];
}

$carPic = "../carPics/".$model."_".$paint.".jpg";

?>

   <head>
      <title>Selection Display</title>
      <link href="style.css" rel="stylesheet" type="text/css">
   </head>
   <body>
      <div class="pageContainer centerText">


         

<p></p>
         <h2 class="centerText">Car Selection</h2>
			

         <div class="pageContainer">
			<?php
			echo "<h3>Hello {$fname}!<br>
			You have selected the {$paint} {$modelName}!</h3>"
			?>
			<p align="center">
			<?php echo "<img src='{$carPic}' alt='Selected car image' width='500'>"; ?>
			</p>
			
			<form action="Order1.php" class="formLayout">
			<div class="formGroup">
				<label></label>
				<!–– If the restart button gets pressed go back to the first screen ––>
					<button type="submit">Restart Order</button>
				</div>
			</form>
         </div>
      </div>
	  

	  
   </body>
</html>