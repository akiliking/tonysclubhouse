<html>
<head>
<title>Add a DJ</title>
<link rel="stylesheet" type="text/css" href="../styles.css">

<style type="text/css">

</style>

</head>
<body bgcolor="#000000" topmargin="0">
<p>

<?php
// assign insert statement to variable
$sql_select = "Select * from dj_info";
// create db connection
$connection = mysql_connect ("kingplus.ipowermysql.com", "tcatscom_sa", "sa") or die ('I cannot connect to the database.');

// select db
mysql_select_db ("tcatscom_playlists") or die ('Could not find the database');

	echo "<br><br>
	<table border=0 cellspacing=1 cellpadding=3 bgcolor=\"999933\" width=\"500\">
					<tr>
					<th bgcolor=\"000000\"><p class=\"yellow\">DJ</p></th>
					<th bgcolor=\"000000\"><p class=\"yellow\">First Name</p></th>
					<th bgcolor=\"000000\"><p class=\"yellow\">Last Name</p></th>
					<th bgcolor=\"000000\"><p class=\"yellow\">DJ Link</p></th>
					<th bgcolor=\"000000\"><p class=\"yellow\">Type</p></th>
					<th bgcolor=\"000000\"><p class=\"yellow\">Comments</p></th></tr>";
	$dj_result = mysql_query($sql_select) or die ("Error occured while querying database");
	while ($djlist = mysql_fetch_array($dj_result, MYSQL_ASSOC)) {
				$dj_name = $djlist["dj_name"];
				$fname = $djlist["first_name"];
				$lname = $djlist["last_name"];
				$comments = $djlist["comments"];
				$link = $djlist["info_link"];
				$type = $djlist["type"];
                                $edit_dj = "add_dj.php?id=" & $djlist["id"];
				echo "<tr><td bgcolor=\"000000\"><p class=\"white\"><a href=\"$edit_dj\">$dj_name</a></p></td>
					<td bgcolor=\"000000\"><p class=\"white\">$fname</p></td>
					<td bgcolor=\"000000\"><p class=\"white\">$lname</p></td>
					<td bgcolor=\"000000\"><p class=\"white\"><a href=\"$link\" target=\"_blank\">$link</a></p></td>
					<td bgcolor=\"000000\"><p class=\"white\">$type</p></td>
					<td bgcolor=\"000000\"><p class=\"white\">$comments</p></td></tr>";

			}



?>

