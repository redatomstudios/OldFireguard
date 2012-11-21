<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: FlameGuard ::.</title>
</head>
<?php

$f=1;
	
if($_POST) {
	if(!($_POST['jTitle']&&$_POST['uName']&&$_POST['eMail']&&$_POST['fName']&&$_POST['lName']))
		$f=0;
} else {
	header("Location: index.php");
	echo "Invalid Source. Redirecting...";
}

$uFlag = $nFlag = $sFlag = $eFlag = 0;
$flag=1;
$sname=$_POST['jTitle'];
$uname=$_POST['uName'];
$email=$_POST['eMail'];
$fname=$_POST['fName'];
$minit=$_POST['mInit'];
$lname=$_POST['lName'];
	
if(!$f)
{
	$flag=0;
	echo "
	<div style='position: absolute; left: 0; top: 0; right: 0; bottom: 0; margin: auto; height: 80px; width: 350px; border: solid 10px #CCf; border-radius: 15px; box-shadow: inset 0 1px 15px #777; padding: 50px 15px; text-align: center; font-weight: bold; font-size: 14px; font-family:Verdana, Geneva, sans-serif;'>
Please fill in all required fields.
<a href='index.php' onclick='history.back(); return false;' style='position: relative; float: none; display: block; margin-top: 20px;'><img src='Images/Back.png' /></a>
</div>
	";
}
function getRandom($size,$base)
{
	$s="";
	$val;
	for($i=0;$i<$size;$i++)
	{
		$val=(rand()%($base));
		if($val>9)
		{
			switch($val)
			{
				case 10:
				$val="a";
				break;
				case 11:
				$val="b";
				break;
				case 12:
				$val="c";
				break;
				case 13:
				$val="d";
				break;
				case 14:
				$val="e";
				break;
				case 15:
				$val="f";
				break;
				default:
				//echo "Random value > 15 :(";
				break;
			}
			
		}
		$s=$s.$val;
	}
	//echo "<br>Random generated hex value: ".$s;
	return $s;
}		//Random function

function search($mcode,$column,$table)
{
	include ('mysql_include.php');
	$query="select ".$column." from ".$table;
	$res=mysql_query($query);
	while($row = mysql_fetch_array($res))
	{
		if($row[$column]==$mcode)
				 return 1;
	}	
	mysql_close($con);
	return 0;
}


?>
</head>

<body>
<link href="main.css" rel="stylesheet">
<div class="header">
<img src="Images/FG.png" height="50" style="position: absolute; left: 20px;"  />
<p style="position: absolute; top: 13px; left: 70px; color: #6D0000; font-weight: bold;">FlameGuard</p>

</div>
<?php 
//echo (rand()%16);   RANDOM FUNCTION

