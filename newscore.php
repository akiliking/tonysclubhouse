<?php

include_once "dbobjects/dbutils.php";
  $IAPPP = new dbutils($dbName, $dbLogin, $dbPassword);
  $USERTYPE = $_SESSION['user_type'];
  /*	if (isset($_SESSION['user_name'])){
		$player_name = 
 */
?> 
    <form method='post' action='add_ranking.php'>

  <table class="playertatstable" cellSpacing="0" cellPadding="0" width="90%">
  <tr>
		<th colspan="3" align="center">Enter your new tournament information</th></tr>
    <tr>
  	  <td align="right" colspan="1">First Name:</td>
  	  <td colspan="2"><input type='text' name='first_name' size='30' value='<?php echo $FName ?>'></td>
  	</tr>
    <tr>
  	  <td align="right" colspan="1">Last Name:</td>
  	  <td colspan="2"><input type='text' name='last_name' size='30' value='<?php echo $LName ?>'></td>
  	</tr>
    <tr>
  	  <td align="center" colspan="4">Tournament Name:</td>
  	</tr>
  	<tr>
  	  <td colspan="4" align="center"><select name="tournamentName" size="1" id="tournamentName"><?php echo $IAPPP->makeTournamentList(); ?></select></td>
  	</tr>
    <tr>
  	  <td align="right" colspan="1">Rank:</td>
  	  <td colspan="3"><input type='text' name='rankInTournament' size='30' value='<?php echo $rank ?>'></td>
    <tr>
  	  <td align="right" colspan="1">Verified</td>
  	  <td colspan="3"><input type="checkbox" name="Status" value="Verified"></td>
  	</tr>
    <tr>
  	  <td colspan="3" align='center'>
  	    <input class='button' type='submit' value='Add Tournament Ranking'>
  	  </td>
    </tr>
  </table>
</form>

