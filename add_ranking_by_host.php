<?php
	include_once "init.php";
	
  include_once "slr/MullinerRanking.php";    

  extract($_POST,'$'); // get post values and prefix with $ ie. $FName,$LName,$Login, $Password
  $slr = new MullinerRanking($dbName, $dbLogin, $dbPassword);
 	$msgResult = $slr->updatePlayerRankingByHost($player_id, $tournamentId, $rankInTournament); 
 	echo "<META HTTP-EQUIV='refresh' content='0;URL=base.php?page=edittournament.php&tournamentId=".$tournamentId."'>";
// 	header('location:base.php?page=tournament.php&tournamentId='.$tournamentId);
?>
	
 <table class="playertatstable" cellSpacing="0" cellPadding="0" width="90%">
  <tr>
		<th colspan="3" align="center"><?php echo $msgResult ?>&nbsp;</th></tr>
  </table>
