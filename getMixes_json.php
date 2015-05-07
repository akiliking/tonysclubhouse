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
// $SHOWS = $PLAYLISTDB->getallshows(1);



//sql for querying db for all records
//$sql_select = "SELECT *,UNIX_TIMESTAMP(show_date) AS time FROM djdb_tblShow where active=1 $filter order by show_date DESC, timestamp DESC";

/*$sql_select = "SELECT *,s.pkRecId as setid " .
			  "FROM djdb_tblShowDtl AS s, djdb_tblShow AS h, djdb_tbldj d " .
			  "WHERE s.fkShow = h.pkRecId " .
			  "and d." .
			  "and (s.set_link is not null AND s.set_link <> '')";
*/
				
				
$sql_select = 	"SELECT s.pkRecId AS setid, s.setname, s.set_link, h.pkRecId AS showid, h.title AS show_title, " .
				"h.comments AS show_comments, h.show_date, d.pkRecId AS djid, d.DJName, d.info_link AS dj_link " .
				"FROM djdb_tblShowDtl AS s, djdb_tblShow AS h, djdb_tblDJ AS d " .
				"WHERE s.fkShow = h.pkRecId " .
				"AND d.pkRecId = s.fkDJ " .
				"AND active =1 " .
				"AND (s.set_link IS NOT NULL AND s.set_link <> '') " .
				"Order by h.show_date desc LIMIT 0 ," .$limit;
				
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
