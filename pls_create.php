<?php	
 // require_once("simplepie.inc");
	include_once "dbobjects/playlist_db.php";

	// connect to db
	$DBUTIL = new PLAYLISTDB();




	$query = "SELECT s. * , s.pkRecId AS setid, d. * , d.pkRecId AS djid
			FROM djdb_tblShowDtl AS s, djdb_tblDJ AS d, djdb_tblShow AS h
			WHERE s.fkDj = d.pkRecId
			AND s.fkShow = h.pkRecId 
			AND h.pls = 1
			AND h.active = 1 
			ORDER BY h.show_date desc, setid asc";

    	$result = mysql_query($query) or die("Error: ". mysql_error());


	
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

// CREATE PLS FILE
	$filename = 'playlist.pls';
	$content = " \n";

	
	// Let's make sure the file exists and is writable first.
	if (is_writable($filename)) {
	
	    // In our example we're opening $filename in append mode.
	    // The file pointer is at the bottom of the file hence
	    // that's where $somecontent will go when we fwrite() it.
	    if (!$handle = fopen($filename, 'w')) {
	         echo "Cannot open file ($filename)";
	         exit;
	    }
	

		$content .= "[playlist]\nNumberOfEntries=".count($plsItems);
		$content .= "\n";
		  for ($i=0; $i<count($plsItems); $i++)
		  {
		    $content .= "File".($i+1)."=".$plsItems[$i]["link"]."\n";
		    $content .= "Title".($i+1)."=".$plsItems[$i]["title"]."\n";
				if ($plsItems[$i]["length"] > 0) $content .="Length".($i+1)."=".$plsItems[$i]["length"]."\n";
				else  $content .="Length".($i+1)."=-1\n";
		    $content .="\n";
		  }
		  $content .="version=2";
  


	    // Write $somecontent to our opened file.
	    if (fwrite($handle, $content) === FALSE) {
	        echo "Cannot write to file ($filename)";
	        exit;
	    }

	
	    echo "Success, wrote ($content) to file ($filename)";
	
	    fclose($handle);
	
	} else {
	    echo "The file $filename is not writable";
	};
 
// END PLS FILE
	

?>
