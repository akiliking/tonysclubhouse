<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

	<script language="JavaScript" type="text/javascript" src="html2xhtml.js"></script>
	<!-- To decrease bandwidth, use richtext_compressed.js instead of richtext.js //-->
	<script language="JavaScript" type="text/javascript" src="richtext.js"></script>
	<script language="JavaScript" type="text/javascript">
<!--
function submitForm() {
	//make sure hidden and iframe values are in sync before submitting form
	//to sync only 1 rte, use updateRTE(rte)
	//to sync all rtes, use updateRTEs
	updateRTE('message');
	//updateRTEs();
	
	//change the following line to true to submit form
	return true;
}
//Usage: initRTE(imagesPath, includesPath, cssFile, genXHTML)
initRTE("images/", "", "", true);
//-->
</script>

</head>

<body>
<?php 	include_once "dbobjects/webdata.php";
  	extract($_POST,'$'); // get post values and prefix with $ ie. $FName,$LName,$Login, $Password
  	$NEWS = new GETWEBDATA($dbName, $dbLogin, $dbPassword);
?>
<form name="form1" onSubmit="return submitForm();" method="post" action="base.php?page=email.php">
  <p>&nbsp;</p>
  <p><strong><font color="#FF0000">WARNING! This form is used to send an email 
    to all non-exempt clubhouse members. Please Proof read prior to submitting.</font></strong></p>
  <p>&nbsp;</p>
  <table width="50%" border="0" class="statstable">
    <tr> 
      <td>SubJect</td>
      <td><input name="subject" type="text" id="subject" size="50"></td>
    </tr>
    <tr> 
      <td>Message</td>
      <td><noscript><textarea name="message" cols="50" rows="15" id="message"></textarea></noscript>
		<script language="JavaScript" type="text/javascript">
		<!--
			//Usage: writeRichText(fieldname, html, width, height, buttons, readOnly)
			<?php echo"	writeRichText('message', \"$message\", '90%', 200, true, false);";?>
		//--> 
		</script>
	</td>
    </tr>
	<tr>	
	<td colspan="1" align="right" >Enter Verification Code:</td>
	  <td colspan="2" ><input name="authcode" type="text" id="authcode"  size="10" value="" ><br /><img src="randomimage.php"> </td>
	</tr>



    <tr> 
      <td><input name="RequestType" type="hidden" value="sendemail"> <input name="email" type="hidden" value="allmembers"> 
        <input name="fromemailaddr" type="hidden" value="TONYS CLUBHOUSE<tonysclubhouse@kingplus.com>"> 
      </td>
      <td><input type="submit" name="Submit" value="Send"></td>
    </tr>
  </table>
  <p>&nbsp; </p>
  <p>&nbsp; </p>
</form>

</body>
</html>
