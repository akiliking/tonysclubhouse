<html>
<head>
<title>DJ ADMIN</title>
<link rel="stylesheet" type="text/css" href="../styles.css">

<style type="text/css">

</style>

</head>
<body bgcolor="#000000">
<div align="center">
  <center>
  <table border="0" width="85%" bgcolor="#000000">
    <tr>
      <td width="100%" height="20%" valign="bottom">
        <p align="center"><img border="0" src="/ton.jpg" width="248" height="90" ></td>
    </tr>
    <tr>

      <td width="100%" height="70%" valign="middle"><br>
<?php

// set sql based on action type (0 = query, 1 = Insert, 2 = Update, 3 = delete)

if ($action==1) {
$sql = "INSERT INTO djdb_tblDJ (DJName, first_name, last_name, info_link, comments, type, email_addr) VALUES ('$dj_name', '$first_name', '$last_name', '$info_link', '$comments', '$type', '$email')";
$errmsg = "Error: Failed to Insert Record! -- May already exist";
$success = "$dj_name was successfully Added!";
}
elseif ($action==2) {
$sql = "UPDATE dj_info SET dj_name = '$dj_name', first_name = '$first_name', last_name = '$last_name', info_link = '$info_link', comments = '$Comments', type = '$type', email_addr = '$email' Where id = $id";
$errmsg = "Error: Failed to Update Record! --  ";
$success ="$dj_name was successfully Updated!";
}
elseif ($action==3) {
$sql = "DELETE FROM dj_info where id=$id";
$errmsg = "Error: Failed to Delete Record! --  ";
$success = "$dj_name was successfully Deleted!";
}
else {$sql = "select * from dj_info";
$errmsg = "Error: Query failed! --  ";
$success = "";
}

//sql for querying db for all records
$sql_select = "Select * from dj_info";

// create db connection
//$connection = mysql_connect ("kingplus.ipowermysql.com", "tonysclu_admin", "sa") or die ('I cannot connect to the database.');

// select db
//mysql_select_db ("tonysclu_clubhousedb") or die ('Could not find the database');
			include_once "/dbobjects/playlist_db.php";
			$PLAYLISTDB = new PLAYLISTDB();

//execute sql
$sql_result = mysql_query($sql); // or die ($errmsg);

If ($return){

	}

if (!$sql_result) {
	$success = $errmsg;
	}
	echo "<p class=\"white\"><b>$success <b></p>
	<table border=0 cellspacing=1 cellpadding=3 bgcolor=\"999933\" width=\"100%\">
					<tr>
                    <th bgcolor=\"000000\"><p class=\"yellow\"></p></th>
					<th bgcolor=\"000000\"><p class=\"yellow\">DJ</p></th>
					<th bgcolor=\"000000\"><p class=\"yellow\">Name</p></th>
					<th bgcolor=\"000000\"><p class=\"yellow\">Email Address</p></th>
					<th bgcolor=\"000000\"><p class=\"yellow\">Web Page</p></th>
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
                $djid = $djlist["id"];
                $edit_dj = "edit_dj.php?action=2&id=$djid";
                $del_dj  = "add_dj.php?action=3&id=$djid&dj_name=$dj_name";

				echo "<tr><td bgcolor=\"000000\"><p class=\"white\"><a href=\"$edit_dj\">[Edit]  </a></p></td>
                    <td bgcolor=\"000000\"><p class=\"white\">$dj_name</p></td>
					<td bgcolor=\"000000\"><p class=\"white\">$fname $lname</p></td>
					<td bgcolor=\"000000\"><p class=\"white\">$email</p></td>
					<td bgcolor=\"000000\"><p class=\"white\"><a href=\"$link\" target=\"_blank\">$link</a></p></td>
					<td bgcolor=\"000000\"><p class=\"white\">$type</p></td>
					<td bgcolor=\"000000\"><p class=\"white\">$comments</p></td></tr>";

			}
echo "</table>";

?>


    </tr>
  </table>
  </center>
</div>
</body>

</html>















