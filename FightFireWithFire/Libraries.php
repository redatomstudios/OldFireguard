<?php
	function lCheck($uname , $pass , $table )
	{
		if($table == "MANAGER")
		{
			$ptable = "MPASSWORD";
			$code = "MCODE";
			$id = "mid";
		}
		else
		{
			$ptable = "EPASSWORD";
			$code = "ECODE";
			$id = "eid";
		}
		$query="SELECT $code,$id,fname FROM $table WHERE UNAME = '$uname'";
		echo $query."<br />";
		$res=mysql_query($query);
		if( mysql_num_rows($res) >0 )
		{
			$row = mysql_fetch_array($res);
			$fname = $row['fname'];
			$id1 = $row[$id];
			$code1 = $row[$code];
			$q = "SELECT PASS FROM $ptable WHERE $code = '$code1'";
			echo $q."<br />";
			$res = mysql_query($q);
			$row = mysql_fetch_array($res);
			echo $row['PASS']."<br />" .$pass . " <br />$id: $id1";
			if(strcmp($pass,$row['PASS'])==0)
			{
		//		echo "<br />Returning $id..";
				session_start();
				$_SESSION[$id]=$id1;
				$_SESSION['name']=$fname;
				$_SESSION['uname']=$uname;
				$_SESSION['code']=$code1;
				
				if($table=="MANAGER")
				{
					$q="select scode from manager where mcode='".$code1."'";
					$res=mysql_query($q);
					if($res)
					{
						$row=mysql_fetch_array($res);
						$_SESSION['scode']=$row['scode'];
					}
					else
					$_SESSION['scode']=0;
					
				}
				return 1;
			}
		/*	else	//Wrong Password
				return 0;*/
		}
		else	//NO Username Present
		{
			return 0;
		}
	}
?>