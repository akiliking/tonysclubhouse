
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
									IAPPP Poker News<hr><br></th>
							</tr>";

    
    while($dbRow = mysql_fetch_array($dbResultSet, MYSQL_ASSOC)) {
        echo "<tr>";
        echo "  <td>";
        echo "	" .date("l, F j, Y ",strtotime($dbRow["date"])). "<b>".$dbRow["title"]."</b> " . $dbRow["summary"];
        echo "	<a class=newsListMoreLink href=base.php?page=news.php&newsid=".$dbRow["id"].">more...";
        echo "<br><hr><br></td>";
        echo " </tr>";
    }
   echo "</TBODY> </TABLE>";
    ?>
    
    

   



