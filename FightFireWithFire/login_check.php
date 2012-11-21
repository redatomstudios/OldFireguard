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
include ('mysql_include.php');


$empman="none";
$unamepresent=0;
$check=0;
$code="";

$query="SELECT UNAME,ECODE,FNAME,EID,ECODE FROM EMPLOYEE";
$res=mysql_query($query);
while($row=mysql_fetch_array($res))
{
	if(strcasecmp($row['uname'],$uname)==0)
	{
		$unamepresent=1;
		$eid=$row['eid'];
		$fname=$row['fname'];
		$code=$row['ecode'];
		break;
	}
}
if($unamepresent)
{
	$query="select * from epassword";
	$res=mysql_query($query);
	
	while($row=mysql_fetch_array($res))						
	if($row['pass']==$sha1)
	{
		$empman="employee";
		break;
	}
	if($empman!="employee") {
		echo "
		<div style='position: absolute; left: 0; top: 0; right: 0; bottom: 0; margin: auto; height: 80px; width: 350px; border: solid 10px #CCf; border-radius: 15px; box-shadow: inset 0 1px 15px #777; padding: 50px 15px; text-align: center; font-weight: bold; font-size: 14px; font-family:Verdana, Geneva, sans-serif;'>
Login failed due to incorrect username or password!
<a href='index.php' onclick='history.back(); return false;' style='position: relative; float: none; display: block; margin-top: 20px;'><img src='Images/Back.png' /></a>
</div>
		";
	}
	
}

if($empman=="none")
{
	$unamepresent=0;
$query="select uname,mcode,fname,mid from manager";
$res=mysql_query($query);
while($row=mysql_fetch_array($res))
{
	if(strcasecmp($row['uname'],$uname)==0)
	{
		$unamepresent=1;
		$mid=$row['mid'];
		$fname=$row['fname'];
		$code=$row['mcode'];
		break;
	}
}
if($unamepresent)
{
	$query="select pass from mpassword;";
	$res=mysql_query($query);
	
	while($row=mysql_fetch_array($res))
	if($row['pass']==$sha1)
	{
		$empman="manager";
		break;
	}
	if($empman!="manager") {
		echo "
		<div style='position: absolute; left: 0; top: 0; right: 0; bottom: 0; margin: auto; height: 80px; width: 350px; border: solid 10px #CCf; border-radius: 15px; box-shadow: inset 0 1px 15px #777; padding: 50px 15px; text-align: center; font-weight: bold; font-size: 14px; font-family:Verdana, Geneva, sans-serif;'>
Login failed due to incorrect username or password!
<a href='index.php' onclick='history.back(); return false;' style='position: relative; float: none; display: block; margin-top: 20px;'><img src='Images/Back.png' /></a>
</div>
		";
	}
	
}
}

if($empman=="none") {
		echo "
		<div style='position: absolute; left: 0; top: 0; right: 0; bottom: 0; margin: auto; height: 80px; width: 350px; border: solid 10px #CCf; border-radius: 15px; box-shadow: inset 0 1px 15px #777; padding: 50px 15px; text-align: center; font-weight: bold; font-size: 14px; font-family:Verdana, Geneva, sans-serif;'>
Login failed due to incorrect username or password!
<a href='index.php' onclick='history.back(); return false;' style='position: relative; float: none; display: block; margin-top: 20px;'><img src='Images/Back.png' /></a>
</div>
		";
}
else
{
	session_start();
	$_SESSION['name']=$fname;
	$_SESSION['uname']=$uname;

	if($empman=="manager")
	{
		$q="select scode from manager where mcode='".$code."'";
		$res=mysql_query($q);
		if($res)
		{
			$row=mysql_fetch_array($res);
			$_SESSION['scode']=$row['scode'];
		}
		else
		$_SESSION['scode']=0;
	
		$_SESSION['mid']=$mid;
		$_SESSION['eid']=0;
		$_SESSION['code']=$code;
		
				header("Location: manControl.php");
	}
     else if($empman=="employee")
	 {
		 $_SESSION['eid']=$eid;
		 $_SESSION['mid']=0;
		 	$_SESSION['code']=$ecode;
		header("Location: empControl.php");
	 }
}
?>
</body>
</html>