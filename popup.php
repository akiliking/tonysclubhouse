
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="css/style.css" rel="stylesheet" type="text/css">
<title>Tonys Clubhouse</title>
</head>

<?php 
include_once "includes/javascript_functions.php"; 
						

					
//include "navbar.php";
include_once "dbobjects/webdata.php";
  extract($_POST,'$'); // get post values and prefix with $ ie. $FName,$LName,$Login, $Password

if($o_message){
	$detail = $o_message;
}else{  
$INFO = new GETWEBDATA($dbName, $dbLogin, $dbPassword);

  $dbResultSet =  $INFO->getDynamicData($id, $categoryId, $type, $title) ; 
    while($dbRow = mysql_fetch_array($dbResultSet, MYSQL_ASSOC)) {
		$HEADLINE =$dbRow["title"];
		if ($dbRow["date"]){$TDate = date("F j, Y ",strtotime($dbRow["date"]));} 
		$author =$dbRow["createdby"];
		$sum = $dbRow["summary"];
		$detail = $dbRow["detail"];

 
		
    }
}
?> <body topmargin="2" bottommargin="0" rightmargin="0"  leftmargin="0" background="images/back_main.jpg" >
<p></p>

<table width="85%" border="0" align="center">
   <tr> <p></p>
  </tr>
  
  <tr> 
    <th colspan="4" style="background-position:right top; background-repeat:repeat-y "> <div align="center"> 
        <h2><strong><?php echo $HEADLINE;?></strong></h2>
      </div>
	</th>
  </tr>
   
   <?php if($author != ""){$author = "<b>&nbsp;Author:</b>	&nbsp; $author";echo"<tr><td colspan=2>$author</td></tr>";}
   if($TDate!= ""){$TDate = "&nbsp;Last Updated:</b>	&nbsp; $TDate";echo"<tr><td colspan=2>$TDate</td></tr>";}
    
    ?>

  <tr> 
    <td colspan="4">&nbsp;</td>
  </tr>
  <tr bgcolor="#CCCCCC"> 
    <th colspan="4"> <div align="center"> 
        <h3><strong></strong></h3>
      </div></th>
  </tr>

      
  <tr bordercolor="#000000"> 
    <td>    <?php
    
      echo $detail;
    ?>


	&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</body>
</html>