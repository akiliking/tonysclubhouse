
<?php


include_once "dbobjects/dbutils.php";
echo $request;
  if($request){
  $_SESSION = array();
	include_once "login_form.php";

// Finally, destroy the session.
//session_destroy();

	}else{
  $USR = new dbutils($dbName, $dbLogin, $dbPassword);
  if (isset($_SESSION['user_name'])){

  	
	  $USR->GetCurrentUserProfile();
	  }else{
		if($loginmsg){echo $loginmsg;}
		include_once "login_form.php";
	  }
  }
?>

