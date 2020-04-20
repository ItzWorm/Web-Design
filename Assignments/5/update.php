<?php
		//This sets values to variables if they are passed
	if (isset($_POST['purchaseno'])){
		$purchaseno = $_POST['purchaseno'];
	} 
	if (isset($_POST['supplierid'])){
		$supplierid = $_POST['supplierid'];
	} 
	if (isset($_POST['orderdate'])){
		$orderdate = $_POST['orderdate'];
	} 
	if (isset($_POST['quantity'])){
		$quantity = $_POST['quantity'];
	} 
	if (isset($_POST['description'])){
		$description = $_POST['description'];
	} 
	if (isset($_POST['price'])){
		$price = $_POST['price'];
	} 
	//If any variables not set (bc the field was empty) then throw an error
	if(($purchaseno=="")||($supplierid=="")||($price=="")||($quantity=="")||($description=="")){
		echo "<h3>Please enter correct data in each field!<br>
		Redirecting back to form...</h3>";
		header("Refresh:2;url=newpurchase.html");
	}

	
	
//Connect to SQL Server
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

$sql = "INSERT INTO `nikeproducts` (`PurchaseNo`, `SupplierID`, `Date`, `Quantity`,
`Description`, `Price`) VALUES
(".$purchaseno.", ".$supplierid.", '".$orderdate."', ".$quantity.", '".$description."', '".$price."');";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully<b>Reloading database...";
	header("Refresh:2;url=display.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();



?>