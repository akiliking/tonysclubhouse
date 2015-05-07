<?php

  include "navbar.php";

  include_once "slr/MullinerRanking.php";    

//  $dbName 			= $_GET["db"];
//  $dbLogin 			= $_GET["login"];
//  $dbPassword 			= $_GET["password"];
  $dbName                       = "kingplus_kingplusdb"; // $_GET["db"];
  $dbLogin                      = "kingplus_sa"; // $_GET["login"];
  $dbPassword                   = "sa"; // $_GET["password"];
                  
  $slr = new MullinerRanking($dbName, $dbLogin, $dbPassword);
  $slr->showRankingsUnVerified();

?>

