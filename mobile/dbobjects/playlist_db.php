<?php

class PLAYLISTDB {

  var $dbConnection; //connection to the database
	

  function PLAYLISTDB() {
	include 'dbobjects/dbcfg.php';
	include_once "dbobjects/dbutils.php";
	return true;
  }	
  function sqlsafe($string){
	    $string = stripslashes($string);
	    $string = str_replace("'", "''", $string);
	    return $string;
	}

 function rteSafe($strText) {
	//returns safe code for preloading in the RTE
	$tmpString = $strText;
	
	//convert all types of single quotes
	$tmpString = str_replace(chr(145), chr(39), $tmpString);
	$tmpString = str_replace(chr(146), chr(39), $tmpString);
	$tmpString = str_replace("'", "&#39;", $tmpString);
	
	//convert all types of double quotes
	$tmpString = str_replace(chr(147), chr(34), $tmpString);
	$tmpString = str_replace(chr(148), chr(34), $tmpString);
//	$tmpString = str_replace("\"", "\"", $tmpString);
	
	//replace carriage returns & line feeds
	$tmpString = str_replace(chr(10), " ", $tmpString);
	$tmpString = str_replace(chr(13), " ", $tmpString);
	
	return $tmpString;
}
 function getallshows($activeonly) {
    // Perform SQL query
	$dbQuery = "SELECT *,UNIX_TIMESTAMP(show_date) AS time FROM djdb_tblShow";
	if($activeonly == 1){$dbResultSet .= " where active=1";}
	$dbResultSet = mysql_query($dbQuery) or die ("Query execute error: Could not find a playlist for the specified show id ").mysql_error();

    return $dbResultSet;
  }
 
