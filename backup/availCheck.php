<?php
$i=0;

$q="update availability set ";
for($i=0;$i<167;$i++)
{
	$q=$q."d".(($i/24)-($i%24)/24 )."h".($i%24)."=";
	if(isset($_POST['d'.(($i/24)-($i%24)/24 ).'h'.($i%24)]))
	{
		echo "<br />d". (($i/24)-($i%24)/24)."h".$i%24 ." SET";
		$var=1;
	}
	else
	{
		echo "<br />d". (($i/24)-($i%24)/24)."h".$i%24 ." NOT SET";
		$var=0;
	}
	$q=$q.$var.",";
}
$q=$q."d".(($i/24)-($i%24)/24 )."h".($i%24)."=";
	if(isset($_POST['d'.(($i/24)-($i%24)/24 ).'h'.($i%24)]))
	{
		echo "<br />d". (($i/24)-($i%24)/24)."h".$i%24 ." SET";
		$var=1;
	}
	else
	{
		echo "<br />d". (($i/24)-($i%24)/24)."h".$i%24 ." NOT SET";
		$var=0;
	}
	$q=$q.$var." where eid='".$_SESSION['eid']."';";
	
	echo "<br />Query : ".$q;


?>