<?php include("header.php");
$eid=$_GET['eid'];
?>
<script type="text/javascript" src="JS/jquery-1.7.min.js" language="javascript"></script>
<script type="text/javascript" language="javascript">

$(document).ready(function(){ 
						   Update();
						   });
function Update() {
	for( var i = 0 ; i < 7; i++) {
			for( var j = 0 ; j < 24; j++) {
				var identifier = j + (i * 24)
				if(dataBank[identifier] == 1) {
					document.getElementById(identifier).style.backgroundColor = "#C90";	
				} else {
					document.getElementById(identifier).style.backgroundColor = "#5F5";
				}
			}
	}
}	
<?php 
$code="";
echo "var dataBank = new Array();";
include("mysql_include.php");

$q="select * from availability where ecode=(select ecode from employee where eid='".$eid."')";
$res=mysql_query($q);
$i=0;
$row=mysql_fetch_array($res);
while($i!=168)
{
	$arr[$i]=$row['d'.(($i/24)-($i%24)/24 ).'h'.$i%24 ];
	$i++;
}
for($i=0;$i<168;$i++)
echo "dataBank[".$i."] = ".$arr[$i].";";
?>
</script>
<link href="ControlPanel.css" rel="stylesheet">
<div class="bodyContainer">
<div id="headerText">Employee Availability Details</div>

<p>
<div class="calBlock">
<div style="text-align: center">Hours</div>
<?php 
$days = array(0 => "Sunday", 1 => "Monday", 2 => "Tuesday", 3 => "Wednesday", 4 => "Thursday", 5 => "Friday", 6 => "Saturday");
	echo "<div class='dayRow'><div class='labelCell'></div>";
	for( $j = 0; $j < 24; $j++) {
			echo "<div class='dayCell' style='background: none; text-align: center;'>" . $j . "</div>";
		}
	echo '</div>';
for( $i = 0; $i < 7; $i++) {
	echo "<div class='dayRow'><div class='labelCell'>" . $days[$i] . "</div>";
	for( $j = 0; $j < 24; $j++) {
			$cell = $j + ($i * 24);
			echo "<div class='dayCell' onclick='processMe(" . $cell . ")' id='" . $cell . "' name='d".$i."h" . $j . "'></div>";
		}
		echo '</div>';
	}
?>
</div>

<p>&nbsp;</p>
</div>
</body>
</html>