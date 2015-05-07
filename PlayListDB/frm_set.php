<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<title></title>
</head>

<body bgcolor="#000000">
<div align="center">
  <center>
  <table border="0" width="80%" bgcolor="#000000">
    <tr>
      <td width="100%" height="20%" valign="bottom">
        <p align="center"><img border="0" src="/ton.jpg" width="248" height="90" ></td>
    </tr>
    <tr>

      <td width="100%" height="70%" valign="middle"><br>
<!--webbot BOT="GeneratedScript" PREVIEW=" " startspan --><script Language="JavaScript" Type="text/javascript"><!--
function FrontPage_Form1_Validator(theForm)
{

  if (theForm.set_name.value.length < 1)
  {
    alert("Please Enter a Name for the Set");
    theForm.set_name.focus();
    return (false);
  }
  if (theForm.list2dj.value < 1)
  {
    alert("Please select a DJ.");
    theForm.list2dj.focus();
    return (false);
  }

  return (true);
}
//--></script><!--webbot BOT="GeneratedScript" endspan -->

  <?PHP
		include_once "dbobjects/playlist_db.php";

		// connect to db
		$DB = new PLAYLISTDB();

	if (!$action) {
		$BTN = "Save";
		$set_name = "";
		$list2_dj = "";
		$list2show = $showid;
		$action = 1;
		$sql = "select * from djdb_tblShow where pkRecId=$showid";

	}
	if ($action==1) {
		$BTN = "Save";
		$set_name = "";
		$list2_dj = "";
		$list2show = $showid;
		$sql = "select * from djdb_tblShow where pkRecId=$showid";
		$result = mysql_query($sql) or die ("Error occured while querying database $action".$sql);
		$list = mysql_fetch_array($result, MYSQL_ASSOC);
		$show = $list["title"];
		$list2show = $list["pkRecId"];

	}
	if ($action==2) { // Update
		$sql = "select d.*, d.pkRecId as setid, s.*   from djdb_tblShowDtl as d, djdb_tblShow as s where d.pkRecId = $id and d.fkShow = s.pkRecId";
		$errmsg = "$sql";
		$success ="";
		$BTN = "Update";
		$result = mysql_query($sql) or die ("Error occured while querying database $action");
		$list = mysql_fetch_array($result, MYSQL_ASSOC);
		$set_name = $list["setname"];
		$set_link = $list["set_link"];
		$list2dj = $list["fkDJ"];
		$list2show = $list["fkShow"];
		$show = $list["title"];
		$setid = $list["setid"];
		$edit_set = "edit_set.php?id=$djid";
        $del_set  = "add_set.php?action=3&id=$djid";
	}
        $getdjs = $DB->getalldjs();
		$djselection = "<option value=\"0\">Please Specify</option>";
        	while($djlist = mysql_fetch_array($getdjs, MYSQL_ASSOC)){
			$curdjid = $djlist["pkRecId"];
			$curdj = $djlist["DJName"];
			if ($curdjid == $list2dj) {
				$djselection .= "<option value=\"$curdjid\" selected>$curdj</option>";
			}else {
			
				$djselection .= "<option value=\"$curdjid\">$curdj</option>";
			}
			
		}
	echo"<form method=\"POST\" action=\"base2.php?page=PlayListDB/add_set.php\" onsubmit=\"return FrontPage_Form1_Validator(this)\" language=\"JavaScript\" name=\"FrontPage_Form1\">
  <div align=\"center\">
    <center>
    <table border=\"0\" bgcolor=\"#C0C0C0\" bordercolor=\"#999999\" cellspacing=\"1\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" cellpadding=\"3\" style=\"border-style: outset; border-color: #C0C0C0\" width=\"437\">
      <tr>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" width=\"417\" valign=\"top\" colspan=\"3\">
          <p align=\"center\"><font color=\"#4D5C6F\"><span style=\"text-transform: uppercase; letter-spacing: 1pt\">$show</span></font></td>
      </tr>
      <tr>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" width=\"64\" valign=\"top\"><font color=\"#000080\">Set
          Name:</font></td>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" colspan=\"2\" width=\"353\"><font color=\"#CCCC00\"><!--webbot
          bot=\"Validation\" B-Value-Required=\"TRUE\" I-Minimum-Length=\"1\" --><input type=\"text\" name=\"set_name\" size=\"35\" tabindex=\"1\" style=\"background-color: #FFFFCC; color: #333333\" value =\"$set_name\"></font></td>
      </tr>
      <tr>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" width=\"64\" valign=\"top\"><font color=\"#000080\">DJ:</font></td>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" width=\"189\"><select size=\"1\" name=\"list2dj\">
            $djselection
          </select></td>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" width=\"144\">&nbsp;</td>
      </tr>
      <tr>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" width=\"64\" valign=\"top\"><font color=\"#000080\">Audio Link:</font></td>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" colspan=\"2\" width=\"353\"><font color=\"#CCCC00\">
          <input type=\"text\" name=\"set_link\" size=\"35\" tabindex=\"1\" style=\"color: #333333\" value =\"$set_link\"></font></td>
      </tr>
      <tr>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" width=\"64\" valign=\"top\">&nbsp;</td>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" align=\"justify\" colspan=\"2\" width=\"353\">&nbsp;</td>
        <!--webbot
          bot=\"Validation\" S-Display-Name=\"Select a DJ\" B-Value-Required=\"TRUE\"
          B-Disallow-First-Item=\"TRUE\" -->
        <input type=\"hidden\" name=\"list2show\" value=$list2show>
        <input type=\"hidden\" name=\"id\" value=$list2show>
        <input type=\"hidden\" name=\"setid\" value=$setid>
        <input type=\"hidden\" name=\"showid\" value=$showid>
      </tr>
      <tr>
        <td bordercolor=\"#999999\" bordercolorlight=\"#C0C0C0\" bordercolordark=\"#666666\" colspan=\"3\" align=\"center\" width=\"427\" valign=\"top\">
		<input type=\"hidden\" name=\"action\" value=$action>
		<input type=\"submit\" value=\"$BTN\" name=\"save\">
		<input type=\"reset\" value=\"Reset\" name=\"B2\">  
		<input type =\"button\" value=\"Back\" name=\"B3\" onClick=\"history.go(-1)\"></td>
      </tr>
    </table>
    </center>
  </div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
";


?>
    </tr>
  </table>
  
  </center>
</div>
</body>

</html>