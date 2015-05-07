<p>&nbsp;</p>
<?php


include_once "dbobjects/webdata.php";

                   
  $NEWS = new GETWEBDATA($dbName, $dbLogin, $dbPassword);

 // $NEWS->GetNewsSummaries(0,4);
  
  
    $dbResultSet = $NEWS->getlatestnews(0,10);

   echo " 
					<TABLE class=\"maintable\" id=\"Table3\" cellSpacing=\"0\" cellPadding=\"0\" width=\"85%\" border=\"0\">
						<TBODY>
							<tr>
								<th align=\"center\">
									      <p align=\"center\"><font color=\"#FFFFFF\" size=\"5\"><b>CLUBHOUSE NEWS</font>
										  </b></font>
										  </p>
									
									<hr><br></th>
							</tr>";

    
    while($dbRow = mysql_fetch_array($dbResultSet, MYSQL_ASSOC)) {
        echo "<tr>";
        echo "  <td>";
        echo "<p><font color=\"#FFFFFF\" size=\"4\"><b>".$dbRow["title"]."</b></font><br>"; 
		echo "<font color=\"#FFFFFF\"> [" .date("l, F j, Y ",strtotime($dbRow["date"]))."] </font></p>";
		echo $dbRow["summary"];
        echo "	<a class=newsListMoreLink href=base.php?page=news.php&newsid=".$dbRow["pkRecId"].">more...";
        echo "<br><hr><br></td>";
        echo " </tr>";
    }
   echo "</TBODY> </TABLE>";
    ?>
    
    

   



