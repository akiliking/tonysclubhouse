<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="../styles.css">

<style type="text/css">

</style>

</head>
<body bgcolor="#000000">
  <center>
  <img border="0" src="/ton.jpg" width="248" height="90" ><br><font size="6"><b>Playlist Editor</b></font>

<script>
function showMsg(msg,title) {

  text = '<form>';
  text += '<table border=2><tr><td bgcolor=blue>'
  text += '<font color=white><b>';
  text += title;
  text += '</b></td></tr><tr><td bgcolor=lightgrey>';
  text += msg;
  text += '</td></tr><tr><td bgcolor=lightgrey><center>';
  text += '<input type="button" value="Yes" onClick="window.showResult(1)">';
  text += '<input type="button" value="No" onClick="window.showResult(2)">';
  text += '<input type="button" value="Cancel" onClick="window.showResult(3)">';
  text += '</center></td></tr></table>';
  text += '</form>';  
  if (document.all) {
     mDiv = document.all.msgDiv;
     mDiv.innerHTML = text;
     mDiv.style.visibility = 'visible';
  }
  else if (document.layers) {
     mDiv = document.layers['msgDiv'];
     with (mDiv.document) {
        write(text);
        close();
     }
     mDiv.visibility = 'visible';
  }
  else if (document.getElementById) {
     mDiv = document.getElementById('msgDiv');
     mDiv.innerHTML = text;
     mDiv.style.visibility = 'visible';
  }     

}
function showResult(result) {
   alert('User answered: '+result)
  if (document.all) {
     mDivSt = document.all('msgDiv').style;
  }
  else if (document.layers) {
     mDivSt = document.layers['msgDiv'];
  }
  else if (document.getElementById) {
     mDivSt = document.getElementById('msgDiv').style;
  }     
  mDivSt.visibility = 'hidden';
}
</script>

<div align="center">
  
<?php

// create db connection
	include_once "dbobjects/playlist_db.php";
	$PLAYLISTDB = new PLAYLISTDB();


// set sql based on action type (0 = query, 1 = Insert, 2 = Update, 3 = delete)
if (!$initset){$initset = 0;}
$limit = 25;	
$timestamp = date("U");				
if (!$show_date){
	if ($year == "") {$year = date("Y");}
	if ($day == "") {$day = date("d");}
	if ($month == 0) {$month = date("m");}
	$show_date = "$year-$month-$day";
	}else{$show_date = date( 'Y-m-d', strtotime($show_date) );}
	
if ($action==1) {
	//AddShow	
	$sql_result =  $PLAYLISTDB->AddShow($title,$active,$comments, $show_date, $timestamp); 
}
elseif ($action==2) {


	$errmsg = "Error: Failed to Update Record! --  ";
	$errmsg .= $sql;
	$success ="$title was successfully Updated!";
	$sql_result =  $PLAYLISTDB->UpdateShow($id,$title,$active,$comments, $show_date, $timestamp); 
}
elseif ($action==3) {
	$errmsg = "Error: Failed to Delete Record! --  ";
	$errmsg .= $sql;
	$success = "$title was successfully Deleted!";

	$sql_result =  $PLAYLISTDB->deleteshowbyid($id); 	
}

//sql for querying db for all records
$sql_select = "SELECT *,UNIX_TIMESTAMP(show_date) AS time FROM djdb_tblShow order by show_date DESC, timestamp DESC limit $initset,$limit";

//execute sql
//$sql_result = mysql_query($sql)  or die ($errmsg);
//$sql_result = $PLAYLISTDB->getallshows(0);
$listcount = mysql_query("SELECT count(*)As count FROM djdb_tblShow") or die ("Error occured while querying database");
$qry_result = mysql_fetch_array($listcount, MYSQL_ASSOC);
$count = $qry_result["count"];

if (!$sql_result) {echo "$errmsg";}
	$start = $initset +1; 
	$stop = $initset+$limit;
	echo "<p align=\"left\"><a href=\"base2.php?page=PlayListDB/show_hdr.php&action=1\">&nbsp;[<u>ADD NEW PLAYLIST</u>]</a></p><center>
			<table border=0 cellspacing=1 cellpadding=3 bgcolor=\"999933\" width=\"95%\">
					<tr>
                    <th bgcolor=\"000000\" width=\"30%\"><p class=\"yellow\"></p></th>
					<th bgcolor=\"000000\" width=\"40%\"><p class=\"yellow\">TITLE</p></th>
					<th bgcolor=\"000000\" width=\"20%\"><p class=\"yellow\">DATE</p></th>
					<th bgcolor=\"000000\" width=\"10%\"><p class=\"yellow\">STATUS</p></th></tr>";
	$show_result = mysql_query($sql_select) or die ("Error occured while querying database");
	while ($showlist = mysql_fetch_array($show_result, MYSQL_ASSOC)) {
		$time = $showlist["time"];
		$title = $showlist["title"];
		$show_date = $showlist["show_date"];
		$show_date = date("M jS Y", $time);
		if ($show_date == "Dec 31st 1969") { $show_date = "";}
		//$active = $showlist["active"];
		if ($showlist["active"] == 1) {$active = "Active";}
		if ($showlist["active"] == 0) {$active = "Inactive" ;}
		$comments = $showlist["comments"];
                $showid = $showlist["pkRecId"];
                $edit_show = "base2.php?page=PlayListDB/show_hdr.php&action=2&id=$showid";
                $del_show  = "base2.php?page=PlayListDB/show.php&action=3&id=$showid&title=$title";
                $add_set = "base2.php?page=PlayListDB/frm_set.php&action=1&showid=$showid";
                $view_show = "base2.php?page=playlist.php&id=$showid";
				echo "<tr><td bgcolor=\"000000\"><p><a href=\"base2.php?page=PlayListDB/add_set.php&id=$showid&list2show=$showid\" target=\"_blank\" title=\"Edit $title\">[Edit] </a>
						<a href=\"$del_show\" title=\"Delete $title\" onCLick=\"return confirm('Are you SURE you want to delete this record?')\"; return false> [delete]</a>
						<a href=\"$add_set\" target=\"_blank\" title=\"Add New Set to $title\"> [Add Set]</a>
						<a href=\"$view_show\" target=\"_blank\" title=\"View $title\"> [view]</a></p></td>
                    <td bgcolor=\"000000\"><p class=\"white\"><a href=\"$edit_show\">$title</a></p></td>
					<td bgcolor=\"000000\"><p class=\"white\">$show_date</p></td>
					<td bgcolor=\"000000\"><p class=\"white\">$active</p></td></tr>";

			}
echo "</table>";
	$back  = $initset - $limit; 
	if ($back < 0 ){$back = 0;$prev = "[Prev] ";}else{$prev="<a href=\"base2.php?page=PlayListDB/show.php&initset=$back\">[Prev $limit] </a>";}
	$initset = $initset + $limit;
	if ($initset+$limit>$count){$newlimit = $count - $initset;}else{$newlimit = $limit;}
	if ($newlimit <= 0){$next = "[Next]";}else{$next="<a href=\"base2.php?page=PlayListDB/show.php&initset=$initset&limit=$newlimit\">[Next $newlimit]</a>";}
echo "<p><div align=\"center\">
                  <center>
                  <table border=\"0\">
				<tr><td width=\"100%\" valign=\"bottom\" align=\"center\">
				<p align=\"right\">
				$prev
				$next</p>
				</td></tr></table>
                  </center>
                </div></p>";
?>


  </center>
</div>
</body>

</html>






















