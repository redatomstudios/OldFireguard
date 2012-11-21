<?php
session_start();
$mcode=$_SESSION['code'];
$scode=$_SESSION['scode'];
include("mysql_include.php");
$q="update manager set scode='0' where mcode='".$mcode."';";
mysql_query($q);

$q="select owner from station where scode='".$scode."';";
$res=mysql_query($q);
$row=mysql_fetch_array($res);
if($row['owner']==$mcode)
{
	echo "<br />Remove Owner..<br />";
	$owner_removed=1;
}
else
{
	$owner_removed=0;
	echo "<br />Not Owner..<br />";
}



$q="select managers from station where scode='".$scode."';";
echo "<br />Query : ".$q;
$res=mysql_query($q);
$row=mysql_fetch_array($res);
$managers=$row['managers'];
	echo "<br />Managers in the station : ".$managers;
$man="";
for($i=0;$i<strlen($managers);$i++)
{
	if(strlen($man)==10)
	{
			echo "<br />Manager Check: ".$man;
	
		if($man==$mcode)
		{
			echo " TO BE REMOVED!!!";
			echo "<br />Managers: ".$managers;
			$k=$i;
			echo "<br />Length of managers: ".strlen($managers)."\tk=".$k;

			for($j=$i-10;$j<$i+1;$j++,$k++)
			{
				$managers[$j]=' ';
				echo "<br />j=".$j;
				echo " ".$managers[$j];

			}
			echo "<br />".$managers."...";
			$managers=str_replace(" ","",$managers);
			echo "<br />Managers in station after removing...".$managers."xxx";
			break;
		}
		if($owner_removed)
		{
			$q="update manager set scode='1' where mcode='".$man."';";
			echo "<br />Query : ".$q;
			mysql_query($q);
		}
		$man="";
	}
	else
	{
		$man=$man.$managers[$i];
	}
}

if($owner_removed)
{
$q="delete from station where scode='".$scode."'";
echo "<br />Query : ".$q;
mysql_query($q);
}
else
{
	$q="update station set managers='".$managers."' where scode='".$scode."'";
	echo "<br />Query : ".$q;
	mysql_query($q);
}
mysql_close($con);
$_SESSION['scode']=0;

header("Location: manControl.php");
?>