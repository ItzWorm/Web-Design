<html>

<!–– PHP code starts with forced HTTPS check ––>
<?php
if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
    $location = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $location);
    exit;
}
//Start session required for any session page
session_start();

if(isset($_SESSION["sessionUser"])){
	$showGreeting = true;
	$username=$_SESSION["sessionUser"];
} 
else {
	// username and password not given so go back to login
	header( "Location: loginPart.php" );
}


if(isset($_POST['abandon'])){
	session_unset();
	header("Refresh:0");
}


?>

   <head>
      <title>Protected Page</title>
      <link href="style.css" rel="stylesheet" type="text/css">
   </head>
   <body>
      <div class="pageContainer centerText">
         

<p></p>
         <h2 class="centerText">Super Secret Protected Page</h2>
			

         <div class="pageContainer">
			<p align="center">
			<?php if (isset($showGreeting)){
					echo "Welcome user \"{$username}\" !"; 
					}	
			?>
			
			</p>
			<img src='secret.jpg' alt='Beach island' width='500'>
         </div>
		 <div class="centerWrap">
		 <form method="post">
				
				<label></label>
				<input type="submit" name="abandon" value="Logout">
				

				
		 </form>
		 </div>
		 
      </div>
   </body>
</html>