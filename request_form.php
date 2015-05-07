 
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
			//echo $dbRow["fldFName"];
			$displayname = (($dbRow["fldFName"])? $dbRow["fldFName"]." ".$dbRow["fldLName"] : $_SESSION['user_name']);
			
			//echo $fromemailaddr;
			} 
  }

?>
<body>   
<p></p>
	<table width="75%"><tr><td><p align="center"><font size="+1" face="Verdana, Arial, Helvetica, sans-serif"><font color="#FFFFFF">House 
        Fans <br><br>
		
        Make your Requests and Shout-Outs today... and we'll try hard to get it in 
        the next mix.</font></p></td></tr></table>

<form name="form1" method="post" action="base.php?page=request_handler.php">
  <table width="50%" border="0" class="statstable">
    <th colspan="2">Tony's Clubhouse: Special Requests and Shout-Out Form</th>
    <tr> 
      <td>Your Name:</td>
      <td><input  name="username" type="text" id="username2" value="<?php echo $displayname; ?>" size="50"></td>
    </tr>
    <tr> 
      <td>Your Email:</td>
      <td><input  name="fromemailaddr" type="text" id="fromemailaddr3" value="<?php echo $fromemailaddr; ?>" size="50">
        Copy Me: 
        <input name="carboncopy" type="checkbox" id="carboncopy2" value="carboncopy"></td>
    </tr>
    <tr> 
      <td>Request Type:</td>
      <td><select name="request_type">
          <option value="Song Request">Song Request</option>
          <option value="Shout Out">Shout Out</option>
          <option value="Other">Other</option>
        </select></td>
    </tr>
    <tr> 
      <td>Artist:</td>
      <td><input name="artist" type="text" id="artist2" size="50"></td>
    </tr>
    <tr> 
      <td>Song:</td>
      <td><input name="song" type="text" id="song2" size="50"></td>
    </tr>
    <tr> 
      <td>Message to DJ</td>
      <td><textarea name="message" cols="50" rows="10" id="textarea"></textarea></td>
    </tr>
    <tr> 
      <td> <input name="RequestType" type="hidden" value="sendemail"> <input name="email" type="hidden" value="TONYS CLUBHOUSE<tonysclubhouse@kingplus.com>"> 
      </td>
      <td><input class='button' type="submit" name="Submit" value="Send"> <input name="userid" type="hidden" id="userid" value="$userid"></td>
    </tr>
  </table>
  <p>&nbsp; </p>
  <p>&nbsp; </p>
</form>

