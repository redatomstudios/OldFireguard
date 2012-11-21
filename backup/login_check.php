<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LOGIN CHECK</title>
</head>

<body>
<?php
$uname=$_POST['uname'];
$pass=$_POST['pass'];
$con=mysql_connect("localhost","root","");
mysql_select_db("firefighting");

$empman="none";
$unamepresent=0;
$check=0;
$code="";

$query="select uname,ecode,fname,eid from employee";
$res=mysql_query($query);
echo "<br />Check in employee";
while($row=mysql_fetch_array($res))
{
	if($row['uname']==$uname)
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
	echo "<br />Present in employee";
	$query="select * from epassword";
	$res=mysql_query($query);
	
	while($row=mysql_fetch_array($res))						//PROBLEM HERE
	if($row['pass']==$pass)
	{
		echo "<br />Employee password match";
		$empman="employee";
		break;
	}
	if($empman!="employee")
		echo "<br />Wrong Password!!";
	
}

if($empman=="none")
{
	echo "<br />Not Present in employee..Checking manager";
	$unamepresent=0;
$query="select uname,mcode,fname,mid from manager";
$res=mysql_query($query);
while($row=mysql_fetch_array($res))
{
	if($row['uname']==$uname)
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
	echo "<br />Username present in manager";
	$query="select pass from mpassword;";
	$res=mysql_query($query);
	
	while($row=mysql_fetch_array($res))
	if($row['pass']==$pass)
	{
		echo "<br />Manager password match";
		$empman="manager";
		break;
	}
	if($empman!="manager")
		echo "<br />Wrong Password!!";
	
}
}

if($empman=="none")
	echo "<br />Wrong username";
else
{
	session_start();
	$_SESSION['name']=$fname;
	$_SESSION['uname']=$uname;
	if($empman=="manager")
	{
		$_SESSION['mid']=$mid;
		header("Location: manControl.php");
		
	}
     else if($empman=="employee")
	 {
		 $_SESSION['eid']=$eid;
		header("Location: empControl.php");
	 }
}
?>
</body>
</html>