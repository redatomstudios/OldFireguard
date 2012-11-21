<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: FlameGuard ::.</title>
</head>
<?php
session_start();
$sFlag = 0;
$flag=$f=0;
$mid=$_SESSION['mid'];
$sname=$_POST['statName'];
echo "<br />Manager ID: ".$mid."<br />Station Name: ".$sname;
//$mid='4d230';
//$sname='StationX';

include ('mysql_include.php');
$q="select sname from station";
echo "<br />Query: ".$q;
$res=mysql_query($q);
while($row=mysql_fetch_array($res))
if($row['sname']==$sname)
{
	echo "<br />The name is taken u idiot!!";
	$flag=1;
}



$mcode=$_SESSION['code'];

echo "<br />Manager code: ".$mcode;

	echo "<br />flag= ".$flag;
	
if(!($_POST['statName']))
{	$flag=1;
echo "<br />Staion Name not entered!!";
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
				break;
			}
			
		}
		$s=$s.$val;
	}
	
	return $s;
}		//Random function

function search($mcode,$column,$table)
{
	
	$query="select ".$column." from ".$table;
	echo "<br />Query: ".$query;
	$res=mysql_query($query);
	if($res)
	while($row = mysql_fetch_array($res))
	{
		if($row[$column]==$mcode)
				 return 1;
	}	
	return 0;
}


?>
</head>

<body>
<link href="main.css" rel="stylesheet">
<div class="header"></div>
<?php 
//echo (rand()%16);   RANDOM FUNCTION

if($flag==0)
{

		
	$ifmcode=1;
	$ifmid=1;
	//MANAGER CODE SELECTION
	while($ifmcode)
	{
		
		$scode=getRandom(10,16);
		 $ifmcode=search($scode,"scode","station");
	}
	echo "<br />Station Code: ".$scode;
	while($ifmid)
	{
		
		$sid=getRandom(5,16);
		 $ifmid=search($sid,"sid","manager");
	}
	//VALIDATION
	//----------
	
	
	
	//STATION NAME VALIDATION
	
	$nFlag=0;
	if(strlen($sname)>30||strlen($sname)<2)
	{
		$flag=1;
		$nFlag = 1;
	}
	if(!(ctype_alpha($sname[0])))
	{
		$flag=1;
		$nFlag = 1;
	}
	for($i=1;$i<strlen($sname);$i++)
	{
		if(!ctype_alnum($sname[$i]))
		{		 
		if($sname[$i]!=' ') 
		{
		$flag=1;
		$nFlag = 1;
		break;
		}
		}
		
	}
	
	//VALIDATION OVER
	
	
	/* -------------------------- Validation Feedback Interface Start -------------------------- */
	if($nFlag) {
		echo "<div style='position: absolute; left: 0; top: 0; right: 0; bottom: 0; margin: auto; height: 120px; width: 400px; border: solid 10px #CCf; border-radius: 15px; box-shadow: inset 0 1px 15px #777; padding: 50px 15px; font-weight: bold; font-size: 14px; font-family:Verdana, Geneva, sans-serif;'>
		Registration failed. The following errors need to be corrected:
		<ul>
		";
		
	
			echo "<li>Name contains invalid characters</li>";
		
			echo "</ul><center><a href='index.php' onclick='history.back(); return false;' style='position: relative; float: none; display: block; margin-top: 20px;'><img src='Images/Back.png' /></a></center>
		</div>";
	}
	
	/* --------------------------- Validation Feedback Interface End --------------------------- */
	
	if(!$flag)
	{
	//mail("albinin000@gmail.com", "Firefighting test mail", $pass,  "From:".$email);
	
	
	$query="insert into station values('".$sid."','".$scode."','".$sname."','".$mcode."','0');";
	
	$_SESSION['scode']=$scode;
	mysql_query($query);
	$query="update manager set scode='".$scode."' where mid='".$mid."';";
	
	mysql_query($query);
	mysql_close($con);
		
	}
}		//IF FLAG SET
header("Location: manControl.php");
?>
</body>
</html>