<?php 

//header("Content-type: text/xml"); 

include_once "dbobjects/dbutils.php";

// connect to db
$DBUTIL = new DBUTILS('','','');

//$data = $DBUTIL->query_xml("SELECT title, UNIX_TIMESTAMP(show_date) AS showdate from djdb_tblShow GROUP BY title, show_date ");
//echo $data; 
//

$log = $DBUTIL->log_transaction("Transaction");
echo $log;


//$log = $DBUTIL->url_exists("http://www.cnn.com");
//echo $log;
?>