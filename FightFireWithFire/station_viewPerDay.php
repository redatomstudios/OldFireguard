
<div class="box" style="margin-bottom: 150px;">
<div id="innerHeaderText">Overall Station Availability</div>
Each cell below denotes the number of available members for each hour. Click on the cell to see the names of available members.
<?php

include ( 'mysql_include.php' );
$mid=$_SESSION['mid'];
$eid=$_SESSION['eid'];



$manemp="mem";
if($mid=='0')
{
	//echo "<br />MID: ".$mid;
	$manemp="emp";
	$q="select mid from employee where eid='".$eid."'";
	$res=mysql_query($q);
	$row=mysql_fetch_array($res);
	$mid=$row['mid'];
}


$q="select scode,mcode from manager where mid='".$mid."';";
$res=mysql_query($q);
$row=mysql_fetch_array($res);
$scode=$row['scode'];
$mcode=$row['mcode'];
$q="select managers from station where scode='".$scode."';";
$res=mysql_query($q);
$row=mysql_fetch_array($res);
$managers=$row['managers'];

$ecount1 = 0;
$ecount2 = 0;
$ecount = 0;


echo "
						<script type='text/javascript' language='javascript'>
				                var mDB = new Array();
								var nmDB = new Array();
				                ";
if($managers=='0')
{
	echo "<br />No other managers in this squad!!";
}

else
{
	
	$man="";
	for($i=0;$i<strlen($managers);$i++)
	{
		echo "<br />$managers[$i]";
		if($managers[$i]!=',')
			$man=$man.$managers[$i];
		else 	//SEPARATOR REACHED FOR MANAGERS
		{
//			echo "<br />TEST";
			//echo "<br /><b>Manager code:".$man."</b>";
				
				$q="select fname,lname,eid,ecode from employee where mcode='".$man."';";
				$res=mysql_query($q);
				if($res)
				while($row=mysql_fetch_array($res))
				{
					$name=$row['fname']." ".$row['lname'];
					$eid=$row['eid'];
					//echo "<br />Emp id:".$eid."<br />";
					$q="select * ";
					$q=$q."from availability where ecode='".$row['ecode']."';";
					$res1=mysql_query($q);
					$row1=mysql_fetch_array($res1);
					$ecount = $ecount1 + $ecount2;
					echo "mDB[".$ecount."] = new Array(7);
						  nmDB[".$ecount."] = '".$name."';
						";
					for($d = 0; $d < 7; $d++) { 
							  echo "mDB[".$ecount."][".$d."] = new Array(";
						for($i = 0;$i < 24; $i++)
						{
							echo $row1['d'.$d.'h'.$i];
							if( $i != 23 ) echo ",";
						}
						echo ");
						";
					}
					$ecount1++;
				}
			
			
			$man="";
		}
	}
}

$q="select owner from station where scode='".$scode."';";
$res=mysql_query($q);
$row=mysql_fetch_array($res);
$man=$row['owner'];
//echo "<br /><br /><b><h2>Viewing Owner of the Station..</h2>ManagerCode:".$man."</b>";

	$q="select fname,lname,eid,ecode from employee where mcode='".$man."';";
	$res=mysql_query($q);
	$count=1;
	if($res)
	while( $row = mysql_fetch_array($res) )
	{
		$name=$row['fname']." ".$row['lname'];
		//echo "<br />Employee no:".$count;
		$eid=$row['eid'];
		//echo " Emp id:".$eid."<br />";
		$q="select * ";			
		$q=$q."from availability where ecode='".$row['ecode']."';";
		$res1=mysql_query($q);
		$row1=mysql_fetch_array($res1);
		$ecount = $ecount1 + $ecount2;
		echo "mDB[".$ecount."] = new Array(7);
			  nmDB[".$ecount."] = '".$name."';
				";
		for($d = 0; $d < 7; $d++) {
				  echo "mDB[".$ecount."][".$d."] = new Array(";
			for($i = 0;$i < 24; $i++)
			{
				echo $row1['d'.$d.'h'.$i];
				if( $i != 23 ) echo ",";
			}
			echo ");
			";
			
		}			
		$count++;
		$ecount2++;
	}
echo "

var mDBT = new Array(7);
for(var i = 0; i < 7; i ++) {
	mDBT[i] = new Array(24);
	for(var j = 0; j < 24; j++) {
		mDBT[i][j] = 0;
	}
}


