<?php 

//header("Content-type: text/xml"); 

include_once "dbobjects/playlist_db.php";

// connect to db
$DBUTIL = new PLAYLISTDB();

$xml_output = $DBUTIL->shows_xml();

echo $xml_output; 

?>