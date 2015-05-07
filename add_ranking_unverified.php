<html>
<head>
  <title>Fire Study</title>
  <LINK href="css/stylesheet.css" type="text/css" rel="stylesheet">
</head>
<body bgcolor="white">

<?php

  include "navbar.php";

  include_once "slr/MullinerRanking.php";    

//  $dbName 			= "omar_test"; // $_GET["db"];
//  $dbLogin 			= "admin"; // $_GET["login"];
//  $dbPassword 			= "admin"; // $_GET["password"];
  $dbName                       = "kingplus_kingplusdb"; // $_GET["db"];
  $dbLogin                      = "kingplus_sa"; // $_GET["login"];
  $dbPassword                   = "sa"; // $_GET["password"];
  $playerName 			= $_POST["player_name"];
  $tournamentName 		= $_POST["tournament_name"];
  $rankInTournament 		= $_POST["rank"];
                  
  echo "<br/>";
  echo "Player          : " . $playerName . "<br/>";
  echo "Tournament      : " . $tournamentName ."<br/>";
  echo "Rank            : " . $rankInTournament . "<br/>";

  $slr = new MullinerRanking($dbName, $dbLogin, $dbPassword);
  $slr->updatePlayerRankingUnverified($playerName, $tournamentName, $rankInTournament);
  echo "Ranking Added...<br/>";

?>
</body>
</html>
