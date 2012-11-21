<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manager Control Panel</title>
<link href="main.css" rel="stylesheet">
<link href="ControlPanel.css" rel="stylesheet">
</head>
<body>
<div class="bodyContainer">
<div id="headerText">Manager Control Panel</div>
<p>
Welcome, <?php 
session_start();
echo $_SESSION['name'];

?>,
</p>

	<!-- Insert php loop to print requests here, if any. Otherwise, hide the entire div. -->
    <div class="box" id="empApprove">
        <p>The following people have requested to join you squad.  You can approve or reject their request.</p>
        <?php
        
		$con=mysql_connect("localhost","root","");
		mysql_select_db("firefighting");
		$query="select fname,minit,lname,jobtitle,eid from employee where mid LIKE '".$_SESSION['mid']."' AND mempending=1;";
		$res=mysql_query($query);
		if($res)
		{
			while($row=mysql_fetch_array($res))
			{
				echo "<div class='empCell'>";
				echo "<table border='0'>";
            	echo "<tr><td width='400px'>";
//            fName mInit. lName, Job Post
				echo $row['fname']." ".$row['minit']." ".$row['lname']."  : ".$row['jobtitle'];
				echo "</td><td><a href='manApprove.php?eid=".$row['eid']."&amp;approve=y'>";
            	echo "<img src='Images/Approve.png' class='button'/></a>
				<a href=\"manApprove.php?eid=".$row['eid'].";approve=n\"><img src='Images/Reject.png' class='button' action='manApprove.php?eid=".$row['eid']."&amp;approve=n'/> </a>";
            	echo "</td></tr>
            </table>
        </div>";
			}
		}
		mysql_close($con);
		
        
		
		
		?>
    <!-- -->
    </div>
    
	<!-- Insert php loop to print members here, if any. Otherwise, print the no-members div-->
    <div class="box" id="empList">
        <p>Squad Members</p>
        
        
       <?php
	   $con=mysql_connect("localhost","root","");
		mysql_select_db("firefighting");
		$query="select fname,minit,lname,jobtitle from employee where mid LIKE '".$_SESSION['mid']."' AND mempending=0;";
		$res=mysql_query($query);
		if($res)
		{
			while($row=mysql_fetch_array($res))
			{
        		echo "<div class='empCell'>
            <table border='0'>
            <tr><td width='400px'>";
			echo $row['fname']." ".$row['minit']." ".$row['lname']."  : ".$row['jobtitle'];
           // fName mInit. lName, Job Post
            echo "</td><td align='right'>
            <div class='statusCell' id='Status1'></div><div class='statusCell' id='Status2'></div><div class='statusCell' id='Status3'></div><img src='Images/Calendar.png' class='button' />
            </td></tr>
            </table>
        </div>";
			}
		}
		mysql_close($con);
		?>
    <!-- -->
    </div>
	
    
</div>
</body>
</html>