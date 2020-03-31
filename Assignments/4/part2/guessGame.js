  function checkGuess() {
  //Parse entered value
	var playerNum = parseInt(document.getElementById("numGuess").value);
	
	//If variable doesn't exist yet, tell user to start the game
	if(typeof window.randomNumber  === 'undefined'){
		document.getElementById("printStuff").innerHTML = "Please click start to generate a random number<br> and start the game!"
		//Play 'bump' to let user know something is wrong
		playSound('bump');
	}
	
	//If guessed number is out of range (or not a number) alert and don't take away from guesses
	else if(playerNum <0 || playerNum>100 || isNaN(playerNum)){
		document.getElementById("printStuff").innerHTML = "Your guess is out of range. Please guess again!<br>"+window.guessCount+" guesses remaining";
		//Play 'bump' to let user know something is wrong
		playSound('bump');
	}
	
	//If user runs out of guesses
	else if(window.guessCount <= 0){
		document.getElementById("printStuff").innerHTML = "You ran out of guesses and lose!<br>The number to guess was<b>: "+window.randomNumber+"</b><br>Game restarting...";
		//Play 'smash' to let user know they're out of guesses
		playSound('smash');
		//Restart the game by generating a new number
		window.randomNumber = 1+(Math.floor(Math.random() * 100));
		//Reset number of guesses
		window.guessCount = 6;

	}
	else if(playerNum > window.randomNumber){
		//subtract from number of remaining guesses
		window.guessCount--;
		document.getElementById("printStuff").innerHTML = "Your guess is too high. Please guess again!<br>"+window.guessCount+" guesses remaining";
		//Play 'dead' to let user know they guessed wrong
		playSound('dead');
	}
	else if(playerNum < window.randomNumber){
		//subtract from number of remaining guesses
		window.guessCount--;
		document.getElementById("printStuff").innerHTML = "Your guess is too low. Please guess again!<br>"+window.guessCount+" guesses remaining";
		//Play 'dead' to let user know they guessed wrong
		playSound('dead');
	}
	
	else if(playerNum == window.randomNumber){
		document.getElementById("printStuff").innerHTML = "Your guess is right! You Win!<br>Game restarting...";
		//Play 'coin' to let user know they win
		playSound('coin');
		//Restart the game by generating a new number
		window.randomNumber = 1+(Math.floor(Math.random() * 100));
		//Reset number of guesses
		window.guessCount = 6;
	}
  }
  
	//Generate random number for page
  function randNumGen(){
	playSound('ping');
	var randomNumber;
	var guessCount;
	window.guessCount = 6;
	//create random float between 0-99 then round w/floor to get int. Add 1 to move range to 1-100
	window.randomNumber = 1+(Math.floor(Math.random() * 100));
	 document.getElementById("printStart").innerHTML = "Random number generated, starting game!";
  }
  
  //This is the code for redrawing the clock every second
function displayClock(){
	var refresh=1000; // Refresh rate in milli seconds
	mytime=setTimeout('getTime()',refresh);
}
//This is the code for getting the time
function getTime() {
	var x = new Date()
	var x1 = x.getHours( )+ ":" +  x.getMinutes() + ":" +  x.getSeconds();
	document.getElementById('clock').innerHTML = x1;
	displayClock();
	}