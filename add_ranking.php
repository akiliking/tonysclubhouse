

<?php

 
  include_once "slr/MullinerRanking.php";    

  $playerFirstName 			= $_POST["first_name"];
  $playerLastName 			= $_POST["last_name"];
  $playerName 					= $playerFirstName . " " . $playerLastName;
  $tournamentName 		= $_POST["tournament_name"];
  $rankInTournament 		= $_POST["rank"];
  
  extract($_POST,'$'); // get post values and prefix with $ ie. $FName,$LName,$Login, $Password
                  
  $slr = new MullinerRanking($dbName, $dbLogin, $dbPassword);
  if($Status == "Verified"){
  	$msgResult = $slr->updatePlayerRanking($playerName, $tournamentName, $rankInTournament, $PlayerId,$TournamentId); 
	
  }
  else{
  	$msgResult = $slr->updatePlayerRankingUnverified($playerName, $tournamentName, $rankInTournament, $PlayerId,$TournamentId);
  }


?>

 <table class="playertatstable" cellSpacing="0" cellPadding="0" width="90%">
  <tr>
		<th colspan="3" align="center"><?php echo $msgResult ?>&nbsp;</th></tr>
    <tr>
  	  <td align="right" colspan="1">Player:</td>
  	  <td colspan="2"><?php echo $PlayerId ?>&nbsp;</td>
  	</tr>
    <tr>
  	  <td align="right" colspan="1">Tournament:</td>
  	  <td colspan="2"><?php echo $tournamentName ?>&nbsp;</td>
  	</tr>
    <tr>
  	  <td align="right" colspan="1">Rank:</td>
  	  <td colspan="2"><?php echo $rankInTournament ?>&nbsp;</td>
  	</tr>
  </table>