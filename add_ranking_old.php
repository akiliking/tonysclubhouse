<html>
<head>
  <title>Fire Study</title>
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
  $playerFirstName 			= $_POST["first_name"];
  $playerLastName 			= $_POST["last_name"];
  $playerName 					= $playerFirstName . " " . $playerLastName;
  $tournamentName 		= $_POST["tournament_name"];
  $rankInTournament 		= $_POST["rank"];
  
  extract($_POST,'$'); // get post values and prefix with $ ie. $FName,$LName,$Login, $Password
                  
  echo "<br/>";
  echo "Player          : " . $playerName . "<br/>";
  echo "Tournament      : " . $tournamentName ."<br/>";
  echo "Rank            : " . $rankInTournament . "<br/>";

  $slr = new MullinerRanking($dbName, $dbLogin, $dbPassword);
  if($Status == "Verified"){
  	$msgResult = $slr->updatePlayerRanking($playerName, $tournamentName, $rankInTournament); 
	echo $msgResult;
  	/*if( $slr->updatePlayerRanking($playerName, $tournamentName, $rankInTournament) != "" )
	  {
	  	echo "Ranking Added...<br/>";
	  }
	  else
	  {
	    echo "Player to tournmanet ranking cannot be changed.";
	  }  */	
  }
  else{
  	$msgResult = $slr->updatePlayerRankingUnverified($playerName, $tournamentName, $rankInTournament);
	echo $msgResult; 
  	/*if ($slr->updatePlayerRankingUnverified($playerName, $tournamentName, $rankInTournament) != "" )
	  {
	  	echo "Ranking Added...<br/>";
	  }
	  else
	  {
	    echo "Player to tournmanet ranking cannot be changed.";
	  }*/
  }


?>
</body>
</html>
