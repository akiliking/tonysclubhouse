<?php
/*
 * Created on Oct 25, 2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */ 
 require 'jsonwrapper.php';
 // include_once "DB/dbutils.php";
 include_once "dbobjects/playlist_db.php";
 // $SCORESDB = new DBUTILS();
 $PLAYLISTDB = new PLAYLISTDB();


$userid = $_SESSION['userid'];
$USERTYPE = $_SESSION['user_type'];

if (!$limit){$limit=20;}
 //$setresult =  $SCORESDB->insertScore($Player_Name,$Location,$Score,$DeviceId); 
// $result =  $SCORESDB->getGameScores($GameName); 
// $streamS = $PLAYLISTDB->getallstreams(1);



//sql for querying db for all records

$sql_select = "SELECT name, icon, url as stream_url FROM `clubhouse_streams` WHERE active = 1 order by name";			
$stream_result = mysql_query($sql_select) or die ("Error occured while querying database");
 
// $scores = array();
$streams = array();
$numstreams= mysql_num_rows($stream_result);
 if ($numstreams > 0) {
	while($stream = mysql_fetch_assoc($stream_result)) {
		$streams[] = $stream;
		//$streams[] = array('stream'=>$stream);
	}
	
      header('Content-type: application/json');
      //echo $numstreams;
      if (!function_exists('json_encode')) {
			echo 'json_encode not supported';
		
	  }else{
	  		echo json_encode($streams);
	  		//echo json_encode(array('streams'=>$streams));
	  }
      
      
 
 	}
 			
 			



 
 
?>
