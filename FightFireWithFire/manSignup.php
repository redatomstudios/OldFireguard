<?php include("header_ext.php"); ?>
<link href="CSS/signup.css" type="text/css" rel="stylesheet" />
<script type="text/javascript">
function focused(n) {
	switch(n) {
		case 1: document.getElementById("signupHinter").value="Enter your first name, middle initial and last name here.";
				break;
		case 2: document.getElementById("signupHinter").value="Enter your user name here. You'll use this username to login.";
				break;
		case 3: document.getElementById("signupHinter").value="Enter your station name here.";
				break;
		case 4: document.getElementById("signupHinter").value="For verification purposes, enter a valid email address here.";
				break;	
	}
}

function blurry() {
	document.getElementById("signupHinter").value="";	
}
</script>
<div class="container">
<div id="headerText">
	Create Manager Account
</div>
<form class="Adjusted" style="height: 180px; width: 560px;" action="manager_register.php" method="post">
<table>
<tr><td>
	Name:
</td><td>
	<input name="fName" type="text" class="tBox" maxlength="15"  onfocus="focused(1)" onblur="blurry()"/>
	<input type="text" class="tBox" maxlength="1" style="width: 20px;" name="mInit" onfocus="focused(1)" onblur="blurry()"/>
	<input type="text" class="tBox" maxlength="25" name="lName" onfocus="focused(1)" onblur="blurry()"/>
</td></tr><tr><td>
	User Name:
</td><td>
	<input type="text" class="tBox" name="uName" style="width: 440px;" onfocus="focused(2)" onblur="blurry()"/>
</td></tr><tr><td>
	Job Title:
</td><td>
	<select name="jTitle" class="tBox" style="width: 445px; background: #FFF;">
    	<option value="Firefighter">Captain</option>
        <option value="Firefighter">Deputy</option>
        <option value="Firefighter">Firefighter</option>
    </select>
</td></tr><tr><td>
<!--	Station Name:
</td><td>
	<input type="text" class="tBox" name="sName" style="width: 440px;" onfocus="focused(3)" onblur="blurry()"/>-->
</td></tr><tr><td>
	Email:
</td><td>
	<input type="text" class="tBox" name="eMail" style="width: 440px;" onfocus="focused(4)" onblur="blurry()"/>
</td></tr></table>
<input type="submit" class="bigButton" value="Sign up!" style="margin-top: 10px; position: absolute; right: 5px;" />
</form>
<textarea rows="2" cols="50" id="signupHinter" disabled="disabled"></textarea>
</div>
</body>
</html>
