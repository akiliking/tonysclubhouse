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
<?php

	include "admin_top_navbar.php";

//include "navbar.php";
include_once "dbobjects/webdata.php";
  extract($_POST,'$'); // get post values and prefix with $ ie. $FName,$LName,$Login, $Password
  $NEWS = new GETWEBDATA($dbName, $dbLogin, $dbPassword);
  
    include_once "dbobjects/webdata.php";
  $GETWEBDATA = new GETWEBDATA($dbName, $dbLogin, $dbPassword);

if ( $update_clicked == "1" ) {
//	echo $id;
//	echo $category;
	$dbResultSet =  $NEWS->updateDynamicData($id, $category, $Type, $title, 1, $summary, $detail, $author, $TDate); 
 	echo "<META HTTP-EQUIV='refresh' content='0;URL=base.php?page=admin/adminOtherData.php'>";

	}

  $dbResultSet =  $NEWS->getDynamicData($id, '', '', ''); 
    while($dbRow = mysql_fetch_array($dbResultSet, MYSQL_ASSOC)) {
		$title =$dbRow["title"];
		if ($dbRow["date"]){$TDate = date("m/d/y",strtotime($dbRow["date"]));} 
		$author =$dbRow["author"];
		$sum = $dbRow["summary"];
		$detail = $dbRow["detail"];
		$urllink = $dbRow["urllink"];
		$datatype = $dbRow["type"];

 
		
    }

?> 
  <form name="RTEDemo" onsubmit="return submitForm();" method='post' action=base.php?page=admin/editdata.php&id=<?php echo $_GET['id']?>&category=<?php echo $_GET['category']?>>
					<table class="playertatstable" id="Table2" cellSpacing="0" cellPadding="0" width="90%">
						<tr>
							<td class="level2" align="right">Title:</td>
							<td align="left"><input name="title" size="50" type="text" id="title" value="<?php echo $title;?>"></td>
						</tr>
						<tr>
							<td class="level2" align="right">Author:</td>
							<td align="left"><input name="author" type="text" id="author" value="<?php echo $author;?>"></td>
						</tr>
						<tr>
							<td class="level2" align="right">Date:</td>
							<td><input name="TDate" type="text" id="TDate" value="<?php echo $TDate;?>"><a href="#null"><img src="images/cal.gif" id="DateBtn" width="16" height="16" border="0"></a></Td>
						</tr>
						<tr>
							<td class="level2" align="right">Summary:</td>
							<td><textarea name="summary" cols="30" rows="2" id="summary" ><?php echo $sum;?></textarea></td>
						</tr>
    <tr> 
      <td colspan="2"> 
<noscript><p><b>Javascript must be enabled to use this form.</b></p></noscript>

<script language="JavaScript" type="text/javascript">
<!--
<?php
//format content for preloading
//if (!(isset($_POST["detail"]))) {
//	$content = "";
//	$content = $GETWEBDATA->rteSafe($content);
//} else {
//	//retrieve posted value
//	$content = $GETWEBDATA->rteSafe($_POST["detail"]);
//}
$content = $GETWEBDATA->rteSafe($detail);

?>//Usage: writeRichText(fieldname, html, width, height, buttons, readOnly)
writeRichText('detail', '<?=$content;?>', "90%", 200, true, false);
//-->
</script></td>
    </tr>
						<tr>
							<td colspan="3" align='center'>URL Link =  <?php echo $urllink;?> </td>
						</tr>
						<tr>
							<td colspan="3" align='center'> <input class='button' type='submit' value='Save'> 
							<input type="hidden" name="Type" id="Type" value="<?php echo $datatype;?>" ></td>
						</tr>
						<input type="hidden" name="update_clicked" id="update_clicked" value="1">
					</table>

 </form>
<script type="text/javascript">
  Calendar.setup(
    {
      inputField  : "TDate",      // ID of the input field
      ifFormat    : "%m/%d/%Y",    // the date format
      button      : "DateBtn",    // ID of the button
      showsHelp   : false,
      showsClose  : false
    }
  );
</script>