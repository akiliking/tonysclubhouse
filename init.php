
<?php

// start the session 

include_once "dbobjects/dbutils.php";
include_once "includes/javascript_functions.php";
if($request == "logout"){$_SESSION = array();}
if(!$page){$page = "main.php"; $detail="default";}
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
		 $userid	= $CurUser["pkRecId"];
		 $user_name = $CurUser["fldLogin"];
		 $photourl = $CurUser["fldPhotoURL"];
		 $FName = $CurUser["fldFName"];
		 $LName = $CurUser["fldLName"];
		 $LastLogin = $CurUser["fldLastLogin"];
		 $UserTypeId = $CurUser["fldTypeId"];
		 $rtn = $USR->updateUserLastLogin($userid);	

    	}	 
		 $_SESSION['userid'] = $userid;
		 $_SESSION['user_name'] = $user_name;
		 $_SESSION['LastLogin'] = $LastLogin;
		 $_SESSION['PhotoUrl'] = $photourl;
		 $_SESSION['FullName']= $FName ." " .$LName;
		 
		 $UserType = $USR->getUserTypeById($UserTypeId);
		 $_SESSION['user_type'] = $UserType;
		 if ($UserType == "MEMBER"){
		 	$MemberInfo = $USR->getMemberByUserId($userid);
			 	while($MemberRec = mysql_fetch_array($MemberInfo, MYSQL_ASSOC)){
					$CurrMemberId=$MemberRec["userid"];
					$Alias	= $MemberRec["fldNickName"];
					$Grade	= $MemberRec["Grade"];
					$_SESSION['Grade'] = $Grade;
					$_SESSION['CurrMemberId'] = $CurrMemberId;
					$MemberId = $CurrMemberId;
					$page="UserProfile.php";
				} 
		 }elseif ($UserType == "HOST"){ 
		 	$DJInfo = $USR ->getDJByUserId($userid);
				while($DJRec = mysql_fetch_array($DJInfo, MYSQL_ASSOC)){
					$page="UserProfile.php";
					//$page="HostProfile.php";
					$HostId=$DJRec["pkRecId"];
					$Alias	= $DJRec["DJName"];
					//$Grade	= $PlayerRec["fldPlayerGrade"];
					$_SESSION['user_type'] = $UserType;
					$_SESSION['CurrHostId'] = $HostId;
					$_SESSION['CurrMemberId'] = $userid;
				} 
		 }elseif ($UserType == "ADMIN"){
		 		$_SESSION['user_type'] = "ADMIN";
				$Alias = $user_name; 
				$_SESSION['PhotoUrl'] = "images/pic.jpg";
		 }
				
				
					
		 $_SESSION['CurrAlias'] = $Alias;
	}else {
			$_SESSION = array();
			$loginmsg =  "<font color=\"#FF0000\"><b>Login Attempt Failed!</b></font>";
	}
} $debug = "<br>Login Name: ".$_SESSION['user_name'];
$debug =$debug ."<br> User Type: ".$_SESSION['user_type'];
$debug =$debug ."<br> Member Id: ".$_SESSION['CurrMemberId'] ;
$debug =$debug ."<br> Photo location: ".$_SESSION['PhotoUrl'];
$debug =$debug ."<br> Full Name: ".$_SESSION['FullName'];
$debug =$debug ."<br> User Id: ".$_SESSION['userid'];
$debug =$debug ."<br> Last Login Date: ".$_SESSION['LastLogin'];
$debug =$debug ."<br> Host Id: ".$_SESSION['CurrHostId'];

//<LINK href="css/stylesheet.css" type="text/css" rel="stylesheet">
?>