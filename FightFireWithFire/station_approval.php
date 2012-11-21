<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
echo "Manager station request approval";
$app=$_GET['approve'];
$eid=$_GET['mid'];
$sid=$_GET['sid'];
echo "<br />Approve:".$app."<br />Emp ID : ".$eid."<br />blaah";
if($app=='y')
	$a=0;
else
	$a=2;
include ('mysql_include.php');
$q="select managers from station where sid='".$sid."';";
$res=mysql_query($q);
$row=mysql_fetch_array($res);
$managers=$row['managers'];
if($managers=='0')
$managers=$mid;
else
$managers=$managers.','.$mid;

$q="update station set managers='".$managers."' where sid='".$sid."';";
mysql_query($q);
mysql_close($con);
header("Location: manControl.php");
?>
</body>
</html>