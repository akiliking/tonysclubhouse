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
		include_once "includes/javascript_functions.php";

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
		//parental Guidance check
		$parental_check_qry = "SELECT *
			FROM djdb_tblTrack AS t, djdb_tblPlayList AS p, djdb_tblShowDtl AS s
			WHERE t.pkRecId = p.fkTrack
			AND s.pkRecId = p.fkShowDtl
			and s.fkShow = $id
			AND t.explicit >0"; 		
    	$pcresult = mysql_query($parental_check_qry) or die("Query Error");
		if (mysql_num_rows($pcresult) > 0 )
			{$parental_check = "<img src=\"images/advisory.jpg\" border=\"0\" title=\"This Playlist Contains Explicit Lyrics\">" ;}
			else{$parental_check = '';}

	echo "<A HREF=\"javascript:window.print()\"><img border=\"0\" src=\"images/print.gif\" align=\"right\"></A>
		<p align=\"center\"><font color=\"#C9CBB6\" size=\"5\">TONY'S CLUBHOUSE</p><p align=\"center\" class=\"sublist\"><b><font size=\"4\">$showtitle<br>
		</font></b><font size=\"2\">$parental_check <br>Show Date: $show_date </font></p>";
		$linkcnt = 0;
    	while ($list = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$type 	= $list["type"];
		$set_name 	= $list["setname"];
		$dj_name 	= $list["DJName"];
		$djid 		= $list["djid"];
		$comments 	= $list["comments"];
        $setid 		= $list["setid"];
        $djlink		= $list["info_link"];
		if ($type){$type .= ":";}
		$music_link = ""; $flashplayer = "";
		$music_link = $list["set_link"];
		$listenstandalone = "<a HREF =\"javascript:openPlayer('player.php?music_link=$music_link&autostart=yes');\" title='Listen in standalone player'><strong>&nbsp;&nbsp;Listen in standalone player  <img src ='images/listen-sm-rad-reg.gif' border=0></strong></a>";

		
		if ($music_link){
			$linkcnt = $linkcnt + 1; if ($linkcnt == 1){$autostart = "yes";}else{$autostart = "no";}
			$flashplayer = "<object type=\"application/x-shockwave-flash\" data=\"http://tonysclubhouse.kingplus.com/music/player.swf\" width=\"290\" height=\"24\" id=\"clubhouseaudio\">
				<param name=\"movie\" value=\"http://tonysclubhouse.kingplus.com/music/player.swf\" />
				<param name=\"FlashVars\" value=\"playerID=$setid&amp;bg=0x000000&amp;leftbg=0xCCCC33&amp;text=0x00FF00&amp;lefticon=0x000000&amp;rightbg=0xCCCC33&amp;rightbghover=0x999999&amp;righticon=0x000000&amp;righticonhover=0xFFFFFF&amp;slider=0x666666&amp;track=0xFFFFFF&amp;loader=0x9FFFB8&amp;border=0xFFCC33&amp;autostart=$autostart&amp;soundFile=$music_link\" />
				<param name=\"quality\" value=\"high\" />
				<param name=\"menu\" value=\"false\" />
				<param name=\"wmode\" value=\"transparent\" />
				</object>"; 
		}
		//if (isset($_SESSION['user_name']))
			//{ $download = "<a href=\"$music_link\"><img src='images/downloadicon.jpg' alt='download' border=0></a>";}
		
			echo "<table border=0 cellspacing=1 cellpadding=0 bgcolor=\"999933\" width=\"100%\">
					<tr><p class=\"large\"><a href=\"$djlink\" target=\"_blank\">$type $dj_name</a> - $set_name</p> </tr>
				  </table>";
			echo "<table border=1 cellspacing=1 cellpadding=0 bgcolor=\"999933\" width=\"100%\">
							<tr>
								<td bgcolor=\"000000\"><p class=\"yellow\">$flashplayer<br>$listenstandalone $download</td>
								<td bgcolor=\"999932\" bordercolor=\"000000\" ><p class=\"yellow\">"; include "rate_mix_panel.php";echo"</td>
							</tr>
							<td>$download</td>
				 </table>
				 <table border=0 cellspacing=1 cellpadding=0 bgcolor=\"999933\" width=\"100%\">
					<tr>
					<th bgcolor=\"000000\"><p class=\"yellow\"></p></th>
					<th bgcolor=\"000000\"><p class=\"yellow\">Artist</p></th>
					<th bgcolor=\"000000\"><p class=\"yellow\">Title</p></th>
					<th bgcolor=\"000000\"><p class=\"yellow\">Album/EP</p></th>
					<th bgcolor=\"000000\"><p class=\"yellow\">Label</p></th>
					<th bgcolor=\"000000\"><p class=\"yellow\">Comments</p></th></tr>";

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
					{$explicit = "<img src=\"images/smileyshock2.png\" border=\"0\" title=\"Contains Explicit Lyrics\"  width=\"17\" height=\"18\">" ;}
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
































