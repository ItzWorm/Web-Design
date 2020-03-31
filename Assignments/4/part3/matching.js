var firstTile = true;
//Represent tile selection: [Row,Col,Pic]
var tileOne = [0,0,0];
var tileTwo = [0,0,0];
var picArray;
var timerSeconds;
var gameTime
var counter;
var rowCount;
var colCount;
var gameStarted;
var notErasing;
var score;
var pairsMatched;

function startGame(){
	score = 0;
	pairsMatched = 0;
	notErasing = true;
	firstTile = true;
	gameStarted = false;
	stopTimer();
	document.getElementById("summary").innerHTML ="";
	//Get the pair quantity selection
	var pairsDrop = document.getElementById("pairSelect");
	var pairs = pairsDrop.options[pairsDrop.selectedIndex].value;
	//define number of rows and cols from selection
	
	if(pairs == "eight"){
		rowCount = 4;
		colCount = 4;
		picArray = [1,1,2,2,3,3,4,4,5,5,6,6,7,7,8,8];
		gameTime = 120;
	}
	else if(pairs == "ten"){
		rowCount = 4;
		colCount = 5;
		picArray = [1,1,2,2,3,3,4,4,5,5,6,6,7,7,8,8,9,9,10,10];
		gameTime = 150;
	}
	else if(pairs == "twelve"){
		rowCount = 5;
		colCount = 5;
		picArray = [1,1,2,2,3,3,4,4,5,5,6,6,7,7,8,8,9,9,10,10,11,11,12,12];
		gameTime = 180;
	}

	//Shuffle to make array random
	shuffleArray(picArray);
	//Get the dificulty selection
	var difDrop = document.getElementById("difSelect");
	var dif = difDrop.options[difDrop.selectedIndex].value;
	if(dif == "easy"){
		timerSeconds = 9;
	}
	else if(dif == "moderate"){
		timerSeconds = 6;
	}
	else if(dif == "hard"){
		timerSeconds = 4;
	}
	//Start countdown
	counter=setInterval(runTimer, 1000); //1000 will  run it every 1 second
	playSound('ping');
	
	var index = 0;
	//Draw screen
	var tableString = "<table id='guessTable'>";
	for (let step = 0; step < rowCount; step++) {
		tableString=tableString.concat("<tr>");
		for (let step2 = 0; step2 < colCount; step2++) {
			//If 5x5 grid don't draw 5th element
			if(step*step2 != 16){
				//This draws each tile and calls the function below if it's clicked
				tableString=tableString.concat("<td><img src='./images/pic"+picArray[index]+".jpg' width='100' height='100' alt='question mark'></td>");
				index++;
			}
		}
		tableString=tableString.concat("</tr>");
	}
	tableString+= "</table>"
	//Draw table
	document.getElementById("printHere").innerHTML = tableString;
	
	
	
}

function drawQs(){
	var index = 0;
	var tableString = "<table id='guessTable'>";
	for (let step = 0; step < rowCount; step++) {
		tableString=tableString.concat("<tr>");
		for (let step2 = 0; step2 < colCount; step2++) {
			//If 5x5 grid don't draw 5th element
			if(step*step2 != 16){
				//This draws each tile and calls the function below if it's clicked
				tableString=tableString.concat("<td><img src='./images/question.jpg' width='100' height='100' alt='question mark' onclick='printSelection("+step+","+step2+","+picArray[index]+")'></td>");
				index++;
			}
		}
		tableString=tableString.concat("</tr>");
	}
	tableString+= "</table>"
	document.getElementById("printHere").innerHTML = tableString;
	timerSeconds = gameTime;
	playSound('ping');
	counter=setInterval(runTimer, 1000); //1000 will  run it every 1 second
	//set game started flag
	gameStarted=true;
}

