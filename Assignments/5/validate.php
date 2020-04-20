<html>
   <head>
      <title>Form Validation</title>
      <link href="style.css" rel="stylesheet" type="text/css">
   </head>
   <body>
      <div class="pageContainer">

         <h2 class="centerText">Form Validation</h2>
		 <p class="centerText">HTML5 and server-side validation</p>
         <form action="validateConfirm.php" method="post" class="formLayout" >
            <div class="formGroup">
               <label>Email:</label>
               <input type="email" name="email" class="textbox" autofocus required  
                      placeholder="Email" title="Email" size="20" maxlength="35" />
            </div>
			<div class="formGroup">
               <label>First name:</label>
               <input type="text" name="fname" class="textbox" autofocus required  
                      placeholder="First name" title="First Name" size="20" maxlength="20" pattern="[A-Za-z'-]{2,20}" />
            </div>
			<div class="formGroup">
               <label>Birthday:</label>
               <input type="date" name="bday" class="textbox" autofocus required  
                      placeholder="mm/dd/yyyy" title="Birthdate" size="20" maxlength="10" />
            </div>
			<div class="formGroup">
               <label>Age:</label>
               <input type="number" name="age" class="textbox" autofocus required  
                      placeholder="age" title="Age" size="5" maxlength="3" />
            </div>
			<div class="formGroup">
               <label>State:</label>
               <input type="text" name="state" class="textbox" autofocus required  
                      placeholder="ST" title="ST (E.g.: AL, GA, FL, etc)" size="5" maxlength="2" pattern="[A-Z]{2}" />
            </div>
			<div class="formGroup">
               <label>Zip:</label>
               <input type="number" name="zip" class="textbox" autofocus required  
                      placeholder="Zip" title="Zip Code" size="5" maxlength="5" />
            </div>
            <div class="formGroup">
               <label></label>
               <input type="submit" value="Submit Form">

            </div>
			<div class="formGroup">
               <label></label>
               <input type="submit" formnovalidate="formnovalidate" value="Submit without validation">

            </div>
            <div class="centerText vertGap55">          
				<a href="?">Reload page</a>            
            </div>


      </div>

   </form>

</div>
</body>
</html>