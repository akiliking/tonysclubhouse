<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>ClubHouse Mobile</title>

	<meta name="author" content="kingplus" />
	<meta name="copyright" content="copyright 2009 kingplus.com" />
	<meta name="description" content="ClubHouse Mobile - Kingplus, Inc." />
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
	<META NAME =”keywords” CONTENT="house music dj club songs mix dance beats disco">
	<link rel="apple-touch-icon" href="images/logo.png"/>
	<link rel="shortcut icon" href="images/logo.png" >

	<style type="text/css">
		@import url("clubhousemobile.css");
	</style>

	<script type="text/javascript" src="orientation.js"></script>
	<script type="text/javascript">
		window.addEventListener("load", function() { setTimeout(loaded, 100) }, false);
	
		function loaded() {
			document.getElementById("page_wrapper").style.visibility = "visible";
			window.scrollTo(0, 1); // pan to the bottom, hides the location bar
		}


	</script>
	<script type="text/javascript"><!--
	  // XHTML should not attempt to parse these strings, declare them CDATA.
	  /* <![CDATA[ */
	  window.googleAfmcRequest = {
	    client: 'ca-mb-pub-0799542483187963',
	    format: '320x50_mb',
	    output: 'html',
	    slotname: '1328489023',
	  };
	  /* ]]> */
	 //-->
	</script>
	
	

</head>

<body onorientationchange="updateOrientation();" bgcolor="#000000" >

<!--	 Header Band
		<div id="page_wrapper">
		<h1>ClubHouse Mobile</h1>
		</div>

-->
	
		<div align="center">
		  <center>
		
		
		<p/><font color="#E3FFEB">
		<table border="0" width="100%" cellspacing="0" cellpadding="0" height="100%">
		  <tr>
		    <td width="100%" valign="top" align="left" colspan="2">
		      <p align="center"><b><font color="#223E4C" size="5"><b>ClubHouse Featured Events</b></font><font color="#CCD3B6"></p>
		      <p align="center"><b>[ <a href="index.html">Home</a> | <a href="history.html">History of House Music</a> |  <a href="store.html">Merchandise</a> |
		      	<a href="videopage.php">Videos</a> | <a href="featured.html">ClubHouse Featured</a> | <a href="events.php">Events Page</a>]
			  </p>
			  <hr>
			</td>
		  </tr>		  	
		  <tr>
		    <td colspan="3" valign="top" align="center"> 
		    	
<?php

 include_once "dbobjects/playlist_db.php";
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

$sql_select = 	"SELECT description FROM djdb_tblEvent where (ifnull(end_date,ifnull( start_date, curdate( ) ) ) > ADDDATE( curdate( ) , -.25 ) ) and active = 1 and published = " .$PUBLISHED ." order by start_date";
//-- and active = 1 and published = " .$PUBLISHED ."  and 
//echo $sql_select;

$show_result = mysql_query($sql_select) or die ("Error occured while querying database");
 
// $scores = array();
$events = array();
$numshows= mysql_num_rows($show_result);
 if ($numshows > 0) {
	while($event = mysql_fetch_assoc($show_result)) {
		//$events[] = array('event'=>$event);
		echo "<p><div>" .$event['description'] ."</div></p>";

	}
 
 
 }
 			
 			



 
 
?>				
				
  			</td>
  		 </tr>	  
		</table></font>
		  </center>
		</div>


</body>
</html>
