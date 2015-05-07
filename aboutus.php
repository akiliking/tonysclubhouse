<?php 
include_once "includes/javascript_functions.php"; 
if($detail){$detail = "default";}

//include "navbar.php";
include_once "dbobjects/webdata.php";
  extract($_POST,'$'); // get post values and prefix with $ ie. $FName,$LName,$Login, $Password
  $INFO = new GETWEBDATA($dbName, $dbLogin, $dbPassword);

 //if($detail == "default"){$categoryId = 4; $type="Welcome";}
?>

  <table class="statstable" cellSpacing="0" cellPadding="0" width="90%" >
    <tr> 
      <th colspan="3"  align="center">About Us</th>
    </tr>
   <br/>
   </table>
      
  <table class="statstable" cellSpacing="0" cellPadding="0" width="90%">
<?php 
$categoryId = 6;
  $dbResultSet =  $INFO->getDynamicData($id, $categoryId, $type, $title) ; 
    while($dbRow = mysql_fetch_array($dbResultSet, MYSQL_ASSOC)) {
		$title =$dbRow["title"];
		if ($dbRow["date"]){$TDate = date("F j, Y ",strtotime($dbRow["date"]));} 
		$author =$dbRow["createdby"];
		$sum = $dbRow["summary"];
		$detail = $dbRow["detail"];

?>							
						<tr>
							<td><?php echo $title;?></td>
							<td><?php echo $sum;?></td>
		  		  </tr>
						<tr>
							<td colspan="3"class="content">
								<P><?php echo $detail;?></P>
							</td>
		  		  </tr>
<?php		  		  
    }

?>

</table>