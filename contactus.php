<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<?php  
	include_once "dbobjects/dbutils.php";
  	$USR = new dbutils($dbName, $dbLogin, $dbPassword);
	//echo $_SESSION['user_name'];
	if (isset($_SESSION['user_name'])){
		$userid = $_SESSION['userid'];
		//echo $userid;
		$dbResultSet = $USR->getMemberByUserId($userid);
		while($dbRow = mysql_fetch_array($dbResultSet, MYSQL_ASSOC)) {
			$fromemailaddr = $dbRow["fldEmail"]; 
			//echo $fromemailaddr;
			} 
  }

?>
<body>
<form name="form1" method="post" action="base.php?page=email.php">
  <p>&nbsp;</p>
  <p>&nbsp;</p>  <p>&nbsp;</p>  <p>&nbsp;</p>
  <table width="50%" border="0" class="statstable">
  <th colspan="2">Contact Tony's Clubhouse</th>
    <tr> 
      <td>Your Email:</td>
      <td><input  name="fromemailaddr" type="text" id="fromemailaddr" value="<?php echo $fromemailaddr; ?>" size="50"> Copy Me:
	  <input name="carboncopy" type="checkbox" id="carboncopy" value="carboncopy"></td>
    </tr>
    <tr> 
      <td>SubJect</td>
      <td><input name="subject" type="text" id="subject" size="50"></td>
    </tr>
    <tr> 
      <td>Message</td>
      <td><textarea name="message" cols="50" rows="10" id="message"></textarea></td>
    </tr>
    <tr>
      <td> <input name="RequestType" type="hidden" value="sendemail"> 
	  	 	<input name="email" type="hidden" value="TONYS CLUBHOUSE<tonysclubhouse@kingplus.com>"> 
	  </td>
      <td><input class='button' type="submit" name="Submit" value="Send"></td>
    </tr>
  </table>
  <p>&nbsp; </p>
  <p>&nbsp; </p>
</form>

</body>
</html>
