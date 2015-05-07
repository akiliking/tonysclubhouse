<html>
<head>
<title>Tonys Clubhouse - Playlist</title>
<link rel="stylesheet" type="text/css" href="../styles.css">

<style type="text/css">

</style>

</head>
<body bgcolor="#000000">
<div align="center">
  <center>
  <table border="0" width="97%" >
    <tr>
      <td width="100%" height="97%" valign="top">
	  <?php
		include_once "dbobjects/playlist_db.php";

		// connect to db
		$DBUTIL = new PLAYLISTDB();


		$showhdr = "SELECT title, UNIX_TIMESTAMP(show_date) AS showdate  
				from djdb_tblShow where pkRecId = $id";
		$shresult = mysql_query($showhdr) or die ("Could not find a playlist for the specified show id: $showhdr");
		$showrow = mysql_fetch_array($shresult, MYSQL_ASSOC);
		$showtitle = $showrow["title"];
		$show_date = date("M jS Y", $showrow["showdate"]);



	$query = "SELECT s. * , s.pkRecId AS setid, d. * , d.pkRecId AS djid
			FROM djdb_tblShowDtl AS s, djdb_tblDJ AS d, djdb_tblShow AS h
			WHERE s.fkDj = d.pkRecId
			AND s.fkShow = h.pkRecId
			AND h.pkRecId =$id
			ORDER BY s.pkRecId";

    	$result = mysql_query($query) or die("Could not retrieve show detail for id:$id  [$result]");
    	/* Printing results in HTML */

	echo "<A HREF=\"javascript:window.print()\"><img border=\"0\" src=\"images/print.gif\" align=\"right\"></A>
		<p align=\"center\"><font color=\"#C9CBB6\" size=\"5\">TONY'S CLUBHOUSE</p><p align=\"center\" class=\"sublist\"><b><font size=\"4\">$showtitle<br>
		</font></b><font size=\"2\">Show Date: $show_date</font></p>";

    	while ($list = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$type 	= $list["type"];
		$set_name 	= $list["setname"];
		$dj_name 	= $list["DJName"];
		$djid 		= $list["djid"];
		$comments 	= $list["comments"];
        $setid 		= $list["setid"];
        $djlink		= $list["info_link"];
		if ($type){$type .= ":";}

			echo "<table border=0 cellspacing=1 cellpadding=0 bgcolor=\"999933\" width=\"100%\">
					<p class=\"large\"><tr><a href=\"$djlink\" target=\"_blank\">$type $dj_name</a> - $set_name <br>
					$flashplayer	$download  </tr></p>
					<th bgcolor=\"000000\"><p class=\"yellow\"></p></th>
					<th bgcolor=\"000000\"><p class=\"yellow\">Artist</p></th>
					<th bgcolor=\"000000\"><p class=\"yellow\">Title</p></th>
					<th bgcolor=\"000000\"><p class=\"yellow\">Album/EP</p></th>
					<th bgcolor=\"000000\"><p class=\"yellow\">Label</p></th>
					<th bgcolor=\"000000\"><p class=\"yellow\">Comments</p></th>";

			$setquery = "SELECT t.artist, t.trackname, t.label, t.album, p.comments, p.rowseq, t.url, t.explicit
							FROM djdb_tblTrack AS t, djdb_tblPlayList AS p, djdb_tblShowDtl AS s
							WHERE t.pkRecId = p.fkTrack
							AND s.pkRecId = p.fkShowDtl
							AND s.fkShow = $id
							AND s.fkDJ = $djid
							AND p.fkDJ = $djid
							AND s.pkRecId = $setid
							ORDER BY p.rowseq
							";

			$setresult = mysql_query($setquery) or die("Could not retrieve set detail [$setquery]");

			while ($row = mysql_fetch_array($setresult, MYSQL_ASSOC)) {
				$artist 	= $row["artist"];
				$track 		= $row["trackname"];
				$album 		= $row["album"];
				$label 		= $row["label"];
				$comments 	= $row["comments"];
				$rownum 	= $row["rowseq"];
				$trackurl	= $row["url"];
				if ($row["explicit"] > 0 )
					{$explicit = "<img src=\"images/smileyshock2.png\" border=\"0\" title=\"Contains Explicit Lyrics\"  width=\"17\" height=\"18\"> (Explicit Lyrics)" ;}
					else{$explicit = '';}
				if($trackurl){$track = "<a href='$trackurl' target='_blank' title='$track Purchase Info'>$track</a>";}
				echo "<tr><td bgcolor=\"000000\"><p class=\"white\">$rownum</p></td>
				<td bgcolor=\"000000\"><p class=\"white\">$artist</p></td>
				<td bgcolor=\"000000\"><p class=\"white\">$track</p></td>
				<td bgcolor=\"000000\"><p class=\"white\">$album</p></td>
				<td bgcolor=\"000000\"><p class=\"white\">$label</p></td>
				<td bgcolor=\"000000\"><p class=\"white\">$explicit $comments</p></td></tr>";
			}
			echo "</table><br><br>";
		}
?>



    </tr>
  </table>
  </center>
</div>
</body>

</html>
































