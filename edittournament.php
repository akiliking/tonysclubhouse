<center>

<?php

//include "navbar.php";
include_once "dbobjects/dbutils.php";
  extract($_POST,'$'); // get post values and prefix with $ ie. $FName,$LName,$Login, $Password
  $DBUTIL = new dbutils($dbName, $dbLogin, $dbPassword);

  $dbResultSet =  $DBUTIL->getTournamentById($tournamentId); 
    while($dbRow = mysql_fetch_array($dbResultSet, MYSQL_ASSOC)) {
		$TName =$dbRow["fldTournamentName"];
		$THost =$dbRow["fldHostName"];
		$TLocation = $dbRow["fldCity"] ." " .$dbRow["fldName"];
		$TDate = $dbRow["fldTournamentDate"];
		if($TDate){$TDate = date("M j, Y g:i a ",strtotime($TDate));}

 
		
    }

?> 
<p></p>
					<table class="playertatstable" cellSpacing="0" cellPadding="0" width="90%">
						<tr>
							<th align="center"><?php echo $TName;?>&nbsp;</th></tr>
					</table>
					<table class="playertatstable" id="Table2" cellSpacing="0" cellPadding="0" width="90%">
						<tr>
							<td bgcolor="#F3F3F3" align="center" ><img src="images/ACE_sm.jpg"></img></td>
							<td class="level2" align="right">
								<b>Hosted by:&nbsp;</b><br/>
								<b>Date:&nbsp;</b><br/>
								<b>Location:&nbsp;</b>
							</TH>
							<td align="left">
								<b><?php echo $THost;?></b><br/>
								<b><?php echo $TDate;?></b><br/>
								<b><?php echo $TLocation;?></b>
							</TH>
						</tr>
					</table>

<br/>
    <form method='post' id='player_add' name='player_add' action='add_ranking_by_host.php'>

					<table class="playertatstable" cellSpacing="0" cellPadding="0" width="90%">
					<tr>
							<th colspan="3" align="center">Find a Player</th></tr>
						<tr>
							<td colspan="1" align="right">Player Id:</th>
							<td><input type='text' id='player_id' name='player_id' readonly size='5' value='<?php $PlayerId ?>' ><input type="button" value="Search" name="Search" class="button" onclick="javascript:popupWin('find_player.php')"></td>
						</tr>
				    <tr>
				  	  <td align="right" colspan="1">Rank:</td>
				  	  <td colspan="2"><input type='text' name='rankInTournament' size='15'></td>
				  	</tr>
				    <tr>
				  	  <td colspan="3" align='center'>
				  	    <input class='button' type='submit' value='Add Tournament Ranking'>
				  	  </td>
				    </tr>
				    <input type='hidden' id='tournamentId' name='tournamentId' value='<?php echo $tournamentId ?>'>
					</table>
	</form>

					<table class="playertatstable" cellSpacing="0" cellPadding="0" width="90%">
						<tr>
							<th align="center">Players</th></tr>
					</table>
					<table class="playertatstable" id="Table2" cellSpacing="0" cellPadding="0" width="90%">
						<tr>
							<td class="level2" align="center">
								<b>Player Name</b>
							</TH>
							<td class="level2" align="center">
								<b>Grade</b>
							</TH>
							<td class="level2" align="center">
								<b>Rank</b>
							</TH>
							<td class="level2" align="center">
								<b>Verified</b>
							</TH>
							<td class="level2" align="center">
								<b>Action</b>
							</TH>
						</tr>
				
					
    <?php
    
    $dbResultSet = $DBUTIL->getTournamentPlayers($tournamentId); 
    while($dbRow = mysql_fetch_array($dbResultSet, MYSQL_ASSOC)) {
		
        echo "<tr>";
        echo "  <td align='center'><a href=base.php?page=UserProfile.php&PlayerId=".$dbRow["fldPlayerId"].">".$dbRow["fldNickName"]."</td>";
        echo "  <td align='center'>".$dbRow["fldPlayerGrade"]."&nbsp;</td>";
        echo "  <td align='center'>".$dbRow["fldPlayerRank"]."&nbsp;</td>";
				if ($dbRow["fldVerified"] == 1)
				{
					echo "  <td align='center'><img src='images/check.gif'></td>";
				}
				else
				{
					//Notes:  Popup Verification page
					echo "  <td align='center'><input type='button' value='Verify' name='Verify' class='button' onclick=\"javascript:popupWin('verify_player.php?PlayerId=".$dbRow["fldPlayerId"]."&TournamentId=".$tournamentId."&Rank=".$dbRow["fldPlayerRank"]."&PName=".$dbRow["fldNickName"]."&TName=".$TName."')\"></td>";
        //echo "  <td align='center'><a class=newsListMoreLink href=verify_player.php?PlayerId=".$dbRow["fldPlayerId"]."&TournamentId=".$tournamentId."&Rank=".$dbRow["fldPlayerRank"].">Verify</a></td>";
					//echo "  <td align='center'><img src='images/notchecked.gif'></td>";
				}
        echo "  <td align='center'><a class=newsListMoreLink href=remove_player.php?PlayerId=".$dbRow["fldPlayerId"]."&TournamentId=".$tournamentId.">Remove</a></td>";
        echo "</tr>";
    }
    ?>

   <input type='hidden' id='tournamentId' name='tournamentId' value='<?php echo $tournamentId ?>'>

</table>
					
