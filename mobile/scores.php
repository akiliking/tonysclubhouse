<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

	<title>HIGH-Q Scores</title>

	<meta name="author" content="kingplus" />
	<meta name="copyright" content="copyright 2009 kingplus.com" />
	<meta name="description" content="WebOS High Q! Kingplus, Inc." />
	<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
	<link rel="apple-touch-icon" href="images/logo.png"/>
	<link rel="shortcut icon" href="images/logo.png" >

	<style type="text/css">
		@import url("HighQ.css");
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

<body onorientationchange="updateOrientation();"  style="width:320px;height:450px;background-color:#000000;margin-top:0px;margin-left:0px;margin-right:0px;margin-bottom:20px">



<table background="images/scroll_sm.png" border=0 height=420px width=320 align="center" valign="top" bgcolor="#000000" >
<tr>
	<td height=50px></td>
</tr>
<tr>
	<td valign="top">
<?php
/*
 * Created on Oct 25, 2009
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 include_once "../DB/dbutils.php";
 $SCORESDB = new DBUTILS();
 $setresult =  $SCORESDB->getAllScores(); 
 $rownum = 0;

 
 			echo "<div><table border=0 cellpadding=3 width=75% valign='top' align='center' >
					<tr><th colspan=4><b><h2>HIGH SCORES<br></h2></b> </th></tr>
					<th ></th>
					<th align='left'>Player</th>
					<th align='left'>Score</th>";


			while ($row = mysql_fetch_array($setresult, MYSQL_ASSOC)) {
				$player 	= $row["x_player_name"];
				$score 		= $row["x_score"];
				$location = '';
				if($row["x_location"]<>''){$location = '('.$row["x_location"].')';}
				$date 		= date("M jS Y", $row["x_timestamp"]);
				$rownum = $rownum+1;
				echo "<tr><td align='left' valign='top'>$rownum</td>
				<td align='left' valign='top'>$player $location</td>
				<td align='left' valign='top'>$score</td></tr>";
			}
			echo"<tr><td colspan=4 align='center' valign='top'><b>Can you make the List? <!--<a href='http://developer.palm.com/appredirect/?packageid=com.kingplus.highq&applicationid=281'><br>download High-Q</a>--></b>
				</td></tr>";
			echo "</table></div><br><br>";
 
?>
</td></tr></table>


</body>
</html>