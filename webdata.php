<?php 
include_once "includes/javascript_functions.php"; 
if($detail){$detail = "default";}

//include "navbar.php";
include_once "dbobjects/webdata.php";
  extract($_POST,'$'); // get post values and prefix with $ ie. $FName,$LName,$Login, $Password
  $INFO = new GETWEBDATA($dbName, $dbLogin, $dbPassword);

 if($detail == "default"){$categoryId = 4; $type="Welcome";}

  $dbResultSet =  $INFO->getDynamicData($id, $categoryId, $type, $title) ; 
    while($dbRow = mysql_fetch_array($dbResultSet, MYSQL_ASSOC)) {
		$title =$dbRow["title"];
		$TDate = $dbRow["date"];
		if ($TDate){$TDate = date("F j, Y ",strtotime($TDate));} 
		$author =$dbRow["createdby"];
		$sum = $dbRow["summary"];
		$detail = $dbRow["detail"];

    }

?>
					<div align="center">
					<p class="sub">
					<?php echo "$title";?>
					</p>
					</div>
					<table class="maintable">
						<tr>
							<td>
							<?php 
									if($author != "")
									{
										$author = "<b>&nbsp;Author:</b>	&nbsp; $author";echo"<tr><td>$author</td></tr>";
									}
   								if($TDate!= "")
   								{
   									$TDate = "&nbsp;Date:</b>	&nbsp; $TDate";echo"<tr><td>$TDate</td></tr>";
   								}
    					?>
					</table>
					<table class="maintable" width="90%">
						<tr>
							<td class="content">
								<P>
									<?php
										echo $detail;
									?>
								</P>
							</td>
						</tr>
					</table>

