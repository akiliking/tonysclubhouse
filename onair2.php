


<base target="_self">

<script language="JavaScript">
<!--

function SymError()
{
  return true;
}

window.onerror = SymError;

//-->
var refreshTime = 30;
var refreshTimeInMs = refreshTime * 1000;

function refreshPage() {
    if ( window.refreshFlag ) {
    if ( refreshFlag && refreshTime > 0 ) {
      setTimeout ( "location.reload()", refreshTimeInMs );
    }
  }
}


</script>
<style fprolloverstyle>A:hover {color: #F2E497; font-weight: bold}
</style>
<meta name="Microsoft Theme" content="clubhouse 010">
</head>

<body bgcolor="#000000" text="#FFFFCC" link="#FF9900" vlink="#999900" alink="#669933" onLoad="refreshPage()">

<table border="0" width="100%" height="100%" cellspacing="0" cellpadding="0">
  <tr>
    <td height="5%"><font face="Arial, Helvetica"><p align="center">
        <?php
			$USERTYPE = $_SESSION['user_type'];
    		$WKDay = date("l");
			$CurTime = time();
			$_SESSION['onair'] = false;
			//echo "$WKDay: $CurTime ";
			//echo strtotime("08:58 PM");
			include_once "dbobjects/playlist_db.php";
			$PLAYLISTDB = new PLAYLISTDB();
			//On Air Admin
			if($USERTYPE=="HOST"){include_once "onair_admin.php";}
			
			//Get the OnAir Settings
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
				If (($WKDay == "Friday" and $CurTime >= strtotime("11:58 PM")) or ($WKDay == "Saturday" and $CurTime <= strtotime("06:00 AM"))){
						$_SESSION['onair'] = true;
					 
						echo"<a href=http://wlfr.stockton.edu:8000 target=\"_blank\">
	  
						<font size=\"1\" color=\"#F2E497\"><b>
						<img border=\"0\" src=\"images/on_air.gif\" alt=\"On the Air.  Click now to listen to us live!\"><br><br>** LISTEN  LIVE! **</b></font>
						</a><br> <font size=\"1\" color=\"#F2E497\">Request Line: (609)652-4917</p></font>";
				/*	}Elseif ($WKDay == "Monday" and $CurTime >= strtotime("07:30 PM") and $CurTime <= strtotime("10:05 PM")){ 
					echo"<a href=http://livevideo.nyu.edu:8080/ramgen/broadcast/wnyu.rm target=\"_blank\">
	  
						<font size=\"1\" color=\"#F2E497\"><b>
						<img border=\"0\" src=\"images/on_air.gif\" 
							alt=\"Tonys Clubhouse is currently off the air but you can listen to The Candystore Live!\">
							<br>THE CANDY STORE LIVE!</b></font>
						</a></p>";*/			
				}Else{ 
					$LinkQry = "SELECT dtl.set_link as link, dtl.pkRecId as setid FROM djdb_tblShowDtl dtl, djdb_tblShow s
							WHERE dtl.fkShow = s.pkRecId ORDER BY s.show_date DESC";
					$show_result = mysql_query($LinkQry) or die ("Error occured while querying database");
					$showlist = mysql_fetch_array($show_result, MYSQL_ASSOC);
					$link = $showlist["link"];
					$setid = $showlist["setid"];
					$_SESSION['onair'] = false;
					
					echo //"<a HREF=\"javascript:LaunchBroadcast(&quot;stomp_one&quot;)\">
					"<a HREF =\"javascript:openPlayer('player.php?music_link=$link&userid=$userid&setid=$setid&autostart=yes');\"><strong><font size=\"1\" color=\"#F2E497\">
					<img border=\"0\" src=\"images/off_air.gif\" alt=\"We are currently off the air.  However you can listen to our most recent clubhouse broadcast!\"></font></a>
					</strong>	";
				
				}; break;
			case "ON":
						$_SESSION['onair'] = true;
						echo"<a href=http://wlfr.stockton.edu:8000 target=\"_blank\">
	  
						<font size=\"1\" color=\"#F2E497\"><b>
						<img border=\"0\" src=\"images/on_air.gif\" alt=\"On the Air.  Click now to listen to us live!\"><br>** LISTEN  LIVE! **</b></font>
						</a>"; break;
			case "OFF":
					$_SESSION['onair'] = false;
					$LinkQry = "SELECT dtl.set_link link FROM djdb_tblShowDtl dtl, djdb_tblShow s
							WHERE dtl.fkShow = s.pkRecId ORDER BY s.show_date DESC";
					$show_result = mysql_query($LinkQry) or die ("Error occured while querying database");
					$showlist = mysql_fetch_array($show_result, MYSQL_ASSOC);
					$link = $showlist["link"];
					
					echo //"<a HREF=\"javascript:LaunchBroadcast(&quot;stomp_one&quot;)\">
					"<a HREF =\"http://tonysclubhouse.kingplus.com/player.php?music_link=$link&autostart=yes');\"><strong><font size=\"1\" color=\"#F2E497\">
					<img border=\"0\" src=\"images/off_air.gif\" alt=\"We are currently off the air.  However you can listen to our most recent clubhouse broadcast!\"></font></a>
					</strong>	"; break;
			}
			
 
			
?> 
    


     </font></font></td>
  </tr>

</center>
</body>

