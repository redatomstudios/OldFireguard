<html>
<head>
<title>Employee register</title>
<?php
$mCodeFlag = $jtFlag = $uFlag = $nFlag = $eFlag = 0;
$flag=1;		$f=1;
/*if(!($_POST['jTitle']&&$_POST['uName']&&$_POST['eMail']&&$_POST['fName']&&$_POST['lName']&&$_POST['mId']))
	$f=0;*/
if($_POST) {
	if(!($_POST['jTitle']&&$_POST['uName']&&$_POST['eMail']&&$_POST['fName']&&$_POST['lName']&&$_POST['mId']))
		$f=0;
} else {
	header("Location: index.php");
	echo "Invalid Source. Redirecting...";
	}
	
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
$jtitle=$_POST['jTitle'];
$uname=$_POST['uName'];  
$email=$_POST['eMail'];	
$fname=$_POST['fName'];	
$minit=$_POST['mInit'];
$lname=$_POST['lName']; 
$mid=$_POST['mId']; 
$mcode="";
include ('mysql_include.php');
$query="Select mid,mcode from manager where mid = '".$mid."';";
$res=mysql_query($query);
while($row=mysql_fetch_array($res))
	if($row['mid']==$mid)
		$mcode=$row['mcode'];
if($mcode=="")
{		echo "
	<div style='position: absolute; left: 0; top: 0; right: 0; bottom: 0; margin: auto; height: 80px; width: 350px; border: solid 10px #CCf; border-radius: 15px; box-shadow: inset 0 1px 15px #777; padding: 50px 15px; text-align: center; font-weight: bold; font-size: 14px; font-family:Verdana, Geneva, sans-serif;'>
The manager ID entered is invalid.
<a href='index.php' onclick='history.back(); return false;' style='position: relative; float: none; display: block; margin-top: 20px;'><img src='Images/Back.png' /></a>
</div>
	";
$mCodeFlag = 1;
$flag=0;
}
function getRandom($size,$base)				{
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
}		
function search($mcode,$column,$table)					{
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
<?php 
if($flag==1)
{
$ifecode=1;
$ifeid=1;
while($ifecode)
{
	
	$ecode=getRandom(10,16);
	 $ifecode=search($ecode,"ecode","employee");
	}
while($ifeid)
{
	
	$eid=getRandom(5,16);
	 $ifeid=search($eid,"eid","employee");
		}
$pass="password";
$pass=getRandom(6,16);
	
	if(!(strlen($uname)>=6)&&(strlen($uname)<=15))
{
		$flag=0;
	$uFlag = 1;
}
	if(!(ctype_alnum($uname)))
	{
		$symCount = 0;
		$uscCount = 0;
		for($i=0;$i<strlen($uname);$i++) {
			if($uname[$i]=='_')
				$uscCount++;
			if(!(ctype_alnum($uname[$i])))
				$symCount++;
		}
		if($uscCount == $symCount) {
					} else {
						$uFlag = 1;
			$flag=0;
		}
	}
$ifuname=search($uname,"uname","employee");
if($ifuname)
{
	$flag=0;
	$uFlag = 1;
}
else
{
	$ifuname=search($uname,"uname","manager");
	if($ifuname)
	{
			$flag=0;
		$uFlag = 1;
	}
}


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

//	EMAIL VALIDATION
$i=0;
if($email=="")
 {
 $flag=0;
 $eFlag = 1;
 }
if($email[$i]=='.')
{
	$flag=0;
	$eFlag = 1;
}
for($i=0;$i<strlen($email)&&$email[$i]!='@';$i++)
{
	if(!(ctype_alnum($email[$i])||$email[$i]=='.'||$email[$i]=='_'))
	{
		$flag=0;
		$eFlag = 1;
		break;
	}
		
}
if($i==strlen($email)/*&&$flag==1*/)
	{
				$flag=0;
		$eFlag = 1;
	}
if($i!=strlen($email)/*&&$flag==1*/)
{
for($i=$i+1;$i<strlen($email)&&$email[$i]!='.';$i++)
{
	if(!(ctype_alnum($email[$i])))
	{
			$flag=0;
		$eFlag = 1;
		break;
	}
}
if($i==strlen($email)/*&&$flag==1*/)
	{
				$eFlag = 1;
		$flag=0;	}
		if($i!=strlen($email)/*&&$flag==1*/)
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
	if(strlen($lname)>25)
{
			$flag=0;
		$nFlag = 1;
}
for($i=0;$i<strlen($lname);$i++)
	if(!(ctype_alpha($lname[$i])))
	{		 
		$flag=0;
		$nFlag = 1;
		break;
	}
	if(strlen($jtitle)>25||strlen($jtitle)<2)
{
	$flag=0;
	$jtFlag = 1;
}
for($i=0;$i<strlen($jtitle);$i++)
	if((!(ctype_alnum($jtitle[$i])))||($jtitle[$i]==' '))
	{		 
		$flag=0;
	$jtFlag = 1;
	break;
	}
if(!ctype_alpha($minit)&&$minit!="")
{	$flag=0;
	$nFlag = 1;
}
$regpending=1;
$mempending=1;
if($mCodeFlag || $jtFlag ||  $uFlag || $nFlag || $eFlag) {
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
	if($mCodeFlag) {
		echo "<li>The entered manager ID doesn't exist or is invalid</li>";
	}
	if($jtFlag) {
		echo "<li>Job Title contains invalid characters. Length should be more than 2 characters and less than 25 characters</li>";
	}
	if($eFlag) {
		echo "<li>Email address is invalid</li>";
	}
	echo "</ul><center><a href='index.php' onclick='history.back(); return false;' style='position: relative; float: none; display: block; margin-top: 20px;'><img src='Images/Back.png' /></a></center>
	</div>";
}
if($flag)
{
		mail($email, "Firefighting test mail", $pass,  "From:".$email);
	include ('mysql_include.php');
	$query="insert into employee values('".$jtitle."','".$mcode."','".$ecode."','".$eid."','".$fname."','".$minit."','".$lname."','".$email."','".$uname."',".$regpending.",".$mempending.",'".$mid."','0','0','0','0');";
	$res=mysql_query($query);
	if($res) {
		$sha1=sha1($pass);
		$query="insert into epassword values('".$ecode."','".$sha1."');";
		mysql_query($query);
		$q="insert into availability values ('".$ecode."',";
		for($i=0;$i<167;$i++)
		{
			$q=$q."0,";
		}
		$q=$q."0);";
		mysql_query($q);
		echo "<div style='position: absolute; left: 0; top: 0; right: 0; bottom: 0; margin: auto; height: 80px; width: 350px; border: solid 10px #CCf; border-radius: 15px; box-shadow: inset 0 1px 15px #777; padding: 50px 15px; text-align: center; font-weight: bold; font-size: 14px; font-family:Verdana, Geneva, sans-serif;'>
		Registration Successful! A temprary password has been sent to you, please use it to confirm your email address.
		<a href='index.php' return false;' style='position: relative; float: none; display: block; margin-top: 20px;'><img src='Images/Back.png' /></a></div>";
	}
	mysql_close($con);
}
} 
?>
</body>
</html>