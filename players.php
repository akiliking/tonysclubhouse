<?php

  include_once "dbobjects/dbutils.php";    


  $dbo = new dbutils($dbName, $dbLogin, $dbPassword);
  $dbo-> showPlayers(0,30);

?>
