<html>
<head>
<title>Clubhouse Mobile Admin Page</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="css/style.css" rel="stylesheet" type="text/css">

	<script language="JavaScript" type="text/javascript" src="html2xhtml.js"></script>
	<!-- To decrease bandwidth, use richtext_compressed.js instead of richtext.js //-->
	<script language="JavaScript" type="text/javascript" src="richtext.js"></script>
	<script language="JavaScript" type="text/javascript">
<!--
function submitForm() {
	//make sure hidden and iframe values are in sync before submitting form
	//to sync only 1 rte, use updateRTE(rte)
	//to sync all rtes, use updateRTEs
	updateRTE('detail');
	//updateRTEs();
	
	//change the following line to true to submit form
	return true;
}
//Usage: initRTE(imagesPath, includesPath, cssFile, genXHTML)
initRTE("images/", "", "", true);
//-->
</script>

</head>

<center> 
<?php

	include "admin_top_navbar.php";
	
  include_once "dbobjects/webdata.php";
  $GETWEBDATA = new GETWEBDATA($dbName, $dbLogin, $dbPassword);
  if(!$id){$RequestType = "addWebData";}else{$RequestType = "updateWebData";}

?>

<table class="statstable" width="90%" border='0' cellpadding='0' cellspacing='0'>
<form name="RTEDemo" action='base.php?page=clubhousedata.php' method="post" onsubmit="return submitForm();">
  <tr><th align="center" colspan="2">Data Modification Tool</th></tr>
    <tr> 
      <td colspan="1"> Category: <select name="CategoryId" id="CategoryId">
          <?php echo $GETWEBDATA->makeWebDataCategoryList(); ?> 
          </select></td>
      <td bordercolor="#999999" bordercolorlight="#C0C0C0" bordercolordark="#666666" align="justify"><font color="#000080">Active:</font>
        <input type="checkbox" name="active" value="1" <?php echo "$checked";?>>
      </td>

    </tr>
    <tr> 
      <td >Title:<input name="title" type="text" id="title" value="<?php echo $title ?>" size="50"></td>
      <td >url:<input name="url" type="text" id="url" value="<?php echo $url ?>" size="50"></td>
    </tr>
    <tr> 
      <td colspan="2">Summary</td>
    </tr>
    <tr> 
      <td colspan="2"><textarea name="summary" cols="40" rows="2" id="summary"></textarea> 
      </td>
    </tr>
    <tr>
      <td colspan="2">Date:</td>
    </tr>
    <tr> 
      <td >Start: <input name="start_date" type="text" id="start_date" value="<?php echo $start_date ?>" size="50">
      	<a href='#null'><img src='../images/cal.gif' id='DateBtn1' width='16' height='16' border='0' title='Calendar'></a>
      </td>
      <td >End: <input name="end_date" type="text" id="end_date" value="<?php echo $end_date ?>" size="50">
      	<a href='#null'><img src='../images/cal.gif' id='DateBtn2' width='16' height='16' border='0' title='Calendar'></a>
      </td>
    </tr> 
    <tr> 
      <td colspan="2"> Detail Info</td>
    </tr>
    <tr> 
      <td colspan="2"> 
<noscript><p><b>Javascript must be enabled to use this form.</b></p></noscript>

<script language="JavaScript" type="text/javascript">

Calendar.setup(
  {
    inputField  : "start_date",      // ID of the input field
    ifFormat    : "%b %d, %Y",//"%m/%d/%Y",    // the date format
    button      : "DateBtn1",    // ID of the button
    showsHelp   : false,
    showsClose  : false
  }
);

Calendar.setup(
		  {
		    inputField  : "end_date",      // ID of the input field
		    ifFormat    : "%b %d, %Y",//"%m/%d/%Y",    // the date format
		    button      : "DateBtn2",    // ID of the button
		    showsHelp   : false,
		    showsClose  : false
		  }
);
<!--
<?php
//format content for preloading
if (!(isset($_POST["detail"]))) {
	$content = "";
	$content = $GETWEBDATA->rteSafe($content);
} else {
	//retrieve posted value
	$content = $GETWEBDATA->rteSafe($_POST["detail"]);
}
?>//Usage: writeRichText(fieldname, html, width, height, buttons, readOnly)
writeRichText('detail', '<?=$content;?>', "90%", 200, true, false);
//-->
</script></td>
    </tr>
<!--    
    <tr> 
      <td colspan="2"><input name="userfile" type="file" id="userfile" size="40">&nbsp; </td>
    </tr>
-->    
    <tr> 
      <td colspan="2" align='center'> <input type='submit' value='Submit'> 
      </td>
    </tr>
    <input name="RequestType" type="hidden" id="RequestType" value=<?php echo "$RequestType";?>>
    <input name="id" type="hidden" id="id" value=<?php echo "$id";?>> 
  </form>
</table>
