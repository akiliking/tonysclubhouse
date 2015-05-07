  <?php
// AdMob Publisher Code
// Language: PHP (curl)
// Version: 20081105
// Copyright AdMob, Inc., All rights reserved
// Documentation at http://developer.admob.com/wiki/Main_Page

$admob_params = array(
  'PUBLISHER_ID'      => 'a14c83a59905aac', // Required to request ads. To find your Publisher ID, log in to your AdMob account and click on the "Sites & Apps" tab.
  'ANALYTICS_ID'      => 'a14c83a948a2ce8', // Required to collect Analytics data. To find your Analytics ID, log in to your Analytics account and click on the "Edit" link next to the name of your site.
  'AD_REQUEST'        => true, // To request an ad, set to TRUE.
  'ANALYTICS_REQUEST' => false, // To enable the collection of analytics data, set to TRUE.
  'TEST_MODE'         => true, // While testing, set to TRUE. When you are ready to make live requests, set to FALSE.
  // Additional optional parameters are available at: http://developer.admob.com/wiki/AdCodeDocumentation
  'OPTIONAL'          => array()
);

// Optional parameters for AdMob Analytics (http://analytics.admob.com)
//$admob_params['OPTIONAL']['title'] = "Enter Page Title Here"; // Analytics allows you to track site usage based on custom page titles. Enter custom title in this parameter.
//$admob_params['OPTIONAL']['event'] = "Enter Event Name Here"; // To learn more about events, log in to your Analytics account and visit this page: http://analytics.admob.com/reports/events/add

/* This code supports the ability for your website to set a cookie on behalf of AdMob
 * To set an AdMob cookie, simply call admob_setcookie() on any page that you call admob_request()
 * The call to admob_setcookie() must occur before any output has been written to the page (http://www.php.net/setcookie)
 * If your mobile site uses multiple subdomains (e.g. "a.example.com" and "b.example.com"), then pass the root domain of your mobile site (e.g. "example.com") as a parameter to admob_setcookie().
 * This will allow the AdMob cookie to be visible across subdomains
 */
//admob_setcookie();

/* AdMob strongly recommends using cookies as it allows us to better uniquely identify users on your website.
 * This benefits your mobile site by providing:
 *    - Improved ad targeting = higher click through rates = more revenue!
 *    - More accurate analytics data (http://analytics.admob.com)
 */
 
// Send request to AdMob. To make additional ad requests per page, copy and paste this function call elsewhere on your page.
echo admob_request($admob_params);

/////////////////////////////////
// Do not edit below this line //
/////////////////////////////////

// This section defines AdMob functions and should be used AS IS.
// We recommend placing the following code in a separate file that is included where needed.

