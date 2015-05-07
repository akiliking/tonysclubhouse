<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>ClubHouse Mobile</title>

	<meta name="author" content="kingplus" />
	<meta name="copyright" content="copyright 2009 kingplus.com" />
	<meta name="description" content="ClubHouse Mobile - Kingplus, Inc." />
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
	<link rel="apple-touch-icon" href="http://tonysclubhouse.kingplus.com/images/logo.png"/>
	<link rel="shortcut icon" href="http://tonysclubhouse.kingplus.com/images/logo.png" >



	<!--<script type="text/javascript" src="orientation.js"></script>
	<script type="text/javascript">
		window.addEventListener("load", function() { setTimeout(loaded, 100) }, false);
	
		function loaded() {
			document.getElementById("page_wrapper").style.visibility = "visible";
			window.scrollTo(0, 1); // pan to the bottom, hides the location bar
		}

	</script>-->

</head>

<body onorientationchange="updateOrientation();">


<div id="onair_admin">
[<a href="onair_admin.php?onairstat=ON" title="Turn On ON-AIR">ON</a> | <a href="onair_admin.php?onairstat=OFF" title="Turn Off ON-AIR">OFF</a> 
  | <a href="onair_admin.php?onairstat=AUTO" title="Set ON-AIR to Auto Mode">AUTO</a>]<br>
  
  <?php 
    		include_once "dbobjects/playlist_db.php";
			$PLAYLISTDB = new PLAYLISTDB();

			
  			if ($onairstat){
				$SetOnAirStat = "update djdb_tblsitesettings set fldValue = '$onairstat' WHERE fldSettingName  = 'ON_AIR_SWITCH'";
				//echo $SetOnAirStat;
				$statresult = mysql_query($SetOnAirStat) or die ('Error occured while querying database'. mysql_error());
  			}	
  			
			  	/*echo "<div id='onair'>";	
				include_once "http://tonysclubhouse.kingplus.com/mobile/onair.php";
				echo "</div>";*/ 
				  			
  ?>
</div>
</body>
</HTML>