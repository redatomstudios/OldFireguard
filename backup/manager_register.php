<html>
<head>
<title>Manager register</title>

<?php
$flag=1;
$sname=$_POST['sName'];
$uname=$_POST['uName'];
$email=$_POST['eMail'];
$fname=$_POST['fName'];
$minit=$_POST['mInit'];
$lname=$_POST['lName'];

$f=1;
if(!($_POST['sName']&&$_POST['uName']&&$_POST['eMail']&&$_POST['fName']&&$_POST['lName']&&$_POST['mId']))
	$f=0;
	
if(!$f)
{
	$flag=0;
	echo "<br>All mandatory values not set";
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
				echo "Random value > 15 :(";
				break;
			}
			
		}
		$s=$s.$val;
	}
	echo "<br>Random generated hex value: ".$s;
	return $s;
}		//Random function

function search($mcode,$column,$table)
{
	$con=mysql_connect("localhost","root","");
	mysql_select_db("firefighting");
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
<?php 
//echo (rand()%16);   RANDOM FUNCTION

if($flag)
{

echo "<br>Username : ".$uname;
$ifmcode=1;
$ifmid=1;
echo "<br>Manager Code Selection ";
while($ifmcode)
{
	
	$mcode=getRandom(10,16);
	 $ifmcode=search($mcode,"mcode","manager");
	echo "<br>Manager code : ".$mcode;
	if($ifmcode)
		echo "<br> Manager code ".$mcode." already present!!";
	else
	{	echo "<br> Manager code ".$mcode." available!!";
	}
}
echo "<br>Manager ID Selection ";
while($ifmid)
{
	
	$mid=getRandom(5,16);
	 $ifmid=search($mid,"mid","manager");
	echo "<br><br>Manager ID : ".$mid;
	if($ifmcode)
		echo "<br> Manager ID".$mid." already present!!";
	else
	{	echo "<br> Manager ID ".$mid." available!!";
	}
}
echo "<br>Password Selection ";
$pass="password";
$pass=getRandom(6,16);
echo "<br><br>Password : ".$pass;


//VALIDATION
//----------




//USERNAME VALIDATION

echo "<br>username validation";

if(!(strlen($uname)>6)&&(strlen($uname)<15))
{
	echo "<br>Username should be greater than 6 and less than 15";
	$flag=0;
}
for($i=0;$i<strlen($uname);$i++)
if(!(ctype_alnum($uname[$i])||$uname[$i]!='_'))
{
	echo "<br>not alnum!!";
	$flag=0;
}
 $ifuname=search($uname,"uname","manager");
 if($ifuname)
{
	echo "<br>Username already used!!";
	$flag=0;
}
else
{
	$ifuname=search($uname,"uname","manager");
	if($ifuname)
	{
		echo "<br>Username already used!!";
		$flag=0;
	}
}
if($flag)
echo "<br>Valid username :)";

echo "<br>FLAG = ".$flag;


//EMAIL VALIDATION

echo "<br>EMail Verification";


$i=0;
if($email=="")
 {echo "<br>Email not entered";
 $flag=0;
 }
if($flag==1&&$email[$i]=='.')
{
	echo "<br>cant start with a .";
	$flag=0;
}
for($i=0;$i<strlen($email)&&$email[$i]!='@'&&$flag==1;$i++)
{
	echo "<br>".$email[$i];
	if(!(ctype_alnum($email[$i])||$email[$i]=='.'||$email[$i]=='_'))
	{
		echo "Special chars not allowed";
		$flag=0;
		break;
	}

	
}
if($i==strlen($email)&&$flag==1)
	{
		echo "<br>Error : @ missing";
		$flag=0;
	
	}
if($i!=strlen($email)&&$flag==1)
{
for($i=$i+1;$i<strlen($email)&&$email[$i]!='.';$i++)
{
	echo "<br>".$email[$i];
	if(!(ctype_alnum($email[$i])))
	{
		echo "Special chars not allowed";
		$flag=0;
		break;
	}
}
if($i==strlen($email)&&$flag==1)
	{
		echo "<br>Error : . missing";
		$flag=0;	}

if($i!=strlen($email)&&$flag==1)
for($i=$i+1;$i<strlen($email[$i]);$i++)
{
	if(!(ctype_alnum($email[$i])))
	{
		echo "Special chars not allowed";
		$flag=0;
		break;
	}
}
}
echo "<br>FLAG = ".$flag;
echo "<br>EMail Verification over";
//EMAIL VALIDATION OVER

//FIRST NAME VALIDATION

if(strlen($fname)>15||strlen($fname)<2)
	{
		$flag=0;
		echo "<br>Check firstname size";
	}
for($i=0;$i<strlen($fname);$i++)
	if(!(ctype_alpha($fname[$i])))
	{		 
	$flag=0;
	echo "<br>First name is not all alphabet!!";
	break;
	}

echo "<br>FLAG = ".$flag;
echo "<br>First name validation over";

//LAST NAME VALIDATION

if(strlen($lname)>25)
{
	echo "<br>Last name size = ".strlen($lname);
		$flag=0;
	echo "<br>Check lastname size";
}
for($i=0;$i<strlen($lname);$i++)
	if(!(ctype_alpha($lname[$i])))
	{		 
		$flag=0;
	echo "<br>Last name is not all alphabet!!";
	break;
	}

echo "<br>FLAG = ".$flag;
echo "<br>Last name validation over";


//SQUAD NAME VALIDATION

if(strlen($sname)>25||strlen($sname)<5)
{
	$flag=0;
	echo "<br>Job Title size(".strlen($sname).") not allowed";
}
for($i=0;$i<strlen($sname);$i++)
	if(!(ctype_alnum($sname[$i])))
	{		 
	echo "<br>Squad name is not all alphanmeric!!";
	$flag=0;
	break;
	}
echo "<br>FLAG = ".$flag;
//Middle INITIAL VALIDATION
if(!ctype_alpha($minit)&&$minit!="")
{	echo "<br>Middle initial not alphabet";
$flag=0;
}
echo "<br>FLAG = ".$flag;


//VALIDATION OVER

mail("albinin000@gmail.com", "Firefighting test mail", $pass,  "From:".$email);

$con=mysql_connect("localhost","root","");
mysql_select_db("firefighting",$con);
$query="insert into manager values('".$mcode."','".$sname."','".$uname."','".$mid."','".$email."','".$fname."','".$minit."','".$lname."');";
mysql_query($query);
$query="insert into mpassword values('".$mcode."','".$pass."');";
mysql_query($query);

mysql_close($con);

}		//IF FLAG SET
?>
</body>
</html>