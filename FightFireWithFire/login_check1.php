<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: FlameGuard ::.</title>
</head>

<body>
<?php


	$uname=$_POST['uname'];
	
	$pass=$_POST['pass'];
	$sha1=sha1($pass);
	//echo $sha1."<br />";
	include ('mysql_include.php');
	include ('Libraries.php');
	$code = lCheck($uname , $sha1,"MANAGER");
	//echo "<br>mid = $mid";
	$empman="temp";
	if($code!=0)
	{
		echo "<br />Correct Password<br /> MCODE is $code";
		$empman = "manager";
	}
	else		//Check in employee
	{
		
		$code = lCheck($uname , $sha1,"EMPLOYEE");
		if($code == 0)
		{
			echo "<br>Wrong Username or Password";
			echo "<br />Code : $code";
			echo "
		<div style='position: absolute; left: 0; top: 0; right: 0; bottom: 0; margin: auto; height: 80px; width: 350px; border: solid 10px #CCf; border-radius: 15px; box-shadow: inset 0 1px 15px #777; padding: 50px 15px; text-align: center; font-weight: bold; font-size: 14px; font-family:Verdana, Geneva, sans-serif;'>
Login failed due to incorrect username or password!
<a href='index.php' onclick='history.back(); return false;' style='position: relative; float: none; display: block; margin-top: 20px;'><img src='Images/Back.png' /></a>
</div>
		";
		}
		else
		{
			
			echo "<br />Correct Password<br /> ECODE is $mid";
			$empman = "employee";
		}
		
	}
	
	
	if($empman=="manager")
	{
		$_SESSION['eid']=0;
		header("Location: manControl.php");
	}
	else if($empman=="employee")
	{
		$_SESSION['mid']=0;
		header("Location: empControl.php");
	}
?>
</body>
</html>