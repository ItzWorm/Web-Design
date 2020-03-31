<html>
<head>
	<div class="center">
	<title>In Class Activity 6: Part1</title>
	<H2>In Class Activity 6: <br>HTML Formating with PHP</H2>
	<link rel="stylesheet" type="text/css" href="./act6style.css" title="style" />
	</div>
</head>


<body>
<div class="mainContain">

<form id="s" method="post" class="fcolor">
	<div class="row">
		<div class="column">	
			<label>ID:</label>
			<br>
			<select id="ftype" name="ftype" class="dropBtn">
			   <option value="times" class="dropItem timesFont">Times New Roman</option>
			   <option value="arial" class="dropItem arialFont">Arial</option>
			   <option value="brush" class="dropItem brushFont">Brush Script</option>
			</select> 
		   <br>
		   <label for="fstyle">Style Selection</label> 
		   <br>
		   <select id="fstyle" name="fstyle" class="dropBtn">
			   <option value="bold" class="dropItem boldFont">Bold</option>
			   <option value="italz" class="dropItem italicFont">Italicized</option>
			   <option value="strike" class="dropItemsstrikeFont"><s>Strike Through</s></option>
			   <option value="uline" class="dropItem uLineFont"><u>Underline</s></option>
		   </select> 
		</div>
	
		<div class="column">
			<label for="fcolor">Font Color</label>
			<br>
			<input type="color" id="fcolor" name="fcolor"
				   value="#000000">
		</div>
	</div>
	<div class="row">
		<div class="column">
			<label for="intext">Text Box</label>
			<br>
			<textarea name="comment" id="intext" rows="5" cols="40">This is the pre inserted text</textarea>
			<br>
			<input type="submit" name="submitText" value="Submit">
			<br>
			<br>
</form>
<div class="outText">
<?php


if(isset($_POST['submitText'])){
	$html = '<div ';
	if ($_POST['ftype'] == "times"){
		$html .= 'class="timesFont';
	}
	elseif ($_POST['ftype'] == "arial"){
		$html .= 'class="arialFont';
	}
	elseif ($_POST['ftype'] == "brush"){
		$html .= 'class="brushFont';
	}
	
	if ($_POST['fstyle'] == "bold"){
		$html .= ' boldFont">';
	}
	elseif ($_POST['fstyle'] == "italz"){
		$html .= ' italicFont">';
	}
	elseif ($_POST['fstyle'] == "strike"){
		$html .= '"><s>';
	}
	elseif ($_POST['fstyle'] == "uline"){
		$html .= '"><u>';
	}
	
	$html .= '<span style="color:';
	$html .= $_POST["fcolor"];
	$html .= '">';
	$html .= $_POST["comment"];
	$html .= '</span></u></s>';
	$html .= '</div>';
	echo $html;

}
else{
	echo "";
}











?>
</div>
		</div>
	</div>




</div>


</body>
</html>