<?php
/*
	This is the back-end PHP file for the AJAX Suggest Tutorial
	
*/

//Send some headers to keep the user's browser from caching the response.
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" ); 
header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" ); 
header("Cache-Control: no-cache, must-revalidate" ); 
header("Pragma: no-cache" );
header("Content-Type: text/xml; charset=utf-8");
//Get our database abstraction file

include 'dbobjects/dbutils.php';
///Make sure that a value was sent.
  $DBUTILS = new dbutils("","","");


if (isset($_GET['search']) && $_GET['search'] != '') {
	//Add slashes to any quotes to avoid SQL problems.
	$search = addslashes($_GET['search']);
	//Get every page title for the site.
	$suggest_query = $DBUTILS->db_query("SELECT distinct($fieldname) as suggest FROM $tablename WHERE upper($fieldname) like upper('" . $search . "%') ORDER BY $fieldname");
	while($suggest = $DBUTILS->db_fetch_array($suggest_query)) {
		//Return each page title seperated by a newline.
		echo $suggest['suggest'] . "\n";
	}
}
?>