  function AddShow($title,$active,$comments, $show_date, $timestamp) {
  	$dbQuery = "INSERT INTO djdb_tblShow (
		title, active, comments, show_date, timestamp) 
		VALUES ('$title', '$active', '$comments', '$show_date', $timestamp)";
	$dbResultSet = mysql_query($dbQuery) or die("Insert execute error: " .mysql_error() ." for: ".$dbQuery);
	$log = $this->log_transaction("AddShow($title,$active,$comments, $show_date, $timestamp) -> " .$dbResultSet);
    return $dbResultSet;
  }
  
  function UpdateShow($id,$title,$active,$comments, $show_date, $timestamp) {
  	$dbQuery = "UPDATE djdb_tblShow SET title = '$title', show_date = '$show_date', active = '$active', comments = '$comments' Where pkRecId = $id";
	$dbResultSet = mysql_query($dbQuery) or die("Insert execute error: " .mysql_error() ." for: ".$dbQuery);
	$log = $this->log_transaction("UpdateShow($id,$title,$active,$comments, $show_date, $timestamp) -> " .$dbResultSet);
    return $dbResultSet;
  }
  
 
  
   function getalldjs() {
    // Perform SQL query
	$dbQuery = "select * from djdb_tblDJ";
	$dbResultSet = mysql_query($dbQuery) or die ("Query execute error: Could not find a playlist for the specified show id ").mysql_error();

    return $dbResultSet;
  }

    function deleteshowbyid($showId) {
    // Perform SQL query
    $dbQuery = "delete from djdb_tblShow where pkRecId  = '$showId'";
    $dbResultSet = mysql_query($dbQuery) or die("Query execute error: " .mysql_error());
	
	$log = $this->log_transaction("Deleted Show with id:" .$showId);

    return $dbResultSet;
  }
  
  function getlatestnews($index,$count) {
    // Perform SQL query
//    $dbQuery = "SELECT * from djdb_tblNews Order by date, timestamp desc LIMIT $index , $count";
    $dbQuery = "SELECT * from djdb_tblNews Order by date desc LIMIT $index , $count";
    $dbResultSet = mysql_query($dbQuery) or die("Query execute error: " .mysql_error());
    return $dbResultSet;
  }


  
    function addEvent($title, $detail, $location, $start_date, $end_date){
  	$dbQuery = "INSERT INTO djdb_tblEvent (title, detail, location, start_date, end_date) 
				VALUES ('$title', '$detail', '$location', '$start_date', '$end_date')";
	$errmsg = "Error: Failed to Insert Record! --  ";
	$success = "$title was successfully Added!";
	$dbResultSet = mysql_query($dbQuery)  or die ($errmsg .mysql_error() ." for: ".$dbQuery);
  }

	/* Random Password generator. generates a random password */ 
	function makeRandomPassword() { 
	  $scheme = "abchefghjkmnpqrstuvwxyz0123456789"; 
	  srand((double)microtime()*1000000); 
		  $i = 0; 
		  while ($i <= 7) { 
				$num = rand() % 33; 
				$tmp = substr($scheme, $num, 1); 
				$pass = $pass . $tmp; 
				$i++; 
		  } 
		  return $pass; 
	} 
  	//Function to convert strings to uppercase.
	 function upper($string) {
		$len=strlen($string);
		$i=0;
		$last="";
		$newstring="";
		$string=strtoupper($string);
		while ($i<$len){
			$char=substr($string,$i,1);
			if (ereg("[A-Z]",$last)){
				$new.=strtolower($char);}
			else{
				$new.=strtoupper($char);}
			$last=$char;
			$i++;
		}
		return($newstring);
	}
	
	 function DeleteDynamicData($Id) {
  	$whr = "where pkRecId = ".$Id;
	$dbQuery = "delete FROM djdb_tblDynamicText " .$whr; 
	$dbResultSet = mysql_query($dbQuery) or die("Query execute error: " .mysql_error() ." for: ".$dbQuery);
	return $dbResultSet;

  }
  
  function getDynamicData($Id, $CategoryId, $Type, $Title) {
  	$whr = "where active = 1 ";
	if ($Id) {$whr = $whr ."and pkRecId = $Id ";}
	if ($CategoryId) {$whr = $whr ."and categoryid = $CategoryId ";}
	if ($Type) {$whr = $whr ."and type = '$Type' ";}
	if ($Title) {$whr = $whr ."and title = '$Title' ";}
	$dbQuery = "SELECT * FROM djdb_tblDynamicText " .$whr; 
	//echo $dbQuery;
	$dbResultSet = mysql_query($dbQuery) or die("Query execute error: " .mysql_error() ." for: ".$dbQuery);
	return $dbResultSet;

  }
   function addDynamicData($CategoryId, $Type, $Title, $active, $summary, $detail,$author, $userfile,$urllink) {
	if (!$active){$active = 1;}
	if (!$CategoryId){$CategoryId = 'NULL';}
	$Title = $this->sqlsafe($Title);
	$Type = $this->sqlsafe($Type);
	$summary = $this->sqlsafe($summary);
	$detail = $this->sqlsafe($detail);
	$author = $this->sqlsafe($author);
	$date	= date("Y-m-d h:i:s");//'2005-02-20 13:10:10',
	if(is_uploaded_file($userfile)){$filelocation = $this->uploadFile($userfile);}
	echo $filelocation;
	echo is_uploaded_file($userfile);
	
	/*$dbQuery = "INSERT INTO `djdb_tblDynamicText` (`id` , `title` , `type` , `active` , `summary` , `detail` , `createdby` , `categoryid`, 'mainimage')
				VALUES (NULL,'$Title', '$Type',$active,'$summary', '$detail', '$author',$CategoryId, '$filelocation' );"; */
	$dbQuery = "INSERT INTO `djdb_tblDynamicText` (`title`, `type`, `active`, `summary`, `detail`, `createdby`, `createdate`, `categoryid`, `date`, `mainimage`, urllink) 
				VALUES ('$Title', '$Type', '$active', '$summary', '$detail', '$author', NOW(), '$CategoryId', '$date', '$filelocation', '$urllink')"; 
	
	$dbResultSet = mysql_query($dbQuery) or die("Query execute error: " .mysql_error() ." for: ".$dbQuery);
	if($CategoryId == 3){
		//Also add to News database (May be temporary until transition
		$result = $this->AddNews($Title,$summary,$detail, $date, $author);
	}
	return $dbResultSet;

  }
 
  function getWebDataCategories() {
    $dbQuery = "SELECT  * from djdb_tblWebDataCategories where active = 1 order by category";
    $dbResultSet = mysql_query($dbQuery) or die("Query execute error: " .mysql_error());
	return $dbResultSet;
  }

  function makeWebDataCategoryList() {
  // returns and html formated list for filling drop down menus	
    $Typelist = $this->getWebDataCategories();
	$CatListValues = "<option value=0 selected>Please Specify</option>";
    while($curType = mysql_fetch_array($Typelist, MYSQL_ASSOC)) {
		$recId = $curType["id"];
		$Category = $curType["category"];
        $CatListValues .="<option value=$recId>$Category</option>";
    }
	return $CatListValues;
 }

   function updateDynamicData($id,$CategoryId, $Type, $Title, $active, $summary, $detail,$author,$TDate) {
   	if (!$active){$active = 1;}
	if (!$CategoryId){$CategoryId = 'NULL';}
	$Title = $this->sqlsafe($Title);
	$Type = $this->sqlsafe($Type);
	$summary = $this->sqlsafe($summary);
	$detail = $this->sqlsafe($detail);
	$author = $this->sqlsafe($author);
	$TDate = date("Y-m-d h:i:s",strtotime($TDate));

	$dbQuery = "UPDATE `djdb_tblDynamicText` set `title` = '$Title' , `type` = '$Type', `active` = $active, 
				`summary`='$summary', `detail`='$detail', `createdby`= '$author', `categoryid` = $CategoryId, `date` = '$TDate'	where id = $id;";
	$dbResultSet = mysql_query($dbQuery) or die("Query execute error: " .mysql_error() ." for: ".$dbQuery);
	return $dbResultSet;

  }

  function delEvent($id){
  	$dbQuery = "DELETE FROM djdb_tblEventSchedule where id=$id";
	$errmsg = "Error: Failed to Delete Record! --  ";
	$success = "Deleted successfully!";
	$dbResultSet = mysql_query($dbQuery)  or die ($errmsg .mysql_error() ." for: ".$dbQuery);
  }
  
  function GetNewsSummaries($index,$count) {
    // Perform SQL query
    $dbResultSet = $this->getlatestnews($index,$count);

    ?>
    
					<TABLE class="newstable" id="Table3" cellSpacing="0" cellPadding="0" width="100%" border="0">
						<TBODY>
							<tr>
								<td class="headline" align="center">CLUBHOUSE News</td>
							</tr>
    <?php
    
    while($dbRow = mysql_fetch_array($dbResultSet, MYSQL_ASSOC)) {
       /* echo "<tr>";
        echo "  <td>";
        echo "	" .date("l, F j, Y ",strtotime($dbRow["date"])). "<b>".$dbRow["title"]."</b> " . $dbRow["summary"];
        echo "	<a class=newsListMoreLink href=base.php?page=news.php&newsid=".$dbRow["pkRecId"].">more...";
        echo "</td>";
        echo " </tr>";
		*/
        echo "<tr>";
        echo "  <td>";
        echo "<p><b>".$dbRow["title"]."</b><br>"; 
		//echo date("l, F j, Y ",strtotime($dbRow["date"]))."</p>";
		echo $dbRow["summary"];
        echo "	<a class=newsListMoreLink href=base.php?page=news.php&newsid=".$dbRow["pkRecId"].">more...";
        echo "</td>";
        echo " </tr>";

    }
    
    ?>
    
    </TBODY>

    </TABLE>
    
    <?php
  }
  
  
