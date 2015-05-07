<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<link rel="stylesheet" type="text/css" href="../styles.css">

<title>Select a Play List</title>
</head>
<body bgcolor="#000000">
<body background="/recrd.gif">
<div align="center">
  <center>
  <table border="0" width="80%" bgcolor="#000000">
    <tr>
      <td width="100%" height="20%" valign="bottom">
        <p align="center"><img border="0" src="/ton.jpg" width="248" height="90" ></td>
    </tr>
    <tr>

      <td width="100%" height="70%" valign="middle"><br>
<form method="get" action="add_set.php">
  <p class="title" align="center">Select the Play List you want to Edit</p>
  <div align="center">
    <center>
    <table border="0">
      <tr>
        <td width="100%"></td>
      </tr>
      <tr>
        <td width="100%">
          <p align="center">
  <br><p><select size="1" name="list2show">
  <?php
// create db connection
$connection = mysql_connect ("kingplus.ipowermysql.com", "tonysclu_admin", "sa") or die ('I cannot connect to the database.');

// select db
mysql_select_db ("tonysclu_clubhousedb") or die ('Could not find the database');
  		$showhdr = "SELECT id,title from show_hdr where active = 1";
  		$shresult = mysql_query($showhdr) or die ("Could not find a playlist for the specified show id");

		while ($row = mysql_fetch_array($shresult, MYSQL_ASSOC)){
				$value = $row["title"];
				$i = $row["id"];
			
				echo "<option value=\"$i\">$value</option>" ;
		}
	?>

  </select></p>
  <p>&nbsp;</p>
  <p><input type="submit" name="Edit" value="Edit Playlist"></p>
</form>

    </tr>
  </table>
  </center>
</div>
</body>

</html>