<?php
//include 'dbobjects/dbcfg.php';
//session_start();
$dbhost = 'kingplus.ipowermysql.com'; 
$dbLogin = 'kingplus_sa'; 
$dbPassword = 'sa'; 
$dbName = 'kingplus_db'; 

#under here, don't touch! 
$connection = mysql_pconnect("$dbhost","$dbLogin","$dbPassword") 
    or die ("Couldn't connect to server."); 
$db = mysql_select_db("$dbName", $connection) 
    or die("Couldn't select database."); 
$alphanum = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"; //"ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";

// generate the verication code
$rand = substr(str_shuffle($alphanum), 0, 5);
//echo $rand;
//$tmpid = session_id();
	$dbQuery = "INSERT INTO tmp_validation (sessionid ,value) 
		VALUES('$tmpid','$rand')";
	$dbResultSet = mysql_query($dbQuery) or die("Insert execute error: " .mysql_error() ." for: ".$dbQuery);

// choose one of four background images
$bgNum = rand(1, 4);

// create the image
//$image = imagecreate(60, 30);
// use white as the background image
//$bgColor = imagecolorallocate ($image, 255, 255, 255);
$image = imagecreatefromjpeg("images/background$bgNum.jpg");
// the text color is black
$textColor = imagecolorallocate ($image, 0, 0, 0);



// write the code on the background image
imagestring ($image, 5, 5, 8, $rand , $textColor);

//$message = 'image_random_value from session : ' .$_SESSION['image_random_value'];
//    mail('akiliking@yahoo.com', 'inside randomimage', $message, '');

// send several headers to make sure the image is not cached
// taken directly from the PHP Manual

// Date in the past
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");

// always modified
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");

// HTTP/1.1
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);

// HTTP/1.0
header("Pragma: no-cache");
//echo "<br>my empty session " .$_SESSION['rndimage'];

// create the hash for the random number and put it in the session
$_SESSION['rndimage'] = $rand; //md5($rand);
$verify = md5($rand);
// send the content type header so the image is displayed properly
header('Content-type: image/jpeg');
// send the image to the browser
imagejpeg($image);

// destroy the image to free up the memory
imagedestroy($image);
?>
