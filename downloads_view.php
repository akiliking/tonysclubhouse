
<head>
<LINK href="css/style.css" type="text/css" rel="STYLESHEET"><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>


<SCRIPT language="JavaScript">
<!--
function openWindow(URL) {
	aWindow = window.open(URL,"scriptwindow","toolbar=no,width=350,height=100,status=no,scrollbars=no,resize=no,menubar=no");

}
function statbar(txt) {
   window.status = txt;
}
//-->
</SCRIPT>
</head>
<body bgcolor="#000000" background="recrd.gif"  topmargin="0">
<!-- BeginPRN -->
<div align="center">
  <center>
  <table class="newstable" border="0" width="100%">
      <td width="100%" height="100%" valign="middle">
<?php
// create db connection
//include_once "dbobjects/dbutils.php";

		include_once "dbobjects/playlist_db.php";
		$PLAYLISTDB = new PLAYLISTDB();

  		$SHOWS = $PLAYLISTDB->getallshows(1);

//sql filter
if (!$filter) {
	$filter = "";
}elseif ($filter == "archive"){
	$filter = "and archive = 1";
}else{
	$filter = "and DATE_FORMAT(show_date, \"%Y\") = $filter";
}
//echo "initset=$initset";	
if (!$initset){$initset = 0;}
$limit = 30;
$downloadcnt=0;

// set sql based on action type (0 = query, 1 = Insert, 2 = Update, 3 = delete)

if ($action==1) {
	$timestamp = date("U");
	if ($year == "") {$year = date("Y");}
	if ($day == "") {$day = date("d");}
	if ($month == 0) {$month = date("m");}
	$show_date = "$year-$month-$day";
	$sql = "INSERT INTO djdb_tblShow (title, active, comments, show_date, timestamp) VALUES ('$title', '$active', '$comments', '$show_date', $timestamp)";
	$errmsg = "Error: Failed to Insert Record! --  ";
	$errmsg .= $sql;
	$success = "$title was successfully Added!";
}
elseif ($action==2) {
	$sql = "UPDATE djdb_tblShow SET title = '$title', show_date = '$show_date', active = '$active', comments = '$Comments' Where id = $id";
	$errmsg = "Error: Failed to Update Record! --  ";
	$errmsg .= $sql;
	$success ="$title was successfully Updated!";
}
elseif ($action==3) {$sql = "DELETE FROM djdb_tblShow where pkRecId=$id";
	$errmsg = "Error: Failed to Delete Record! --  ";
	$errmsg .= $sql;
	$success = "$title was successfully Deleted!";
}
else {$sql = "SELECT *,UNIX_TIMESTAMP(show_date) AS time FROM djdb_tblShow where active = 1 $filter order  by show_date DESC, timestamp DESC limit $initset,$limit";
	$errmsg = "Error: Query failed! --  ";
	$errmsg .= $sql;
	$success = "";
}


//sql for querying db for all records
$sql_select = "SELECT *,UNIX_TIMESTAMP(show_date) AS time FROM djdb_tblShow where active=1 $filter order by show_date DESC, timestamp DESC limit $initset,$limit";



//execute sql
$sql_result = mysql_query($sql)  or die ($errmsg);
//echo $sql;

