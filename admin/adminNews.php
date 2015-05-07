<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php


include_once "dbobjects/webdata.php";

                   
  $NEWS = new GETWEBDATA($dbName, $dbLogin, $dbPassword);

  $NEWS->GetNewsList();

?>

