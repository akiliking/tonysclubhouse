<!doctype html public "-//w3c//dtd html 4.0 transitional//en">

<html>

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
   <meta name="Author" content="Akili King">
	<meta name="description" content="Tonys clubhouse music player">
   <title>The Clubhouse Music Player</title>
<script src="includes/prototype.js"></script>

<script language="JavaScript">
	function toggleBox(szDivID, iState) // 1 visible, 0 hidden
	{
	   var obj = document.layers ? document.layers[szDivID] :
	   document.getElementById ?  document.getElementById(szDivID).style :
	   document.all[szDivID].style;
	   obj.visibility = document.layers ? (iState ? "show" : "hide") :
	   (iState ? "visible" : "hidden");
	}
</script>


</head>

<body bgcolor="#000000" text="#F2E497"  ><body>


<?php
	include_once "dbobjects/dbutils.php";
	$db = new dbutils($dbName, $dbLogin, $dbPassword);
	if (!$userid){ $userid = 0;}
	if (!$music_link){
		echo "<script> window.onload = function() {
				toggleBox('rating',0);
				alert('No music file specified!');
				window.close;}
				</script>";
	}
	$music_url = "http://www.kingplus.com/clubhouse/mysql_playlist.php";
	$onairqry = "SELECT fldValue FROM djdb_tblsitesettings
			WHERE fldSettingName  = 'ON_AIR_SWITCH'";
	$result = mysql_query($onairqry) or die ("Error occured while querying database");
	$list = mysql_fetch_array($result, MYSQL_ASSOC);
	$onairsetting = strtoupper ($list["fldValue"]);	
			//echo "testing $onairsetting<br />"; 
			switch ($onairsetting) {
			default :
			case "":
			case "AUTO":
			case "ON":
						$_SESSION['onair'] = true;
						$autostart = 'false';
						//$music_url = "http://wlfr.stockton.edu:8000";
						$music_url = "http://www.kingplus.com/clubhouse/mysql_playlist.php";
						echo"<a href=http://wlfr.stockton.edu:8000 target=\"_blank\">
	  
						<font size=\"1\" color=\"#F2E497\"><b>
						<img border=\"0\" src=\"images/on_air.gif\" alt=\"On the Air.  Click now to listen to us live!\"><br>** LISTEN  LIVE! **</b></font>
						</a>";
						break;
			case "OFF":
					$_SESSION['onair'] = false;
					$music_url = "http://www.kingplus.com/clubhouse/mysql_playlist.php";
					//$music_url = "http://www.kingplus.com/clubhouse/playlist_live.xml";
					$autostart = 'true';
					/*$LinkQry = "SELECT dtl.set_link link FROM djdb_tblShowDtl dtl, djdb_tblShow s
							WHERE dtl.fkShow = s.pkRecId ORDER BY s.show_date DESC";
					$show_result = mysql_query($LinkQry) or die ("Error occured while querying database");
					$showlist = mysql_fetch_array($show_result, MYSQL_ASSOC);
					$link = $showlist["link"];
					
					echo //"<a HREF=\"javascript:LaunchBroadcast(&quot;stomp_one&quot;)\">
					"<a HREF =\"http://tonysclubhouse.kingplus.com/player.php?music_link=$link&autostart=yes');\"><strong><font size=\"1\" color=\"#F2E497\">
					<img border=\"0\" src=\"images/off_air.gif\" alt=\"We are currently off the air.  However you can listen to our most recent clubhouse broadcast!\"></font></a>
					</strong>	";*/
					break;
			}

	if ($setid){
		$dbQuery = "SELECT IFNULL(rating,0) as rating FROM djdb_rating WHERE user_id=$userid and mix_id=$setid";
		$dbResultSet = mysql_query($dbQuery) or die("Query execute error: " .mysql_error() ." for: ".$dbQuery);
		while($thisrate = mysql_fetch_array($dbResultSet, MYSQL_ASSOC)) {
			$rate_val = $thisrate['rating'];
		}
	}else{
		echo "<script> window.onload = function() {
				toggleBox('rating',0);}
				</script>";
	}
	if($autostart == 'yes'){$autostart = 'true';}
	
?>
		<table border="0"><tr><td>
		<object type="application/x-shockwave-flash" allowScriptAccess="never" allowNetworking="internal" height="140" width="400" data="http://www.kingplus.com/clubhouse/music/player.swf">
		  <param name="allowScriptAccess" value="never" />
		  <param name="allowNetworking" value="internal" />
		  <param name="movie" value="http://www.kingplus.com/clubhouse/music/player.swf" />
		  <param name="flashvars" value="file=<?php echo $music_url; ?>&height=140&width=400&description=tony's clubhouse&captions=ClubHouse Media Player&stretching=fill&displaywidth=120&autostart=<?php echo $autostart; ?>&volume=100&linktarget=_blank&playlist=right&displayclick=play&repeat=always&skin=http://www.kingplus.com/clubhouse/music/skins/nacht.swf&playlistsize=190&plugins=revolt_1-0" />
		</object>
		</td></tr></table>
		
</body>
</html>
