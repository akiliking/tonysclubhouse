<?php

  include_once "dbobjects/webdata.php";
  $GETWEBDATA = new GETWEBDATA($dbName, $dbLogin, $dbPassword);
  extract($_POST,'$'); // get post values and prefix with $ ie. $FName,$LName,$Login, $Password
//  if(!$id){$RequestType = "addWebData";}else{$RequestType = "updateWebData";}

?>

<form method='post' action='base.php?page=admin/adminOtherData.php'>
	<table class="statstable" width="90%" border='0' cellpadding='0' cellspacing='0'>
	  <tr><th align="center" colspan="2">Data Modification Tool</th></tr>
	    <tr> 
	      <td> <select name="CategoryId" id="CategoryId">
	          <?php echo $GETWEBDATA->makeWebDataCategoryList(); ?> </select> <input class='button' type='submit' value='Select'> </td>
							
	    </tr>
	</table>
</form>

<?php

if($CategoryId != "")
{
?>
					<TABLE class="newstable" id="Table3" cellSpacing="0" cellPadding="0" width="90%" border="0">
						<TBODY>
							<tr>
								<td colspan="3" class="headline" align="center">
									Summary of Data</td>
							</tr>
<?php
	$dbResultSet =  $GETWEBDATA->getDynamicData('', $CategoryId, '', ''); 
    while($dbRow = mysql_fetch_array($dbResultSet, MYSQL_ASSOC)) 
    {
//			$title =$dbRow["title"];
//			$sum = $dbRow["summary"];
//			$detail = $dbRow["detail"];
        echo "<tr>";
        echo "  <td>";
        echo "	<b>".$dbRow["title"]."</b></br> ".$dbRow["summary"];
//        echo "	" .date("l, F j, Y ",strtotime($dbRow["date"])). "<b>".$dbRow["title"]."</b> " . $dbRow["summary"];
        echo "</td>";
        echo "  <td>";
        echo "	<a class=newsListMoreLink href=base.php?page=admin/editdata.php&id=".$dbRow["pkRecId"]."&category=".$CategoryId.">Edit</a>";
        echo "</td>";
        echo "  <td>";
        echo "	<a class=newsListMoreLink href=base.php?page=admin/deletedata.php&id=".$dbRow["pkRecId"].">Delete</a>";
        echo "</td>";
        echo " </tr><tr><td colspan=\"3\">   URL Link => ".$dbRow["urllink"]." </td>";
   }
?>   
    </TABLE>
<?php    
}

?>