//File uploading function
	function uploadFile($userfile){
	// upload the image to the server
	//set image path
	$path = "images/useradded/";
	$msg = "Testing Image upload";
	$max_size = 200000;
	if (isset($userfile)) {
echo "<B>Remote File Name:</B> $userfile<BR>";
echo "<B>Local File Name:</B> $userfile_name<BR>";
echo "<B>Local File Size:</B> $userfile_size<BR>";
if (isset($userfile_type)) {
echo "<B>Local File Type:</B> $userfile_type<P>"; }}
	//if (is_uploaded_file($userfile)) {
		if ($userfile_size > $max_size) { $msg .= "The file is too big! Please keep file under $max_size bytes<br>\n";
		}else{
		$msg .= "Passed file size test " .$userfile_size;
			if (($userfile_type=="image/gif") || ($userfile_type=="image/pjpeg")) {
				$msg .= "Passed file type test " .$userfile_type;

				if (file_exists($path . $userfile_name)) {
					$msg .= "The file already exists<br>\n";
				}else{
					$msg .= "Passed check if exist test " .$path . $userfile_name;

					$res = copy($userfile, $path . $userfile_name);
					if (!$res) {echo "4 $msg";
						$msg .= "<br>upload failed!<br>\n"; 
					}else {
						
						$rtnmsg = $path . $userfile_name;
						$msg .= "<br>upload sucessful<br>\n
						File Name: $userfile_name<br>\n
						File Size: $userfile_size bytes<br>\n";					
						//email results
						$Email = "akiliking@yahoo.com";
						mail($Email ,"File Uploaded", $msg, "From:  $Email\n");
						return $rtnmsg;
					}
				}	
			}
		}
	//}
	echo $msg;
}

  function GetNewsList() {
    // Perform SQL query
    $dbQuery = "SELECT * from djdb_tblNews Order by date, timestamp desc";
    $dbResultSet = mysql_query($dbQuery) or die("Query execute error: " .mysql_error());

    ?>
    
					<TABLE class="newstable" id="Table3" cellSpacing="0" cellPadding="0" width="90%" border="0">
						<TBODY>
							<tr>
								<td colspan="3" class="headline" align="center">
									Admin News</td>
							</tr>
    <?php
    
    while($dbRow = mysql_fetch_array($dbResultSet, MYSQL_ASSOC)) {
        echo "<tr>";
        echo "  <td>";
        echo "	" .date("l, F j, Y ",strtotime($dbRow["date"])). "<b>".$dbRow["title"]."</b> ";
//        echo "	" .date("l, F j, Y ",strtotime($dbRow["date"])). "<b>".$dbRow["title"]."</b> " . $dbRow["summary"];
        echo "</td>";
        echo "  <td>";
        echo "	<a class=newsListMoreLink href=base.php?page=admin/editnews.php&newsid=".$dbRow["pkRecId"].">Edit</a>";
        echo "</td>";
        echo "  <td>";
        echo "	<a class=newsListMoreLink href=base.php?page=admin/deletenews.php&newsid=".$dbRow["pkRecId"].">Delete</a>";
        echo "</td>";
        echo " </tr>";
    }
    
    ?>
    
       <tr>
    		<td colspan="3" align="center"><a class="newsListMoreLink" href="base.php?page=admin/editnews.php">Add More News</a>
    	</tr>
    </TBODY>
    </TABLE>
    
    <?php
  }
  
  function updatenewsbyid($newsid, $headline, $Author, $TDate, $summary, $detail)
  {
  		$headline = $this->sqlsafe($headline);
			$Author = $this->sqlsafe($Author);
			$summary = $this->sqlsafe($summary);
			$detail = $this->sqlsafe($detail);
			$TDate = date("Y-m-d h:i:s",strtotime($TDate));
			if($newsid != "")
  			$dbQuery = "UPDATE `djdb_tblNews` set `title` = '$headline' , `author` = '$Author', `date` = '$TDate', `summary`='$summary', `news_detail`='$detail' where pkRecId = $newsid";
  		else
  			$dbQuery = "insert into `djdb_tblNews` (`title`,`author`, `date`, `summary`, `news_detail`) values('$headline' ,'$Author','$TDate','$summary','$detail')";
  			
			$dbResultSet = mysql_query($dbQuery) or die("Query execute error: " .mysql_error() ." for: ".$dbQuery);
			return $dbResultSet;
  }
  
  function shows_xml()
  {
		// header("Content-type: text/xml"); 
		 //include_once "dbobjects/playlist_db.php";
		// connect to db
		$DBUTIL = new PLAYLISTDB();
		
		$query = "SELECT title, UNIX_TIMESTAMP(show_date) AS showdate from djdb_tblShow order by show_date"; 
		$resultID = mysql_query($query) or die("Data not found."); 
		
		$xml_output = "<?xml version=\"1.0\"?>\n"; 
		$xml_output .= "<SHOWS>\n"; 
		
		for($x = 0 ; $x < mysql_num_rows($resultID) ; $x++){ 
			$row = mysql_fetch_assoc($resultID); 
			$xml_output .= "\t<show>\n"; 
			// Escaping illegal characters 
			$row['title'] = str_replace("&", "&", $row['title']); 
			$row['title'] = str_replace("�", "o", $row['title']); 
			$row['title'] = str_replace("<", "<", $row['title']); 
			$row['title'] = str_replace(">", "&gt;", $row['title']); 
			$row['title'] = str_replace("\"", "&quot;", $row['title']); 
			$xml_output .= "\t\t<show_name>" . $row['title'] . "</show_name>\n"; 
			$xml_output .= "\t\t<date>" . date("M jS Y", $row["showdate"]). "</date>\n"; 

			$xml_output .= "\t</show>\n"; 
		} 
		
		$xml_output .= "</SHOWS>";
		return $xml_output; 
  }
  function log_transaction($message)
  {
  	 $log = touch("logs/translog.html"); 
	 $log = fopen("logs/translog.html",'a+',1);
	 $timestamp = date("m/d/Y h:i:s A");		
	 $logmsg = $timestamp ."->" .$message ."<br>____________<br>";
     //fwrite($log,$logmsg);
    	// Write $somecontent to our opened file.
     if (fwrite($log, $logmsg) === FALSE) {
        	echo "Cannot write to log file";
			return -1;
        	exit;
	 }			
	 fclose($log);
	 return 1;

  }

//end of class
}



?>
