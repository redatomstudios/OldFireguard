<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Squad Management System : FlameGuard : Home</title>
<link href="CSS/main.css" rel="stylesheet" type="text/css" />
<link href="CSS/index.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div class="header">
	<form id="form1" style="position: absolute; right: 180px; top: 17px; height: 30px; " action="login_check1.php" method="post">
    	<input type="text" class="tBox" style="width: 150px;"  name="uname"/>
        <input type="password" class="tBox" style="width: 150px;" name="pass"/>
    </form>
    <div class="textHint">Password</div>
    <div class="textHint" style="right: 430px;">Username</div>
    <img src="Images/lin.png" style="position: absolute; right: 70px; top: 21px; cursor: pointer;" onclick="document.getElementById('form1').submit()"/>
</div>

<div class="bodyContainer">
<a href="signup.php"><img src="Images/sUp.png" style="cursor: pointer; position: absolute; right: 355px; bottom: 105px;"/></a>
</div>

</body>
</html>