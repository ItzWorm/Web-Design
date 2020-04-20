<!doctype html>

<?php
	$user = "mforrest1";
	$password = "mforrest1";
	$database = "mforrest1";
	$msg = "test";
	
	$conn = new mysqli("localhost", $user, $password, $database);

	if($conn){
		$msg="Congratulations $user, you connected to MySQL";
	}
?>
<html>
<head>
	<meta charset="utf-8">
	<title>Connecting User</title>
</head>
<body>
	<h3><?php echo($msg);  ?></h3>
</body>
</html>
