<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
echo "Employee request approval";
$app=$_GET['approve'];
$eid=$_GET['eid'];
echo "<br />Approve:".$app."<br />Emp ID : ".$eid."<br />blaah";
if($app=='y')
	$a=0;
else
	$a=2;
$con=mysql_connect("localhost","root","");
mysql_select_db("firefighting");
$q="update employee set mempending=".$a." where eid='".$eid."';";
mysql_query($q);
mysql_close($con);
header("Location: manControl.php");
?>
</body>
</html>