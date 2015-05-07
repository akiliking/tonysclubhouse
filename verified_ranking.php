<?php

  include_once "slr/MullinerRanking.php";    


  $slr = new MullinerRanking($dbName, $dbLogin, $dbPassword);
  $slr->showRankingsVerified();

?>
