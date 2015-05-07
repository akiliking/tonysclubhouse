<?php
 include_once "dbobjects/dbutils.php";
  $DBUTIL = new dbutils($dbName, $dbLogin, $dbPassword);
$isValid = $DBUTIL->tmpValidate('AHVF5','fec400f4bddbd1a59919d349448a78');

echo "verify: " . $isValid;


?>
