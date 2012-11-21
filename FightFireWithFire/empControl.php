<?php include("header.php");

if($_SESSION['mid']!=0)
header("Location: index.php");
include("mysql_include.php");


$q="update employee set regpending=0 where eid='".$_SESSION['eid']."';";
	mysql_query($q);		//setting regpenging to 1
	?>
<script type="text/javascript" src="JS/jquery-1.7.min.js" language="javascript"></script>
<script type="text/javascript" language="javascript">

function processMe(identify) {
	switch(dataBank[identify]) {
		case 0:	document.getElementById(identify).style.backgroundColor = "#C90";
				document.getElementById(identify + 'c').value = "1";
				dataBank[identify]++;
				break;
		case 1:	document.getElementById(identify).style.backgroundColor = "#09C";
				document.getElementById(identify + 'c').value = "2";
				dataBank[identify]++;
				break;
		case 2:	document.getElementById(identify).style.backgroundColor = "#FF2";
				document.getElementById(identify + 'c').value = "3";
				dataBank[identify]++;
				break;
		case 3:	document.getElementById(identify).style.backgroundColor = "#5F5";
				document.getElementById(identify + 'c').value = "0";
				dataBank[identify] -= 3;
				break;
		default:break;
	}
}

function Update(flagstaff) {
	if(flagstaff) {
		for( var i = 0 ; i < 7; i++) {
			for( var j = 0 ; j < 24; j++) {
				var identifier = j + (i * 24);
				if(dataBank[identifier] == 1) {
					document.getElementById(identifier).style.backgroundColor = "#C90";	
					document.getElementById(identifier + 'c').value= "1";
				} else {
					document.getElementById(identifier).style.backgroundColor = "#5F5";
					document.getElementById(identifier + 'c').value= "0";
				}
			}
		}
	} else if(!flagstaff) {
		for( var i = 0 ; i < 7; i++) {
			for( var j = 0 ; j < 24; j++) {
				var identifier = j + (i * 24);
				document.getElementById(identifier).style.backgroundColor = "#5F5";	
				document.getElementById(identifier + 'c').value= "0";
			}
		}
	}
}

$(document).ready(function(){ 
						   Update(1);
						   });

<?php 

//session_start();
echo "var dataBank = new Array();";
//echo "for(var i = 0; i < 168; i++) ";
$q="select * from availability where ecode='".$_SESSION['code']."'";
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
<div id="headerText">Employee Control Panel</div>
<p>
Welcome <?php 

echo $_SESSION['name'];
echo "<br />Employee ID: ".$_SESSION['eid'];
$q="select mid from employee where ecode='".$_SESSION['code']."'";
$res=mysql_query($q);
$row=mysql_fetch_array($res);
echo "<br />Manager ID: ".$row['mid'];
//echo "<br />Session ID : ".session_id();
$q="select mempending from employee where eid='".$_SESSION['eid']."';";
$res=mysql_query($q);
$row=mysql_fetch_array($res);
$val=$row['mempending'];
if($val==1)
echo "<br />Your request is still pending..";
else if($val==2)
echo "<br />Your request has been rejected..";
else if($val==3)
echo "<br />You have been removed from your squad..<br />Please contact your manager..";
?>,</p>

<p>Please ensure that your availability for the next 7 days are updated in the table below. Click the cells to cycle through available values, and click save.
<div style="width: 100%; height: 25px;">
	<div class="dayCell" style="margin-left: 0; width: 170px; padding: 2px 10px; text-align: center;">Available</div>
	<div class="dayCell" style="background-color: #C90; width: 170px; padding: 2px 10px; text-align: center;">Unavailable</div>
	<div class="dayCell" style="background-color: #09C; width: 170px; padding: 2px 10px; text-align: center;">On Duty</div>
	<div class="dayCell" style="background-color: #FF2; width: 165px; padding: 2px 10px; text-align: center;">Approved Leave</div>
</div>
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
<form id="form1" name="form1" method="post" action="availCheck.php">
  <?php
  
	for( $i = 0; $i < 7; $i++) {
		for( $j = 0; $j < 24; $j++) {
				$cell = $j + ($i * 24);
				echo "<input type='hidden' value='0' id='" . $cell . "c' name='d".$i."h" . $j . "' />";
			}
		}
  
  
  //TO CHECK CATEGORY
  $q="select t_rescue,t_driver,t_medic,t_fighter from employee where eid='".$_SESSION['eid']."';";
    $res=mysql_query($q);
  $row=mysql_fetch_array($res);
  
  mysql_close($con);
  ?>
  <div class="box" style="text-align: center;">
  <script type="text/javascript" language="javascript">
	function processChecks() {
		if(document.getElementById("rescueCheckB").checked)
			document.getElementById("rescueCheck").value = 1;
		else
			document.getElementById("rescueCheck").value = 0;
			
		if(document.getElementById("driverCheckB").checked)
			document.getElementById("driverCheck").value = 1;
		else
			document.getElementById("driverCheck").value = 0;
			
		if(document.getElementById("medicCheckB").checked)
			document.getElementById("medicCheck").value = 1;
		else
			document.getElementById("medicCheck").value = 0;
			
		if(document.getElementById("fighterCheckB").checked)
			document.getElementById("fighterCheck").value = 1;
		else
			document.getElementById("fighterCheck").value = 0;
	}
  </script>
  <div id="innerHeaderText" style="text-align: left;">Skills</div>
  Rescue: <input type="checkbox" id="rescueCheckB" <?php if($row['t_rescue']==1) echo "checked='checked' ";?> onclick="processChecks();" />
  <input type="hidden" id="rescueCheck" name="Rescue" value='0'/>
  Driver: <input type="checkbox" id="driverCheckB" <?php if($row['t_driver']==1) echo "checked='checked'"; ?> onclick="processChecks();" />
    <input type="hidden" id="driverCheck" name="Driver" value='1'/>
  <!--Medic:--> <input type="hidden" id="medicCheckB" <?php if($row['t_medic']==1) echo "checked='checked'"; ?> onclick="processChecks();" />
    <input type="hidden" id="medicCheck" name="Medic" value='1'/>
  Fighter: <input type="checkbox" id="fighterCheckB" <?php if($row['t_fighter']==1) echo "checked='checked'";?> onclick="processChecks();" />
    <input type="hidden" id="fighterCheck" name="Fighter" value='0'/>
  <input type="button" value="Clear" onClick="Update(0)"/> <input type="submit" name="Submit" id="takeData" value="Save" /> 
</form>  
</div>
<?php
include("station_viewPerDay.php");
?>
<p>&nbsp;</p>
</div>




</body>
</html>
