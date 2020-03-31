//This is the JS file for the first question
//It promps the user for names and hours worked



function getHours(){
	//I originally tried to do this an entirely different way using these types of functions:
	/* 	  var table = document.getElementById("myTable");
	  var row = table.insertRow(0);
	  var cell1 = row.insertCell(0);
	  var cell2 = row.insertCell(1);
	  cell1.innerHTML = "NEW CELL1"; */
	//It would only run one of the functions before redrawing the HTML interupting the javascript
	//This method accomplishes the desired goal
	var tableTemp="";
	var totalPay=0;
	//Use to parse input
	var promptOut;
	var hours = 0;
	var payTemp;
	var employeeCount = 1;
	var formValue = "-1 or less to end input";
	//while the number of hours entered is greater than 0
	while(hours >= 0){
		promptOut = prompt("Enter the number of hours", formValue);
		hours = parseFloat(promptOut);
		
		if(hours < 0){
			//End doing stuff if hours entered less than 0
			document.getElementById("printTable").innerHTML = tableTemp;
			document.getElementById("summary").innerHTML = "<br><h3>Total amount spent on payroll: $"+totalPay;
			return;
		}
		else if(hours>40){
			//Get base pay then calculate time and a half hours
			payTemp = (40*15)+((hours-40) * 15 * 1.5);
			totalPay=payTemp+totalPay;
			tableTemp=tableTemp.concat("<tr>");
			tableTemp=tableTemp.concat("<td>",employeeCount,"</td>");
			tableTemp=tableTemp.concat("<td>",hours,"</td>");
			tableTemp=tableTemp.concat("<td>$",payTemp,"</td></tr>");
		}
		else{
			
			//Multiply by 15 to get the pay for each employee
			payTemp = hours * 15;
			//Add to total pay ammount
			totalPay=payTemp+totalPay;
			
			tableTemp=tableTemp.concat("<tr>");
			tableTemp=tableTemp.concat("<td>",employeeCount,"</td>");
			tableTemp=tableTemp.concat("<td>",hours,"</td>");
			tableTemp=tableTemp.concat("<td>$",payTemp,"</td></tr>");	
		}
		
		employeeCount++;
	}
	
	
	
}



//After function ends when user enters a negative number for hours create the table using the following resources:
//https://renenyffenegger.ch/notes/development/web/HTML/tags/table/create-with-js
//https://www.w3schools.com/jsreF/tryit.asp?filename=tryjsref_table_create_deletethead




