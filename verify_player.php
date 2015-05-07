<html>
<head>
<title>IAPPP</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="css/style.css" rel="stylesheet" type="text/css">

</head>

<center>
<?php
		include_once "slr/MullinerRanking.php";    
		include_once "dbobjects/dbutils.php";
  	extract($_POST,'$'); // get post values and prefix with $ ie. $FName,$LName,$Login, $Password
                  
  	$slr = new MullinerRanking($dbName, $dbLogin, $dbPassword);

	
		if ($submitupdate == 'true'){
		//echo "test";
			$return =  $slr->updatePlayerRankingByHost($PlayerId, $TournamentId, $Rank);
			if ($return = "Ranking Added..."){echo "<body onLoad=\"refresh_url();\"> "; echo $return; }
			else{echo $return;}
		}else{
		?>
  <form class="statstable" method='post' action='<?php echo $PHP_SELF ?>'>
  <table class="playertatstable" cellSpacing="0" cellPadding="0" width="90%" >
    <tr> 
      <th colspan="3" align="center">Verify Player Ranking</th>
    </tr>
    <tr> 
      <td align="right" colspan="1">Player:</td>
      <td colspan="2"><?php echo $PName ?></td>
    </tr>
    <tr> 
      <td align="right" colspan="1">Tournament Name:</td>
      <td colspan="2"><?php echo $TName ?></td>
    </tr>
    <tr>
      <td align="right" colspan="1">Verify Ranking:</td>
      <td colspan="2">
	  <input type='hidden' id='TournamentId' name='TournamentId' value='<?php echo $TournamentId ?>'>
	  <input type='hidden' id='PlayerId' name='PlayerId' value='<?php echo $PlayerId ?>'>
	  <input type='hidden' id='submitupdate' name='submitupdate' value='true'>
	  <input name="Rank" type="text" id="Rank" size="5" value='<?php echo $Rank ?>'></td>
    </tr>
    <tr> 
      <td colspan="3" align='center'> <input class='button' type='submit' value='Submit'  ></td>
    </tr>
  </table>
 </form>
<?php } ?>