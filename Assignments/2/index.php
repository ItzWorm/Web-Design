<html>  

	<head>
		<link rel="stylesheet" type="text/css" href="styles.css">
		<title>Assignment 2</title>
		<H2>Assignment 2</H2>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>
<body style="text-align:center;">  
	<h4>Question 1: Charlie eating your lunch</h4>
	<p>Under normal circumstances Charlie eats your lunch 50% of the time.
	<br>
	If you attemp to block Charlie he has a much lower chance of eating your lunch
	</p>
	

   <form method="post"> 
        <input type="submit" name="button1"
                value="Did Charlie eat your lunch?"/> 
        <br>
        <input type="submit" name="button2"
                value="Attempt to block Charlie!"/> 
    </form> 
	
	
<?php
	
	function isBitten() {
		$didBite = rand(0,2);
		if($didBite >1){
			return false;
		}
		else{
			return true;
		}
	}

	function isBittenLess() {
		$didBite = rand(0,5);
		if($didBite <= 3){
			return false;
		}
		else{
			return true;
		}
	}
      
    if(isset($_POST['button1'])) {
		if(isBitten()==true){
			echo "Charlie ate my lunch!"; 
		}
        else{
			echo "Charlie did not eat my lunch!"; 
		}
    } 
    if(isset($_POST['button2'])) { 
        if(isBittenLess()==true){
			echo "Charlie ate my lunch!"; 
		}
        else{
			echo "Charlie did not eat my lunch!"; 
		}
    } 
