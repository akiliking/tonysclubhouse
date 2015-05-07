

[<a href="base.php?page=onair_admin.php&onairstat=ON" title="Turn On ON-AIR">ON</a> | <a href="base.php?page=onair_admin.php&onairstat=OFF" title="Turn Off ON-AIR">OFF</a> 
  | <a href="base.php?page=onair_admin.php&onairstat=AUTO" title="Set ON-AIR to Auto Mode">AUTO</a>]<br>
  
  <?php 
  echo $onairstat ;
  			if ($onairstat){
				$SetOnAirStat = "update djdb_tblsitesettings set fldValue = '$onairstat' WHERE fldSettingName  = 'ON_AIR_SWITCH'";
				echo $SetOnAirStat ;
				$result = mysql_query($SetOnAirStat) or die ('Error occured while querying database' . mysql_error());
  			}	
  ?>
