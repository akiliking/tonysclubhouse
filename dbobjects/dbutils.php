<?php
//include_once "includes/javascript_functions.php";

class DBUTILS {

  var $dbConnection; //connection to the database

  function DBUTILS($dbName, $dbLogin, $dbPassword) {
	include 'dbobjects/dbcfg.php';
    return true;
  }

  function sqlsafe($string){
	    $string = stripslashes($string);
	    $string = str_replace("'", "''", $string);
	    return $string;
	}
//Function to handle database errors.
  function db_error($query, $errno, $error) { 
    die('<font color="#000000"><b>' . $errno . ' - ' . $error . '<br><br>' . $query . '<br><br><small><font color="#ff0000">[STOP]</font></small><br><br></b></font>');
  }
//Function to query the database.
  function db_query($query, $link = 'db_link') {
    global $$link;

    $result = mysql_query($query) or $this->db_error($query, mysql_errno(), mysql_error());

    return $result;
  }
//Get a row from the database query
  function db_fetch_array($db_query) {
    return mysql_fetch_array($db_query, MYSQL_ASSOC);
  }
//The the number of rows returned from the query.
  function db_num_rows($db_query) {
    return mysql_num_rows($db_query);
  }
//Get the last auto_increment ID.
  function db_insert_id() {
    return mysql_insert_id();
  }
//Add HTML character incoding to strings
  function db_output($string) {
    return htmlspecialchars($string);
  }
//Add slashes to incoming data
  function db_input($string, $link = 'db_link') {
    global $$link;

    if (function_exists('mysql_real_escape_string')) {
      return mysql_real_escape_string($string, $$link);
    } elseif (function_exists('mysql_escape_string')) {
      return mysql_escape_string($string);
    }

    return addslashes($string);
  }


function array_replace($SEARCH,$REPLACE,$INPUT) {
  if (is_array($INPUT) and count($INPUT)<>count($INPUT,1)):
    foreach($INPUT as $FAN):
      $OUTPUT[]=str_replace($SEARCH,$REPLACE,$FAN);
    endforeach;
  else:
    $OUTPUT=str_replace($SEARCH,$REPLACE,$INPUT);
  endif;
  return $OUTPUT;
} 
  function generateID() {
  
  	$stamp = strtotime ("now");
	$uniqueID = "$REMOTE_ADDR$stamp";
	$uniqueID = str_replace(".", "", "$uniqueID");
	return $uniqueID;
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


	function prepDate($Date){
			//takes date format mm/dd/yy and returns yy/mm/dd
		    $arryTemp = preg_split('%[/ /.]%', $Date);
           $arryDate['m'] = $arryTemp[0];
           $arryDate['d'] = $arryTemp[1];
           $arryDate['Y'] = $arryTemp[2];
		   $newdate = $arryDate['Y']."-".$arryDate['m']."-".$arryDate['d'] ." 00:00:00";
		   return $newdate;
	}

	function dbencrypt($string) { 
	 $dbencrypted = md5($string);
		  return $dbencrypted; 
	} 

 
	function getUserIdByLogin($UserLogin) {
    // Perform SQL query
    $dbQuery = "SELECT * from djdb_tblUser where fldLogin = '$UserLogin'";
    $dbResultSet = mysql_query($dbQuery) or die("Query execute error: " .mysql_error());
    while($dbRow = mysql_fetch_array($dbResultSet, MYSQL_ASSOC)) {
        $iPId = $dbRow["pkRecId"];
    }
	
    return $iPId;
  }

  	function getUserLoginByid($userid) {
    // Perform SQL query
    $dbQuery = "SELECT * from djdb_tblUser where pkRecId ='$userid'";
    $dbResultSet = mysql_query($dbQuery) or die("Query execute error: " .mysql_error());
    while($dbRow = mysql_fetch_array($dbResultSet, MYSQL_ASSOC)) {
        $LoginId = $dbRow["fldLogin"];
    }
	
    return $LoginId;
  }

  
  	function getusers($UserLogin) {
    // Perform SQL query
    $dbQuery = "SELECT * from djdb_tblUser where fldLogin = '$UserLogin'";
    $dbResultSet = mysql_query($dbQuery) or die("Query execute error: " .mysql_error());
    while($dbRow = mysql_fetch_array($dbResultSet, MYSQL_ASSOC)) {
        $iPId = $dbRow["pkRecId"];
    }
	
    return $iPId;
  }

  	function getAllEmails() {
    // Perform SQL query
    //$dbQuery = "SELECT concat(`fldFName`,' ',`fldLName`,'<',fldEmail,'>') as emailids FROM `djdb_tblUser` WHERE `fldEmailSetting` > 0";
    $dbQuery = "SELECT fldEmail as emailids FROM `djdb_tblUser` WHERE `fldEmailSetting` > 0";
	$dbResultSet = mysql_query($dbQuery) or die("Query execute error: " .mysql_error());
	
    return $dbResultSet;
  }


  	function verifyUserLogin($UserLogin, $Password) {
    // Perform SQL query
    $dbQuery = "select * from djdb_tblUser where fldLogin='$UserLogin' and fldEncryptedPW ='$Password'";
    $dbResultSet = mysql_query($dbQuery) or die("Query execute error: " .mysql_error());
	return $dbResultSet;
  }

  
  function updateUserLastLogin($userid){
	
	$dbQuery = "update djdb_tblUser set fldLastLogin = Now() where pkRecId ='$userid'";
    $dbResultSet = mysql_query($dbQuery) or die("Query execute error: " .mysql_error());
	//$affected_rows = mysql_num_rows($dbResultSet);
	
	//log user transaction
	$log = $this->log_usertrans("User logged in with with user id: " . $this->getUserLoginByid($userid));
	return 1;
  
  }
  
  
   function updateUserPassword($username, $password, $newpassword){
	$EncryptedPW = $this->dbencrypt($newpassword);
	$password = $this->dbencrypt($password);

	$UserRecs = $this->verifyUserLogin($username,$password);
	$affected_rows = mysql_num_rows($UserRecs);
	if ($affected_rows==1) {    

		
		$dbQuery = "update djdb_tblUser set fldEncryptedPW = '$EncryptedPW', fldPassword = '$newpassword'
					where fldLogin = '$username' ";
		$dbResultSet = mysql_query($dbQuery) or die("Query execute error: " .mysql_error());
		//$affected_rows = mysql_num_rows($dbResultSet);
		return 1;
	}else {return 0;}
	  
  }

 	function getMemberByUserId($UserId) {
    // Perform SQL query
    $dbQuery = "SELECT *, u.pkRecId as userid from djdb_tblUser u LEFT OUTER JOIN djdb_tblMember m ON m.fldUserId=u.pkRecId 
	LEFT JOIN djdb_tblStateProv s On u.fkState=s.pkRecId where u.pkRecId = '$UserId'";
    $dbResultSet = mysql_query($dbQuery) or die("Query execute error: " .mysql_error());

    return $dbResultSet; 

    } 
	function getMemberByMemberId($MemberId) {
    // Perform SQL query
    $dbQuery = "SELECT * from djdb_tblMember p LEFT OUTER JOIN djdb_tblUser u ON p.fldUserId=u.pkRecId 
	LEFT JOIN djdb_tblStateProv s On u.fkState=s.pkRecId where fldMemberId = '$MemberId'";
    $dbResultSet = mysql_query($dbQuery) or die("Query execute error: " .mysql_error());
   /* while($dbRow = mysql_fetch_array($dbResultSet, MYSQL_ASSOC)) {
        $iPId = $dbRow["fldPlayerId"];echo "<br>found user id..." .$iPId;
    }*/
	
    return $dbResultSet;
  }
  function getDJByDJId($DJId) {
    // Perform SQL query
    $dbQuery = "SELECT * from djdb_tblDJ dj LEFT JOIN djdb_tblUser u ON dj.fkUserId=u.pkRecId 
	LEFT JOIN djdb_tblStateProv s On u.fkState=s.pkRecId where dj.pkRecId = '$DJId'";
    $dbResultSet = mysql_query($dbQuery) or die("Query execute error: " .mysql_error());
   /* while($dbRow = mysql_fetch_array($dbResultSet, MYSQL_ASSOC)) {
        $iPId = $dbRow["fldPlayerId"];echo "<br>found user id..." .$iPId;
    }*/
	
    return $dbResultSet;
  }
  function getDJByUserId($UserId) {
    // Perform SQL query
    $dbQuery = "SELECT * from djdb_tblDJ where fkUserId = '$UserId'";
    $dbResultSet = mysql_query($dbQuery) or die("Query execute error: " .mysql_error());
	
    return $dbResultSet;
  }
  function getDJByFldVal($Fldx, $Valx) {
    // Perform SQL query
    $dbQuery = "SELECT * from djdb_tblDJ where $Fldx = '$Valx'";
    $dbResultSet = mysql_query($dbQuery) or die("Query execute error: " .mysql_error());
	
    return $dbResultSet;
  }
  function getUserTypeById($UserTypeId) {
    // Perform SQL query
    $dbQuery = "SELECT * from djdb_tblUserTypes where pkrecid  = $UserTypeId";
    $dbResultSet = mysql_query($dbQuery) or die("Query execute error: " .mysql_error());
    while($dbRow = mysql_fetch_array($dbResultSet, MYSQL_ASSOC)) {
        $UserType = $dbRow["type"];
    }
    return $UserType; 
  }
  function insertUser($F_Name,$L_Name,$Alias,$Email,$UserLogin,$UserPassword,$Type, $Address,$Address2,$City,$StateId,$Zip) {
    // Check if User Exists
    $iUserId        = $this->getUserIdByLogin($UserLogin);
	if($UserPassword) {
		$EncryptedPW = $this->dbencrypt($UserPassword);
	}
	if (!$Alias){$Name = $FName ." " .$LName;}else{	$Name = $Alias;}

	if($iUserId == 0)
	{		
		if($Type == "MEMBER"){$TypeId = 1; } 
		elseif($Type == "HOST"){$TypeId = 2; }
		elseif($Type == "ADMIN"){$TypeId = 3; }
		else {$TypeId = 0;}

    	$dbQuery = "INSERT INTO djdb_tblUser (fldFName,fldLName, fldEmail,fldLogin, fldPassword, fldTypeId, fldCreateDTS,fldAddress,fldAddress2,fldCity,fkState,fldZip, fldEncryptedPW) 
			VALUES('$F_Name','$L_Name','$Email','$UserLogin','$UserPassword',$TypeId, NOW(), '$Address','$Address2','$City','$StateId','$Zip', '$EncryptedPW')";
    	$dbResultSet = mysql_query($dbQuery) or die("Insert execute error: " .mysql_error() ." for: ".$dbQuery);
		$iUserId        = $this->getUserIdByLogin($UserLogin);
		// If User Type is Player create Player profile.
		if($Type == "MEMBER")
		{
			$MemberId	= $this->insertMember($Name,$iUserId);
			$msgstring = "Completed Successfully";
			
		}
		elseif($Type == "Host")
		{
			$HostId	= $this->insertDj($Name,$iUserId);
			$msgstring = "Completed Successfully";
			
		}
		else{$msgstring = "Completed Successfully";}

		
	}
	else
	{	
		$msgstring = "<br>Username already exist. userid:" .$iUserId;
	}
	
    return $msgstring;
  }
  
  
  function insertMember($Name,$UserId) {

	$dbQuery = "INSERT INTO djdb_tblMember (fldUserId ,fldNickName) 
		VALUES('$UserId','$Name')";
	$dbResultSet = mysql_query($dbQuery) or die("Insert execute error: " .mysql_error() ." for: ".$dbQuery);
	$Member       = $this->getMemberByUserId($UserId);
		

    return $Member["fldMemberId"];
  }
  function insertDJ($Name,$UserId) {

	$dbQuery = "INSERT INTO djdb_tblDJ (fkUserId ,DJName) 
		VALUES('$UserId','$Name')";
	$dbResultSet = mysql_query($dbQuery) or die("Insert execute error: " .mysql_error() ." for: ".$dbQuery);
	$DJ       = $this->getDJByUserId($UserId);
		

    return $DJ["PkRecId"];
  }


function updateUserPhoto($UserLogin, $photo_path)
{
	$iUserId = $this->getUserIdByLogin($UserLogin);
	
	//echo "$UserLogin, $photo_path, $iUserId";
	if($iUserId > 0)
	{
    	$dbQuery = "
			UPDATE djdb_tblUser 
			set fldPhotoURL = '$photo_path'
			where pkRecId  = $iUserId; ";
    	$dbResultSet = mysql_query($dbQuery) or die("Update execute error: " .mysql_error() ." for: ".$dbQuery);
		//echo $dbQuery;
    	$msgstring = "SUCCESS";
	}
	else
	{	
		$msgstring = "ERROR";
	}
	
	return $msgstring;
}

  //Update User Information
    function updateUser($F_Name,$L_Name,$Alias,$Email,$allowemails,$UserLogin,$UserPassword,$Type, $Address,$Address2,$City,$StateId,$Zip,$Gender,$DOB) {
    // Check if User Exists
    $iUserId        = $this->getUserIdByLogin($UserLogin);
	if($UserPassword) {
		$EncryptedPW = $this->dbencrypt($UserPassword);
	}
	if (!$Alias){$Name = $FName ." " .$LName;}else{	$Name = $Alias;}

	if($iUserId > 0)
	{
	//fldPassword = '$UserPassword',
	//fldEncryptedPW = '$EncryptedPW'
    	$dbQuery = "
			UPDATE djdb_tblUser 
			set fldFName = '$F_Name',
			fldLName = '$L_Name',
			fldEmail = '$Email',
			fldAddress = '$Address',
			fldGender = '$Gender',
			fldAddress2 = '$Address2',
			fldEmailSetting = '$allowemails',
			fldCity = '$City',
			fkState = $StateId,
			fldZip = '$Zip',
			fldBirthDate = '$DOB'
			where pkRecId  = $iUserId; ";
    	$dbResultSet = mysql_query($dbQuery) or die("Update execute error: " .mysql_error() ." for: ".$dbQuery);
		// If User Type is Player create Player profile.
		if($Type == "MEMBER")
		{
			$PlayerId	= $this->updateMember($Alias,$iUserId);
			$msgstring = "Completed Successfully";
		}
		elseif($Type == "HOST")
		{
			$DJId	= $this->updateDJ($Alias,$iUserId);
			$msgstring = "Completed Successfully";
		}
		
	}
	else
	{	
		$msgstring = "<br>No user Record exist for userid:" .$iUserId;
	}
	
    return $msgstring;
  }
  
  
   function updateMember($Name,$UserId) {

	$dbQuery = "UPDATE djdb_tblMember set fldNickName = '$Name' where fldUserId = '$UserId'";
	
	$dbResultSet = mysql_query($dbQuery) or die("Update execute error: " .mysql_error() ." for: ".$dbQuery);
	$Member       = $this->getMemberByUserId($UserId);
    return $Member["fldMemberId"];
  }

  function updateDJ($Name,$UserId) {

	$dbQuery = "UPDATE djdb_tblDJ set DJName = '$Name' where ffkUserId = '$UserId'";
	$dbResultSet = mysql_query($dbQuery) or die("Update execute error: " .mysql_error() ." for: ".$dbQuery);
	$DJ       = $this->getDJByUserId($UserId);
    return $DJ["pkRecId"];
  } 
  
  
 	
  function getStateByCountryId($CountryId) {
    $dbQuery = "SELECT  * from djdb_tblStateProv 
				where fkCountry  = '$CountryId' order by Name";
    $dbResultSet = mysql_query($dbQuery) or die("Query execute error: " .mysql_error());
	return $dbResultSet;
  }

  function makeStateList($CountryId, $abbrv, $selectedid) {
  	if(!$selectedid){$selectedid = 0;}
  // returns and html formated list for filling drop down menus	
    $StateRecs = $this->getStateByCountryId($CountryId);
	
	if ($selectedid==0){$StateListValues = "<option value=0 selected>Please Specify</option>";}
	else{$StateListValues = "<option value=0 >Please Specify</option>";}
    while($curState = mysql_fetch_array($StateRecs, MYSQL_ASSOC)) {
		$recId = $curState["pkRecId"];
		if ($recId == $selectedid){$recId = $recId ." selected";}
		if ($abbrv == 1){$State = $curState["Abbrev"];}else{$State=$curState["Name"];};
        $StateListValues .="<option value=$recId>$State</option>";
    }
	
	return $StateListValues;
  }
   

  function SendWelcomeEmail($name, $email,$username, $password ) {
  	//Redirecting emails so they dont go out to live.  	
	//$email = 'akiliking@kingplus.com'; //comment this line to turn off redirect.
	
	$subject = "Your ClubHouse Web Membership";
	$headers =  "From: TONYS CLUBHOUSE<tonysclubhouse@kingplus.com>\nX-Mailer: PHP/" . phpversion(). "\r\n";
	$headers .= 'Bcc: tonysclubhouse@kingplus.com' . "\r\n";
    $message = "Dear $name, 
Thank you for registering with TONYSCLUBHOUSE! 
Your CLUBHOUSE membership is now activated.

You may access your profile by logging into the CLUBHOUSE website using the login and password information below: 

http://tonysclubhouse.kingplus.com/ 

Username: $username 
Password: $password 
Please keep this username and password in a location that is easily accessible by you. 
	
Thanks! 
	
Clubhouse WebSupport 
	
This is an automated message, please do not reply!"; 
     
    mail($email, $subject, $message, $headers); 
}
	
function getPlayerStateById($memberid) {
	// Perform SQL query
	$dbQuery = "SELECT u.fkState from djdb_tblMember m, djdb_tblUser u, djdb_tblStateProv s where m.fldMemberId='$memberid' and m.fldUserId=u.fldUserId";
	$dbResultSet = mysql_query($dbQuery) or die("Query execute error: " .mysql_error());
	while($dbRow = mysql_fetch_array($dbResultSet, MYSQL_ASSOC)) {
	$iStateId = $dbRow["fkState"];
}
	
    return $iStateId;
  }
  
  		function getPlayerCountryById($playerid) {
    // Perform SQL query
    $dbQuery = "SELECT u.User2Country from djdb_tblPlayer p, djdb_tblUser u, djdb_tblStateProv s where p.fldPlayerId='$playerid' and p.fldUserId=u.fldUserId";
    $dbResultSet = mysql_query($dbQuery) or die("Query execute error: " .mysql_error());
    while($dbRow = mysql_fetch_array($dbResultSet, MYSQL_ASSOC)) {
        $iCountryId = $dbRow["User2Country"];
    }
	
    return $iCountryId;
  }
  

   
   
	function GetCurrentUserProfile(){
		$Alias = $_SESSION['CurrAlias'];
		$Grade = $_SESSION['Grade'];
		$usertype = $_SESSION['user_type'];
		$FullName = $_SESSION['FullName'];
		$LastLogin = $_SESSION['LastLogin'];
		$picture = $_SESSION['PhotoUrl'];
		if (!$picture){$picture = "images/no_photo.jpg";}
		$LastLogin = date("F j, Y ",strtotime($LastLogin));
		$heading = "CLUBHOUSE ".$usertype .": ";
		?>
						<table cellpadding="5" cellspacing="1" border="0" width="100%">
						<tr>
							<td>
								<table cellpadding="5" cellspacing="0" border="0" width="100%" bgcolor="#FFFFFF">
									<tr>
										<td bgcolor="#F3F3F3" >
<?php										
										echo "<img src='$picture' width='56' height='64'></img></td>"
?>										
										<td noWrap bgcolor="#F3F3F3" align="right">
										<p class="list2">
	 <?php										
	 									echo "<b>$heading</b><br><font color=\"#CC3300\" >$Alias</font><br>";
										echo "<b>Last Login:</b><br> <font color=\"#CC3300\" >".$LastLogin."</font><br/>";
										echo "<A href='base.php?request=logout'>Logout</A></p></td>";
	 ?>
									
									</tr>
								</table>
							</td>
						</tr>
					</table>
	 <?php										
	}
	

function guid(){
    if (function_exists('com_create_guid')){
		$guid = com_create_guid();
    }else{
        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid = chr(123)// "{"
                .substr($charid, 0, 8).$hyphen
                .substr($charid, 8, 4).$hyphen
                .substr($charid,12, 4).$hyphen
                .substr($charid,16, 4).$hyphen
                .substr($charid,20,12)
                .chr(125);// "}"
        $guid = $uuid;
    }
	return $guid;
}




  function SendEmail($fromuserid,$touserid, $subject, $message ) {
  	//Redirecting emails so they dont go out to live.  	
	//$email = 'akiliking@kingplus.com'; //comment this line to turn off redirect.
	
	//$subject = "Your ClubHouse Web Membership";
	$headers =  "From: TONYS CLUBHOUSE<tonysclubhouse@kingplus.com>\nX-Mailer: PHP/" . phpversion(). "\r\n";
	$headers .= 'Bcc: tonysclubhouse@kingplus.com' . "\r\n";
    //$message = ""; 
     
    mail($email, $subject, $message, $headers); 
}


    function searchForMembers($fname, $lname, $alias) {
  	
    // Perform SQL query
    //$dbQuery = "SELECT fldNickName, fldPlayerGrade, fldPlayerId from djdb_tblPlayer ORDER BY fldPlayerGrade DESC";
	$dbQuery = "SELECT fldNickName, fldPlayerGrade, fldPlayerId, u.fldFName, u.fldLName,u.fldUserId, "
        . " fldCity, fldAbbrev"
        . " from djdb_tblPlayer p "
        . " LEFT JOIN djdb_tblUser u ON p.fldUserId=u.fldUserId"
        . " LEFT JOIN djdb_tblStateProv s ON u.fkState = s.pkRecId"
        . " WHERE u.fldFName like '%".$fname."%' and"
        . " u.fldLName like  '%".$lname."%' and"
        . " fldNickName like  '%".$alias."%' "
        . " ORDER BY fldPlayerGrade DESC "; 
    //echo "dbQuery 			=> " . $dbQuery 	. "<br/>";;
    $dbResultSet = mysql_query($dbQuery) or die("Error executing query: " .mysql_error());
    $iPlayerRank = 1;
    ?>
    			<table class="statstable" id="Table1" height="26" cellSpacing="0" cellPadding="0" width="90%">
						<tr>
							<th align="center">
								Players</th></tr>
					</table>
					<table class="statstable" id="Table2" cellSpacing="0" cellPadding="0" width="90%">
						<tr>
							<td class="level2" align="center">
								<b>POS</b>
							</TH>
							<td class="level2" align="center">
								<b>PLAYER</b>

							</TH>
							<td class="level2" align="center">
								<b>SCORE</b> </TH></td>
							<td class="level2" align="center">
								<b></b> </TH></td>
    <?php
    $previous_rank = "";
    while($dbRow = mysql_fetch_array($dbResultSet, MYSQL_ASSOC)) {
	if($dbRow["fldCity"]){$Location = " (".$dbRow["fldCity"] .", " .$dbRow["fldAbbrev"] .")";}else{$Location ="";}
		$FName	=	$dbRow["fldFName"];
		$LName	=	$dbRow["fldLName"];
		$NickName = $FName ." " .$LName;
		if ($NickName== " "){$NickName = $dbRow["fldNickName"];}	

		$profile = $NickName .$Location;

        echo "<tr>";
        if ($previous_rank == $dbRow["fldPlayerGrade"]) {
        	echo "  <td noWrap>&nbsp;</td>";
        } else {
        	echo "  <td align='center'>".$iPlayerRank."</td>";
        }
        echo "  <td noWrap>".$profile."</td>";
        echo "  <td noWrap align='center' >".$dbRow["fldPlayerGrade"]."</td>";
        echo "  <td noWrap align='center' ><input type='button' class='button' value='Get Player Id' onclick='update_player_id(".$dbRow["fldPlayerId"].");'></td>";
        
        echo "</tr>";
				$iPlayerRank++;
				$previous_rank = $dbRow["fldPlayerGrade"];
    }
    ?>
    </table>
    <?php
  }

  // query_xml takes as input any query and returns the output as xml	
  function query_xml($query)
  {
		
		$tag_key = strrpos($query, 'GROUP BY');
		//echo $tag_key;
		echo $query .'<br>';
		$tag_list = substr($query, $tag_key+8, strlen($query)-(tag_key+8) );
		echo $tag_list;
		exit;
		// connect to db
		$DBUTIL = new DBUTILS();
		
		//execute the query
		$resultID = mysql_query($query) or die("SQL ERROR: ". mysql_error()); 
		
		$xml_output = "<?xml version=\"1.0\"?>\n"; 
		$xml_output .= "<SHOWS>\n"; 
		
		for($x = 0 ; $x < mysql_num_rows($resultID) ; $x++){ 
			$row = mysql_fetch_assoc($resultID); 
			$xml_output .= "\t<show>\n"; 
			// Escaping illegal characters 
			$row['title'] = str_replace("&", "&", $row['title']); 
			$row['title'] = str_replace("ó", "o", $row['title']); 
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
 
  function log_usertrans($message)
  {
  	 $log = touch("logs/usertranslog.html"); 
	 $log = fopen("logs/usertranslog.html",'a+',1);
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
    function url_exists($url){
		return ($ch = curl_init($url)) ? @curl_close($ch) || true : false;
    }
	
	
  function tmpValidate($Value,$SessionId) {

    $dbQuery = "SELECT count(*) as count from tmp_validation where sessionid = '$SessionId' and  value = '$Value'";
	//echo $dbQuery;
    $dbResultSet = mysql_query($dbQuery) or die("Query execute error: " .mysql_error());
	$qry_result = mysql_fetch_array($dbResultSet, MYSQL_ASSOC);
	$count = $qry_result["count"];
	//echo $count;
	$bValidate = "false";	
	if ($count > 0 )
	{
		$bValidate = "true";
	}
	//echo $bValidate;
	return $bValidate;
  }


	/**
	 * XOR Encryption Functions
	 * Created by: Joshua H. (TRUSTAbyss)
	 *
	 * Usage: xor_encrypt(string, key) to Encrypt the string
	 * or xor_decrypt(string, key) to decrypt the string.
	 */
	 
	function xor_encrypt($string, $key)
	{
		for ($a=0; $a < strlen($string); $a++)
		{
			for ($b=0; $b < strlen($key); $b++)
			{
				$string[$a] = $string[$a]^$key[$b];
			}
		}
	
		return $string; 
	}
	
	function xor_decrypt($string, $key)
	{
		for ($a=0; $a < strlen($string); $a++)
		{
			for ($b=0; $b < strlen($key); $b++)
			{
				$string[$a] = $key[$b]^$string[$a];
			}
		}
	
		return $string; 
	}


   
//end of class
}
?>

