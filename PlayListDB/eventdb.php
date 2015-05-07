<html>
<head>
<title>Edit Playlist</title>
<link rel="stylesheet" type="text/css" href="../styles.css">

<style type="text/css">

</style>

</head>
<body bgcolor="#000000">

<div align="center">
  <center>
  <table border="0" width="100%" bgcolor="#000000" valign="top">
    <tr>

      <td width="100%" height="100%" valign="top"><br>
	<!--webbot BOT="GeneratedScript" PREVIEW=" " startspan --><script Language="JavaScript" Type="text/javascript"><!--
	function FrontPage_Form1_Validator(theForm)
	{

	  if (theForm.artist.value == "")
	  {
	    alert("Please enter a value for the \"artist\" field.");
	    theForm.track_name.focus();
	    return (false);
	  }

	  if (theForm.artist.value.length < 1)
	  {
	    alert("Please enter at least 1 characters in the \"artist\" field.");
	    theForm.track_name.focus();
	    return (false);
	  }

	  if (theForm.track_name.value == "")
	  {
	    alert("Please enter a value for the \"title\" field.");
	    theForm.track_name.focus();
	    return (false);
	  }

	  if (theForm.track_name.value.length < 1)
	  {
	    alert("Please enter at least 1 characters in the \"title\" field.");
	    theForm.track_name.focus();
	    return (false);
	  }
	  return (true);
	}
	//--></script><!--webbot BOT="GeneratedScript" endspan -->
      <?php
// create db connection
$connection = mysql_connect ("kingplus.ipowermysql.com", "tonysclu_admin", "sa") or die ('I cannot connect to the database.');

