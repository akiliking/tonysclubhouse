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
      <td width="100%" height="20%" valign="bottom">
        <p align="center"><img border="0" src="/ton.jpg" width="248" height="90" ></td>
    </tr>
    <tr>

      <td width="100%" height="70%" valign="middle"><br>

<?php
// create db connection
$connection = mysql_connect ("kingplus.ipowermysql.com", "tonysclu_admin", "sa") or die ('I cannot connect to the database.');

// select db
mysql_select_db ("tonysclu_clubhousedb") or die ('Could not find the database');

// set sql based on action type (0 = query, 1 = Insert, 2 = Update, 3 = delete)

if ($action==1) {
	$timestamp = date("U");
	if ($year == "") {$year = date("Y");}
	if ($day == "") {$day = date("d");}
	if ($month == 0) {$month = date("m");}
	if ($start_time == "") {$start_time = date("h");}
	if ($start_time1 == "") {$start_time1 = date("i");}
	if ($AMPM == "PM" && $start_time <= "12") {$start_time = $start_time + 12;}
	$start_date = "$year-$month-$day, $start_time:$start_time1";

	if ($end_year == "") {$end_year = date("Y");}
	if ($end_day == "") {$end_day = date("d");}
	if ($end_month == 0) {$end_month = date("m");}
	if ($end_time == "") {$end_time = date("h:iA");}
	if ($end_time1 == "") {$end_time1 = date("i");}
	if ($End_AMPM == "PM" && $end_time <= 12) {$end_time = $end_time + 12;}
	$end_date = "$end_year-$end_month-$end_day, $end_time:end_time1";
	//if ($end_date < $start_date) {$end_date = $start_date;}
	$sql = "INSERT INTO events_db (title, detail, location, start_date, end_date) VALUES ('$title', '$detail', '$location', '$start_date', '$end_date')";
	$errmsg = "Error: Failed to Insert Record! --  ";
	$errmsg .= $sql;
	$success = "$title was successfully Added!";
	
//execute sql
$sql_result = mysql_query($sql)  or die ($errmsg);


}
elseif ($action==3) {
	mysql_query("DELETE FROM events_db where id=$id");
	$errmsg = "Error: Failed to Delete Record! --  ";
	$errmsg .= $sql;
	$success = "$title was successfully Deleted!";
}

$sql_select = "SELECT *,UNIX_TIMESTAMP(start_date) AS start_time, UNIX_TIMESTAMP(end_date) AS end_time
			 FROM events_db order by start_date DESC, end_date DESC";

	echo "<p class=\"white\"><b>$success </b></p>
	<table border=0 cellspacing=1 cellpadding=3 bgcolor=\"999933\" width=\"100%\">
					<tr>
                    <th bgcolor=\"000000\"><p class=\"yellow\"></p></th>
					<th bgcolor=\"000000\" colspan=\"2\"><p class=\"yellow\">Event</p></th>
					<th bgcolor=\"000000\" colspan=\"2\"><p class=\"yellow\">Date</p></th>";
					//<th bgcolor=\"000000\"><p class=\"yellow\">Ends</p></th>
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
				<td bgcolor=\"000000\" rowspan=\"2\"><p class=\"white\">[Edit]
					<a href=\"$del\"> [delete]</a></p></td>
                    <td bgcolor=\"000000\"><p class=\"white\">Event: $title</p></td>
					<td bgcolor=\"000000\"><p class=\"white\">Location: $location</td>
					<td bgcolor=\"000000\" rowspan=\"2\" colspan=\"2\"><p class=\"white\">$start_date - $end_date</p></td></tr><tr>
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
