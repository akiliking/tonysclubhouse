<center>

<?php

//include "navbar.php";
include_once "dbobjects/dbutils.php";
  extract($_POST,'$'); // get post values and prefix with $ ie. $FName,$LName,$Login, $Password
  $IAPPP = new dbutils($dbName, $dbLogin, $dbPassword);

  $dbResultSet =  $IAPPP->getTournamentById($tournamentId); 
    while($dbRow = mysql_fetch_array($dbResultSet, MYSQL_ASSOC)) {
		$TName =$dbRow["fldTournamentName"];
		$TDate =$dbRow["fldTournamentDate"]; 
		$THost =$dbRow["fldHostName"];
		$HostId = $dbRow["fldHostId"];
		$TLocation = $dbRow["fldCity"] ." " .$dbRow["fldName"];
		$TDate = $dbRow["fldTournamentDate"];
		if($TDate){$TDate = date("F j, Y ",strtotime($TDate));}
 
		
    }

?> 
<p></p>
					<table class="playertatstable" cellSpacing="0" cellPadding="0" width="90%">
						<tr>
							<th align="center"><?php echo $TName;?>&nbsp;</th></tr>
					</table>
					<table class="playertatstable" id="Table2" cellSpacing="0" cellPadding="0" width="90%">
						<tr>
							<td bgcolor="#F3F3F3" align="center" ><img src="images/tournament.jpg"></img></td>
							<td class="level2" align="right">
								<b>Hosted by:&nbsp;</b><br/>
								<b>When:&nbsp;</b><br/>
								<b>Where:&nbsp;</b>
							</TH>
							<td align="left">
								<b><?php echo "<a href=base.php?page=HostProfile.php&HostId=".$HostId.">".$THost ."</a>";?></b><br/>
								<b><?php echo $TDate;?></b><br/>
								<b><?php echo $TLocation;?></b>
							</TH>
						</tr>
					</table>
<br/>

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
								<b>Player Grade</b>
							</TH>
							<td class="level2" align="center">
								<b>Tournament Rank</b>
							</TH>
							<td class="level2" align="center">
								<b>Verified</b>
							</TH>
						</tr>
				
					
    <?php
    
    $dbResultSet = $IAPPP->getTournamentPlayers($tournamentId); 
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
					echo "  <td align='center'><img src='images/notchecked.gif'></td>";
				}
        echo "</tr>";
    }
    ?>
      
</table>


					
