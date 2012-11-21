<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: FlameGuard ::.</title>
</head>
<body>
<link href="main.css" rel="stylesheet">
<script type="text/javascript" language="javascript" src="JS/jquery-1.7.min.js"></script>
<script type="text/javascript" language="javascript" src="JS/h2o.js"></script>
<div class="header">
<img src="Images/FG.png" height="50" style="position: absolute; left: 20px;"  />
<p style="position: absolute; top: 13px; left: 70px; color: #6D0000; font-weight: bold;">FlameGuard</p>
<?php 
session_start();
if(isset($_SESSION['uname']))
 echo "<a href='logout.php'><img src='Images/lOut.png' style='position: absolute; right: 30px; top: 23px; cursor: pointer;' /></a>";
else
header("Location: index.php");
?>

</div>