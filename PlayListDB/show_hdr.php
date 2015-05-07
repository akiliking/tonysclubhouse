
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
      <td width="100%" height="20%" valign="bottom">
	  <p align = "center"> <img border="0" src="/ton.jpg" width="248" height="90" ></p>
      </td>
    </tr>
    <tr>

      <td width="100%" height="70%" valign="middle"><br>
<!--webbot BOT="GeneratedScript" PREVIEW=" " startspan -->
<script Language="JavaScript" Type="text/javascript"><!--
function FrontPage_Form1_Validator(theForm)
{

  if (theForm.title.value == "")
  {
    alert("Please enter a value for the "title" field.");
    theForm.title.focus();
    return (false);
  }

  if (theForm.title.value.length < 1)
  {
    alert("Please enter at least 1 characters in the "title" field.");
    theForm.title.focus();
    return (false);
  }
  return (true);
}
//--></script><!--webbot BOT="GeneratedScript" endspan -->
  <?PHP
// create db connection
	include_once "dbobjects/playlist_db.php";
	$PLAYLISTDB = new PLAYLISTDB();

	if (!$action) {
		$BTN = "Save";
		$title = "";
		$show_date = "";
		$action = 1;
		$checked = "checked";

	}
	if ($action==1) {
		$BTN = "Save";
		$title = "";
		$show_date = "";
		$checked = "checked";

	}
	if ($action==2) { // Update
	$sql = "select *, UNIX_TIMESTAMP(show_date) AS time from djdb_tblShow where pkRecId = $id";
	$errmsg = "$sql";
	$success ="";
	$BTN = "Update";
	$result = mysql_query($sql) or die ("Error occured while querying database $action");
	//$dbResultSet =  $PLAYLISTDB->AddShow($title,$active,$comments, $show_date, $timestamp); 

	$list = mysql_fetch_array($result, MYSQL_ASSOC);
				$title = $list["title"];
				$active = $list["active"];
				if ($active == 1) {$checked = "checked";}else{$checked = "";}
				$time = $list["time"];
				$show_date = date("M jS Y", $time);
				$month = date("F",$time);
				$monthval = date("m",$time);
				$year = date("Y",$time);
				$day = date("d",$time);
				$comments = $list["comments"];
                $edit_dj = "edit_dj.php?id=$djid";
                $del_dj  = "add_dj.php?action=3&id=$djid";
                $month = "<option value=\"$monthval\" selected>$month</option>";
	}
	if(!$show_date){$show_date = date("M j, Y");}
?>


<form method="POST" action="base2.php?page=PlayListDB/show.php" onSubmit="return FrontPage_Form1_Validator(this)" language="JavaScript" name="FrontPage_Form1">
  <div align="center">
    <center>
    <table border="0" bgcolor="#C0C0C0" bordercolor="#999999" cellspacing="1" bordercolorlight="#C0C0C0" bordercolordark="#666666" cellpadding="3" style="border-style: outset; border-color: #C0C0C0">
      <tr>
        <td bordercolor="#999999" bordercolorlight="#C0C0C0" bordercolordark="#666666" align="justify" width="417" valign="top" colspan="4">
          <p align="center"><font color="#4D5C6F"><span style="text-transform: uppercase; letter-spacing: 1pt">Enter
          New Show Information</span></font></td>
      </tr>
      <tr>
        <td bordercolor="#999999" bordercolorlight="#C0C0C0" bordercolordark="#666666" align="justify" valign="top"><font color="#000080">Show
          Title:&nbsp;</font></td>
        <td bordercolor="#999999" bordercolorlight="#C0C0C0" bordercolordark="#666666" align="justify" colspan="3" width="353"><font color="#CCCC00"><!--webbot
          bot="Validation" B-Value-Required="TRUE" I-Minimum-Length="1" -->
		  <input type="text" name="title" size="52" tabindex="1" style="background-color: #FFFFCC; color: #333333" value="<?php echo "$title";?>"></font></td>
      </tr>
	      <tr> 
      <td colspan=1><font color="#000080">Date:</font></td>
      <td colspan=1><input title='Date of Birth' name='show_date' type='text' id='show_date' size='20' value='<?php echo "$show_date";?>'> 
        <a href='#null'><img src='../images/cal.gif' id='DateBtn' width='16' height='16' border='0' title='Calendar'></a></td>
        <td bordercolor="#999999" bordercolorlight="#C0C0C0" bordercolordark="#666666" align="justify"><font color="#000080">Active:</font></td>
        <td bordercolor="#999999" bordercolorlight="#C0C0C0" bordercolordark="#666666" align="justify"><input type="checkbox" name="active" value="1" <?php echo "$checked";?>></td>
    </tr>
      <tr>
        <td bordercolor="#999999" bordercolorlight="#C0C0C0" bordercolordark="#666666" align="justify" width="64" valign="top">&nbsp;</td>
        <td bordercolor="#999999" bordercolorlight="#C0C0C0" bordercolordark="#666666" align="justify" colspan="3" width="353">&nbsp;</td>
      </tr>
      <tr>
        <td bordercolor="#999999" bordercolorlight="#C0C0C0" bordercolordark="#666666" align="justify" width="64" valign="top"><font color="#000080">comments:</font></td>
        <td bordercolor="#999999" bordercolorlight="#C0C0C0" bordercolordark="#666666" align="justify" colspan="3" width="353"><textarea rows="3" name="comments" cols="40"><?php echo "$comments";?></textarea></td>
      </tr>
      <tr>
        <td bordercolor="#999999" bordercolorlight="#C0C0C0" bordercolordark="#666666" align="justify" width="64" valign="top">&nbsp;</td>
        <td bordercolor="#999999" bordercolorlight="#C0C0C0" bordercolordark="#666666" align="justify" colspan="3" width="353" >&nbsp;</td>
      </tr>
      <tr>
        <td bordercolor="#999999" bordercolorlight="#C0C0C0" bordercolordark="#666666" colspan="4" align="center" width="427" valign="top">
        <input type="hidden" value="<?php echo "$action";?>" name="action"><input type="submit" value="<?php echo "$BTN";?>" name="save">
        <input type="hidden" value="<?php echo "$id";?>" name="id"><input type="reset" value="Reset" name="B2"></td>
      </tr>
    </table>
    </center>
  </div>
  <p>&nbsp;</p>
</form>
<p align="center"><b>*Use this screen to Add Shows to the Database</b></p>

    </tr>
  </table>
  </center>
</div>
</body>
<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "show_date",      // ID of the input field
      ifFormat    : "%b %d, %Y",//"%m/%d/%Y",    // the date format
      button      : "DateBtn",    // ID of the button
      showsHelp   : false,
      showsClose  : false
    }
  );
</script>
</html>