<!-- Matthew Forrest, Assignment 5 -->
<!-- This code connects to a SQL server local to the webserver
and displays the data from it in a table -->
<!-- Most of this code comes from work on previous assigments -->
<html>
<?php
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

$sql = "SELECT * FROM nikeproducts";
$result = $conn->query($sql);

//Go through each data entry and put its content in a HTML table row
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		$tableTemp .= "<tr><td>".$row['PurchaseNo']."</td><td>".$row['SupplierID']."</td><td>".$row['Date']."</td><td>".$row['Quantity']."</td><td>".$row['Description']."</td><td>".$row['Price']."</td></tr>";
	}
} else {
   $tableTemp = "0 results";
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
		<title>HW Assignment5:P3</title>
		<H2>Homework Assignment 5: Part 3 <br>Database Connection and Display</H2>
		<link rel="stylesheet" type="text/css" href="./style.css" title="style" />
		</div>
		
		<div class="headFlex">
		<img src="jordan.png" alt="Nike Air Jordan logo" width="300">
		</div>
	</div>
</div>
</head>


<body>
			 <!-- This navigation bar is borrowed from the miniproject -->
			<div class="centerText">
			<div clas="navContain">
				<a href="main.html"><button class="button">Home Page</button></a>
				<a href="display.php"><button class="button">View Records</button></a>
				<a href="newpurchase.html"><button class="button">Create Purchase</button></a>
				<a href="query.html"><button class="button">Search Suppliers</button></a>
			</div>
			</div>


<h3 class="centerText">Nike Products Order History</h3>
<div class="flex-grid-thirds">
	<!-- This is a space holder -->
  <div class="col"></div>
  <!-- Call the script here to put it in the middle 3rd of the screen -->
  <div >

    <table>
		<tr>
			<th>Purchase No.</th>
			<th>Supplier ID</th>
			<th>Date</th>
			<th>Quantity</th>
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