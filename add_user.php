<?php


  include "navbar.php";
  
//echo "hello world";

  include_once "dbobjects/dbutils.php";

  extract($_POST,'$'); // get post values and prefix with $ ie. $FName,$LName,$Login, $Password

  $DBUTIL = new dbutils($dbName, $dbLogin, $dbPassword);
  if ($RequestType == "addTournament"){
  	$result = $DBUTIL-> insertTournament($Type, $TName, $Entries, $State)  . "<br/>";
  }elseif($RequestType == "addUser"){
  	if(!$Login){$result = "User Login cannot be blank...";}else{
  	$result = $DBUTIL->insertUser($FName,$LName,$Login, $Password, $Type, $State) . "<br/>";  }
  }
  if($result == "Completed Successfully")
  {
?>

  	 <table class="playertatstable" cellSpacing="0" cellPadding="0" width="90%">
  <tr>
		<th colspan="3" align="center"><?php echo $result ?>&nbsp;</th></tr>
    <tr>
  	  <td colspan="3">Congrgulations on your new membership.<br/>You will receive and email providing you<br/>
  	  your membership information.  Once again welcome to the family.</td>
  	</tr>
  </table>
<?php  
  }
  else
  {
?>  	
  	 <table class="playertatstable" cellSpacing="0" cellPadding="0" width="90%">
  <tr>
		<th colspan="3" align="center">User already exists... <br/>Please try a different username.</th></tr>
  </table>
<?php  
  }
?>
