        <?php
        	 require 'jsonwrapper.php';
			$USERTYPE = $_SESSION['user_type'];
    		$WKDay = date("l");
			$CurTime = time();
			$_SESSION['onair'] = false;
			include_once "dbobjects/playlist_db.php";
			$PLAYLISTDB = new PLAYLISTDB();
	
			//Get the OnAir Settings
			$onairqry = "SELECT * FROM `djdb_tblEvent` WHERE 1";
			$result = mysql_query($onairqry) or die ("Error occured while querying database");
			$numrows= mysql_num_rows($result);
			$list = mysql_fetch_array($result, MYSQL_ASSOC);
			//$onairsetting = strtoupper ($list["fldValue"]);
			
  $rows = array();

 if ($numrows > 0) {

      header('Content-type: application/json');

      if (!function_exists('json_encode')) {
			echo 'json_encode not supported';
		
	  }else{
	  		echo json_encode($list);
	  }
      
      
 
 	}



			
?>