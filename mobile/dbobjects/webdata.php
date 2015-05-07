<?php

class GETWEBDATA {

  var $dbConnection; //connection to the database
	

  function GETWEBDATA() {
/*    $this->dbConnection = mysql_connect($dbhost, $dbLogin, $dbPassword) or die ('I cannot connect to the database.');
    // selected db
    mysql_select_db($dbName) or die ('Could not find the database: '.$dbName);
    */
	include 'dbobjects/dbcfg.php';
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
 function getuserspace($userid) {
    // Perform SQL query
    $dbQuery = "SELECT * from djdb_tblUserSpace where fk_UserId = '$userid'";
    $dbResultSet = mysql_query($dbQuery) or die("Query execute error: " .mysql_error());
    return $dbResultSet;
  }
  function edituserspace($userid,$title,$Detail) {
  	$dbResultSet = $this->getuserspace($userid); //echo mysql_num_rows($dbResultSet); echo "user id: $userid";
	if (mysql_num_rows($dbResultSet) == 0){
		$dbQuery = "INSERT INTO djdb_tblUserSpace (title ,UserPage, fk_UserId) 
					VALUES('$title','$Detail', '$userid')";
	}else{
		$dbQuery = "Update djdb_tblUserSpace set title ='$title',UserPage = '$Detail' 
				where fk_UserId ='$userid'";}
		
	$SQL = mysql_query($dbQuery) or die("Insert execute error: " .mysql_error() ." for: ".$dbQuery);
    return $SQL;
  }   function getnewsbyid($NewsId) {
    // Perform SQL query
    $dbQuery = "SELECT * from djdb_tblNews where pkRecId = '$NewsId'";
    $dbResultSet = mysql_query($dbQuery) or die("Query execute error: " .mysql_error());
    return $dbResultSet;
  }
  
    function deletenewsbyid($NewsId) {
    // Perform SQL query
    $dbQuery = "delete from djdb_tblNews where pkRecId  = '$NewsId'";
    $dbResultSet = mysql_query($dbQuery) or die("Query execute error: " .mysql_error());
    return $dbResultSet;
  }
  
  function AddNews($Headline,$Summary,$Detail, $Date, $Author) {
	$dbQuery = "INSERT INTO djdb_tblNews (title ,summary,news_detail, date, author) 
		VALUES('$Headline','$Summary','$Detail', '$Date', '$Author')";
	$SQL = mysql_query($dbQuery) or die("Insert execute error: " .mysql_error() ." for: ".$dbQuery);
	echo "<br>insert complete...";
    return $SQL;
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
		$recId = $curType["pkRecId"];
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
				`summary`='$summary', `detail`='$detail', `createdby`= '$author', `categoryid` = $CategoryId, `date` = '$TDate'	where pkRecId = $id;";
	$dbResultSet = mysql_query($dbQuery) or die("Query execute error: " .mysql_error() ." for: ".$dbQuery);
	return $dbResultSet;

  }

  function delEvent($id){
  	$dbQuery = "DELETE FROM djdb_tblEvent where pkRecId=$id";
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
								<td class="headline" align="center">THE CLUBHOUSE CONNECTION</td>
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
		if ($dbRow["news_detail"]){
        	echo "	<a class=newsListMoreLink href=base.php?page=news.php&newsid=".$dbRow["pkRecId"].">more</a>...";
        }
		echo "</td>";
        echo " </tr>";

    }
    
    ?>
    

				
    </TBODY>

    </TABLE>
    						
				<center>
				<div title="Today's Poll" class="clubhouse_poll" id="clubhouse_poll"><p align="center">
				<?php @include("http://kingplus.ipower.com/vzpoll/poll.php");?></p>
				</div></center>

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
//end of class
}



?>
