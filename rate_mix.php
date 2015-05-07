<?php
include_once "dbobjects/dbutils.php";
include_once "includes/javascript_functions.php";
echo "<script> function rate( value ) {alert('You must Log in to Rate the Mixes');}</script>";

$db = new dbutils($dbName, $dbLogin, $dbPassword);
//echo $_SESSION['userid'];
$rate_val = $_GET['rate_val'];
$setid = $_GET['setid'];
$userid = $_GET['userid'];

$dbinsert = "INSERT INTO djdb_rating (rating,rating_type,mix_id,user_id) 
			VALUES ( $rate_val,'mix_rating',$setid,$userid )";
$dbResultSet = mysql_query($dbinsert) or die("Insert execute error: " .mysql_error() ." for: ".$dbinsert);


?>
<table border="0" style="font-family:Verdana,Arial,Helvetica;font-size:10px;"><tr>
    <td> Your Rating:</td>
    <td title="You've already voted!">
	<img src="images/star_<?php echo( ($rate_val>0)?'on':'off' ) ?>.gif"></img>
	<img src="images/star_<?php echo( ($rate_val>1)?'on':'off' ) ?>.gif"></img>
	<img src="images/star_<?php echo( ($rate_val>2)?'on':'off' ) ?>.gif"></img>
	<img src="images/star_<?php echo( ($rate_val>3)?'on':'off' ) ?>.gif"></img>
	<img src="images/star_<?php echo( ($rate_val>4)?'on':'off' ) ?>.gif"></img>
	</td><tr>
<?php
$dbQuery = "SELECT count( rating ) as votes, sum(rating ) as avrating FROM djdb_rating WHERE mix_id=$setid";
$dbResultSet = mysql_query($dbQuery) or die("Query execute error: " .mysql_error() ." for: ".$dbQuery);

    while($curset = mysql_fetch_array($dbResultSet, MYSQL_ASSOC)) {
		$votes = $curset['votes'];
		$avrating = ( ($votes>0)?($curset['avrating']/ $votes):'' );
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
