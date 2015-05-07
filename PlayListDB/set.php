<!-- =================== set.php Begin ========================== -->
<div class="set" align="center">
  <center>
  		<script language="JavaScript" type="text/javascript" src="includes/ajax_search.js"></script>
		<style type="text/css" media="screen">	body {		font: 11px arial;	}	.suggest_link {		background-color: #FFFFFF;		padding: 2px 6px 2px 6px;	}	.suggest_link_over {		background-color: #3366CC;		padding: 2px 6px 2px 6px;	}	#search_suggest {		position: absolute; 		background-color: #FFFFFF; 		text-align: left; 		border: 1px solid #000000;				}		</style>

   <table border="0" width="100%" bgcolor="#000000" valign="top" >
    <tr>

      <td width="100%" height="100%" valign="top"><br>
	<!--webbot BOT="GeneratedScript" PREVIEW=" " startspan --><script Language="JavaScript" Type="text/javascript">
	<!--
	function FrontPage_Form1_Validator(theForm)
	{

	  if (theForm.artist.value == "")
	  {
	    alert("Please enter a value for the \"artist\" field.");
	    theForm.trackname.focus();
	    return (false);
	  }

	  if (theForm.artist.value.length < 1)
	  {
	    alert("Please enter at least 1 characters in the \"artist\" field.");
	    theForm.trackname.focus();
	    return (false);
	  }

	  if (theForm.trackname.value == "")
	  {
	    alert("Please enter a value for the \"title\" field.");
	    theForm.trackname.focus();
	    return (false);
	  }

	  if (theForm.trackname.value.length < 1)
	  {
	    alert("Please enter at least 1 characters in the \"title\" field.");
	    theForm.trackname.focus();
	    return (false);
	  }
	  return (true);
	}
	//--></script><!--webbot BOT="GeneratedScript" endspan -->
      <?php
   	// connect to db

		include_once "dbobjects/playlist_db.php";
		include_once "dbobjects/webdata.php";
		$PLAYLISTDB = new PLAYLISTDB();
		$Webdata	= new GETWEBDATA();
      
      // set sql based on action type (0 = query, 1 = Insert, 2 = Update, 3 = delete)
      $BTN = "Add";
      if ($action==1) {
      	$insert_track 	= "INSERT INTO djdb_tblTrack (artist, trackname, label, explicit) Values ('$artist', '$trackname', '$label', '$explicit')";
      	$select_track 	= "Select * from djdb_tblTrack 
      				where Upper(artist) = Upper('$artist') 
      				and Upper(trackname) = Upper('$trackname')";
      				//and Upper(label) = Upper('$label')";
      			
      	$errmsg 	= "Error: Failed to Insert Record! -- May already exist";
      	$success 	= "$setname was successfully Added!";
      
    	$gettracks = mysql_query($select_track) or die("Error finding track: $select_track");
    	$num_rows = mysql_num_rows($gettracks);
    	if ($num_rows == 0) {
		$intrack =mysql_query($insert_track) or die ("Error inserting track: $insert_track");
    		$gettracks = mysql_query($select_track) or die("Error finding track: $select_track");
    		$track = mysql_fetch_array($gettracks, MYSQL_ASSOC);
    		$track_id = $track["pkRecId"];
    	}else{
    		$track = mysql_fetch_array($gettracks, MYSQL_ASSOC);
    		$track_id = $track["pkRecId"];
		}
      	$insert_playlist = "INSERT INTO djdb_tblPlayList 
      				(fkShowDtl , fkTrack, comments, fkDJ, rowseq) 
      				VALUES ('$setid', '$track_id', '$comments', '$djid', '$rowseq')";
		$inplaylist = mysql_query($insert_playlist) or die("Error inserting list item: $insert_playlist");
		
		$artist 	= "";
		$track 		= "";
		$label 		= "";
		$comments 	= "";
		$rownum 	= "";
		$listitemid	= "";
		$explicit = "0";
    	
     
      }
      elseif ($action==2) {
		$action= 1;
		$BTN = "Add";
      	$insert_track 	= "INSERT INTO djdb_tblTrack (artist, trackname, label, explicit) Values ('$artist', '$trackname', '$label', '$explicit')";
      	$select_track 	= "Select * from djdb_tblTrack 
      				where Upper(artist) = Upper('$artist') 
      				and Upper(trackname) = Upper('$trackname')";
      				//and Upper(label) = Upper('$label')";
      			
      	$errmsg 	= "Error: Failed to Insert Record! -- May already exist";
      	$success 	= "$setname was successfully Added!";
      
    	$gettracks = mysql_query($select_track) or die("Error finding track: $select_track");
    	$num_rows = mysql_num_rows($gettracks);
    	if ($num_rows == 0) {
		$intrack =mysql_query($insert_track) or die ("Error inserting track: $insert_track");
    		$gettracks = mysql_query($select_track) or die("Error finding track: $select_track");
    		$track = mysql_fetch_array($gettracks, MYSQL_ASSOC);
    		$track_id = $track["pkRecId"];
    	}else{
    		$track = mysql_fetch_array($gettracks, MYSQL_ASSOC);
    		$track_id = $track["pkRecId"];
		}
      	$update_playlist = "update djdb_tblPlayList set fkTrack = '$track_id', 
      				comments = '$comments', rowseq = '$rowseq' where pkRecId = $listitemid";
		$modplaylist = mysql_query($update_playlist) or die("Error inserting list item: $insert_playlist");
		$artist 	= "";
		$track 		= "";
		$label 		= "";
		$comments 	= "";
		$rownum 	= "";
		$listitemid	= "";
      }
      elseif ($action==3) {
      $sql = "DELETE FROM djdb_tblShowDtl where pkRecId=$setid";
      $errmsg = "Error: Failed to Delete Record! --  ";
      $success = "$setname was successfully Deleted!";
      }
      elseif ($action==4) {
      
      	$BTN = "Update";
      	$action= 2;
      }

      else {$sql = "Select s.*, s.pkRecId as setid , d.* from djdb_tblShowDtl as s, djdb_tblDJ as d where s.fkDJ = d.pkRecId";
      $errmsg = "Error: Query failed! --  ";
      $success = "";
      $action = 1;
	}

		$showhdr = "SELECT title, UNIX_TIMESTAMP(show_date) AS show_date  from djdb_tblShow where pkRecId = $id";
		$shresult = mysql_query($showhdr) or die ("Could not find a playlist for the specified show id");
		$showrow = mysql_fetch_array($shresult, MYSQL_ASSOC);
		$showtitle = $showrow["title"];
		$show_date = date("M jS Y", $showrow["show_date"]);

		/* Performing SQL query */
    	
    	$query = "Select dj.pkRecId, type, DJName, setname 
    			FROM djdb_tblDJ as dj, djdb_tblShowDtl 
    			where dj.pkRecId = djdb_tblShowDtl.fkDJ 
    			and djdb_tblShowDtl.fkShow = $id 
    			and dj.pkRecId = $djid 
    			and djdb_tblShowDtl.pkRecId = $setid";
    	
    	$result = mysql_query($query) or die("Could not retrieve show detail for id:$id  [$query]");
    	
    	

    	while ($line = mysql_fetch_array($result, MYSQL_ASSOC)) {
    	  	$type 		= $line["type"];
			$DJName 	= $line["DJName"];
    		$setname	= $line["setname"];
			$djid = $line["pkRecId"];
			$setquery = "SELECT t.artist, t.trackname, t.explicit,t.label, p.comments, p.rowseq, p.pkRecId
					FROM djdb_tblTrack as t,
					djdb_tblPlayList as p, djdb_tblShowDtl as s where t.pkRecId = p.fkTrack and
					s.pkRecId = p.fkShowDtl  and s.fkShow = $id and
					s.fkDJ=$djid and p.fkDJ=$djid and s.pkRecId = $setid
					order by p.rowseq";

			$setresult = mysql_query($setquery) or die("Could not retrieve set detail [$setquery]");
			if ($action == 2) {
				$nextrow=$nextrow;
			}else{
				$numrows= mysql_num_rows($setresult);
				$nextrow = $numrows +1;
			}
		if ($explicit > 0 ){$checked = "checked";}else{$checked='';}		
		echo"<form method=\"POST\" action=\"base2.php?page=PlayListDB/set.php\" onsubmit=\"return FrontPage_Form1_Validator(this)\" language=\"JavaScript\" name=\"FRMPLAYLIST\">
			  <div align=\"center\">
			    <center>

			<table class=\"playertatstable\" cellSpacing=\"0\" cellPadding=\"0\" width=\"100%\" border=\"0\" valign=\"top\">
			    <tr>
			      <th bgColor=\"#000000\">
			        <p class=\"white\"><u>#</u></p>
			      </th>
			      <th bgColor=\"#000000\">
			        <p class=\"headline\"><u>Artist</u></p>
			      </th>
			      <th bgColor=\"#000000\">
			        <p class=\"headline\"><u>Title</u></p>
			      </th>
			      <th bgColor=\"#000000\">
			        <p class=\"white\"><u>Label</u></p>
			      </th>
			      <th bgColor=\"#000000\">
			        <p class=\"white\"><u>Explicit</u></p>
			      </th>
			      <th bgColor=\"#000000\">
			        <p class=\"white\"><u>Comments</u></p>
			      </th>
			      <th bgColor=\"#000000\">
			        &nbsp;
			      </th>
			    <tr>
			      <td bgColor=\"#000000\" align=\"center\">
			        <p class=\"white\"><!--webbot bot=\"Validation\" B-Value-Required=\"TRUE\"
			        I-Minimum-Length=\"1\" --><input type=\"text\" name=\"rowseq\" size=\"1\"
			        style=\"background-color: #FFFFCC; color: #333333\" value=\"$nextrow\" ></p>
			      </td>
			      <td bgColor=\"#000000\" align=\"left\">
			        <p class=\"white\"><!--webbot bot=\"Validation\" B-Value-Required=\"TRUE\"
			        I-Minimum-Length=\"1\" -->
			        <input type=\"text\" name=\"artist\" 
			        style=\"background-color: #FFFFCC; color: #333333\" value=\"$artist\"></p>
			      </td>
			      <td bgColor=\"#000000\" align=\"left\">
			        <p class=\"white\"><!--webbot bot=\"Validation\" B-Value-Required=\"TRUE\"
			        I-Minimum-Length=\"1\" --><input type=\"text\" id=\"txtSearch\" 
					onkeyup=\"searchSuggest('djdb_tblTrack','trackname');toggleDisplay('search_suggest',1);\" autocomplete=\"off\"name=\"trackname\"
			        style=\"background-color: #FFFFCC; color: #333333\" value=\"$track\">  <div id=\"search_suggest\">	</div></p>
			      </td>
			      <td bgColor=\"#000000\" align=\"left\">
			        <p class=\"white\"><input type=\"text\" name=\"label\"  value=\"$label\"></p>
			      </td>
			      <td bgColor=\"#000000\" align=\"center\">
			        <p class=\"white\"><input type=\"checkbox\" name=\"explicit\" value=\"1\" $checked></p>
			      </td>			      
				  <td bgColor=\"#000000\" align=\"left\">
			        <p class=\"white\"><input type=\"text\" name=\"comments\"  value=\"$comments\"></p>
			      </td>
				  
			      <td bgColor=\"#000000\" align=\"center\">
			      	<input type=\"hidden\" value=\"$djid\" name=\"djid\"> 
			        <input type=\"hidden\" value=\"$setid\" name=\"setid\">
			        <input type=\"hidden\" value=\"$id\" name=\"id\">
			        <input type=\"hidden\" value=\"$action\" name=\"action\">
			        <input type=\"submit\" value=\"$BTN\" class='button' title=\"Add Track\" name=\"add\">
			        <input type=\"hidden\" value=\"$listitemid\" name=\"listitemid\" >
			      </td>
			    </tr>";

			while ($row = mysql_fetch_array($setresult, MYSQL_ASSOC)) {
				$artist 	= $row["artist"];
				$track 		= $row["trackname"];
				$label 		= $row["label"];
				$comments 	= $row["comments"];
				$explicit 	= $row["explicit"];
				$rownum 	= $row["rowseq"];
				$listitemid	= $row["pkRecId"];
				$edititem		= "base2.php?page=PlayListDB/set.php&action=4&id=$id&setid=$setid&djid=$djid&listitemid=$listitemid&artist=$artist&label=$label&nextrow=$rownum&track=$track&comments=$comments&explicit=$explicit";
				if ($explicit > 0 ){$isexplicit = "X";}else{$isexplicit='';}
				echo "<tr><td><p><a href=\"$edititem\">$rownum</a></p></td>
				<td><p>$artist &nbsp;</p></td>
				<td><p>$track &nbsp;</p></td>
				<td><p>$label &nbsp;</p></td>
				<td><p align=\"center\">$isexplicit &nbsp;</p></td>
				<td colspan=2><p>$comments &nbsp;</p></td></tr>";
			}
			echo "</table></form><br><br>";
		}
		
?>
			</center></div>


		</td>
    </tr>
  </table>

  </center>
</div>
<!-- =================== set.php End ========================== -->































