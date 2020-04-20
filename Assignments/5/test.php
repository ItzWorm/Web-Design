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

$sql = "SELECT PurchaseNo, Description, Price FROM nikeproducts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["PurchaseNo"]. " - Name: " . $row["Description"]. " " . $row["Price"]. "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>
	 