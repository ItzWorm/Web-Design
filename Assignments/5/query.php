<!-- Matthew Forrest, Assignment 5 -->
<!-- This code connects to a SQL server local to the webserver
and displays the data from it in a table -->
<!-- Most of this code comes from work on previous assigments -->
<html>
<?php

	if (isset($_POST['supplierid'])){
		$supplierid = $_POST['supplierid'];
	} 
	//If any variables not set (bc the field was empty) then throw an error
	if(($supplierid=="")){
		echo "<h3>Please enter correct data in each field!<br>
		Redirecting back to form...</h3>";
		header("Refresh:2;url=newpurchase.html");
	}


$servername = "localhost";
$username = "mforrest1";
$password = "mforrest1";
$dbname = "mforrest1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Date, Description, Price FROM nikeproducts WHERE SupplierID =".$supplierid;
$result = $conn->query($sql);

//Go through each data entry and put its content in a HTML table row
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$tableTemp .= "<tr><td>".$row['Date']."</td><td>".$row['Description']."</td><td>".$row['Price']."</td></tr>";
	}
} else {
   $tableTemp = "No results were found the entered Supplier ID";
}
$conn->close();
?>


<head>
<div class="centerText headMax">
	<div class="headContainer">
		<div class="headFlex">
		<img src="swoosh.png" alt="Nike swoosh logo" width="300">
		</div>
		
		<div class="centerText">
		<title>HW Assignment5:P5</title>
		<H2>Homework Assignment 5: Part 5 <br>Database Query</H2>
		<link rel="stylesheet" type="text/css" href="./style.css" title="style" />
		</div>
		
		<div class="headFlex">
		<img src="jordan.png" alt="Nike Air Jordan logo" width="300">
		</div>
	</div>
</div>
</head>


<body>
<div class="centerText">
<h3>Nike Products Order History</h3>
<p>Search results for supplier ID: <b><?php  if (isset($supplierid)) echo $supplierid; ?></b></p>
</div>
<div class="flex-grid-thirds">
	<!-- This is a space holder -->
  <div class="col"></div>
  <!-- Call the script here to put it in the middle 3rd of the screen -->
  <div >

    <table>
		<tr>
			<th>Date</th>
			<th>Description</th>
			<th>Price</th>
		</tr>
	<?php
	//Once created display the table here
	if (isset($tableTemp)) echo $tableTemp;
	?>	
		
	</table>
  </div>

  
  <!-- This is a also space holder -->
  <div class="col"></div>
</div>

</body>
</html>