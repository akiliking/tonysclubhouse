<html>
<head>
  <title>New Ranking (Unverified)</title>
  <LINK href="css/stylesheet.css" type="text/css" rel="stylesheet">
</head>
<body bgcolor="white">

<center>

<?php

include "navbar.php";

?> 

  <h2>Enter your new tournament information</h2>
  
  
  <table border='0' cellspacing='5' cellpadding='0'>
    <form method='post' action='add_ranking_unverified.php'>
    <tr>
  	  <td>
        1. Player Name 
  	  </td>
  	</tr>
  	<tr>
  	  <td>
  	    <input type='text' name='player_name' size='30' value='<?php echo $player_name ?>'>
  	  </td>
  	</tr>
    <tr>
  	  <td>
        2. Tournament Name
  	  </td>
  	</tr>
  	<tr>
  	  <td>
  	    <input type='text' name='tournament_name' size='30' value='<?php echo $tournament_name ?>'>
  	  </td>
  	</tr>
    <tr>
  	  <td>
        3. Rank
  	  </td>
  	</tr>
  	<tr>
  	  <td>
  	    <input type='text' name='rank' size='30' value='<?php echo $rank ?>'>
  	  </td>
  	</tr>
    <tr>
  	  <td align='center'>
  	    <input type='submit' value='Add Tournament Ranking'>
  	  </td>
    </tr>
    </form>
  </table>
</center>
</body>
</html>
