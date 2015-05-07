<?php

  include_once "slr/MullinerRanking.php";    

  $dbName                       = "kingplus_kingplusdb"; // $_GET["db"];
  $dbLogin                      = "kingplus_sa"; // $_GET["login"];
  $dbPassword                   = "sa"; // $_GET["password"];
                  
  $slr = new MullinerRanking($dbName, $dbLogin, $dbPassword);
  $slr->showTopRankingsUnVerified(5);

?>
