<!doctype html public "-//w3c//dtd html 4.0 transitional//en">

<html>

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
   <meta name="Author" content="Akili King">
	<meta name="description" content="Tonys clubhouse music player">
   <title>The Clubhouse Music Player</title>
<script src="includes/prototype.js"></script>
<script language="JavaScript">
	function toggleBox(szDivID, iState) // 1 visible, 0 hidden
	{
	   var obj = document.layers ? document.layers[szDivID] :
	   document.getElementById ?  document.getElementById(szDivID).style :
	   document.all[szDivID].style;
	   obj.visibility = document.layers ? (iState ? "show" : "hide") :
	   (iState ? "visible" : "hidden");
	}
</script>
<?php
echo "<script> function rate( value ) {";
 if ($userid == 0) {echo "alert('You must Log in to Rate the Mixes');";}
 else{echo "new Ajax.Updater( 'rating', 
 	'rate_mix.php?setid=$setid&userid=$userid&rate_val='+value );";
 }
 echo "}</script>";
?>


</head>

<body bgcolor="#000000" text="#F2E497" ><body>
<center>

<?php
	include_once "dbobjects/dbutils.php";
	$db = new dbutils($dbName, $dbLogin, $dbPassword);
	if (!$userid){ $userid = 0;}
	if (!$music_link){
		echo "<script> window.onload = function() {
				toggleBox('rating',0);
				alert('No music file specified!');
				window.close;}
				</script>";
	}

	if ($setid){
		$dbQuery = "SELECT IFNULL(rating,0) as rating FROM djdb_rating WHERE user_id=$userid and mix_id=$setid";
		$dbResultSet = mysql_query($dbQuery) or die("Query execute error: " .mysql_error() ." for: ".$dbQuery);
		while($thisrate = mysql_fetch_array($dbResultSet, MYSQL_ASSOC)) {
			$rate_val = $thisrate['rating'];
		}
	}else{
		echo "<script> window.onload = function() {
				toggleBox('rating',0);}
				</script>";
	}
	if($autostart == 'yes'){$autostart = 'true';}
	$flashplayer = "<object type=\"application/x-shockwave-flash\" data=\"music/mediaplayer.swf\" width=\"290\" height=\"24\" id=\"clubhouseplayer\">
		<param name=\"movie\" value=\"music/mediaplayer.swf\" />
		<param name=\"FlashVars\" value=\"playerID=$setid&frontcolor=0xCCCC00&backcolor=0x000000&lightcolor=0xFFFFCC&screencolor=0x00FF00&repeat=true&autostart=$autostart&file=$music_link\" />
		<param name=\"quality\" value=\"high\" />
		<param name=\"menu\" value=\"false\" />
		<param name=\"wmode\" value=\"transparent\" />
		</object>";
			
	echo	"<table border=\"0\"><tr><td>$flashplayer</td></tr></table>";
?>




<div id="rating">
<table border="0" style="font-family:Verdana,Arial,Helvetica;font-size:10px;"><tr>
    <td> Your Rating:</td>
    <td>
		<?php
			//dynamically build the image to use.
			$n=0;
			while($n<5){
				echo" \n<img src='images/star_";
				echo( ($rate_val>$n)?'on':'off') .".gif' ";
				$thisrate = $n+1 ;
				echo( (!$rate_val)?"onclick='rate($thisrate)' title='Click to vote.'>":"title='You have already voted!' >" );
				echo "</img>";
				$n++;
				}
		?>


</td><tr>
<?php
if ($setid){
	$dbQuery = "SELECT count( rating ) as votes, sum(rating ) as avrating FROM djdb_rating WHERE mix_id=$setid";
	$dbResultSet = mysql_query($dbQuery) or die("Query execute error: " .mysql_error() ." for: ".$dbQuery);

    while($curset = mysql_fetch_array($dbResultSet, MYSQL_ASSOC)) {
		$votes = $curset['votes'];
		$avrating = ( ($votes>0)?($curset['avrating']/ $votes):'' );
		//if ($votes > 0){ $avrating = ($curset['avrating']/ $votes);}
	}
}
?>
    <td>Average Rating:</td>
<td>
<img src="images/star_<?php echo( (round($avrating)>0)?'on':'off' ) ?>.gif"></img>
<img src="images/star_<?php echo( (round($avrating)>1)?'on':'off' ) ?>.gif"></img>
<img src="images/star_<?php echo( (round($avrating)>2)?'on':'off' ) ?>.gif"></img>
<img src="images/star_<?php echo( (round($avrating)>3)?'on':'off' ) ?>.gif"></img>
<img src="images/star_<?php echo( (round($avrating)>4)?'on':'off' ) ?>.gif"></img>
</td></tr><tr> <td colspan="2"><center><?php echo"$votes votes"; ?></center>
</td></tr></table>
</div>
</body>
</html>
