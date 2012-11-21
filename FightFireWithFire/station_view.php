<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$mid='4d230';
//$mid=$_SESSION['mid'];
include ( 'mysql_include.php' );

$q="select scode,mcode from manager where mid='".$mid."';";
$res=mysql_query($q);
$row=mysql_fetch_array($res);
$scode=$row['scode'];
$mcode=$row['mcode'];
//echo "<br />mid: ".$mid."<br />mcode: ".$mcode."scode: ".$row['scode'];
$q="select managers from station where scode='".$scode."';";

$res=mysql_query($q);
$row=mysql_fetch_array($res);
$managers=$row['managers'];

echo "<br />Managers:".$managers;
if($managers=='0')
{
	echo "<br />No other managers in this squad!!";
}

else
{
	
	$man="";
	for($i=0;$i<strlen($managers);$i++)
	{
		
		if($managers[$i]!=',')
		{
			$man=$man.$managers[$i];
			//echo $man;
		}
		else	//separator reached
		{
			echo "<br />Manager code:".$man;
			if($man!=$mcode)
			{
				$q="select mid,fname,minit,lname,title from manager where mcode='".$man."';";
				$res=mysql_query($q);
				$row=mysql_fetch_array($res);
				echo "<br />------------------------------<br />Manager CODE: ".$man ."  Manager ID: ".$row['mid']."<br />Name: ".$row['fname']." ".$row['minit']." ".$row['lname']."  <br /> Title: ".$row['title']."<br />" ;
				$q="select fname,minit,lname,jobtitle from employee where mcode='".$man."';";
				$res=mysql_query($q);
				if($res)
				{
					while($row=mysql_fetch_array($res))
						echo "<br />Employee Name: ".$row['fname']." ".$row['minit']." ".$row['lname']."   Title: ".$row['jobtitle'] ;
				}
			}
			$man="";
		}
	}
}

$q="select owner from station where scode='".$scode."';";
$res=mysql_query($q);
$row=mysql_fetch_array($res);
$man=$row['owner'];
if($man!=$mcode)
			{
				echo "<br /><br /><b>OWNER DETAILS</b>";
				$q="select mid,fname,minit,lname,title from manager where mcode='".$man."';";
				$res=mysql_query($q);
				$row=mysql_fetch_array($res);
				echo "<br /><br />------------------------------------------------<br />Manager CODE: ".$man ."  Manager ID: ".$row['mid']."<br />Name: ".$row['fname']." ".$row['minit']." ".$row['lname']."  <br /> Title: ".$row['title']."<br />" ;
				$q="select fname,minit,lname,jobtitle from employee where mcode='".$man."';";
				$res=mysql_query($q);
				if($res)
				{
					while($row=mysql_fetch_array($res))
						echo "<br />Employee Name: ".$row['fname']." ".$row['minit']." ".$row['lname']."   Title: ".$row['jobtitle'] ;
				}
			}






mysql_close($con);


?>

</body>
</html>