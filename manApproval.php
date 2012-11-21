<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
//$mid=$_POST['mId'];
$mid="81674";
mysql_connect("localhost","root","");
mysql_select_db("firefighting");
$q="select eid from employee where mid=".$mid;
$res=mysql_query($q);

if($row=mysql_fetch_array($res))
{
	echo "<br />PENDING APPROVALS";
while($row)
{

	echo "<br /><input type='button' value='".$row['eid']."' id='".$row['eid']."' />";
	$row=mysql_fetch_array($res);
}
}
else
	echo "<br />NO PENDING APPROVALS :)";
$q="update table employee set mempending=0 where mid=".$mid." AND eid=".$eid;

mysql_close($con);
?>
</body>
</html>