<?php

 // include "navbar.php";
include_once "dbobjects/dbutils.php";
                  
  $IAPPP = new dbutils($dbName, $dbLogin, $dbPassword);
  $IAPPP->ShowTournaments();

?>