if (!$sql_result) {
	echo "$errmsg";
	}
	echo "
	<table class=\"newstable\" id=\"Table3\" border=1 cellspacing=0 cellpadding=3  width=\"100%\">
					<tr>
					<td class=\"headline\" width=\"75%\" ><B>Download MP3 to add to your iPod</b></td>
					<td class=\"headline\"><b> </b></td></tr>";
				//	<td class=\"headline\"><b>COMMENTS</b></td></tr>";
	$show_result = mysql_query($sql_select) or die ("Error occured while querying database");
	while ($showlist = mysql_fetch_array($show_result, MYSQL_ASSOC)) {
		$time = $showlist["time"];
		$title = $showlist["title"];
		$show_date = $showlist["show_date"];
		$show_date = date("M jS Y", $time);
		if ($show_date == "Dec 31st 1969") { $show_date = "";}
		$active = $showlist["active"];
		$comments = $showlist["comments"];
                $showid = $showlist["pkRecId"];
                $edit_show = "show_hdr.php?action=2&id=$showid";
                $del_show  = "show.php?action=3&id=$showid&title=$title";
                $add_set = "set.php?action=1&id=$showid";
                $view_show = "playlist.php?id=$showid";
				$listen = "";
				$query = "SELECT *, s.pkRecId as setid FROM djdb_tblShowDtl AS s, djdb_tblShow AS h
						WHERE s.fkShow = h.pkRecId 
						and (s.set_link is not null AND s.set_link <> '')
						AND h.pkRecId =$showid";
				$result = mysql_query($query)or die ("Error occured while querying database");
				while ($list = mysql_fetch_array($result, MYSQL_ASSOC)) {
					$downloadcnt = $downloadcnt+1;
					$type 		= $list["type"];
					$set_name 	= $list["setname"];
					$dj_name 	= $list["DJName"];
					$djid 		= $list["djid"];
					$comments 	= $list["comments"];
					$setid 		= $list["setid"];
					$djlink		= $list["info_link"];
					if ($type){$type .= ":";}
					$music_link = ""; $flashplayer = ""; $music_file = ""; $music_filename ="";
					$music_link = $list["set_link"];
					$music_file = pathinfo($music_link);
					$music_filename = $music_file['basename'];
					$music_file = "http://tonysclubhouse.kingplus.com/downloadcenter/index.php?$music_filename";

					$flashplayer = "<object type=\"application/x-shockwave-flash\" data=\"http://tonysclubhouse.kingplus.com/music/player.swf\" width=\"290\" height=\"24\" id=\"clubhouseaudio\">
					<param name=\"movie\" value=\"http://tonysclubhouse.kingplus.com/music/player.swf\" />
					<param name=\"FlashVars\" value=\"playerID=$setid&amp;bg=0x000000&amp;leftbg=0xCCCC33&amp;text=0x00FF00&amp;lefticon=0x000000&amp;rightbg=0xCCCC33&amp;rightbghover=0x999999&amp;righticon=0x000000&amp;righticonhover=0xFFFFFF&amp;slider=0x666666&amp;track=0xFFFFFF&amp;loader=0x9FFFB8&amp;border=0xFFCC33&amp;autostart=$autostart&amp;soundFile=$music_link\" />
					<param name=\"quality\" value=\"high\" />
					<param name=\"menu\" value=\"false\" />
					<param name=\"wmode\" value=\"transparent\" />
					</object>";

				$showaudio = mysql_num_rows($result);
				if ($showaudio > 0){
					$show_listen = "player.php?setid=$setid&userid=$userid&music_link=$music_link&autostart=yes";
					$listen	= "<A HREF=\"javascript:openWindow('$show_listen');\"><img src='images/button_listen_headphones.gif' alt='Listen' border=0></a>";

					$download	= "<A HREF=\"$music_file\"><img src='images/downloadicon.png' alt='Download $music_filename' border=0></a>";
				}
				/*echo "<tr>
                    <td><p><A HREF=\"javascript:openWin('$show_listen');\" title=\"view playlist only\">$title : $set_name</a> &nbsp; $show_date  </p></td>
					<td><p>$download </p></td></tr><tr><td colspan='2'>$flashplayer</td></tr>";
				*/
				echo "<tr>
                    <td><p><A HREF=\"javascript:openWindow('$show_listen');\" title=\"Listen\">$title : $set_name</a> &nbsp; $show_date  </p></td>
					<td><p>$listen &nbsp; $download </p></td></tr>";
					//<td><p>$comments</p></td></tr>";

			}}
	// sqlcount
	$sql_count = "SELECT * FROM djdb_tblShowDtl AS s, djdb_tblShow AS h
				WHERE s.fkShow = h.pkRecId and h.active=1
				AND (s.set_link IS NOT NULL AND s.set_link <> '')";
	$show_count = mysql_query($sql_count) or die("Error occured while querying database");
	$showcnt = mysql_num_rows($show_count);
	if($showcnt < $limit){$displaycnt = $showcnt;}else{$displaycnt = $downloadcnt;}
	$back  = $initset - $limit; 
	if ($back < 0 ){$back = 0;$prev = "[Prev] ";}else{$prev="<a href=\"downloads_view.php?userid=$userid&initset=$back\">[Prev $limit] </a> &nbsp";}
	$initset = $initset + $limit;
	if ($initset+$limit>$showcnt){$newlimit = $showcnt - $initset;}else{$newlimit = $limit;}
	if ($newlimit <= 0){$next = "[Next]";}else{$next="<a href=\"downloads_view.php?userid=$userid&initset=$initset&limit=$newlimit\">[Next]</a>";}
	$thisinitset = $back +1;
/*echo "</table><center> Displaying $thisinitset - $displaycnt of $showcnt downloads &nbsp;
				$prev
				$next</tr> </table>";*/
echo "</table><center> Displaying $showcnt downloads &nbsp;</tr> </table>";


?>  <!-- EndPRN -->
  </center>
</div>
</body>


























