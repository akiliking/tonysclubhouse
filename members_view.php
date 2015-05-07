<!-- ================== members_view Start ========================= -->
<div align="center">
<center>
  <img border="0" src="/ton.jpg" width="248" height="90" ><br><font size="6"><b>CLUBHOUSE MEMBERS</b></font>

<script>
function showMsg(msg,title) {

  text = '<form>';
  text += '<table border=2><tr><td bgcolor=blue>'
  text += '<font color=white><b>';
  text += title;
  text += '</b></td></tr><tr><td bgcolor=lightgrey>';
  text += msg;
  text += '</td></tr><tr><td bgcolor=lightgrey><center>';
  text += '<input type="button" value="Yes" onClick="window.showResult(1)">';
  text += '<input type="button" value="No" onClick="window.showResult(2)">';
  text += '<input type="button" value="Cancel" onClick="window.showResult(3)">';
  text += '</center></td></tr></table>';
  text += '</form>';  
  if (document.all) {
     mDiv = document.all.msgDiv;
     mDiv.innerHTML = text;
     mDiv.style.visibility = 'visible';
  }
  else if (document.layers) {
     mDiv = document.layers['msgDiv'];
     with (mDiv.document) {
        write(text);
        close();
     }
     mDiv.visibility = 'visible';
  }
  else if (document.getElementById) {
     mDiv = document.getElementById('msgDiv');
     mDiv.innerHTML = text;
     mDiv.style.visibility = 'visible';
  }     

}
function showResult(result) {
   alert('User answered: '+result)
  if (document.all) {
     mDivSt = document.all('msgDiv').style;
  }
  else if (document.layers) {
     mDivSt = document.layers['msgDiv'];
  }
  else if (document.getElementById) {
     mDivSt = document.getElementById('msgDiv').style;
  }     
  mDivSt.visibility = 'hidden';
}
</script>

  
<?php

// create db connection
	include_once "dbobjects/dbutils.php";
	$USR = new DBUTILS($dbName, $dbLogin, $dbPassword);
	$WEBDATA = new GETWEBDATA($dbName, $dbLogin, $dbPassword);

// set sql based on action type (0 = query, 1 = Insert, 2 = Update, 3 = delete)
if (!$initset){$initset = 0;}
$limit = 25;				

//sql for querying db for all records
$sql_select = "SELECT *,UNIX_TIMESTAMP(fldLastLogin) AS lastlogin FROM djdb_tblUser order by fldLogin ASC limit $initset,$limit";
//execute sql
$sql_result = mysql_query($sql_select)  or die("Error during execute of $sql_select");
//$sql_result = $PLAYLISTDB->getallshows(0);

$listcount = mysql_query("SELECT count(*)As count FROM djdb_tblUser") or die ("Error occured while querying database");
$qry_result = mysql_fetch_array($listcount, MYSQL_ASSOC);
$count = $qry_result["count"];
if (!$sql_result) {echo "$errmsg";}
	$start = $initset +1; 
	$stop = $initset+$limit;
	echo "<center><p><font color=\"#FFFF00\">$count users found in database</font></p>
			<table class=\"newstable\" border=0 cellspacing=1 cellpadding=3 bgcolor=\"999933\" width=\"95%\">
					<tr>
                    <th bgcolor=\"000000\"><p class=\"yellow\">&nbsp;</p></th>
					<th bgcolor=\"000000\"><p class=\"yellow\">LOGIN ID</p></th>
					<th bgcolor=\"000000\"><p class=\"yellow\">NAME</p></th>
					<th bgcolor=\"000000\"><p class=\"yellow\">MEMBER SINCE</p></th></tr>";
	$result = mysql_query($sql_select) or die ("Error occured while querying database");
	while ($userlist = mysql_fetch_array($result, MYSQL_ASSOC)) {
		$lastlogin = $userlist["lastlogin"];
		$username = $userlist["fldLogin"];
		$name = $userlist["fldFName"] ." " .$userlist["fldLName"];
		$email = $userlist["fldEmail"];
		$memlocation = $userlist["fldCity"] .", " .$userlist["fldState"];;
		$createdate = $userlist["fldCreateDTS"];
		if($createdate){$createdate = date("M j, Y",strtotime($createdate));}

		$lastlogin = date("M jS Y", $lastlogin);
		if ($lastlogin == "Dec 31st 1969") { $lastlogin = "";}
		//$active = $userlist["active"];
		$photo = $userlist["fldPhotoURL"];
        $userid = $userlist["pkRecId"];
		$user_profile = "base.php?page=UserProfile.php&MemberId=$userid";
		
		$userspace =  $WEBDATA->getuserspace($userid); 
  		if (mysql_num_rows($userspace) > 0){$space = "<a href='userspace.php?userid=$userid' target='_blank'><img src='images/hyperlink.gif' alt='View Web Space for $username' border=0></a>";}
		else{$space = "&nbsp;";}


				echo "<tr><td bgcolor=\"000000\"><p>$space</p></td>
                    <td bgcolor=\"000000\"><p class=\"white\"><a href=\"$user_profile\">$username</a></p></td>
					<td bgcolor=\"000000\"><p class=\"white\">$name</p></td>
					<td bgcolor=\"000000\"><p class=\"white\">$createdate</p></td></tr>";

			}
echo "</table>";
	$back  = $initset - $limit; 
	if ($back < 0 ){$back = 0;$prev = "[Prev] ";}else{$prev="<a href=\"base.php?page=members_view.php&initset=$back\">[Prev $limit] </a>";}
	$initset = $initset + $limit;
	if ($initset+$limit>$count){$newlimit = $count - $initset;}else{$newlimit = $limit;}
	if ($newlimit <= 0){$next = "[Next]";}else{$next="<a href=\"base.php?page=members_view.php&initset=$initset&limit=$newlimit\">[Next $newlimit]</a>";}
echo "<p><div align=\"center\">
                  <center>
                  <table border=\"0\">
				<tr><td width=\"100%\" valign=\"bottom\" align=\"center\">
				<p align=\"right\">
				$prev
				$next</p>
				</td></tr></table>
                  </center>
                </div></p>";
?>

 
  </center>
</div>

<!-- ================== members_view End ========================= -->




















