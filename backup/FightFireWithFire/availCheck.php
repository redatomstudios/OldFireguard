<?php
$i=0;

session_start();
include ('mysql_include.php');

$res=$dri=$fig=$med=0;



$res=$_POST['Rescue'];
$dri=$_POST['Driver'];
$med=$_POST['Medic'];
$fig=$_POST['Fighter'];

$q="update employee set t_rescue=".$res.",t_driver=".$dri.",t_medic=".$med.",t_fighter=".$fig." where eid='".$_SESSION['eid']."';";
echo "$q";
mysql_query($q);
$q="update availability set";
for($i=0;$i<167;$i++)
{
	$q=$q." d".(($i/24)-($i%24)/24 )."h".($i%24)."=";
	if($_POST['d'.(($i/24)-($i%24)/24 ).'h'.($i%24)]==1)
	{
		$var=1;
	}
	else if($_POST['d'.(($i/24)-($i%24)/24 ).'h'.($i%24)]==0)
	{
		$var=0;
	}
	else if($_POST['d'.(($i/24)-($i%24)/24 ).'h'.($i%24)]==2)
	{
		$var=2;
	}
	else if($_POST['d'.(($i/24)-($i%24)/24 ).'h'.($i%24)]==3)
	{
		$var=3;
	}
	$q=$q.$var." ,";
}
$q=$q."d".(($i/24)-($i%24)/24 )."h".($i%24)."=";
	if($_POST['d'.(($i/24)-($i%24)/24 ).'h'.($i%24)]==1)
	{
		$var=1;
	}
	else if($_POST['d'.(($i/24)-($i%24)/24 ).'h'.($i%24)]==0)
	{
		$var=0;
	}
	else if($_POST['d'.(($i/24)-($i%24)/24 ).'h'.($i%24)]==2)
	{
		$var=2;
	}
	else if($_POST['d'.(($i/24)-($i%24)/24 ).'h'.($i%24)]==3)
	{
		$var=3;
	}
	
	
	$q=$q.$var." where ecode='".$_SESSION['code']."';";

	echo "<br />$q";
	mysql_query($q);
	mysql_close($con);
	//header("Location: empControl.php");
	?>