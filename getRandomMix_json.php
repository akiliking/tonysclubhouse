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

if (!$limit){$limit=1;}
				
$sql_select = 	"SELECT s.pkRecId AS setid, s.setname, s.set_link, h.pkRecId AS showid, h.title AS show_title, " .
				"h.comments AS show_comments, h.show_date, d.pkRecId AS djid, d.DJName, d.info_link AS dj_link " .
				"FROM djdb_tblShowDtl AS s, djdb_tblShow AS h, djdb_tblDJ AS d " .
				"WHERE s.fkShow = h.pkRecId " .
				"AND d.pkRecId = s.fkDJ " .
				"AND pls =1 " .
				"AND (s.set_link IS NOT NULL AND s.set_link <> '') " .
				"Order by RAND( ) LIMIT " .$limit;
				
$show_result = mysql_query($sql_select) or die ("Error occured while querying database");
 
// $scores = array();
  $mixes = array();
$numshows= mysql_num_rows($show_result);
 if ($numshows > 0) {
	while($mix = mysql_fetch_assoc($show_result)) {
		$mixes[] = array('mix'=>$mix);
	}

      header('Content-type: application/json');
     // echo $numshows;
      if (!function_exists('json_encode')) {
			echo 'json_encode not supported';
		
	  }else{
	  		echo json_encode(array('mixes'=>$mixes));
	  }
      
      
 
 	}
 			
 			



 
 
?>