?> 

	<h4>Question 2: Making a checkerboard</h4>
	<p>
	This will make a 7x7 checkerboard.
	<br>
	Click red to make the first square(top left) red. Click black to make it black.
	</p>


	<form method="post"> 
		<input type="submit" name="startRed"
                value="Red"/> 

		<input type="submit" name="startBlack"
                value="Black"/> 
	</form> 
	
	<?php
    function build_table($isRed){
		$startRed = $isRed;
		// start table
		$html = '<table class="boardContainer">';
		// data rows
		for($x = 0; $x <= 7; $x++){
			$html .= '<tr>';
			for($y = 0; $y <= 7; $y++){
				if($startRed){
					$html .= '<td class="checkerRed">' . " " . '</td>';
					$startRed = false;
				}
				else{
					$html .= '<td class="checkerBlack">' . " " . '</td>';
					$startRed = true;
				}
				
			}
			if($startRed){
					$startRed = false;
				}
			else{
				$startRed = true;
			}
			$html .= '</tr>';
		}

		// finish table and return it

		$html .= '</table>';
		return $html;
	}

    if(isset($_POST['startRed'])) {
		
		echo "<div class='centerPHP'>".build_table(true)."</div>";
    } 
    if(isset($_POST['startBlack'])) { 
		echo "<div class='centerPHP'>".build_table(false)."</div>";

    } 
	?>
	
	
	<h4>Question 3: Sorting Months </h4>
	<p>
	Clicking "Sort by Order" sorts the months of the year chronologically 
	<br>
	Clicking "Sort by Name" sorts the months of the year alphabetically
	<br>
	Each sort has the option to do so with a for loop or foreach loop
	</p>

	<form method="post"> 
		<input type="submit" name="sortChronFor"
                value="Sort by Order(for)"/> 

		<input type="submit" name="sortAlphaFor"
                value="Sort by Name(for)"/> 
		<br>
		<input type="submit" name="sortChronForEach"
                value="Sort by Order(foreach)"/> 

		<input type="submit" name="sortAlphaForEach"
                value="Sort by Name(foreach)"/> 
	</form> 
	
	<?php
	$month = array("January", "February", "March", "April", "May", "June", "July", "August","September", "October","November", "December"); 
	
	
	
	function sortChronForFunc($month){
		for($iter=0; $iter < count($month);$iter++){
			echo $month[$iter]." "; 
		}
	}
	
	
	
	function sortChronForEachFunc($month){
		foreach( $month as $element ) {
			echo $element." "; 
		}
	}
	
	
	function sortAlphaForFunc($month){
		sort($month);
		for($iter=0; $iter < count($month);$iter++){
			echo $month[$iter]." "; 
		}
	}
	
	function sortAlphaForEachFunc($month){
		sort($month);
		foreach( $month as $element ) {
			echo $element." "; 
		}
	}


    if(isset($_POST['sortChronFor'])) {
		sortChronForFunc($month);
    } 
    if(isset($_POST['sortAlphaFor'])) { 
		sortAlphaForFunc($month);
    } 
	if(isset($_POST['sortChronForEach'])) {
		sortChronForEachFunc($month);
    } 
    if(isset($_POST['sortAlphaForEach'])) { 
		sortAlphaForEachFunc($month);
    } 
	?>
	
	
	<h4>Question 4: Restaraunt Trip Advisor</h4>
	<p>
	Clicking "Sort by name" to sort the restaurants alphabetically by name. 
	<br>
	Clicking "Sort by Price" to sort the restaurants numerically by price.
	</p>

	<form method="post"> 
		<input type="submit" name="sortName"
                value="Sort by Name"/> 

		<input type="submit" name="sortPrice"
                value="Sort by Price"/> 

	</form> 
	
	<?php
	$foodPrice = array ("Chama Gaucha" => 40.5,"Aviva by Kameel" => 15,"Bone’s Restaurant" => 65,"Umi Sushi Buckhead" => 40.5,"Fandangles" => 30,"Capital Grille" => 60.5,"Canoe" => 35.5,"One Flew South" => 21,"Fox Bros. BBQ" => 15,"South City Kitchen Midtown" => 29);
	
	
	function sortFood($food,$byMoney){
		if ($byMoney){
			asort($food);
		}
		else{
			ksort($food);
		}
		
		// start table
		$html = '<table class="boardContainer">';
		// data rows
		$html .= '<tr>';
		$html .= '<td>' . "Restaurant" . '</td>';
		$html .= '<td>' . "Average Cost" . '</td>';
		$html .= '</tr>';
		foreach( $food as $key => $element ){
			$html .= '<tr>';
			$html .= '<td>' . $key . '</td>';
			$html .= '<td>' . $element . '</td>';
			$html .= '</tr>';
		}
		// finish table and return it

		$html .= '</table>';
		return $html;
	}
	
	if(isset($_POST['sortName'])) {
		echo "<div class='centerPHP'>".sortFood($foodPrice,false)."</div>";
    } 
    if(isset($_POST['sortPrice'])) { 
		echo "<div class='centerPHP'>".sortFood($foodPrice,true)."</div>";
    } 
	
	?>

	<h4>Question 5: Restaurant Meal </h4>
	<p>
	Fill in the order with the quantity of food items you desire and percentage tip you wish to leave
	<br>
	Click calculate bill to get the total cost of your meal
	</p>

	<form method="post"> 
    	<table class="boardContainer">
        	<tr>
            <td>Menu Item</td><td>Quantity</td><td>Cost Per</td>
            </tr>
            <tr>
			<td>Hamburgers</td><td> <input type="number" name="burgerCount" value="2"> </td><td>$4.95</td>
			</tr>
			<tr>
			<td>Milk Shakes</td><td> <input type="number" name="shakeCount" value="1"> </td><td>$1.95</td>
			</tr>
			<tr>
			<td>Colas</td><td> <input type="number" name="colaCount" value="1"> </td><td>$0.85</td>
			</tr>
			<td><br></td>
			<tr>
			<td>Tip Percent(%)</td><td> <input type="number" name="tipPercent" value="16"> </td><td>Tip Your Server!</td>
			</tr>
		</table>
		<br>
        <input type="submit" name="getTotal"
               value="Calculate Bill"/> 
	</form>
	
	<?php
	
    if(isset($_POST['getTotal'])) {
		$burgerCost = $_POST["burgerCount"] * 4.95;
		$shakeCost = $_POST["shakeCount"] * 1.95;
		$colaCost = $_POST["colaCount"] * 0.85;
		$totalCost = $_POST["colaCost"] + $shakeCost + $burgerCost;
		$tax = $totalCost * 0.075;
		$finalCost = $tax + ($totalCost * (($_POST["tipPercent"]/100)+1));
		
		
		echo $_POST["burgerCount"] . " Hamburgers @$4.95<br>";
		echo $_POST["shakeCount"] . " Shakes @$1.95<br>";
		echo $_POST["colaCount"] . " Colas @$0.85<br><br>";
		echo "$".$totalCost." Meal Total<br>";
		echo "$".$tax ." Tax Total<br>";
		echo "$".($_POST["tipPercent"] * $totalCost /100) . " tip<br><br>";
		echo "Your total is: $" .$finalCost;
    } 
	
	?>

</body>   
</html>     