	<script language="JavaScript" type="text/javascript" src="html2xhtml.js"></script>
	<!-- To decrease bandwidth, use richtext_compressed.js instead of richtext.js //-->
	<script language="JavaScript" type="text/javascript" src="richtext.js"></script>
<script language="JavaScript" type="text/javascript">
<!--
function submitForm() {
	//make sure hidden and iframe values are in sync before submitting form
	//to sync only 1 rte, use updateRTE(rte)
	//to sync all rtes, use updateRTEs
	updateRTE('rte1');
	//updateRTEs();
	
	//change the following line to true to submit form
	return true;
}

//Usage: initRTE(imagesPath, includesPath, cssFile, genXHTML)
initRTE("images/", "", "", true);
//-->
</script>
<?php
  include_once "dbobjects/webdata.php";

  $readyforinsert =1;
  	$path = "images/useradded/";
	//$msg = "Testing Image upload";
	$max_size = 200000;
	
	if (move_uploaded_file($_FILES['$userfile']['tmp_name'],$path)){echo "file sucessfully uploaded";}

	if (is_uploaded_file(userfile)) {
		echo "file was posted";
		if ($userfile_size > $max_size) { $msg .= "The file is too big! Please keep file under $max_size bytes<br>\n";
		}else{
		$msg .= "Passed file size test " .$userfile_size;
			if (($userfile_type=="image/gif") || ($userfile_type=="image/pjpeg")) {
				$msg .= "Passed file type test " .$userfile_type;

				if (file_exists($path . $userfile_name)) {
					$msg .= "The file already exists<br>\n";
				}else{
					$msg .= "Passed check if exist test " .$path . $userfile_name;

					$res = copy($userfile, $path . $userfile_name);
					if (!$res) {echo "4 $msg";
						$msg .= "<br>upload failed!<br>\n"; 
					}else {
						
						$userfile = $path . $userfile_name;
						$msg .= "<br>upload sucessful<br>\n
						File Name: $userfile_name<br>\n
						File Size: $userfile_size bytes<br>\n";					
						//email results
						$Email = "akiliking@yahoo.com";
						mail($Email ,"File Uploaded", $msg, "From:  $Email\n");
						//return $rtnmsg;
					}
				}	
			}
		}
	}
	//echo $msg;
	//echo $userfile;

  
  
  extract($_POST,'$'); // get post values and prefix with $ ie. $FName,$LName,$Login, $Password
  //echo $userfile ." <br/>";
  $GETWEBDATA = new GETWEBDATA($dbName, $dbLogin, $dbPassword);
  $message = "Error:  No valid RequestType specified!";
  if ($RequestType == "addWebData"){
	if (!$datatype){$datatype= "type".strtotime("now");}
  	$urllink = "base.php?page=main.php&categoryId=".$CategoryId."&type=".$datatype;
	$page = "http://www.kingplus.com/IAPPP/php/main.php&categoryId=".$CategoryId."&type=".$datatype;
  	$result = $GETWEBDATA-> addDynamicData($CategoryId, $datatype, $title, $active, $summary, $detail,$author, $userfile, $urllink)  . "<br/>";
	If($result ==1){$message = "<br><b>Data was successfully added to the database.</b>";}
  }
  if ($RequestType == "updateWebData"){
	$urllink = "base.php?page=main.php&categoryId=".$CategoryId."&type=".$datatype;
	$page = "http://www.kingplus.com/IAPPP/php/main.php&categoryId=".$CategoryId."&type=".$datatype;
  	$result = $GETWEBDATA-> updateDynamicData($id,$CategoryId, $datatype, $title, $active, $summary, $detail,$author)  . "<br/>";
	If($result ==1){$message = "<br><b>Data was successfully updated</b>";}
  } 
 
echo "<table><TR><TH>$message</TH></TR>";

echo "<tr><td>URL Link -> " .$urllink ."</td></TR>";
echo "<tr><td>" .$detail."</td></TR></table>";
//include_once $page; 
  
?>


