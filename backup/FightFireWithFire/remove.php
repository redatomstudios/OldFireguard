<?php
$q="update employee set mempending=3 where eid='".$_GET['eid']."';";
include ('mysql_include.php');
$res=mysql_query($q);
//if($res)

mysql_close($con);
header("Location: manControl.php");
?>