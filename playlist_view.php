
<head>
<LINK href="http://kingplus.com/clubhouse/css/style.css" type="text/css" rel="STYLESHEET"><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>


<SCRIPT language="JavaScript">
<!--
function openWin(URL) {
	aWindow = window.open(URL,"scriptwindow","toolbar=no,width=600,hieght=800,status=no,scrollbars=yes,resize=yes,menubar=no");

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

  		//$SHOWS = $PLAYLISTDB->getallshows(1);
		//$userid = $_SESSION['userid'];
//sql filter
if (!$filter) {
	$filter = "";
}elseif ($filter == "archive"){
	$filter = "and archive = 1";
//}else{
	//$filter = "and DATE_FORMAT(show_date, \"%Y\") = $filter";
}
	
if (!$initset){$initset = 0;}
$limit = 20;
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
$sql_all	= "SELECT * FROM djdb_tblShow where active=1 $filter";

//execute sql
$sql_result = mysql_query($sql)  or die ($errmsg);


if (!$sql_result) {
	echo "$errmsg";
	}
	echo "
	<table class=\"newstable\" id=\"Table3\" border=1 cellspacing=0 cellpadding=3  width=\"100%\">
					<tr>
					<td class=\"headline\" width=\"75%\" ><B>PLAYLIST TITLE</b></td>
					<td class=\"headline\"><b>SHOW DATE</b></td></tr>";
				//	<td class=\"headline\"><b>COMMENTS</b></td></tr>";
	$show_result = mysql_query($sql_select) or die ("Error occured while querying database");
	while ($showlist = mysql_fetch_array($show_result, MYSQL_ASSOC)) {
		$downloadcnt = $downloadcnt+1;
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
				$query = "SELECT * FROM djdb_tblShowDtl AS s, djdb_tblShow AS h
						WHERE s.fkShow = h.pkRecId 
						and (s.set_link is not null AND s.set_link <> '')
						AND h.pkRecId =$showid";
				$result = mysql_query($query)or die ("Error occured while querying database");
				$showaudio = mysql_num_rows($result);
				$viewonly = "<A HREF=\"javascript:openWin('$view_show');\"><img src='images/paper_icon.png' alt='View Playlist Only' border=0></a>";
				if ($showaudio > 0){
					$show_listen = "listen.php?id=$showid&userid=$userid";
					$listen	= "<A HREF=\"javascript:openWin('$show_listen');\"><img src='images/button_listen_headphones.gif' alt='Listen' border=0></a>";
				}else{$show_listen = $view_show;}
				echo "<tr>
                    <td><p><A HREF=\"javascript:openWin('$show_listen');\" title=\"Open playlist\">$title</a> &nbsp; $listen &nbsp; $viewonly</p></td>
					<td><p>$show_date</p></td></tr>";
					//<td><p>$comments</p></td></tr>";

			}
			
	$showcnt = mysql_num_rows(mysql_query($sql_all));
	/*if($showcnt < $limit){$displaycnt = $showcnt;}else{$displaycnt = $limit;}
	$back  = $initset - $limit; 
	if ($back < 0 ){$back = 0;$prev = "[Prev] ";}else{$prev="<a href=\"base.php?page=playlist.html&initset=$back\">[Prev $limit] </a>";}
	$initset = $initset + $limit;
	if ($initset+$limit>$count){$newlimit = $count - $initset;}else{$newlimit = $limit;}
	if ($newlimit <= 0){$next = "[Next]";}else{$next="<a href=\"base.php?page=playlist.html&initset=$initset&limit=$newlimit\">[Next $newlimit]</a>";}
*/
	if($showcnt < $limit){$displaycnt = $showcnt;}else{$displaycnt = $downloadcnt;}
	$back  = $initset - $limit; 
	if ($back < 0 ){$back = 0;$prev = "[Prev] ";}else{$prev="[<a href=\"playlist_view.php?userid=$userid&initset=$back\">Prev $limit </a>]";}
	$start = $initset+1; 

	$newinitset = $initset + $limit;
	if ($newinitset+$limit>$showcnt){$newlimit = $showcnt - $newinitset;}else{$newlimit = $limit;}
	if ($newlimit <= 0){$next = "[Next]"; 	$tail = $showcnt;}else{$next="[<a href=\"playlist_view.php?userid=$userid&initset=$newinitset&limit=$newlimit\">Next $newlimit</a>]";	$tail = $newinitset;}
	$thisinitset = $back +1;
	

echo "</table><center> Displaying $start - $tail of $showcnt playlists &nbsp;
				$prev
				$next</tr> </table>";


?>  <!-- EndPRN -->
  </center>
</div>
</body>


























