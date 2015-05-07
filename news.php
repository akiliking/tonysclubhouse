
<?php

//include "navbar.php";
include_once "dbobjects/webdata.php";
  extract($_POST,'$'); // get post values and prefix with $ ie. $FName,$LName,$Login, $Password
  $NEWS = new GETWEBDATA($dbName, $dbLogin, $dbPassword);

  $dbResultSet =  $NEWS->getnewsbyid($newsid); 
    while($dbRow = mysql_fetch_array($dbResultSet, MYSQL_ASSOC)) {
		$HEADLINE =$dbRow["title"];
		if ($dbRow["date"]){$TDate = date("F j, Y ",strtotime($dbRow["date"]));} 
		$author =$dbRow["author"];
		$sum = $dbRow["summary"];
		$detail = $dbRow["news_detail"];

 
		
    }

?> 

<p>&nbsp;</p>
					<?php 
					if ($author){
					echo"
					<table id=\"Table2\" cellSpacing=0 cellPadding=0 width=\"90%\">
						<tr>
							<td align=\"right\">
								<b>Author:</b><br/>
							</TH>
							<td nowrap align=\"left\">
								<b><?php echo $author;?>&nbsp;</b><br/>
							</TH>
						</tr>
					</table>";}
					?>	
					<table  id="Table2" cellSpacing="0" cellPadding="0" width="90%">
						<tr>
							<td><?php echo $detail;?>&nbsp;</td>
						</tr>
					</table>