if($flag)
{

//echo "<br>Username : ".$uname;
$ifmcode=1;
$ifmid=1;
//echo "<br>Manager Code Selection ";
while($ifmcode)
{
	
	$mcode=getRandom(10,16);
	 $ifmcode=search($mcode,"mcode","manager");
	//echo "<br>Manager code : ".$mcode;
	/*if($ifmcode) {
		echo "<br> Manager code ".$mcode." already present!!";
	} else {	
		echo "<br> Manager code ".$mcode." available!!";
	}*/
}
//echo "<br>Manager ID Selection ";
while($ifmid)
{
	
	$mid=getRandom(5,16);
	 $ifmid=search($mid,"mid","manager");
	//echo "<br><br>Manager ID : ".$mid;
/*	if($ifmcode) {
		echo "<br> Manager ID".$mid." already present!!";
	} else {	
		echo "<br> Manager ID ".$mid." available!!";
	}*/
}
//echo "<br>Password Selection ";
$pass="password";
$pass=getRandom(6,16);
//echo "<br><br>Password : ".$pass;


//VALIDATION
//----------




//USERNAME VALIDATION

//echo "<br>username validation";

if(!(strlen($uname)>=6)&&(strlen($uname)<15))
{
	$uFlag = 1;
	$flag=0;
}
for($i=0;$i<strlen($uname);$i++)
if(!(ctype_alnum($uname[$i])||$uname[$i]!='_'))
{
	$uFlag = 1;
	$flag=0;
}
 $ifuname=search($uname,"uname","manager");
 if($ifuname)
{
	$uFlag = 1;
	$flag=0;
}
else
{
	$ifuname=search($uname,"uname","manager");
	if($ifuname)
	{
		$uFlag = 1;
		$flag=0;
	}
}
if($flag)
//echo "<br>Valid username :)";



//EMAIL VALIDATION

//echo "<br>EMail Verification";
$ifemail=search($email,"email","employee");
if($ifemail)
{
	$flag=0;
	$eFlag = 1;
}
else
{
	$ifemail=search($email,"email","manager");
	if($ifemail)
	{
			$flag=0;
		$eFlag = 1;
	}
}





$i=0;
if($email=="")
 {
	 $eFlag = 1;
	 $flag=0;
 }
if($flag==1&&$email[$i]=='.')
{
	$eFlag = 1;
	$flag=0;
}
for($i=0;$i<strlen($email)&&$email[$i]!='@'&&$flag==1;$i++)
{
	if(!(ctype_alnum($email[$i])||$email[$i]=='.'||$email[$i]=='_'))
	{
		$eFlag = 1;
		$flag=0;
		break;
	}

	
}
if($i==strlen($email)&&$flag==1)
	{
		$eFlag = 1;
		$flag=0;
	
	}
if($i!=strlen($email)&&$flag==1)
{
for($i=$i+1;$i<strlen($email)&&$email[$i]!='.';$i++)
{
	if(!(ctype_alnum($email[$i])))
	{
		$eFlag = 1;
		$flag=0;
		break;
	}
}
if($i==strlen($email)&&$flag==1)
	{
		$eFlag = 1;
		$flag=0;	}

if($i!=strlen($email)&&$flag==1)
for($i=$i+1;$i<strlen($email[$i]);$i++)
{
	if(!(ctype_alnum($email[$i])))
	{
		$eFlag = 1;
		$flag=0;
		break;
	}
}
}
//echo "<br>EMail Verification over";

//FIRST NAME VALIDATION

if(strlen($fname)>15||strlen($fname)<2)
	{
		$flag=0;
		$nFlag = 1;
	}
for($i=0;$i<strlen($fname);$i++)
	if(!(ctype_alpha($fname[$i])))
	{		 
	$flag=0;
	$nFlag = 1;
	break;
	}

//echo "<br>First name validation over";

//LAST NAME VALIDATION

if(strlen($lname)>25)
{
	$nFlag = 1;
	$flag=0;
}
for($i=0;$i<strlen($lname);$i++)
	if(!(ctype_alpha($lname[$i])))
	{		 
		$flag=0;
		$nFlag = 1;
	break;
	}

//echo "<br>Last name validation over";


//SQUAD NAME VALIDATION

if(strlen($sname)>25||strlen($sname)<5)
{
	$flag=0;
	$sFlag = 1;
}
for($i=0;$i<strlen($sname);$i++)
	if(!(ctype_alnum($sname[$i])))
	{		 
	$sFlag = 1;
	$flag=0;
	break;
	}
	
//Middle INITIAL VALIDATION
if(!ctype_alpha($minit)&&$minit!="")
{	
	$nFlag = 1;
	$flag=0;
}


//VALIDATION OVER


/* -------------------------- Validation Feedback Interface Start -------------------------- */
if($uFlag || $nFlag ||  $sFlag || $eFlag) {
	echo "<div style='position: absolute; left: 0; top: 0; right: 0; bottom: 0; margin: auto; height: 120px; width: 400px; border: solid 10px #CCf; border-radius: 15px; box-shadow: inset 0 1px 15px #777; padding: 50px 15px; font-weight: bold; font-size: 14px; font-family:Verdana, Geneva, sans-serif;'>
	Registration failed. The following errors need to be corrected:
	<ul>
	";
	if($uFlag) {
		echo "<li>Username is invalid or already in use</li>";
	}
	if($nFlag) {
		echo "<li>Name contains invalid characters</li>";
	}
	if($sFlag) {
		echo "<li>Squad name may contain invalid characters. Length of squad name must be between 5 and 25 characters</li>";
	}
	if($eFlag) {
		echo "<li>Email address is invalid</li>";
	}
	echo "</ul><center><a href='index.php' onclick='history.back(); return false;' style='position: relative; float: none; display: block; margin-top: 20px;'><img src='Images/Back.png' /></a></center>
	</div>";
}

/* --------------------------- Validation Feedback Interface End --------------------------- */

if($flag)
{
mail($email, "Firefighting test mail", $pass,  "From:".$email);

include ('mysql_include.php');
$query="insert into manager values('".$mcode."','".$sname."','".$uname."','".$mid."','".$email."','".$fname."','".$minit."','".$lname."','0','6','2');";
mysql_query($query);
$sha1=sha1($pass);
$query="insert into mpassword values('".$mcode."','".$sha1."');";
mysql_query($query);

mysql_close($con);
	echo "<div style='position: absolute; left: 0; top: 0; right: 0; bottom: 0; margin: auto; height: 80px; width: 350px; border: solid 10px #CCf; border-radius: 15px; box-shadow: inset 0 1px 15px #777; padding: 50px 15px; text-align: center; font-weight: bold; font-size: 14px; font-family:Verdana, Geneva, sans-serif;'>
Registration Successful! A temprary password has been sent to your email, please use it to confirm your email address.
<a href='index.php' style='position: relative; float: none; display: block; margin-top: 20px;'><img src='Images/Back.png' /></a>
</div>";
}
}		//IF FLAG SET
?>
</body>
</html>