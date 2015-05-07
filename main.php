<center><div title="Main_Page">
<?php 
include_once "includes/javascript_functions.php"; 
?>
					<div title="clubhouse_intro">
					<table class="maintable" width="90%">
						<tr>
							<td >
								<P >
									<?php
										include_once "home.php";
									?>
								</P>
							<hr></td>
						</tr></table></div>

<?php					
//include "navbar.php";
include_once "dbobjects/webdata.php";
  extract($_POST,'$'); // get post values and prefix with $ ie. $FName,$LName,$Login, $Password
  $INFO = new GETWEBDATA($dbName, $dbLogin, $dbPassword);

 if($categoryId == "")
 {
 		$categoryId = 4; 
 }

  $dbResultSet =  $INFO->getDynamicData($id, $categoryId, $type, $title) ; 
    while($dbRow = mysql_fetch_array($dbResultSet, MYSQL_ASSOC)) {
		$title =$dbRow["title"];
		if ($dbRow["date"]){$TDate = date("F j, Y ",strtotime($dbRow["date"]));} 
		$author =$dbRow["createdby"];
		$sum = $dbRow["summary"];
		$detail = $dbRow["detail"];



?>
					<div align="center">
					<p class="sub">
					<?php echo "$title";?>
					</p>
					</div>
					<table class="maintable" width="90%">
						<tr>
							<td >
								<P >
									<?php
										echo $detail;
									?>
								</P>
							<hr></td>
						</tr>
					</table></div>
					
   <?php }?>
</center></div>