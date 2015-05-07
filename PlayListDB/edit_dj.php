<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title></title>
</head>

<body bgcolor="#000000">
<div align="center">
  <center>
  <table border="0" width="100%" bgcolor="#000000">

    <tr>

      <td width="100%" height="70%" valign="middle"><br>
<!--webbot BOT="GeneratedScript" PREVIEW=" " startspan --><script Language="JavaScript" Type="text/javascript"><!--
function FrontPage_Form1_Validator(theForm)
{

  if (theForm.dj_name.value == "")
  {
    alert("Please enter a value for the \"dj_name\" field.");
    theForm.dj_name.focus();
    return (false);
  }

  if (theForm.dj_name.value.length < 1)
  {
    alert("Please enter at least 1 characters in the \"dj_name\" field.");
    theForm.dj_name.focus();
    return (false);
  }
  return (true);
}
//--></script><!--webbot BOT="GeneratedScript" endspan -->

  <?PHP
   	// connect to db
		include_once "dbobjects/playlist_db.php";
		$PLAYLISTDB = new PLAYLISTDB();



	if (!$action) {
		$BTN = "Save";
		$dj_name = "";
		$first_name = "";
		$last_name = "";
		$comments = "";
		$info_link = "";
		$type = "";
		$options = "<option selected>Resident DJ</option><option>Guest DJ</option>";
		$action = 1;

	}
	if ($action==1) {
		$BTN = "Save";
		$dj_name = "";
		$first_name = "";
		$last_name = "";
		$comments = "";
		$info_link = "";
		$type = "";
		$options = "<option selected>Resident DJ</option><option>Guest DJ</option>";

	}
	if ($action==2) { // Update
	$sql = "select * from dj_info where id = $id";
	$errmsg = "$sql";
	$success ="";
	$BTN = "Update";
	$dj_result = mysql_query($sql) or die ("Error occured while querying database $action");
	$djlist = mysql_fetch_array($dj_result, MYSQL_ASSOC);
				$dj_name = $djlist["dj_name"];
				$first_name = $djlist["first_name"];
				$last_name = $djlist["last_name"];
				$comments = $djlist["comments"];
				$info_link = $djlist["info_link"];
				$type = $djlist["type"];
                $edit_dj = "edit_dj.php?id=$djid";
                $del_dj  = "add_dj.php?action=3&id=$djid";
                if ($type == "Guest DJ") {
                	$options = "<option>Resident DJ</option><option selected>Guest DJ</option>";

                }else {
                	$options = "<option selected>Resident DJ</option><option>Guest DJ</option>";}
	}
	echo"<form method=\"POST\" action=\"PlayListDB/add_dj.php\" onsubmit=\"return FrontPage_Form1_Validator(this)\" language=\"JavaScript\" name=\"FrontPage_Form1\">

  <p> </p>
  <p> </p>
  <div align=\"center\">
    <center>
    <table border=\"0\" bgcolor=\"#C0C0C0\" bordercolor=\"#999999\" cellspacing=\"1\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" cellpadding=\"3\" style=\"border-style: outset; border-color: #C0C0C0\" width=\"437\">
      <tr>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" width=\"417\" valign=\"top\" colspan=\"4\">
          <p align=\"center\"><font color=\"#4D5C6F\"><span style=\"text-transform: uppercase; letter-spacing: 1pt\">Enter
          New DJ Information</span></font></td>
      </tr>
      <tr>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" width=\"64\" valign=\"top\"><font color=\"#000080\">DJ
          Name:</font></td>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" colspan=\"3\" width=\"353\"><font color=\"#CCCC00\"><!--webbot
          bot=\"Validation\" B-Value-Required=\"TRUE\" I-Minimum-Length=\"1\" --><input type=\"text\" name=\"dj_name\" size=\"52\" tabindex=\"1\" style=\"background-color: #FFFFCC; color: #333333\" value=\"$dj_name\"></font></td>
      </tr>
      <tr>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" width=\"64\" valign=\"top\"><font color=\"#000080\">first
          name: </font></td>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" width=\"129\"><font color=\"#CCCC00\"><input type=\"text\" name=\"first_name\" size=\"17\" tabindex=\"1\" value=\"$first_name\"></font></td>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" width=\"60\"><font color=\"#000080\">last
          name:</font></td>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" width=\"144\"><font color=\"#CCCC00\"><input type=\"text\" name=\"last_name\" size=\"17\" tabindex=\"1\" value=\"$last_name\"></font></td>
      </tr>
      <tr>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" width=\"64\" valign=\"top\"> </td>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" colspan=\"3\" width=\"353\"> <input type=\"hidden\" name=\"id\" size=\"5\" value=\"$id\"></td>
      </tr>
      <tr>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" width=\"64\" valign=\"top\"><font color=\"#000080\">Web:</font></td>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" colspan=\"3\" width=\"353\"><font color=\"#CCCC00\"><input type=\"text\" name=\"info_link\" size=\"52\" tabindex=\"1\" value=\"$info_link\"></font></td>
      </tr>
       <tr>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" width=\"64\" valign=\"top\"><font color=\"#000080\">
          Email:</font></td>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" colspan=\"3\" width=\"353\"><font color=\"#CCCC00\"><input type=\"text\" name=\"email\" size=\"52\" tabindex=\"1\" value=\"$email\"></font></td>
      </tr>
     <tr>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" width=\"64\" valign=\"top\"><font color=\"#000080\">comments:</font></td>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" colspan=\"3\" width=\"353\"><textarea rows=\"3\" name=\"comments\" cols=\"40\">$comments</textarea></td>
      </tr>
      <tr>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" width=\"64\" valign=\"top\"><font color=\"#000080\">type:</font></td>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" colspan=\"3\" width=\"353\"><select size=\"1\" name=\"type\">
            $options
          </select></td>
      </tr>
      <tr>
       <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" colspan=\"4\" align=\"center\" width=\"427\" valign=\"top\"><input type=\"hidden\" name=\"action\" value=$action> <input type=\"submit\" value=\"$BTN\" name=\"save\"><input type=\"reset\" value=\"Reset\" name=\"B2\"></td>
      </tr>
    </table>
    </center>
  </div>
  <p> </p>
  <p> </p>
</form>
";


?>
    </tr>
  </table>
  </center>
</div>
</body>

</html>