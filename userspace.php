
<?php


	include_once "dbobjects/webdata.php";

  	extract($_POST,'$'); // get post values and prefix with $ ie. $FName,$LName,$Login, $Password
  	$NEWS = new GETWEBDATA($dbName, $dbLogin, $dbPassword);

   
  $dbResultSet =  $NEWS->getuserspace($userid); 
  if (mysql_num_rows($dbResultSet) > 0){
    while($dbRow = mysql_fetch_array($dbResultSet, MYSQL_ASSOC)) {
		$TITLE =$dbRow["title"];
		//if ($dbRow["date"]){$TDate = date("m/d/y",strtotime($dbRow["date"]));} 
		//$author =$dbRow["author"];
		//$sum = $dbRow["summary"];
		$detail = $dbRow["UserPage"];
    }
  }else{$detail = include_once "userspacedefault.html";}
if ($userid == $_SESSION['CurrMemberId']){
	$Navmenu = "<p align='center'><a href=base.php?page=userspaceeditor.php>Edit My Userspace</a></p>";}
echo "<html><Head><title>$TITLE</title></Head><body>";
echo $Navmenu;
echo $detail;

?>
</body>
</html>