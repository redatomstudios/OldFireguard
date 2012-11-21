<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
session_start();
$mcode=$_SESSION['code'];
$sid=$_POST['statID'];
include("mysql_include.php");
$q="select managers from station where sid='".$sid."';";
echo "<br />Query: ".$q;
$res=mysql_query($q);

if($res)
{
	$row=mysql_fetch_array($res);
	$managers=$row['managers'];
	echo "<br />Managers: ".$managers;
	$managers=$managers.$mcode.",";
	$q="select scode from station where sid='".$sid."';";
	echo "<br />Query: ".$q;
	$res=mysql_query($q);
	$row=mysql_fetch_array($res);
	$scode=$row['scode'];
	$q="update station set managers='".$managers."' where scode='".$scode."';";
	echo "<br />Query: ".$q;
	mysql_query($q);
	
	$q="update manager set scode='".$scode."' where mcode='".$mcode."';";
	echo "<br />Query: ".$q;
	mysql_query($q);
	$_SESSION['scode']=$scode;
	mysql_close($con);
	header("Location: manControl.php");



}
else
{
	echo "<br />Invalid Station ID!!!";
}
mysql_close($con);
?>
</body>
</html>