// select db
mysql_select_db ("tonysclu_clubhousedb") or die ('Could not find the database');
     
      // set sql based on action type (0 = query, 1 = Insert, 2 = Update, 3 = delete)
      $BTN = "Add";

      if ($action==1) {
      	$insert_track 	= "INSERT INTO track_info (artist, track_name, label) Values ('$artist', '$track_name', '$label')";
      	$select_track 	= "Select * from track_info 
      				where Upper(artist) = Upper('$artist') 
      				and Upper(track_name) = Upper('$track_name')
      				and Upper(label) = Upper('$label')";
      			
      	$errmsg 	= "Error: Failed to Insert Record! -- May already exist";
      	$success 	= "$set_name was successfully Added!";
      
    	$gettracks = mysql_query($select_track) or die("Error finding track: $select_track");
    	$num_rows = mysql_num_rows($gettracks);
    	if ($num_rows == 0) {
		$intrack =mysql_query($insert_track) or die ("Error inserting track: $insert_track");
    		$gettracks = mysql_query($select_track) or die("Error finding track: $select_track");
    		$track = mysql_fetch_array($gettracks, MYSQL_ASSOC);
    		$track_id = $track["id"];
    	}else{
    		$track = mysql_fetch_array($gettracks, MYSQL_ASSOC);
    		$track_id = $track["id"];
	}
      	$insert_playlist = "INSERT INTO playlist 
      				(play_list2show_dtl, play_list2track, comments, play_list2dj, row_seq) 
      				VALUES ('$setid', '$track_id', '$comments', '$djid', '$row_seq')";
	$inplaylist = mysql_query($insert_playlist) or die("Error inserting list item: $insert_playlist");
	
	$artist 	= "";
	$track 		= "";
	$label 		= "";
	$comments 	= "";
	$rownum 	= "";
	$listitemid	= "";
    	
     
      }
      elseif ($action==2) {
	$action= 1;
	$BTN = "Add";
      	$insert_track 	= "INSERT INTO track_info (artist, track_name, label) Values ('$artist', '$track_name', '$label')";
      	$select_track 	= "Select * from track_info 
      				where Upper(artist) = Upper('$artist') 
      				and Upper(track_name) = Upper('$track_name')
      				and Upper(label) = Upper('$label')";
      			
      	$errmsg 	= "Error: Failed to Insert Record! -- May already exist";
      	$success 	= "$set_name was successfully Added!";
      
    	$gettracks = mysql_query($select_track) or die("Error finding track: $select_track");
    	$num_rows = mysql_num_rows($gettracks);
    	if ($num_rows == 0) {
		$intrack =mysql_query($insert_track) or die ("Error inserting track: $insert_track");
    		$gettracks = mysql_query($select_track) or die("Error finding track: $select_track");
    		$track = mysql_fetch_array($gettracks, MYSQL_ASSOC);
    		$track_id = $track["id"];
    	}else{
    		$track = mysql_fetch_array($gettracks, MYSQL_ASSOC);
    		$track_id = $track["id"];
	}
      	$update_playlist = "update playlist set play_list2track = '$track_id', 
      				comments = '$comments', row_seq = '$row_seq' where id = $listitemid";
	$modplaylist = mysql_query($update_playlist) or die("Error inserting list item: $insert_playlist");
	$artist 	= "";
	$track 		= "";
	$label 		= "";
	$comments 	= "";
	$rownum 	= "";
	$listitemid	= "";
      }
      elseif ($action==3) {
      $sql = "DELETE FROM show_dtl where id=$setid";
      $errmsg = "Error: Failed to Delete Record! --  ";
      $success = "$set_name was successfully Deleted!";
      }
      elseif ($action==4) {
      
      	$BTN = "Update";
      	$action= 2;
      }

      else {$sql = "Select s.*, s.id as setid , d.* from show_dtl as s, dj_info as d where s.list2dj = d.id";
      $errmsg = "Error: Query failed! --  ";
      $success = "";
      $action = 1;
}

		$showhdr = "SELECT title, UNIX_TIMESTAMP(show_date) AS showdate  from show_hdr where id = $id";
		$shresult = mysql_query($showhdr) or die ("Could not find a playlist for the specified show id");
		$showrow = mysql_fetch_array($shresult, MYSQL_ASSOC);
		$showtitle = $showrow["title"];
		$show_date = date("M jS Y", $showrow["showdate"]);

		/* Performing SQL query */
    	
    	$query = "Select dj.id, type, dj_name, set_name 
    			FROM dj_info as dj, show_dtl 
    			where dj.id = show_dtl.list2dj 
    			and show_dtl.list2show = $id 
    			and dj.id = $djid 
    			and show_dtl.id = $setid";
    	
    	
    	$result = mysql_query($query) or die("Could not retrieve show detail for id:$id  [$query]");
    	
    	

    	while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    	  	$type 		= $line["type"];
		$dj_name 	= $line["dj_name"];
    		$set_name	= $line["set_name"];


	$djid = $line["id"];
	$setquery = "SELECT t.artist, t.track_name, t.label, p.comments, p.row_seq, p.id
			FROM track_info as t,
			playlist as p, show_dtl as s where t.id = p.play_list2track and
			s.id = p.play_list2show_dtl and s.list2show = $id and
			s.list2dj=$djid and p.play_list2dj=$djid and s.id = $setid
			order by p.row_seq";

	$setresult = mysql_query($setquery) or die("Could not retrieve set detail [$setquery]");
	if ($action == 2) {
		$nextrow=$nextrow;
	}else{
		$numrows= mysql_num_rows($setresult);
		$nextrow = $numrows +1;
	}
	echo"<form method=\"POST\" action=\"set.php\" onsubmit=\"return FrontPage_Form1_Validator(this)\" language=\"JavaScript\" name=\"FrontPage_Form1\">
			  <div align=\"center\">
			    <center>

			<table cellSpacing=\"0\" cellPadding=\"0\" width=\"100%\" bgColor=\"#999933\" border=\"0\" valign=\"top\">
			    <tr>
			      <th bgColor=\"#000000\">
			        <p class=\"yellow\"><u>#</u></p>
			      </th>
			      <th bgColor=\"#000000\">
			        <p class=\"yellow\"><u>Artist</u></p>
			      </th>
			      <th bgColor=\"#000000\">
			        <p class=\"yellow\"><u>Title</u></p>
			      </th>
			      <th bgColor=\"#000000\">
			        <p class=\"yellow\"><u>Label</u></p>
			      </th>
			      <th bgColor=\"#000000\">
			        <p class=\"yellow\"><u>Comments</u></p>
			      </th>
			      <th bgColor=\"#000000\">
			        &nbsp;
			      </th>
			    <tr>
			      <td bgColor=\"#000000\" align=\"center\">
			        <p class=\"white\"><!--webbot bot=\"Validation\" B-Value-Required=\"TRUE\"
			        I-Minimum-Length=\"1\" --><input type=\"text\" name=\"row_seq\" size=\"3\"
			        style=\"background-color: #FFFFCC; color: #333333\" value=\"$nextrow\" ></p>
			      </td>
			      <td bgColor=\"#000000\" align=\"center\">
			        <p class=\"white\"><!--webbot bot=\"Validation\" B-Value-Required=\"TRUE\"
			        I-Minimum-Length=\"1\" -->
			        <input type=\"text\" name=\"artist\" size=\"20\"
			        style=\"background-color: #FFFFCC; color: #333333\" value=\"$artist\"></p>
			      </td>
			      <td bgColor=\"#000000\" align=\"center\">
			        <p class=\"white\"><!--webbot bot=\"Validation\" B-Value-Required=\"TRUE\"
			        I-Minimum-Length=\"1\" --><input type=\"text\" name=\"track_name\" size=\"28\"
			        style=\"background-color: #FFFFCC; color: #333333\" value=\"$track\"></p>
			      </td>
			      <td bgColor=\"#000000\" align=\"center\">
			        <p class=\"white\"><input type=\"text\" name=\"label\" size=\"20\" value=\"$label\"></p>
			      </td>
			      <td bgColor=\"#000000\" align=\"center\">
			        <p class=\"white\"><input type=\"text\" name=\"comments\" size=\"20\" value=\"$comments\"></p>
			      </td>
			      <td bgColor=\"#000000\" align=\"center\">
			      	<input type=\"hidden\" value=\"$djid\" name=\"djid\"> 
			        <input type=\"hidden\" value=\"$setid\" name=\"setid\">
			        <input type=\"hidden\" value=\"$id\" name=\"id\">
			        <input type=\"hidden\" value=\"$action\" name=\"action\">
			        <input type=\"submit\" value=\"$BTN\" name=\"add\">
			        <input type=\"hidden\" value=\"$listitemid\" name=\"listitemid\" >
			      </td>
			    </tr>
			</table>
			</form></center></div>";
			echo "<table border=0 cellspacing=1 cellpadding=0 bgcolor=\"999933\" width=\"100%\" valign=\"top\">
					<th bgcolor=\"000000\"><p class=\"yellow\"></p></th>
					<th bgcolor=\"000000\"><p class=\"yellow\">Artist</p></th>
					<th bgcolor=\"000000\"><p class=\"yellow\">Title</p></th>
					<th bgcolor=\"000000\"><p class=\"yellow\">Label</p></th>
					<th bgcolor=\"000000\"><p class=\"yellow\">Comments</p></th>";

			while ($row = mysql_fetch_array($setresult, MYSQL_ASSOC)) {
				$artist 	= $row["artist"];
				$track 		= $row["track_name"];
				$label 		= $row["label"];
				$comments 	= $row["comments"];
				$rownum 	= $row["row_seq"];
				$listitemid	= $row["id"];
				$edititem		= "set.php?action=4&id=$id&setid=$setid&djid=$djid&listitemid=$listitemid&artist=$artist&label=$label&nextrow=$rownum&track=$track&comments=$comments";

				echo "<tr><td bgcolor=\"000000\"><p class=\"white\"><a href=\"$edititem\">$rownum</a></p></td>
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






























