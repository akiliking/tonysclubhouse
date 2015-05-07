
<?php

//include "navbar.php";
include_once "dbobjects/webdata.php";
  extract($_POST,'$'); // get post values and prefix with $ ie. $FName,$LName,$Login, $Password
  $NEWS = new GETWEBDATA($dbName, $dbLogin, $dbPassword);

  $dbResultSet =  $NEWS->DeleteDynamicData($id); 
 	echo "<META HTTP-EQUIV='refresh' content='0;URL=base.php?page=admin/adminOtherData.php'>";

?> 


