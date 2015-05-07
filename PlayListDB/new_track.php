<html>
<head>
<title>Track Admin</title>
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
<!--webbot BOT="GeneratedScript" PREVIEW=" " startspan --><script Language="JavaScript" Type="text/javascript"><!--
function FrontPage_Form1_Validator(theForm)
{

  if (theForm.title.value == "")
  {
    alert("Please enter a value for the \"title\" field.");
    theForm.title.focus();
    return (false);
  }

  if (theForm.title.value.length < 1)
  {
    alert("Please enter at least 1 characters in the \"title\" field.");
    theForm.title.focus();
    return (false);
  }
  return (true);
}
//--></script><!--webbot BOT="GeneratedScript" endspan -->
  <?PHP
// create db connection
$connection = mysql_connect ("kingplus.ipowermysql.com", "tonysclu_admin", "sa") or die ('I cannot connect to the database.');

// select db
mysql_select_db ("tonysclu_clubhousedb") or die ('Could not find the database');




	if (!$action) {
		$BTN = "Save";
		$artist = "";
		$track_name = "";
		$label = "";
		$comments = "";
		$rating = "";
		$genre = "";
		$action = 1;

	}
	if ($action==1) {
		$BTN = "Save";
		$artist = "";
		$track_name = "";
		$label = "";
		$comments = "";
		$rating = "";
		$genre = "";

	}
	if ($action==2) { // Update
	$sql = "select * from track_info where id = $id";
	$errmsg = "$sql";
	$success ="";
	$BTN = "Update";
	$result = mysql_query($sql) or die ("Error occured while querying database $action");
	$list = mysql_fetch_array($result, MYSQL_ASSOC);
				$artist = $list["artist"];
				$track_name = $list["track_name"];
				$label = $list["label"];
				$comments = $list["comments"];
				$genre = $list["genre"];
				$rating = $list["rating"];
                $trackid = $list["id"];
                $edit_track = "new_track.php?action=2&id=$trackid";
                $del_track  = "add_tracks.php?action=3&id=$trackid";
		}



echo " $artist $track_name $label $comments $genre $rating
<form method=\"POST\" action=\"add_tracks.php\" onsubmit=\"return FrontPage_Form1_Validator(this)\" language=\"JavaScript\" name=\"FrontPage_Form1\">
  <div align=\"center\">
    <center>
    <table border=\"0\" bgcolor=\"#C0C0C0\" bordercolor=\"#999999\" cellspacing=\"1\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" cellpadding=\"3\" style=\"border-style: outset; border-color: #C0C0C0\">
      <tr>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" width=\"417\" valign=\"top\" colspan=\"4\">
          <p align=\"center\"><font color=\"#4D5C6F\"><span style=\"text-transform: uppercase; letter-spacing: 1pt\">Track
          Administrator</span></font></td>
      </tr>
      <tr>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" valign=\"top\"><font color=\"#000080\">
          Title:&nbsp;</font></td>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" colspan=\"3\" width=\"353\"><font color=\"#CCCC00\"><!--webbot
          bot=\"Validation\" B-Value-Required=\"TRUE\" I-Minimum-Length=\"1\" --><input type=\"text\" name=\"track_name\" size=\"52\" tabindex=\"1\" style=\"background-color: #FFFFCC; color: #333333\" value=\"$track_name\"></font></td>
      </tr>
      <tr>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" width=\"64\" valign=\"top\"><font color=\"#000080\">Artist:</font></td>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" colspan=\"3\" width=\"353\"><input type=\"text\" name=\"artist\" size=\"30\" value=\"$artist\"></td>
      </tr>
      <tr>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" width=\"64\" valign=\"top\"><font color=\"#000080\">Label:</font></td>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" colspan=\"3\" width=\"353\"><input type=\"text\" name=\"label\" size=\"52\"value=\"$label\"></td>
      </tr>
      <tr>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" valign=\"top\"><font color=\"#000080\">Genre:</font></td>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" valign=\"middle\"><input type=\"text\" name=\"genre\" size=\"20\" value=\"$genre\"></td>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\"><font color=\"#000080\">Rating
          (1-10)</font></td>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\">
        <!--webbot bot=\"Validation\" B-Value-Required=\"TRUE\"
		  I-Maximum-Length=\"2\" S-Validation-Constraint=\"Less than or equal to\"
		  S-Validation-Value=\"1\" S-Validation-Constraint=\"Greater than or equal to\"
		  S-Validation-Value=\"10\" --><input type=\"text\" name=\"rating\" size=\"4\" value=\"$rating\"></td>
      </tr>
      <tr>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" width=\"64\" valign=\"top\"><font color=\"#000080\">Comments:</font></td>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" colspan=\"3\" width=\"353\"><textarea rows=\"3\" name=\"comments\" cols=\"40\" >$comments</textarea></td>
      </tr>
      <tr>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" colspan=\"4\" align=\"center\" width=\"427\" valign=\"top\"><input type=\"hidden\" value=$action name=\"action\">
        <input type=\"hidden\" name=\"id\" size=\"5\" value=\"$id\"><input type=\"submit\" value=\"$BTN\" name=\"save\"><input type=\"reset\" value=\"Reset\" name=\"B2\"></td>
      </tr>
    </table>
    </center>
  </div>
  <p>&nbsp;</p>
</form>

<p align=\"center\"><b>*Use this screen to Add Tracks to the Database</b></p>
"

?>
    </tr>
  </table>
  </center>
</div>
</body>

</html>