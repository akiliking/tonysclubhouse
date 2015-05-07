        <?php
        	 require 'jsonwrapper.php';
			$USERTYPE = $_SESSION['user_type'];
    		$WKDay = date("l");
			$CurTime = time();
			$_SESSION['onair'] = false;
			include_once "dbobjects/playlist_db.php";
			$PLAYLISTDB = new PLAYLISTDB();
	
			//Get the OnAir Settings
			$onairqry = "SELECT fldValue as state FROM djdb_tblsitesettings
					WHERE fldSettingName  = 'ON_AIR_SWITCH'";
			$result = mysql_query($onairqry) or die ("Error occured while querying database");
			$numrows= mysql_num_rows($result);
			$list = mysql_fetch_array($result, MYSQL_ASSOC);
			//$stream_result = mysql_query($sql_select) or die ("Error occured while querying database");
			//$onairsetting = strtoupper ($list["fldValue"]);
			
  $rows = array();

 if ($numrows > 0) {
	 $rows[] = $list;

      header('Content-type: application/json');
	  
      if (!function_exists('json_encode')) {
			echo 'json_encode not supported';
		
	  }else{
	  		echo json_encode($rows);
	  }
      
      
 
 	}



			
?>