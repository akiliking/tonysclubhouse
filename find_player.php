<html>
<head>
<title>DBUTIL</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="css/style.css" rel="stylesheet" type="text/css">

</head>

<center>

<?php
include_once "dbobjects/dbutils.php";
  $DBUTIL = new dbutils($dbName, $dbLogin, $dbPassword);

  ?> 

  <form class="statstable" method='post' action='<?php echo $PHP_SELF ?>'>
  <table class="playertatstable" cellSpacing="0" cellPadding="0" width="90%">
    <tr> 
      <th colspan="3" align="center">Player Search</th>
    </tr>
    <tr> 
      <td align="right" colspan="1">First Name:</td>
      <td colspan="2"><input type='text' name='FName' size='15' value='<?php echo $FName ?>'></td>
    </tr>
    <tr> 
      <td align="right" colspan="1">Last Name:</td>
      <td colspan="2"><input type='text' name='LName' size='15' value='<?php echo $LName ?>'></td>
    </tr>
    <tr>
      <td align="right" colspan="1">Nick Name:</td>
      <td colspan="2"><input name="Alias" type="text" id="Alias" size="25"></td>
    </tr>
    <tr> 
      <td colspan="3">&nbsp; </td>
    </tr>
    <tr> 
      <td colspan="3" align='center'> <input class='button' type='submit' value='Search'></td>
    </tr>
  </table>
 </form>
 <?php
if ( $FName != "" || $LName != "" || $Alias != "" ) {
	
		$DBUTIL->searchForPlayers($FName, $LName, $Alias);
		
	}
?>