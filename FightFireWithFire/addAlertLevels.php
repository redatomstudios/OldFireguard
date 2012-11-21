<?php
session_start();
$malert=$_POST['memAlertLevel'];
$ralert=$_POST['resAlertLevel'];
include("mysql_include.php");
$q="update manager set mem_alert='".$malert."' , res_alert='".$ralert."' where mid='".$_SESSION['mid']."'";
echo "<br />Query: ".$q;
mysql_query($q);
mysql_close($con);
header("Location: manControl.php");

?>