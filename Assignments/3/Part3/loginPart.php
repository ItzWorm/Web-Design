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
	header( "Location: protected.php" );
} 


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$username = $_POST['username'];
	$pass = $_POST['password'];
	$postback = $_POST['postback'];
		if ($pass == 'guest' && strlen($username) > 0) {
			$_SESSION["sessionUser"] = "$username";
			$loginFail=false;
			header( "Location: protected.php" );
		}
		else{
			$loginFail=true;
		}
}

if(empty($postback)){
	$postback = FALSE;
}





?>

   <head>
      <title>Login Page</title>
	  <!–– This uses the same style sheet as the previous parts ––>
      <link href="style.css" rel="stylesheet" type="text/css">
   </head>
   <body>
      <div class="pageContainer centerText">
	<form method="post" class="formLayout">
			<div class="formGroup">
				<label>Username:</label>
				<input type="text" name="username" value="<?php  if (isset($username)) echo $username; ?>" 
						class="formElement" 
						title="first name" required autofocus /><br>
				<div class="alert">
					<?php
					  //This shows an error message if postback is set and the username doesnt
					  //meet the requirements
						  if ($postback && strlen($username)<4) {
								echo "Please enter a valid username.";
						  }
					  ?>
				</div>
			</div>                     

			<div class="formGroup">
				<label>Password:</label>
				<input type="password" name="password" value="<?php if (isset($pass)) echo $pass; ?>"
						class="formElement" 
						title="password" required /><br>
					<div class="alert">
						<?php
						  if ($postback && strlen($pass)<4) {
								echo "Please enter a valid password.";
						  }
						?>
					</div>
				</div>
				<div class="alert">
					<?php
						if (isset($loginFail)){
							if ($loginFail){echo "Invalid Login credentials!";}
						}
					?>
				</div>

                  
				<div class="formGroup">
					<label> </label>
					<input type="hidden" name="postback" value="true">
						<button type="submit">Login</button>
					</div>
					<div class="formGroup">
						<label></label>
						<button type="submit" formnovalidate>Login without HTML5 validation</button>
					</div>

				</form>   
				
										<form action="protected.php" class="formLayout">
			<div class="formGroup">
				<label></label>
				<!–– Try to go straight to the protected page ––>
					<button type="submit">Protected Page Link</button>
				</div>
			</form>
				
			</div>

   </body>
</html>