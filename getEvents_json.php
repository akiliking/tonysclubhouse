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



//$PUBLISHED = $_SESSION['published'];
$PUBLISHED = (!empty($_SESSION['published']) ? $_SESSION['published'] : 1); 


/*if (!$limit){$limit=1;}
				
$sql_select = 	"SELECT s.pkRecId AS setid, s.setname, s.set_link, h.pkRecId AS showid, h.title AS show_title, " .
				"h.comments AS show_comments, h.show_date, d.pkRecId AS djid, d.DJName, d.info_link AS dj_link " .
				"FROM djdb_tblShowDtl AS s, djdb_tblShow AS h, djdb_tblDJ AS d " .
				"WHERE s.fkShow = h.pkRecId " .
				"AND d.pkRecId = s.fkDJ " .
				"AND pls =1 " .
				"AND (s.set_link IS NOT NULL AND s.set_link <> '') " .
				"Order by RAND( ) LIMIT " .$limit;
*/

//$sql_select = 	"SELECT * FROM djdb_tblEvent where (ifnull(end_date,ifnull( start_date, curdate( ) ) ) > ADDDATE( curdate( ) , -.25 ) ) and active = 1 and published = " .$PUBLISHED ." order by start_date";
$sql_select = 	"SELECT e.* FROM djdb_tblEvent e, djdb_tblsitesettings s
where e.title = 'OnAir' and s.fldSettingName = 'ON_AIR_SWITCH'
and s.fldValue = 'ON'
union
SELECT * FROM djdb_tblEvent where (ifnull(end_date,ifnull( start_date, curdate( ) ) ) > ADDDATE( curdate( ) , -.25 ) ) and active = 1 and published = " .$PUBLISHED ." order by start_date;";


//-- and active = 1 and published = " .$PUBLISHED ."  and 
//echo $sql_select;

$show_result = mysql_query($sql_select) or die ("Error occured while querying database");
 
// $scores = array();
$events = array();
$numshows= mysql_num_rows($show_result);
 if ($numshows > 0) {
	while($event = mysql_fetch_assoc($show_result)) {
		$events[] = array('event'=>$event);
	}

      header('Content-type: application/json');
     // echo $numshows;
      if (!function_exists('json_encode')) {
			echo 'json_encode not supported';
		
	  }else{
	  		echo json_encode(array('events'=>$events));
	  }
      
      
 
 	}
 			
 			



 
 
?>
