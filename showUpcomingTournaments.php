<?php


include_once "dbobjects/dbutils.php";
  extract($_POST,'$'); // get post values and prefix with $ ie. $FName,$LName,$Login, $Password
  $IAPPP = new dbutils($dbName, $dbLogin, $dbPassword);

  $IAPPP->showUpcomingTournaments(0,5);

?>
