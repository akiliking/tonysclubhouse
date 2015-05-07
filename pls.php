<?php	
 // require_once("simplepie.inc");
	include_once "dbobjects/playlist_db.php";

	// connect to db
	$DBUTIL = new PLAYLISTDB();


		/*$showhdr = "SELECT title, UNIX_TIMESTAMP(show_date) AS showdate  
				from djdb_tblShow where pkRecId = $id";
		$shresult = mysql_query($showhdr) or die ("Could not find a playlist for the specified show id: $showhdr");
		$showrow = mysql_fetch_array($shresult, MYSQL_ASSOC);
		$showtitle = $showrow["title"];
		$show_date = date("M jS Y", $showrow["showdate"]);

*/


	$query = "SELECT s. * , s.pkRecId AS setid, d. * , d.pkRecId AS djid
			FROM djdb_tblShowDtl AS s, djdb_tblDJ AS d, djdb_tblShow AS h
			WHERE s.fkDj = d.pkRecId
			AND s.fkShow = h.pkRecId
			ORDER BY s.pkRecId desc";
		//	AND h.pkRecId =$id
    	$result = mysql_query($query) or die("Could not retrieve show detail for id:$id  [$result]");


	
  function getFeedItems($rss, $numberOfFeedItemsToFetch = 50)
  {
    $feed = new SimplePie($rss);
    $feed->init();
    $feed->handle_content_type();
    if ($feed->error()) die ($feed->error()); 
    return $feed->get_items(0,$numberOfFeedItemsToFetch);
  }
  
  $url = urldecode($_GET["url"]);
  $numEntries= $_GET["numEntries"];
  //if (!$numEntries) $numEntries=50;
  //if (!$url) $url = "http://feeds.feedburner.com/cnet/buzzoutloud?tag=rtcol";
  //$items = getFeedItems($url,$numEntries);
   	
  $plsItems = array();
  //foreach($result as $item)  
  while ($item = mysql_fetch_array($result, MYSQL_ASSOC))
  {

      $plsEntry = array();
      $plsEntry["title"] = $item["setname"] ;
      $plsEntry["link"] = $item["set_link"];
	  //$plsEntry["length"] = (int) $item->get_enclosure()->length;
      $plsItems[] = $plsEntry;

  }
	
	header('Content-type: audio/x-scpls; charset=utf-8');
	header('Content-Disposition: attachment; filename="playlist.pls"');
?>[playlist]
NumberOfEntries=<?= count($plsItems) ?>

<?
  for ($i=0; $i<count($plsItems); $i++)
  {
    print("File".($i+1)."=".$plsItems[$i]["link"]."\n");
    print("Title".($i+1)."=".$plsItems[$i]["title"]."\n");
		if ($plsItems[$i]["length"] > 0) print("Length".($i+1)."=".$plsItems[$i]["length"]."\n");
		else  print("Length".($i+1)."=-1\n");
    print("\n");
  }
  print("version=2");
?>
