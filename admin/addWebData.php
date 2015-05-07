<html>
<head>
<title>IAPPP</title>
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
<form name="RTEDemo" action='base.php?page=modifywebdata.php' method="post" onsubmit="return submitForm();">
  <tr><th align="center" colspan="2">Data Modification Tool</th></tr>
    <tr> 
      <td colspan="1"> Category:</td>
      <td colspan="1">Type:</td>
    </tr>
    <tr> 
      <td> <select name="CategoryId" id="CategoryId">
          <?php echo $GETWEBDATA->makeWebDataCategoryList(); ?> </select></td>
      <td><input name='datatype' type='text' id="datatype" value='<?php echo $datatype ?>' size='15'></td>
    </tr>
    <tr>
      <td colspan="2">Author:</td>
    </tr>
    <tr> 
      <td colspan="2"><input name="author" type="text" id="author" value="<?php echo $author ?>" size="50"></td>
    </tr>
    <tr> 
      <td colspan="2">Title</td>
    </tr>
    <tr> 
      <td colspan="2"><input name="title" type="text" id="title" value="<?php echo $title ?>" size="50"></td>
    </tr>
    <tr> 
      <td colspan="2">Summary</td>
    </tr>
    <tr> 
      <td colspan="2"><textarea name="summary" cols="40" rows="2" id="summary"></textarea> 
      </td>
    </tr>
    <tr> 
      <td colspan="2"> Detail Info</td>
    </tr>
    <tr> 
      <td colspan="2"> 
<noscript><p><b>Javascript must be enabled to use this form.</b></p></noscript>

<script language="JavaScript" type="text/javascript">
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
