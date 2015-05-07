<?php


  include "navbar.php";
  
//echo "hello world";

  include_once "dbobjects/dbutils.php";

  $dbName                       = "kingplus_kingplusdb"; // $_GET["db"];
  $dbLogin                      = "kingplus_sa"; // $_GET["login"];
  $dbPassword                   = "sa"; // $_GET["password"];
  extract($_POST,'$'); // get post values and prefix with $ ie. $FName,$LName,$Login, $Password

  $IAPPP = new dbutils($dbName, $dbLogin, $dbPassword);
  if ($RequestType == "addTournament"){
  	$result = $IAPPP-> insertTournament($Type, $TName, $Entries, $State)  . "<br/>";
  }elseif($RequestType == "addUser"){
  	if(!$Login){$result = "User Login cannot be blank...";}else{
  	$result = $IAPPP->insertUser($FName,$LName,$Login, $Password, $Type, $State) . "<br/>";  }
  }
  echo $result;
?>
