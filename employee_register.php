<html>
<head>
<title>Manager register</title>

<?php
$jtitle=$_POST['jTitle'];
$uname=$_POST['uName'];  
$email=$_POST['eMail'];	
$fname=$_POST['fName'];	
$minit=$_POST['mInit'];
$lname=$_POST['lName']; 
$mid=$_POST['mId']; 

$flag=1;		//CHECKS IF VALID DATA ADDED

//CHECK IF MANAGER ID PRESENT IN DATABASE
$mcode="";
$con=mysql_connect("localhost","root","");
mysql_select_db("firefighting",$con);
$query="Select mid,mcode from manager where mid = '".$mid."';";
$res=mysql_query($query);
while($row=mysql_fetch_array($res))
	if($row['mid']==$mid)
		$mcode=$row['mcode'];
if($mcode=="")
{	echo "<br>NO manager found with dis code<br><br>";
$flag=0;
}
else
 echo "<br>Manager found with id: ".$mid."<br>Manager code : ".$mcode;

//MANAGER CHECK OVER

function getRandom($size,$base)				//RANDOM HEX VALUE GENERATION FUNCTION
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

function search($mcode,$column)					//SEARCH VALUES IN DATABASE FUNCTION
{
	$con=mysql_connect("localhost","root","");
	mysql_select_db("firefighting");
	$query="select ".$column." from employee";
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
if($flag==1)
{
echo "<br>Username : ".$uname;
$ifecode=1;
$ifeid=1;
echo "<br>Employee Code Selection ";
while($ifecode)
{
	
	$ecode=getRandom(10,16);
	 $ifecode=search($ecode,"ecode");
	echo "<br>Employee code : ".$ecode;
	if($ifecode)
		echo "<br> Employee code ".$ecode." already present!!";
	else
	{	echo "<br> Employee code ".$ecode." available!!";
	}
}
echo "<br>Employee ID Selection ";
while($ifeid)
{
	
	$eid=getRandom(5,16);
	 $ifeid=search($eid,"eid");
	echo "<br><br>Employee ID : ".$eid;
	if($ifeid)
		echo "<br> Employee ID".$eid." already present!!";
	else
	{	echo "<br> Employee ID ".$eid." available!!";
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


//jOB TITLE VALIDATION

if(strlen($jtitle)>25||strlen($jtitle)<5)
{
	$flag=0;
	echo "<br>Job Title size(".strlen($jtitle).") not allowed";
}
for($i=0;$i<strlen($jtitle);$i++)
	if((!(ctype_alnum($jtitle[$i])))||($jtitle[$i]==' '))
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

$regpending=1;
$mempending=1;
echo "<br><br>TITLE : ".$jtitle."<br>MANAGER CODE : ".$mcode."<br>EMPLOYEE CODE : ".$ecode."<br>EMPLOYEE ID : ".$eid."<br>F NAME ".$fname."<br>M INIT".$minit."<br>L NAME ".$lname."<br>EMAIL ".$email."<br>USERNAME ".$uname."<br>REGISTRATION PENGING ".$regpending."<br>MEMBERSHIP PENDING ".$mempending."<br>MANAGER ID ".$mid."<br>";
if($flag)
{
	
	
	
	echo "<br>Manager ID:".$mid;
mail($email, "Firefighting test mail", $pass,  "From:".$email);
$con=mysql_connect("localhost","root","");
mysql_select_db("firefighting",$con);
$query="insert into employee values('".$jtitle."','".$mcode."','".$ecode."','".$eid."','".$fname."','".$minit."','".$lname."','".$email."','".$uname."',".$regpending.",".$mempending.",'".$mid."');";
mysql_query($query);
$query="insert into epassword values('".$ecode."','".$pass."');";
mysql_query($query);
mysql_close($con);
}
}		//IF FLAG EQUALS 1
?>
</body>
</html>