
<?php

// start the session 

include_once "dbobjects/dbutils.php";
include_once "includes/javascript_functions.php";
if($request == "logout")
{
	$_SESSION = array();
}

if(!$page)
{
	$page = "main.php"; 
}

if($login==true){
// Get the user's input from the form
 
   $username = $_POST['username']; 
   $password = $_POST['password'];
   $password= md5($password);
   $_SESSION = array();
	$USR = new dbutils($dbName, $dbLogin, $dbPassword);

	$UserRecs = $USR->verifyUserLogin($username,$password);
	$affected_rows = mysql_num_rows($UserRecs);
	if ($affected_rows==1) {    
		while($CurUser = mysql_fetch_array($UserRecs, MYSQL_ASSOC)) {
		 $userid	= $CurUser["fldUserId"];
		 $user_name = $CurUser["fldLogin"];
		 $photourl = $CurUser["fldPhotoURL"];
		 $FName = $CurUser["fldFName"];
		 $LName = $CurUser["fldLName"];
		 $LastLogin = $CurUser["fldLastLogin"];
		 $rtn = $USR->updateUserLastLogin($userid);	

    	}	 

		 $_SESSION['user_name'] = $user_name;
		 $_SESSION['LastLogin'] = $LastLogin;
		 $_SESSION['PhotoUrl'] = $photourl;
		 $_SESSION['FullName']= $FName ." " .$LName;
		 
		 $PlayerInfo = $USR->getPlayerByUserId($userid);
		 $affected_rows = mysql_num_rows($PlayerInfo);
		 if($affected_rows >0){
		 	 
			 while($PlayerRec = mysql_fetch_array($PlayerInfo, MYSQL_ASSOC)){
				
				$CurrPlayerId=$PlayerRec["fldPlayerId"];
				$Alias	= $PlayerRec["fldNickName"];
				$Grade	= $PlayerRec["fldPlayerGrade"];
				$_SESSION['Grade'] = $Grade;
				$_SESSION['CurrPlayerId'] = $CurrPlayerId;
				$_SESSION['user_type'] = "PLAYER";
				$PlayerId = $CurrPlayerId;
				$page="UserProfile.php";
				} 
		 }else { 
		 	$HostInfo = $USR ->getHostByUserId($userid);
			
				while($HostRec = mysql_fetch_array($HostInfo, MYSQL_ASSOC)){
				
					$page="HostProfile.php";
					$HostId=$HostRec["fldHostId"];
					$Alias	= $HostRec["fldHostName"];
					//$Grade	= $PlayerRec["fldPlayerGrade"];
					$_SESSION['user_type'] = "HOST";
					$_SESSION['CurrHostId'] = $HostId;
				} 
		 }
		 $_SESSION['CurrAlias'] = $Alias;
	}else {
			$_SESSION = array();
			$loginmsg =  "<font color=\"#FF0000\"><b>Login Attempt Failed!</b></font>";
	}
} $debug = "<br>Login Name: ".$_SESSION['user_name'];
$debug =$debug ."<br> User Type: ".$_SESSION['user_type'];
$debug =$debug ."<br> Player Id: ".$_SESSION['CurrPlayerId'] ;
//$debug =$debug ."<br> Player Id2: ".$_SESSION['PlayerId'] ;
$debug =$debug ."<br> Photo location: ".$_SESSION['PhotoUrl'];
$debug =$debug ."<br> Full Name: ".$_SESSION['FullName'];

//<LINK href="css/stylesheet.css" type="text/css" rel="stylesheet">
?>