<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="../styles.css">

<style type="text/css">

</style>

</head>
<body bgcolor="#000000">
<div align="center">
  <center>
  <table border="0" width="100%" bgcolor="#000000">
    <tr>

      <td width="100%" height="100%" valign="top">

<?php
// create db connection
$connection = mysql_connect ("kingplus.ipowermysql.com", "tonysclu_admin", "sa") or die ('I cannot connect to the database.');

// select db
mysql_select_db ("tonysclu_clubhousedb") or die ('Could not find the database');


$sql_select = "SELECT *,UNIX_TIMESTAMP(start_date) AS start_time, UNIX_TIMESTAMP(end_date) AS end_time
			 FROM events_db order by start_date DESC, end_date DESC";

	echo "<p class=\"white\"><b>$success </b></p>
	<table border=0 cellspacing=1 cellpadding=3 bgcolor=\"#993366\" width=\"100%\">
					<tr>
					<th bgcolor=\"000000\" colspan=\"2\"><p class=\"yellow\">Event</p></th>
					<th bgcolor=\"000000\" colspan=\"2\"><p class=\"yellow\">Date</p></th>";
					//<th bgcolor=\"000000\"><p class=\"yellow\"></p></th>
	$result = mysql_query($sql_select) or die ("Error occured while querying database");
	while ($list = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$start_time = $list["start_time"];
		$end_time = $list["end_time"];
		$title = $list["title"];
		$start_date = date("M jS Y", $start_time);
		$end_date = date("M jS Y", $end_time);
		if ($start_date == $end_date) {
			$start_date = date("l, M jS Y, h:iA", $start_time);
			$end_date = date("h:iA", $end_time);
		}else{ 
			$start_date = date("l, M jS Y, h:iA", $start_time);
			$end_date = date("l, M jS Y, h:iA", $end_time);
		}
		$location = $list["location"];
		$detail = $list["detail"];
                $eventid = $list["id"];
                $edit = "";
                $del  = "event_db.php?action=3&id=$eventid&title=$title";
 				echo "<tr>
                    <td bgcolor=\"000000\" valign=\"top\"><p class=\"white\"><u><b>Event:</b></u> $title</p></td>
					<td bgcolor=\"000000\" valign=\"top\"><p class=\"white\"><u><b>Location:</b></u> $location</td>
					<td bgcolor=\"000000\" rowspan=\"2\"  colspan=\"2\"><p class=\"white\">$start_date - $end_date</p></td><tr>
					<td bgcolor=\"000000\" colspan=\"2\"><p class=\"white\">$detail</td></tr>";

			}
echo "</table>";

?>

    </tr>
  </table>
  </center>
</div>
</body>

</html>
