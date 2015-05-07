<html>
<head>
<title>TRACK ADMIN</title>
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
		include_once "dbobjects/playlist_db.php";
// set sql based on action type (0 = query, 1 = Insert, 2 = Update, 3 = delete)
if (!$initset){$initset = 0;}
$initlimit = 35;

if (!$limit){$limit = $initlimit;}
if ($filterkey or $search){
	if (!$search){$filter = "where upper(artist) like '$filterkey%'";}
	else{$filter = "where upper(artist) like '%$search%' 
					or upper(track_name) like '%$search%'
					or upper(label) like '%$search%'";
		$containing = " containing '$search'";};
}				

if ($action==1) {
$sql = "INSERT INTO djdb_tbltrack (artist, track_name, label, comments, genre, rating) VALUES ('$artist', '$track_name', '$label', '$comments', '$genre', '$rating')";
$errmsg = "Error: Failed to Insert Record! -- May already exist";
$success = "$track_name was successfully Added!";
}
elseif ($action==2) {
$sql = "UPDATE djdb_tbltrack SET artist = '$artist', track_name = '$track_name', label = '$label',  comments = '$comments', genre = '$genre', rating = '$rating' Where id = $id";
$errmsg = "Error: Failed to Update Record! --  ";
$success ="$track_name was successfully Updated!";
}
elseif ($action==3) {$sql = "DELETE FROM djdb_tbltrack where id=$id";
$errmsg = "Error: Failed to Delete Record! --  ";
$success = "$track_name was successfully Deleted!";
}
else {$sql = "select * from djdb_tbltrack $filter limit $initset,$limit";
$errmsg = "Error: Query failed! --  ";
$success = "";
}

//sql for querying db for all records
$sql_select = "Select * from djdb_tbltrack $filter order by artist, track_name  limit $initset,$limit";



// connect to db
$DBUTIL = new PLAYLISTDB();

//execute sql
$sql_result = mysql_query($sql); // or die ($errmsg);
$listcount = mysql_query("SELECT count(*) As count FROM djdb_tbltrack $filter") or die ("Error occured while querying database");
   $qry_result = mysql_fetch_array($listcount, MYSQL_ASSOC);
   $count = $qry_result["count"];


if (!$sql_result) {
	$success = $errmsg;
	}
	$start = $initset +1; 
	if ($limit > $count){$limit = $count;}
	$stop = $initset+$limit;
	echo "<form method=\"POST\" action=\"add_tracks.php\"> <p align = \"center\">";
	$alpha= array("A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z");
					while (list($key,$value) = each($alpha)){
					echo "<a href=\"add_tracks.php?filterkey=$value\">[$value]  </a>";
 						}
//<input type=\"radio\" value=\"artist\" checked name=\"filterby\">By Artist&nbsp; <input type=\"radio\" name=\"filterby\" value=\"track_name\">By Title</p>				
	echo "&nbsp;
	<a href=\"add_tracks.php?filterkey=%\">[List All]</a>
	&nbsp;&nbsp;&nbsp;&nbsp;
	<input type=\"text\" name=\"search\" size=\"13\"> 
	<input type=\"submit\" value=\"Find\" name=\"Find\"></form>
		</p>
		<tr ><td> <p align = \"right\">Displaying $start - $stop of $count Tracks $containing</p></td></tr>
		<table border=0 cellspacing=1 cellpadding=3 bgcolor=\"999933\" width=\"100%\">
					<tr>
                    <th bgcolor=\"000000\"><p class=\"yellow\"></p></th>
					<th bgcolor=\"000000\"><p class=\"yellow\">Artist</p></th>
					<th bgcolor=\"000000\"><p class=\"yellow\">Title</p></th>
					<th bgcolor=\"000000\"><p class=\"yellow\">Label</p></th>
					<th bgcolor=\"000000\"><p class=\"yellow\">Genre</p></th>
					<th bgcolor=\"000000\"><p class=\"yellow\">TCS Rating</p></th>
					<th bgcolor=\"000000\"><p class=\"yellow\">Comments</p></th></tr>";

	$result = mysql_query($sql_select) or die ("Error occured while querying database > $sql_select" );
	while ($tracklist = mysql_fetch_array($result, MYSQL_ASSOC)) {
				$artist = $tracklist["artist"];
				$track_name = $tracklist["track_name"];
				$label = $tracklist["label"];
				$comments = $tracklist["comments"];
				$genre = $tracklist["genre"];
				$rating = $tracklist["rating"];
                $trackid = $tracklist["id"];
                $edit_track = "new_track.php?action=2&id=$trackid";
                $del_track  = "add_tracks.php?action=3&id=$trackid&track_name=$track_name";

				echo "<tr><td bgcolor=\"000000\"><p class=\"white\">
					<a href=\"$edit_track\">[Edit]  </a></p></td>
                    <td bgcolor=\"000000\"><p class=\"white\">$artist</p></td>
					<td bgcolor=\"000000\"><p class=\"white\">$track_name</p></td>
					<td bgcolor=\"000000\"><p class=\"white\">$label</p></td>
					<td bgcolor=\"000000\"><p class=\"white\">$genre</p></td>
					<td bgcolor=\"000000\"><p class=\"white\">$rating</p></td>
					<td bgcolor=\"000000\"><p class=\"white\">$comments</p></td></tr>";

			}
echo "</table>";
	$back  = $initset - $initlimit; 
	if ($search) {$searchstr = "&search=$search";}
	
	if ($back < 0 ){$back = 0;$prev = "[Prev] ";}
	else{$prev="<a href=\"add_tracks.php?initset=$back&filterkey=$filterkey$searchstr\">[Prev $initlimit] </a>";}
	$initset = $initset + $limit;
	if ($initset+$limit>$count){$newlimit = $count - $initset;}else{$newlimit = $limit;}
	if ($newlimit <= 0){$next = "[Next]";}

	else{$next="<a href=\"add_tracks.php?initset=$initset&limit=$newlimit&filterkey=$filterkey$searchstr\">[Next $newlimit]</a>";}
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


    </tr>
  </table>
  </center>
</div>
</body>

</html>















