<?php
ini_set('session.bug_compat_warn', 0);
ini_set('session.bug_compat_42', 0);
include("mysql_include.php");
include("header.php"); 
if($_SESSION['eid']!=0)
	header("Location: index.php");
?>
<link href="ControlPanel.css" rel="stylesheet">
<div class="bodyContainer">
<div id="headerText">Manager Control Panel</div>
<p>
Welcome <?php 
echo $_SESSION['name'].",";
echo "<br />Manager ID: ".$_SESSION['mid'];
if($_SESSION['scode'])
{
	$q="SELECT SNAME,SID FROM STATION WHERE SCODE='".$_SESSION['scode']."';";

	$res=mysql_query($q);
	$row=mysql_fetch_array($res);
	echo "<br />Station Name: ".$row['SNAME'];
	echo "<br />Station ID: ".$row['SID'];
}
?>
</p>
	<?php
	$q="UPDATE EMPLOYEE SET REGPENDING=0 WHERE MID='".$_SESSION['mid']."';";
	mysql_query($q);
    $query="SELECT FNAME,MINIT,LNAME,JOBTITLE,EID FROM EMPLOYEE WHERE MID LIKE '".$_SESSION['mid']."' AND MEMPENDING=1;";
    $res=mysql_query($query);
    if($res && mysql_num_rows($res) != 0)
    { 
			echo "<div class='box' id='empApprove'>
				<div id='innerHeaderText'>Pending Requests</div>
			";
			echo "<p>The following people have requested to join your team.  You can accept or reject their request.</p>";
			
			while($row=mysql_fetch_array($res))
			{
				echo "<div class='empCell'>";
				echo "<table border='0'>";
            	echo "<tr><td width='400px'>";
//            fName mInit. lName, Job Post
				echo $row['FNAME']." ".$row['MINIT']." ".$row['LNAME'].", ".$row['JOBTITLE'];
				echo "</td><td><a href='manApprove.php?eid=".$row['EID']."&amp;approve=y'>";
            	echo "<img src='Images/Approve.png' class='button'/></a>
				<a href='manApprove.php?eid=".$row['EID']."&amp;approve=n'><img src='Images/Reject.png' class='button' action='manApprove.php?eid=".$row['EID']."&amp;approve=n'/> </a>";
            	echo "</td></tr>
            </table>
        </div>";
			}
		echo "</div>";
		}
		?>
       <?php
	   
		$query="select fname,minit,lname,jobtitle,eid,t_driver,t_rescue,t_fighter,t_medic from employee where mid LIKE '".$_SESSION['mid']."' AND mempending=0;";
		
		$res=mysql_query($query);
		if($res && mysql_num_rows($res) != 0)
		{
		echo "<div class='box' id='empList'>
			<div id='innerHeaderText'>Your Team Members</div>
			<table border='0'><tr><td>
				<div class='vertical' style='margin-left: 360px;'>Driver</div>
				<!--<div class='vertical'>Medic</div>-->
				<div class='vertical'>Fighter</div>
				<div class='vertical'>Rescue</div>
			</td></tr></table>
			";
			while($row=mysql_fetch_array($res))
			{
        		echo "<div class='empCell'>
            <table border='0'>
			<tr><td width='360px'>";
			echo $row['fname']." ".$row['minit']." ".$row['lname'].", ".$row['jobtitle'];
			$d=$f=$m=$r='Status2';
			if($row['t_driver']==1)
			$d='Status1';
			if($row['t_medic']==1)
			$m='Status1';
			if($row['t_fighter']==1)
			$f='Status1';
			if($row['t_rescue']==1)
			$r='Status1';
            echo "</td><td align='right'>
            <div class='statusCell' id='" . $d . "'></div>
			<!--div class='statusCell' id='" . $m . "'></div>-->
			<div class='statusCell' id='" . $f . "'></div>
			<div class='statusCell' id='" . $r . "'></div>
			<a href=\"manViewAvail.php?eid=".$row['eid']."\"><img src='Images/Details.png' class='button' style='margin: 6px 5px;' /></a><a href=\"remove.php?eid=".$row['eid'] ."\"><img src=\"Images/Remove.png\" class='button' style='margin: 6px 5px;' /></a>
            </td></tr>
            </table>
        </div>";
			}
		echo "</div>";
		} else {
		
		echo "
			<div class='box' id='empList'>
			<p>You currently have no team members. Please ask your employees to register using your manager ID. Once you've approved a member, their details will appear here.</p>
		";	
			
		}
		?>
        <!-- -->
        <?php include("station_viewPerDay.php"); ?>
	</div>
    
    
 
    
    <div class="footer">
    <?php
	$mid1=$_SESSION['mid'];
    $q="select scode from manager where mid='".$mid1."'";
	
	$res1=mysql_query($q);
//	if($res)
	//{
	$row=mysql_fetch_array($res1);
	$scode1=$row['scode'];
	if($scode1=='0') {
		echo "
			<form>
				<input type='button' class='button' value= 'Create Station' onclick='triggerFunction(1)' />		
				<input type='button' class='button' value= 'Join Station' onclick='triggerFunction(2)' />
			</form>
		";
	} else if($scode1!='1'){
		$_SESSION['scode']=$scode1;
		echo "
			<form>
				<input type='button' class='formButton' value= 'Leave Station' onclick='triggerFunction(3)' />
			</form>
		";
	}
	//}
	else
	echo "The station you joined has been removed by its owner..";
	
        ?>
    </div>
 
    
	<div class="dialog" id="confirmation">
    	Are you sure you want to leave your station? You can request to join another station after leaving.
        <a href="station_leave.php"><img class="button_spaced" id="accept_confirmation_leave" src="Images/Yes.png" /></a><img class="button_spaced" id="decline_confirmation_leave" src="Images/No.png" onclick="decline()" />
    </div>
    <div class="dialog" id="newStation">
    	Station Name: <form method="post" action="station_register.php" >  <input type="text" name="statName" /><input type="submit" class="button_spaced" value="Join" /><input type="button" class="button_spaced" value="Cancel" onclick="decline()"/></form>
    </div>
    <div class="dialog" id="joinStation">
    	Station ID: <form method="post" action="station_join.php">
    	  <input type="text" name="statID" />
    	  <input type="submit" class="button_spaced" value="Create" /><input type="button" class="button_spaced" value="Cancel" onclick="decline()"/></form>
    </div>

</div>
<div id="hider"></div>
<div class="fSpacer"></div>
</body>
</html>