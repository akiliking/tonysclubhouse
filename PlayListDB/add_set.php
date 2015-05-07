<html>
<head>
<title>DJ ADMIN</title>
<link rel="stylesheet" type="text/css" href="../styles.css">

<style type="text/css">

</style>

</head>
<body bgcolor="#000000" ><div align="center">
  <center>
  <table  border="0" width="100%" bgcolor="#000000" valign="top">
    <tr>

        <td width="100%" height="70%" valign="top"><br>
<?php

		include_once "dbobjects/playlist_db.php";

		// connect to db
		$DBUTIL = new PLAYLISTDB();

// set sql based on action type (0 = query, 1 = Insert, 2 = Update, 3 = delete)
if ($action==1) {
$sql = "INSERT INTO djdb_tblShowDtl (setname, fkShow, fkDJ, set_link) VALUES ('$set_name', '$list2show', '$list2dj', '$set_link')";
$errmsg = "Error: Failed to Insert Record! -- May already exist";
$success = "$set_name was successfully Added!";
}
elseif ($action==2) {
$sql = "UPDATE djdb_tblShowDtl SET setname = '$set_name', fkShow = $list2show, fkDJ = $list2dj, set_link = '$set_link' Where pkRecId = $setid";
$errmsg = "Error: Failed to Update Record! --  ";
$success ="$set_name was successfully Updated!";
//echo $sql;
}
elseif ($action==3) {
mysql_query("Delete from djdb_tblPlayList where fkShowDtl = $setid");
mysql_query("DELETE FROM djdb_tblShowDtl where pkRecId=$setid ");
//$sql = "DELETE FROM show_dtl where id=$setid ";
$sql = "Select s.*, s.pkRecId as setid , d.* from djdb_tblShowDtl as s, djdb_tblDJ as d where s.fkDJ = d.pkRecId";
$errmsg = "Error: Failed to Delete Record! --  ";
$success = "$set_name was successfully Deleted!";
}
else {
$sql = "Select s.*, s.pkRecId as setid , d.* from djdb_tblShowDtl as s, djdb_tblDJ as d where s.fkDJ = d.pkRecId";
$errmsg = "Error: Query failed! --  ";
$success = "";
}
if (!$id) {	$id = $list2show;}

//sql for querying db for all records
$sql_select = "Select s.*, s.pkRecId as setid, d.*
		from djdb_tblShowDtl as s, djdb_tblDJ as d, djdb_tblShow as h where s.fkDJ = d.pkRecId
		and s.fkShow = h.pkRecId and h.pkRecId = $list2show order by s.pkRecId";


//execute sql
$sql_result = mysql_query($sql); // or die ($errmsg);

$showhdr = "SELECT title, UNIX_TIMESTAMP(show_date) AS showdate  
		from djdb_tblShow where pkRecId = $list2show";
$shresult = mysql_query($showhdr) or die ("Could not find a playlist for the specified show id: $showhdr");
$showrow = mysql_fetch_array($shresult, MYSQL_ASSOC);
$showtitle = $showrow["title"];
$show_date = date("M jS Y", $showrow["showdate"]);



If ($return){

	}

if (!$sql_result) {
	$success = $errmsg;
	}

	echo "<p align=\"center\" class=\"sublist\"><b><font size=\"4\">$showtitle<br>
		</font></b><font size=\"2\">Show Date: $show_date</font></p>";
	echo "<p><a href=\"base2.php?page=PlayListDB/frm_set.php&action=1&showid=$id\">[Add New Set] </a>
		<a href=\"base2.php?page=playlist.php&id=$id\"> [View Playlist] </a></p>
	<table border=0 class= \"playertatstable\" cellspacing=1 cellpadding=3 bgcolor=\"999933\" width=\"100%\">";

	$result = mysql_query($sql_select) or die ("Error occured while querying database");
	while ($list = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$set_name 	= $list["setname"];
		$dj_name 	= $list["DJName"];
		$djid 		= $list["fkDJ"];
		$comments 	= "";//$list["comments"];
                $setid 		= $list["setid"];
                $edit_set 	= "base2.php?page=PlayListDB/frm_set.php&action=2&id=$setid";
                $del_set  	= "base2.php?page=PlayListDB/add_set.php&action=3&id=$list2show&djid=$djid&setid=$setid&set_name=$set_name&showid=$list2show&list2show=$list2show";
                $set	  	= "base2.php?page=PlayListDB/set.php&id=$list2show&djid=$djid&setid=$setid";

				echo "<tr><th bgcolor=\"000000\" width=\"15%\"><p class=\"white\"><a href=\"$edit_set\" title='Edit $set_name'>[Edit]  </a><a href=\"$del_set\" title=\"Delete this set!\" onCLick=\"return confirm('Are you SURE you want to delete this record?')\">[delete]</a></p></th>
                    			<th bgcolor=\"000000\"><p class=\"white\">$set_name</p></th>
					<th bgcolor=\"000000\"><p class=\"headline\">$dj_name</p></th>
					<th bgcolor=\"000000\"><p class=\"headline\">$comments</p></th></tr>
					 <tr>
				<td valign=\"top\" bgColor=\"#000000\" align=\"left\" colspan=\"4\">

	
				  <iframe src=\"$set\" name=\"myIframe\" id=\"myIframe\" target=\"_self\" frameborder=\"0\" scrolling=\"Yes\" width=\"100%\" height=\"290\">Sorry,
					your browser doesnt support IFRAMEs</iframe>
				  </td></tr><tr><td bgColor=\"#000000\" align=\"center\" colspan=\"4\" bordercolor=\"#000000\">&nbsp;
				  </td>
				  </tr>";

			}
echo "</table>";


?>


    </tr>
  </table>
  </center>
</div>
</body>

</html>