//This is the function that is called when a tile is clicked
//it takes the tile's col and row as a parameter
function printSelection(imageRow,imageCol,picIndex){
	//check to see if a function is about to draw, wait until that happens or else variables will
	//be over written and making things go fubar
	if(notErasing){
		//If its the first tile clicked show the tile
		if (firstTile){
			firstTile = false;
			tileOne[0] = imageRow;
			tileOne[1] = imageCol;
			tileOne[2] = picIndex;
			
			//this was for testing
			//document.getElementById("summary").innerHTML ="Row: "+imageRow+"<br>Col: "+imageCol+"<br>ImageID: "+tileOne[2];
			
			//get cell location and write to it
			var x = document.getElementById("guessTable").rows[imageRow].cells;
			x[imageCol].innerHTML = "<img src='./images/pic"+tileOne[2]+".jpg' width='100' height='100' alt='question mark' onclick='printSelection("+imageRow+","+imageCol+")'>";
		}
		//If its the second tile clicked check if they match
		else{
			firstTile = true;
			tileTwo[0] = imageRow;
			tileTwo[1] = imageCol;
			tileTwo[2] = picIndex;
			var x = document.getElementById("guessTable").rows[imageRow].cells;
			x[imageCol].innerHTML = "<img src='./images/pic"+tileTwo[2]+".jpg' width='100' height='100' alt='question mark' onclick='printSelection("+imageRow+","+imageCol+")'>";
			//If they match redraw the cells as empty
			if(tileOne[2]==tileTwo[2]){
				//wait 1.5 seconds then redraw with blanks
				//set this variable and don't let the game do anything until the variable is rest
				notErasing = false;
				setTimeout(eraseTiles, 1500);
				score=score+timerSeconds;
				pairsMatched++;
			}
			//if they dont match redraw question marks
			else{
				//wait 1.5 seconds then redraw with questions
				notErasing = false;
				setTimeout(questionTiles, 1500);
			}
		}
	}
}

function eraseTiles(){
	var x = document.getElementById("guessTable").rows[tileOne[0]].cells;
	x[tileOne[1]].innerHTML = "";
	x = document.getElementById("guessTable").rows[tileTwo[0]].cells;
	x[tileTwo[1]].innerHTML = "";
	notErasing = true;
	document.getElementById("summary").innerHTML ="Pairs matched: "+pairsMatched+"<br>Current Score: "+score;
	if((pairsMatched*2) == picArray.length){
		//end game
		playSound('coin');
		document.getElementById("summary").innerHTML ="<h2>Game Over! You Win!<br>Score: "+score+"</h2>Press 'Start Game' to try again!";
		stopTimer();
	}
	
}

function questionTiles(){
	var x = document.getElementById("guessTable").rows[tileOne[0]].cells;
	x[tileOne[1]].innerHTML = "<img src='./images/question.jpg' width='100' height='100' alt='question mark' onclick='printSelection("+tileOne[0]+","+tileOne[1]+","+tileOne[2]+")'>";
	x = document.getElementById("guessTable").rows[tileTwo[0]].cells;
	x[tileTwo[1]].innerHTML = "<img src='./images/question.jpg' width='100' height='100' alt='question mark' onclick='printSelection("+tileTwo[0]+","+tileTwo[1]+","+tileTwo[2]+")'>";	
	notErasing = true;
}

//Timer Functions
function runTimer(){
	var seconds = timerSeconds;
	if (seconds > 0){
		timerSeconds--;
		document.getElementById("timerPrint").innerHTML=timerSeconds + " secs";
		//give audio que when only 3 seconds left on timer
		if(timerSeconds==3){
			playSound('bump');
			setTimeout("playSound('bump');", 1000);
			setTimeout("playSound('bump');", 2000);
		}
	}
	//if time runs out stop timmer
	else if(seconds == 0){
		document.getElementById("timerPrint").innerHTML="Time is up!";
		stopTimer();
		//If this is the first timer of the game draw questionmarks when finished
		if(!gameStarted){
			drawQs();
		}
		else{
			playSound('dead');
			document.getElementById("summary").innerHTML ="<h2>Game Over! You Lose!</h2>Press 'Start Game' to try again!";
		}
	}

	
}

function stopTimer(){
	clearInterval(counter);
}


//I got this from authors ashleedawg and Laurens Holst on stackoverflow
//https://stackoverflow.com/questions/2450954/how-to-randomize-shuffle-a-javascript-array
function shuffleArray(array) {
	for (let i = array.length - 1; i > 0; i--) {
		const j = Math.floor(Math.random() * (i + 1));
		[array[i], array[j]] = [array[j], array[i]];
	}
}