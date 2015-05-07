
<?php


include_once "dbobjects/webdata.php";

                   
  $NEWS = new GETWEBDATA($dbName, $dbLogin, $dbPassword);

  $NEWS->GetNewsSummaries(0,4);
  

?>
<!--#include virtual="/cgi-bin/content_feed.pl?feed_id=3012"-->

