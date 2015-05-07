<html>
<head>
<title>IAPPP</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="css/style.css" rel="stylesheet" type="text/css">

</head>

<center>

<?php
		include_once "dbobjects/dbutils.php";
		
  	$IAPPP = new dbutils($dbName, $dbLogin, $dbPassword);

		$PlayerId = $_GET['PlayerId'];
		$TournamentId = $_GET['TournamentId'];
	
		$returnval = $IAPPP->removePlayerFromTournament($PlayerId, $TournamentId);
		echo "<META HTTP-EQUIV='refresh' content='0;URL=base.php?page=edittournament.php&tournamentId=".$TournamentId."'>";
?>