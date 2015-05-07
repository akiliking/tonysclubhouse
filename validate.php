<?php 
// start the session 
 session_save_path("/home/users/web/b1603/ipw.kingplus/phpsessions");
session_start(); 
header("Cache-control: private"); //IE 6 Fix 
include_once "dbobjects/dbutils.php";

// Get the user's input from the form
 
   $username = $_POST['username']; 
   $password = $_POST['password'];
   $password= md5($password);
   $_SESSION['user_name'] = "";
	$USR = new dbutils($dbName, $dbLogin, $dbPassword);

$UserRecs = $USR->verifyUserLogin($username,$password);
$affected_rows = mysql_num_rows($UserRecs);
    while($CurUser = mysql_fetch_array($UserRecs, MYSQL_ASSOC)) {
		 $userid	= $CurUser["pkrecid"];
		 $username = $CurUser["fldLogin"];
		 $photourl = $CurUser["fldPhotoURL"];
    }	 
if ($affected_rows==1) :
	 $_SESSION['user_name'] = $username;

// 	 
	 //$usersession = $_SESSION['user_name'];
	 //include "base.php";
	/* print "validated <br>";
      echo session_id();
    */
     if (isset($_SESSION['user_name'])) {
     echo "<br>session variable is set and has the value:".$_SESSION['user_name'];
     }
     echo "<br><a href=\"verify_login.php\">verify login</a>";
print '<meta http-equiv="refresh" content="0;URL=base.php">';	 
else :
$_SESSION = array();
     $loginmsg =  "<font color=\"#FF0000\"><b>Login Attempt Failed!</b></font>";
//print '<meta http-equiv="refresh" content="0;URL=base.php">'; 	 

	 include "base.php";
endif;

?>
