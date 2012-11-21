<?php
echo "Employee request approval";
$app=$_GET['approve'];
$eid=$_GET['eid'];
echo "<br />Approve:".$app."<br />Emp ID : ".$eid."<br />blaah";
if($app=='y')
	$a=0;
else
	$a=2;
include ('mysql_include.php');
$q="update employee set mempending=".$a." where eid='".$eid."';";
mysql_query($q);
mysql_close($con);
header("Location: manControl.php");
?>
