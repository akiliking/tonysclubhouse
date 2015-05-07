<?php header("content-type:text/xml;charset=utf-8");
// create db connection
//include_once "dbobjects/dbutils.php";

		include_once "dbobjects/playlist_db.php";
		$PLAYLISTDB = new PLAYLISTDB();

  		//$SHOWS = $PLAYLISTDB->getallshows(1);
		$userid = $_SESSION['userid'];

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
$limit = 50;
$downloadcnt=0;

//sql for querying db for all records
$sql_select = "SELECT *,UNIX_TIMESTAMP(show_date) AS time FROM djdb_tblShow where active=1 $filter order by show_date DESC, timestamp DESC limit $initset,$limit";

// we'll first add an xml header and the opening tags .. 


echo "<playlist version='1' xmlns='http://xspf.org/ns/0/'>\n";
echo "	<title>Clubhouse Auto Playlist</title>\n";
echo "	<info>http://tonysclubhouse.kingplus.com/</info>\n";
echo "	<trackList>\n";


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
		if (!$imagelink){$imagelink = "http://www.kingplus.com/clubhouse/images/DJMix2a.jpg";}
		$listen = "";
		$query = "SELECT *,s.pkRecId as setid FROM djdb_tblShowDtl AS s, djdb_tblShow AS h
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
					//$music_file = "http://tonysclubhouse.kingplus.com/downloadcenter/index.php?$music_filename";
					if ($userid){$music_file = "http://tonysclubhouse.kingplus.com/downloadcenter/index.php?$music_filename";}
					else{$music_file = "http://tonysclubhouse.kingplus.com/";}

					$playlistlink = "javascript:openWin('http://tonysclubhouse.kingplus.com/playlist.php?id=$setid');";

				$showaudio = mysql_num_rows($result);
				if ($showaudio > 0){
	
					
				// .. then we loop through the mysql array ..
					echo "		<track>\n";
					echo "			<title>$title</title>\n";
					echo "			<creator>$dj_name</creator>\n";
					echo "			<location>$music_link</location>\n";
					echo "			<info>$playlistlink</info>\n";
					//echo "			<image>$imagelink</image>\n";
					echo "			<annotation>$set_name - $show_date: $comments</annotation>\n";
					echo "		</track>\n";
 
				}
			}
		}




// .. and last we add the closing tags
echo "	</trackList>\n";
echo "</playlist>\n";


/*
That's it! You can feed this playlist to the SWF by setting this as it's 'file' 
parameter in your HTML.
*/

?>