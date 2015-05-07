<html>
<head>
<title>Playlist for the Week of: July 23, 2001</title>
<link rel="stylesheet" type="text/css" href="../styles.css">

<style type="text/css">

</style>

</head>
<body bgcolor="#000000">
<body background="http://www.tcats.com/bgline1.gif">
<div align="center">
  <center>
  <table border="0" width="80%" bgcolor="#000000">
    <tr>
      <td width="100%" height="20%" valign="bottom">
        <p align="center"><img border="0" src="http://www.tcats.com/logotop2.jpg" width="653" height="76"></td>
    </tr>
    <tr>

      <td width="100%" height="70%" valign="middle"><br><?php
		if (!$id) {
			header("Location: http://www.tcats.com/PlayListDB/err_no_list.html");
			exit;
		}

		// connect to db
		$dbh=mysql_connect ("kingplus.ipowermysql.com", "tcatscom_sa", "sa") or die ('I cannot connect to the database.');
		mysql_select_db ("tcatscom_playlists") or die ('Could not find the database');
		$showhdr = "SELECT title, show_date from show_hdr where id = $id";
		$shresult = mysql_query($showhdr) or die ("Could not find a playlist for the specified show id");
		$showrow = mysql_fetch_array($shresult, MYSQL_ASSOC);
		$showtitle = $showrow["title"];
                $showdate = $showrow["show_date"];

		/* Performing SQL query */
    	$query = "Select dj.id, type, dj_name, set_name, p.id \"pid\" FROM dj_info as dj, show_dtl, playlist as p
					where dj.id = show_dtl.list2dj
					and show_dtl.list2show = $id
					and play_list2show_dtl= show_dtl.id";
    	$result = mysql_query($query) or die("Could not retrieve show detail for id:$id  [$result]");

    	/* Printing results in HTML */


    	while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    	  	$type 		= $line["type"];
		   	$dj_name 	= $line["dj_name"];
    		$set_name	= $line["set_name"];
    		$listid 	= $line["pid"];
			echo "<table border=0 cellspacing=1 cellpadding=0 bgcolor=\"999933\" width=\"500\">
					<p class=\"large\"><tr>$type:$dj_name - $set_name</tr></p>
					<th bgcolor=\"000000\"><p class=\"yellow\"></p></th>
					<th bgcolor=\"000000\"><p class=\"yellow\">Artist</p></th>
					<th bgcolor=\"000000\"><p class=\"yellow\">Title</p></th>
					<th bgcolor=\"000000\"><p class=\"yellow\">Label</p></th>
					<th bgcolor=\"000000\"><p class=\"yellow\">Comments</p></th>";

			$djid = $line["id"];
			$setquery = "SELECT t.artist, t.track_name, t.label, t.comments, p.row_seq
							FROM track_info as t,
							playlist as p, show_dtl as s where t.id = p.play_list2track and
							s.id = p.play_list2show_dtl and s.list2show = $id and
							s.list2dj=$djid and p.play_list2dj=$djid
							and p.id=$listid
							order by p.row_seq";

			$setresult = mysql_query($setquery) or die("Could not retrieve set detail [$setquery]");

			while ($row = mysql_fetch_array($setresult, MYSQL_ASSOC)) {
				$artist = $row["artist"];
				$track = $row["track_name"];
				$label = $row["label"];
				$comments = $row["comments"];
				$rownum = $row["row_seq"];
				echo "<tr><td bgcolor=\"000000\"><p class=\"white\">$rownum</p></td>
				<td bgcolor=\"000000\"><p class=\"white\">$artist</p></td>
				<td bgcolor=\"000000\"><p class=\"white\">$track</p></td>
				<td bgcolor=\"000000\"><p class=\"white\">$label</p></td>
				<td bgcolor=\"000000\"><p class=\"white\">$comments</p></td></tr>";
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






