for(var k = 0; k <= ".$ecount."; k++) {
	for(var i = 0; i < 7; i ++) {
		for(var j = 0; j < 24; j++) {
			( mDB[k][i][j] == 1 ? mDBT[i][j] += 0 : mDBT[i][j] += 1 );
		}
	}
}

function populateTotals() {
	for(var i = 0; i < 7; i ++) {
		for(var j = 0; j < 24; j++) {
			var ID = 'd' + i + 'h' + j;
			document.getElementById(ID).value = mDBT[i][j];
		}
	}
}

function dispMembers(xcod, ycod) {
	var dispString = 'Available members on hour ' + ycod + ' on';
	switch(xcod) {
		case 0: dispString += ' Sunday are ';
			break;
		case 1:	dispString += ' Mday are ';
			break;
		case 2:	dispString += ' Tuesday are ';
			break;
		case 3:	dispString += ' Wednesday are ';
			break;
		case 4:	dispString += ' Thursday are ';
			break;
		case 5:	dispString += ' Friday are ';
			break;
		case 6:	dispString += ' Saturday are ';
			break;
		default: break;
	}
		for( var k = 0; k <= ".$ecount."; k++) {
			if(k != 0)
				dispString += ', ';
			if(mDB[k][xcod][ycod] == 0)
				dispString += nmDB[k];
	}
	document.getElementById('empListDisplay').value = dispString;
}

$(document).ready(function(){
	populateTotals();
});
";
echo "</script>";

?>

    <div class="calBlock">
    <div style="text-align: center">Hours</div>
    <?php 
	
    $days = array(0 => "Sun", 1 => "Mon", 2 => "Tue", 3 => "Wed", 4 => "Thu", 5 => "Fri", 6 => "Sat");
        echo "<div class='dayRow'><div class='labelCell' style='width: 80px;'></div>";
        for( $j = 0; $j < 24; $j++) {
                echo "<div class='dayCell' style='background: none; text-align: center;'>" . $j . "</div>";
            }
        echo '</div>';
    for( $i = 0; $i < 7; $i++) {
        echo "<div class='dayRow'><div class='labelCell' style='width: 60px; padding-left: 20px;'>" . $days[$i] . "</div>";
        for( $j = 0; $j < 24; $j++) {
                $cell = $j + ($i * 24);
                echo "<div class='dayCell' id='" . $cell . "' name='d".$i."h" . $j . "'><input class='VPD_Box' value=' ' id='d".$i."h" . $j . "' onclick='dispMembers(".$i.",".$j.");' type='button' /></div>";
            }
            echo '</div>';
        }
    ?>
    
        <div class="VPD_empList" style="padding-top: 20px;">
        <textarea class="VPD_empList" id="empListDisplay" disabled="disabled">Click on any cell above to view the names of available members.</textarea>
        </div>
        
            	
					<?php 
					if(strcmp($manemp,"mem")==0)
					{
					
					
					echo"<div>
        <form method='post' action='addAlertLevels.php'>
        	<div> ";
					$q="select mem_alert,res_alert from manager where mid='".$mid."'";
					$res=mysql_query($q);
					$row=mysql_fetch_array($res);
					echo "<br />Current Member Alert Level: ".$row['mem_alert']."<br />Current Rescue Alert Level: ".$row['res_alert'];
					
					
					
					$q="select count(*) from employee where mid='".$mid."'";
					$res=mysql_query($q);
					$row=mysql_fetch_array($res);
					
					
					echo "<br /><br />Member Alert Level:";
					if($row['count(*)']<2)
					{
						echo "<select disabled='disabled'></select>";
						
					}
					
					else
					{
					echo "<select name='memAlertLevel'><br />";
                    for($i = 2; $i < $row['count(*)']; $i++)
                        echo "<option>" . $i . "</option>";
										echo "</select><br />";
					}
					
					
					echo "  </div>
            <div> Rescue Qualification Alert Level:";
					if($row['count(*)']<2)
					{
							echo "<select disabled='disabled'></select>";
					}
					
					else
					{
					echo "<select name='resAlertLevel'><br />";
                    for($i = 2; $i < $row['count(*)']; $i++)
                        echo "<option>" . $i . "</option>";
										echo "</select><br />";
										
										echo "<input type='submit' />";
					}
					
					echo "    </div>
            
        </form>    </div>";
					}
                    ?>
           
        
     
    </div>
</div>