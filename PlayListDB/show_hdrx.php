
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title></title>
</head>

<body bgcolor="#E6EEFF">
<body background="http://www.tcats.com/bgline1.gif">
<div align="center">
  <center>
  <table border="0" width="80%" bgcolor="#000000">
    <tr>
      <td width="100%" height="20%" valign="bottom">
        <p align="center"><img border="0" src="http://www.tcats.com/logotop2.jpg" width="653" height="76"></td>
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
	$connection = mysql_connect ("kingplus.ipowermysql.com", "tcatscom_sa", "sa") or die ('I cannot connect to the database.');

	// select db
	mysql_select_db ("tcatscom_playlists") or die ('Could not find the database');



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



echo "
<form method=\"POST\" action=\"show.php\" onsubmit=\"return FrontPage_Form1_Validator(this)\" language=\"JavaScript\" name=\"FrontPage_Form1\">
  <div align=\"center\">
    <center>
    <table border=\"0\" bgcolor=\"#C0C0C0\" bordercolor=\"#999999\" cellspacing=\"1\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" cellpadding=\"3\" style=\"border-style: outset; border-color: #C0C0C0\">
      <tr>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" width=\"417\" valign=\"top\" colspan=\"4\">
          <p align=\"center\"><font color=\"#4D5C6F\"><span style=\"text-transform: uppercase; letter-spacing: 1pt\">Enter
          New Show Information</span></font></td>
      </tr>
      <tr>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" valign=\"top\"><font color=\"#000080\">Show
          Title:&nbsp;</font></td>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" colspan=\"3\" width=\"353\"><font color=\"#CCCC00\"><!--webbot
          bot=\"Validation\" B-Value-Required=\"TRUE\" I-Minimum-Length=\"1\" --><input type=\"text\" name=\"title\" size=\"52\" tabindex=\"1\" style=\"background-color: #FFFFCC; color: #333333\"></font></td>
      </tr>
      <tr>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" valign=\"top\"><font color=\"#000080\">Date:</font></td>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\"><font color=\"#CCCC00\"><input type=\"text\" name=\"show_date\" size=\"17\" tabindex=\"1\"></font></td>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\"><font color=\"#000080\">Active:</font></td>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\"><input type=\"checkbox\" name=\"active\" value=\"1\" checked></td>
      </tr>
      <tr>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" width=\"64\" valign=\"top\">&nbsp;</td>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" colspan=\"3\" width=\"353\">&nbsp;</td>
      </tr>
      <tr>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" width=\"64\" valign=\"top\"><font color=\"#000080\">comments:</font></td>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" colspan=\"3\" width=\"353\"><textarea rows=\"3\" name=\"comments\" cols=\"40\"></textarea></td>
      </tr>
      <tr>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" width=\"64\" valign=\"top\">&nbsp;</td>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" colspan=\"3\" width=\"353\">&nbsp;</td>
      </tr>
      <tr>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" colspan=\"4\" align=\"center\" width=\"427\" valign=\"top\"><input type=\"hidden\" value=1 name=\"action\"><input type=\"submit\" value=\"Save\" name=\"save\"><input type=\"reset\" value=\"Reset\" name=\"B2\"></td>
      </tr>
    </table>
    </center>
  </div>
  <p>&nbsp;</p>
</form>
<p align=\"center\"><b>*Use this screen to Add Shows to the Database</b></p>
"

?>
    </tr>
  </table>
  </center>
</div>
</body>

</html>