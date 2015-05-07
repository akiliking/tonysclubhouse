
        <?php



  			include_once "dbobjects/playlist_db.php";
			$PLAYLISTDB = new PLAYLISTDB();
    		$WKDay = date("l");
			$CurTime = time();			
			
			if ($admin=="true"){//include_once "onair_admin.php";
			
				echo "<div id=\"onair_admin\">".
				"[<a href=\"tonysclubhouse.php?onairstat=ON&admin=true\" title=\"Turn On ON-AIR\">ON</a> | <a href=\"tonysclubhouse.php?onairstat=OFF&admin=true\" ".
				"title=\"Turn Off ON-AIR\">OFF</a> | <a href=\"tonysclubhouse.php?onairstat=AUTO&admin=true\" title=\"Set ON-AIR to Auto Mode\">AUTO</a>]<br>";
						
	  			if ($onairstat){
					$SetOnAirStat = "update djdb_tblsitesettings set fldValue = '$onairstat' WHERE fldSettingName  = 'ON_AIR_SWITCH'";
					//echo $SetOnAirStat;
					$statresult = mysql_query($SetOnAirStat) or die ('Error occured while querying database'. mysql_error());
	  			}	

			};			
			//Get the OnAir Settings
			//$onairqry = "SELECT fldValue FROM djdb_tblsitesettings WHERE fldSettingName = 'ON_AIR_SWITCH'";		
			$onairqry ="SELECT switch.fldValue switch, onurl.fldValue onurl, ondefaulturl.fldvalue ondefaulturl, offurl.fldValue offurl, offdefaulturl.fldvalue offdefaulturl ".
			"FROM djdb_tblsitesettings switch, djdb_tblsitesettings onurl, djdb_tblsitesettings offurl, djdb_tblsitesettings ondefaulturl, djdb_tblsitesettings offdefaulturl ".
			"WHERE switch.fldSettingName = 'ON_AIR_SWITCH'".
			"AND ondefaulturl.fldSettingName = 'ON_AIR_DEFAULT_URL'".
			"AND offdefaulturl.fldSettingName = 'OFF_AIR_DEFAULT_URL'".
			"AND onurl.fldSettingName = 'ON_AIR_URL'".
			"AND offurl.fldSettingName = 'OFF_AIR_URL'".
			"LIMIT 0 , 1";		
			$result = mysql_query($onairqry) or die ('Error occured while querying database'. mysql_error());
			$list = mysql_fetch_array($result, MYSQL_ASSOC);
			//$onairsetting = strtoupper ($list["fldValue"]);
			$onairsetting = strtoupper ($list["switch"]);
			$onurl = ($list["ondefaulturl"]);
			$offurl = ($list["offdefaulturl"]);
			

			//echo "testing $onairsetting<br />"; 
			switch ($onairsetting) {
			default :
			case "":
			case "AUTO":
				If (($WKDay == "Friday" and $CurTime >= strtotime("11:58 PM")) or ($WKDay == "Saturday" and $CurTime <= strtotime("06:00 AM"))){
					 
						echo"<a href=".$onurl ." target=\"_blank\">
	  
						<font size=\"1\" color=\"#F2E497\"><b>
						<img border=\"0\" src=\"images/on_air.gif\" alt=\"On the Air.  Click now to listen to us live!\"><br><br>** LISTEN  LIVE! **</b></font>
						</a><br> <font size=\"1\" color=\"#F2E497\">Request Line: (609)652-4917</p></font>";
			
				}Else{ 
					
					echo 
					"<a href=".$offurl ." target=\"_blank\"><strong><font size=\"1\" color=\"#F2E497\">
					<img border=\"0\" src=\"images/off_air.gif\" alt=\"We are currently off the air.  However you can listen to our most recent clubhouse broadcast!\"></font></a>
					</strong>	";
				
				}; break;
			case "ON":
						echo"<a href=".$onurl ." target=\"_blank\"> 
						<font size=\"1\" color=\"#F2E497\"><b>
						<img border=\"0\" src=\"images/on_air.gif\" alt=\"On the Air.  Click now to listen to us live!\"><br><br>** LISTEN  LIVE! **</b></font>
						</a><br><font size=\"1\" color=\"#F2E497\"> Request Line: (609)652-4917</p></font>"; break;
			case "OFF":
				
					echo 
					"<a href=".$offurl ." target=\"_blank\"><strong><font size=\"1\" color=\"#F2E497\">
					<img border=\"0\" src=\"images/off_air.gif\" alt=\"We are currently off the air.  However you can listen to our most recent clubhouse broadcast!\"></font></a>
					</strong>	"; break;
			}
			
 
			
?> 


