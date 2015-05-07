<html>
<head>
<title>Tonys Clubhouse - Requests</title>
<link rel="stylesheet" type="text/css" href="../styles.css">

<style type="text/css">

</style>

</head>
<body bgcolor="#000000">
<div align="center">
  <center>
  <table border="0" width="85%"  align="center">
    <tr>
      <td width="100%" height="97%" valign="top">
	  <?php
		include_once "dbobjects/playlist_db.php";

		// connect to db
		$DBUTIL = new PLAYLISTDB();

	if ($request_completed){
		$updateqry = "update djdb_request set played = 1 where pkRecId = ".$request_completed;
		$updateresult = mysql_query($updateqry) or die('Error occured while querying database'. mysql_error());
	}
	$counter = 0;
	$query = "select pkRecId, user_id, UNIX_TIMESTAMP(request_date) AS datetime, UNIX_TIMESTAMP(timestamp) AS completedate, name, artist, song, notes as comments, 
			played,request_type, deviceid from djdb_request WHERE request_date >  date_sub( sysdate( ) , INTERVAL 60
			DAY) order by request_date desc";

    	$result = mysql_query($query) or die('Error occured while querying database'. mysql_error());
    	/* Printing results in HTML */

	echo "<A HREF=\"javascript:window.print()\"><img border=\"0\" src=\"images/print.gif\" align=\"right\"></A>
		<p align=\"center\"><font color=\"#C9CBB6\" size=\"5\">TONY'S CLUBHOUSE REQUESTS</p>
		<table border=0 cellspacing=1 cellpadding=5 bgcolor=\"999933\" width=\"100%\" align=\"center\">
					<th bgcolor=\"000000\"><p class=\"yellow\"></p></th>
					<th bgcolor=\"000000\"><p class=\"yellow\">Requestor</p></th>
					<th bgcolor=\"000000\"><p class=\"yellow\">Request Type</p></th>
					<th bgcolor=\"000000\"><p class=\"yellow\">Request Date</p></th>
					<th bgcolor=\"000000\"><p class=\"yellow\">Complete Date</p></th>
					<th bgcolor=\"000000\"><p class=\"yellow\">Request</p></th>
					<th bgcolor=\"000000\"><p class=\"yellow\"></p></th>";

    	while ($list = mysql_fetch_array($result, MYSQL_ASSOC)) {
    		$counter = $counter+1;
	    	$pkRecId 	= $list["pkRecId"];
			$request_type 	= $list["request_type"];
			$name 	= $list["name"];
			$datetime = date("M jS Y", $list["datetime"]);
			$played 		= $list["played"];
			$comments 	= $list["comments"];		
				if ($played){
					$played = "<img src=\"images/check.gif\" border=\"0\" title=\"Done\"  width=\"17\" height=\"18\"> " ;
					$completedate = date("M jS Y", $list["completedate"]);
				}
				else{
					$played = "<a href='requests.php?request_completed=$pkRecId'> [DONE] </a>";
					$completedate = "";
				}
				echo "<tr><td bgcolor=\"000000\"><p class=\"white\" >$counter</p></td>
				<td bgcolor=\"000000\"><p class=\"white\">$name</p></td>
				<td bgcolor=\"000000\"><p class=\"white\">$request_type</p></td>
				<td bgcolor=\"000000\"><p class=\"white\">$datetime</p></td>
				<td bgcolor=\"000000\"><p class=\"white\">$completedate</p></td>
				<td bgcolor=\"000000\"><p class=\"white\">$comments</p></td>
				<td bgcolor=\"000000\"><p class=\"white\">$played </p></td></tr>";
		}
		echo "</table><br><br>";
?>



    </tr>
  </table>
  </center>
</div>
</body>

</html>
































