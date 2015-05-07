<html>
<head>
  <title>User Profile</title>
</head>
<body bgcolor="white">

<center>

<?php

//include "navbar.php";
include_once "dbobjects/dbutils.php";
  $dbName                       = "kingplus_kingplusdb"; // $_GET["db"];
  $dbLogin                      = "kingplus_sa"; // $_GET["login"];
  $dbPassword                   = "sa"; // $_GET["password"];
  extract($_POST,'$'); // get post values and prefix with $ ie. $FName,$LName,$Login, $Password
  $IAPPP = new dbutils($dbName, $dbLogin, $dbPassword);

  $dbResultSet =  $IAPPP->getMemberByMemberId($PlayerId); 
    while($dbRow = mysql_fetch_array($dbResultSet, MYSQL_ASSOC)) {
		$PlayerName =$dbRow["fldNickName"]; 
		$PlayerRank =$dbRow["fldPlayerGrade"]; 
		
    }

?> 
<p></p>

<table width="75%" border="0" align="center" bordercolor="#999999">
  <tr bgcolor="#006699"> 
    <th colspan="4"> <div align="center"> 
        <h2><strong>PLAYER TOURNAMENT PROFILE</strong></h2>
      </div></th>
  </tr>
  <tr> 
    <td colspan="2">&nbsp;Player Name: </td>
    <td colspan="2">&nbsp;<?php echo $PlayerName;?></td>
  </tr>
  <tr> 
    <td colspan="2">&nbsp;Ranking: </td>
    <td colspan="2">&nbsp;<?php echo $PlayerRank;?></td>
  </tr>
  <tr> 
    <td colspan="2">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr> 
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr bgcolor="#CCCCCC"> 
    <th colspan="4"> <div align="center"> 
        <h3><strong>TOURNAMENTS</strong></h3>
      </div></th>
  </tr>
  <tr bordercolor="#000000"> 
    <td><div align="center"><strong>Tournament Name</strong></div></td>
    <td><div align="center"><strong>Tournament Date</strong></div></td>
    <td><div align="center"><strong>Rank</strong></div></td>
  </tr>
    <?php
    
    $dbResultSet = $IAPPP->getPlayerTournaments($PlayerId); 
    while($dbRow = mysql_fetch_array($dbResultSet, MYSQL_ASSOC)) {
        echo "<tr>";
        echo "  <td align='center'>".$dbRow["fldTournamentName"]."</td>";
        echo "  <td align='center'>".$dbRow["fldTournamentDate"]."</td>";
        echo "  <td align='center'>".$dbRow["fldPlayerRank"]."</td>";
        echo "</tr>";
    }
    ?>
      
  <tr bordercolor="#000000"> 
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
