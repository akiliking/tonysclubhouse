<html>
<head>
<title>IAPPP</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="css/style.css" rel="stylesheet" type="text/css">

</head>

<center>

<?php
	include_once "dbobjects/dbutils.php";
	extract($_POST,'$'); 

  $IAPPP = new dbutils($dbName, $dbLogin, $dbPassword);
	$login_id = $_GET["login_id"];
	echo $login_id;
	
	if($send_clicked == "1") {
		// In PHP versions earlier than 4.1.0, $HTTP_POST_FILES should be used instead
		// of $_FILES.
		
		$uploaddir = './';
		$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
		@chmod($filedir,0777);
		echo '<pre>';
		if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
		   echo "File is valid, and was successfully uploaded.\n";
		} else {
		   echo "Possible file upload attack!\n";
		}
		
		echo 'Here is some more debugging info:';
		print_r($_FILES);
		
		print "</pre>";		
	}
?> 

<!-- The data encoding type, enctype, MUST be specified as below -->
<form enctype="multipart/form-data" action='<?php echo $PHP_SELF ?>?login_id=<?php echo $login_id ?>' method="POST">

	<table class="playertatstable" cellSpacing="0" cellPadding="0" width="90%">
    <tr> 
      <th colspan="3" align="center">Photo Upload</th>
    </tr>
    <!-- MAX_FILE_SIZE must precede the file input field -->
    <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
    <!-- Name of input element determines name in $_FILES array -->
    <tr> 
      <td align="right" colspan="1">File to upload:</td>
      <td colspan="2"><input class="button" name="userfile" type="file" /></td>
    </tr>    
    <tr> 
      <td colspan="3" align='center'><input class="button" type="submit" value="Send File" /></td>
    </tr>   
    <input type=hidden name="send_clicked" value=1>
  </table> 
</form>