function admob_request($admob_params) {
  static $pixel_sent = false;

  $ad_mode = false;
  if (!empty($admob_params['AD_REQUEST']) && !empty($admob_params['PUBLISHER_ID'])) $ad_mode = true;
  
  $analytics_mode = false;
  if (!empty($admob_params['ANALYTICS_REQUEST']) && !empty($admob_params['ANALYTICS_ID']) && !$pixel_sent) $analytics_mode = true;
  
  $protocol = 'http';
  if (!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) != 'off') $protocol = 'https';
  
  $rt = $ad_mode ? ($analytics_mode ? 2 : 0) : ($analytics_mode ? 1 : -1);
  if ($rt == -1) return '';
  
  list($usec, $sec) = explode(' ', microtime()); 
  $params = array('rt=' . $rt,
                  'z=' . ($sec + $usec),
                  'u=' . urlencode($_SERVER['HTTP_USER_AGENT']), 
                  'i=' . urlencode($_SERVER['REMOTE_ADDR']), 
                  'p=' . urlencode("$protocol://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']),
                  'v=' . urlencode('20081105-PHPCURL-acda0040bcdea222')); 

  $sid = empty($admob_params['SID']) ? session_id() : $admob_params['SID'];
  if (!empty($sid)) $params[] = 't=' . md5($sid);
  if ($ad_mode) $params[] = 's=' . $admob_params['PUBLISHER_ID'];
  if ($analytics_mode) $params[] = 'a=' . $admob_params['ANALYTICS_ID'];
  if (!empty($_COOKIE['admobuu'])) $params[] = 'o=' . $_COOKIE['admobuu'];
  if (!empty($admob_params['TEST_MODE'])) $params[] = 'm=test';

  if (!empty($admob_params['OPTIONAL'])) {
    foreach ($admob_params['OPTIONAL'] as $k => $v) {
      $params[] = urlencode($k) . '=' . urlencode($v);
    }
  }

  $ignore = array('HTTP_PRAGMA' => true, 'HTTP_CACHE_CONTROL' => true, 'HTTP_CONNECTION' => true, 'HTTP_USER_AGENT' => true, 'HTTP_COOKIE' => true);
  foreach ($_SERVER as $k => $v) {
    if (substr($k, 0, 4) == 'HTTP' && empty($ignore[$k]) && isset($v)) {
      $params[] = urlencode('h[' . $k . ']') . '=' . urlencode($v);
    }
  }
  
  $post = implode('&', $params);
  $request = curl_init();
  $request_timeout = 1; // 1 second timeout
  curl_setopt($request, CURLOPT_URL, 'http://r.admob.com/ad_source.php');
  curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($request, CURLOPT_TIMEOUT, $request_timeout);
  curl_setopt($request, CURLOPT_CONNECTTIMEOUT, $request_timeout);
  curl_setopt($request, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded', 'Connection: Close'));
  curl_setopt($request, CURLOPT_POSTFIELDS, $post);
  list($usec_start, $sec_start) = explode(' ', microtime());
  $contents = curl_exec($request);
  list($usec_end, $sec_end) = explode(' ', microtime());
  curl_close($request);

  if ($contents === true || $contents === false) $contents = '';

  if (!$pixel_sent) {
    $pixel_sent = true;
    $contents .= "<img src=\"$protocol://p.admob.com/e0?"
              . 'rt=' . $rt
              . '&amp;z=' . ($sec + $usec)
              . '&amp;a=' . ($analytics_mode ? $admob_params['ANALYTICS_ID'] : '')
              . '&amp;s=' . ($ad_mode ? $admob_params['PUBLISHER_ID'] : '')
              . '&amp;o=' . (empty($_COOKIE['admobuu']) ? '' : $_COOKIE['admobuu'])
              . '&amp;lt=' . ($sec_end + $usec_end - $sec_start - $usec_start)
              . '&amp;to=' . $request_timeout
              . '" alt="" width="1" height="1"/>';
  }
  
  return $contents;
}

function admob_setcookie($domain = '', $path = '/') {
  if (empty($_COOKIE['admobuu'])) {    
    $value = md5(uniqid(rand(), true));
    if (!empty($domain) && $domain[0] != '.') $domain = ".$domain";
    if (setcookie('admobuu', $value, mktime(0, 0, 0, 1, 1, 2038), $path, $domain)) {
      $_COOKIE['admobuu'] = $value; // make it visible to admob_request()
    } 
  }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>ClubHouse Mobile</title>

	<meta name="author" content="kingplus" />
	<meta name="copyright" content="copyright 2009 kingplus.com" />
	<meta name="description" content="ClubHouse Mobile - Kingplus, Inc." />
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
	<link rel="apple-touch-icon" href="images/logo.png"/>
	<link rel="shortcut icon" href="images/logo.png" >

	<style type="text/css">
		@import url("music.css");
	</style>

	<script type="text/javascript" src="orientation.js"></script>
	<script type="text/javascript">
		window.addEventListener("load", function() { setTimeout(loaded, 100) }, false);
	
		function loaded() {
			document.getElementById("page_wrapper").style.visibility = "visible";
			window.scrollTo(0, 1); // pan to the bottom, hides the location bar
		}


	</script>

</head>

<body onorientationchange="updateOrientation();" bgcolor="#000000">
<?
// create db connection
//include_once "dbobjects/dbutils.php";

		include_once "http://kingplus.com/clubhouse/dbobjects/playlist_db.php";
		$PLAYLISTDB = new PLAYLISTDB();

  		//$SHOWS = $PLAYLISTDB->getallshows(1);
		//$userid = $_SESSION['userid'];
//sql filter
if (!$filter) {
	$filter = "";
}elseif ($filter == "archive"){
	$filter = "and archive = 1";
//}else{
	//$filter = "and DATE_FORMAT(show_date, \"%Y\") = $filter";
}
	
if (!$initset){$initset = 0;}
$limit = 20;
$downloadcnt=0;


// set sql based on action type (0 = query, 1 = Insert, 2 = Update, 3 = delete)

if ($action==1) {
	$timestamp = date("U");
	if ($year == "") {$year = date("Y");}
	if ($day == "") {$day = date("d");}
	if ($month == 0) {$month = date("m");}
	$show_date = "$year-$month-$day";
	$sql = "INSERT INTO djdb_tblShow (title, active, comments, show_date, timestamp) VALUES ('$title', '$active', '$comments', '$show_date', $timestamp)";
	$errmsg = "Error: Failed to Insert Record! --  ";
	$errmsg .= $sql;
	$success = "$title was successfully Added!";
}
elseif ($action==2) {
	$sql = "UPDATE djdb_tblShow SET title = '$title', show_date = '$show_date', active = '$active', comments = '$Comments' Where id = $id";
	$errmsg = "Error: Failed to Update Record! --  ";
	$errmsg .= $sql;
	$success ="$title was successfully Updated!";
}
elseif ($action==3) {$sql = "DELETE FROM djdb_tblShow where pkRecId=$id";
	$errmsg = "Error: Failed to Delete Record! --  ";
	$errmsg .= $sql;
	$success = "$title was successfully Deleted!";
}
else {$sql = "SELECT *,UNIX_TIMESTAMP(show_date) AS time FROM djdb_tblShow where active = 1 $filter order  by show_date DESC, timestamp DESC limit $initset,$limit";
	$errmsg = "Error: Query failed! --  ";
	$errmsg .= $sql;
	$success = "";
}


//sql for querying db for all records
$sql_select = "SELECT *,UNIX_TIMESTAMP(show_date) AS time FROM djdb_tblShow where active=1 $filter order by show_date DESC, timestamp DESC limit $initset,$limit";
$sql_all	= "SELECT * FROM djdb_tblShow where active=1 $filter";

//execute sql
$sql_result = mysql_query($sql)  or die ($errmsg);


if (!$sql_result) {
	echo "$errmsg";
	}
	echo "
	<table class=\"newstable\" id=\"Table3\" border=1 cellspacing=0 cellpadding=3  width=\"100%\">
					<tr>
					<td class=\"headline\" width=\"75%\" ><B>PLAYLIST TITLE</b></td>
					<td class=\"headline\"><b>SHOW DATE</b></td></tr>";
				//	<td class=\"headline\"><b>COMMENTS</b></td></tr>";
	$show_result = mysql_query($sql_select) or die ("Error occured while querying database");
	while ($showlist = mysql_fetch_array($show_result, MYSQL_ASSOC)) {
		$downloadcnt = $downloadcnt+1;
		$time = $showlist["time"];
		$title = $showlist["title"];
		$show_date = $showlist["show_date"];
		$show_date = date("M jS Y", $time);
		if ($show_date == "Dec 31st 1969") { $show_date = "";}
		$active = $showlist["active"];
		$comments = $showlist["comments"];
                $showid = $showlist["pkRecId"];
                $edit_show = "show_hdr.php?action=2&id=$showid";
                $del_show  = "show.php?action=3&id=$showid&title=$title";
                $add_set = "set.php?action=1&id=$showid";
                $view_show = "playlist.php?id=$showid";
				$listen = "";
				$query = "SELECT * FROM djdb_tblShowDtl AS s, djdb_tblShow AS h
						WHERE s.fkShow = h.pkRecId 
						and (s.set_link is not null AND s.set_link <> '')
						AND h.pkRecId =$showid";
				$result = mysql_query($query)or die ("Error occured while querying database");
				$showaudio = mysql_num_rows($result);
				$viewonly = "<A HREF=\"javascript:openWin('$view_show');\"><img src='images/paper_icon.png' alt='View Playlist Only' border=0></a>";
				if ($showaudio > 0){
					$show_listen = "listen.php?id=$showid&userid=$userid";
					$listen	= "<A HREF=\"javascript:openWin('$show_listen');\"><img src='images/button_listen_headphones.gif' alt='Listen' border=0></a>";
				}else{$show_listen = $view_show;}
				echo "<tr>
                    <td><p><A HREF=\"javascript:openWin('$show_listen');\" title=\"Open playlist\">$title</a> &nbsp; $listen &nbsp; $viewonly</p></td>
					<td><p>$show_date</p></td></tr>";
					//<td><p>$comments</p></td></tr>";

			}
			
	$showcnt = mysql_num_rows(mysql_query($sql_all));
	/*if($showcnt < $limit){$displaycnt = $showcnt;}else{$displaycnt = $limit;}
	$back  = $initset - $limit; 
	if ($back < 0 ){$back = 0;$prev = "[Prev] ";}else{$prev="<a href=\"base.php?page=playlist.html&initset=$back\">[Prev $limit] </a>";}
	$initset = $initset + $limit;
	if ($initset+$limit>$count){$newlimit = $count - $initset;}else{$newlimit = $limit;}
	if ($newlimit <= 0){$next = "[Next]";}else{$next="<a href=\"base.php?page=playlist.html&initset=$initset&limit=$newlimit\">[Next $newlimit]</a>";}
*/
	if($showcnt < $limit){$displaycnt = $showcnt;}else{$displaycnt = $downloadcnt;}
	$back  = $initset - $limit; 
	if ($back < 0 ){$back = 0;$prev = "[Prev] ";}else{$prev="[<a href=\"playlist_view.php?userid=$userid&initset=$back\">Prev $limit </a>]";}
	$start = $initset+1; 

	$newinitset = $initset + $limit;
	if ($newinitset+$limit>$showcnt){$newlimit = $showcnt - $newinitset;}else{$newlimit = $limit;}
	if ($newlimit <= 0){$next = "[Next]"; 	$tail = $showcnt;}else{$next="[<a href=\"playlist_view.php?userid=$userid&initset=$newinitset&limit=$newlimit\">Next $newlimit</a>]";	$tail = $newinitset;}
	$thisinitset = $back +1;
	

echo "</table><center> Displaying $start - $tail of $showcnt playlists &nbsp;
				$prev
				$next</tr> </table>";


?>  <!-- EndPRN -->
  </center>
</div>
</body>
</HTML>
