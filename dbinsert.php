<?php



  include_once "dbobjects/dbutils.php";

  $readyforinsert =1;
  extract($_POST,'$');
   $usertype = $_SESSION['user_type'];
   $username = $_SESSION['user_name'];
   
  if (isset($file)) {
	if (isset($file_type)) {
		$path = "images/useradded/";
		$my_file = $username.strtotime("now").$file_name;
		$copy_path = $path.$my_file;
		$max_size = 150000;
		if ($file_size > $max_size) {
			$msg .= "The file is too big! Please keep file under $max_size bytes<br>\n";
		}else{

			if (($file_type=="image/gif") || ($file_type=="image/x-png")|| ($file_type=="image/png")|| ($file_type=="image/jpg")|| ($file_type=="image/jpeg") || ($file_type=="image/pjpeg")) {
				if (file_exists($copy_path)) {
					$msg .= "The file already exists<br>\n";
				}else{
					if ($file != "none") {
						if(!copy($file, $copy_path)) {
							echo "File upload failed!";
						}
						else {
						$userpic = $copy_path; //echo "<A HREF=\"$userpic\">$my_file</A> Upload Complete!";
						}
					}
					else { echo "<P>You must select a file to upload!<P>";
					}
				}
			}
			else {$msg .= "File type not supported.<br>\n";
			}

		}
	}
  }

  $DBUTIL = new dbutils($dbName, $dbLogin, $dbPassword);

  if ($RequestType == "addTournament"){
  		if($Date){$Date = $DBUTIL->prepDate($Date);}
		//if($Date){$Date = strtotime($Date);}
	  	$result = $DBUTIL-> insertTournament($Type, $TName, $Entries, $City, $State,$HostId,$Pot,$Date)  . "<br/>";

  }elseif($RequestType == "addUser"){

  	if(!$Login){
		$result = "Failed!";
		$MsgText = "<b>User Login cannot be blank...</b>";
		$page= "NewUserForm.php";
		$readyforinsert = 0;
		}
  	if($Password != $Password2){
		$result = "Failed!";
		$MsgText = "<b>Passwords do not match please retype...</b>";
		$page= "NewUserForm.php";
		$readyforinsert = 0;
		}
  	if ($readyforinsert == 1){
		$ip=@$REMOTE_ADDR;
		$ip2 = $_SERVER['HTTP_CLIENT_IP'];
		$visitor_host = @getHostByAddr( $ip );
		$referrer_page = $_SERVER['HTTP_REFERER'];
		$referrer_page = substr($referrer_page,-21,22);
		$requested_page = $_SERVER['REQUEST_URI'];
		
		$rndimage = $_SESSION['rndimage'];

		$isValid = $DBUTIL->tmpValidate($authcode,$rndimage);
		//echo $isValid;
		//echo "<br> ref page: " .$referrer_page;
		//$verify = $_SESSION['image_random_value'] ;
		if ($isValid == "true") {
		$ToName = $FName ." " .$LName;
		$result = $DBUTIL->insertUser($FName,$LName,$Alias,$Email,$Login, $Password, $Type, $Address, $Address2, $City, $State, $Zip);

			if($result == "Completed Successfully" or $result == "1"){
				//Send Email to user
				$emailout = $DBUTIL->SendWelcomeEmail($ToName, $Email,$Login, $Password );
	
				// Set success message
				$MsgText = "<b>Congrgulations on your new Membership.<br/>You will receive and email providing you<br/>
						your membership information.  Once again welcome to the family.";
				}
				//log user transaction
				$log = $DBUTIL->log_usertrans("NEW MEMBER CREATED:   $FName $LName ($Login) from $City  IPAddress: $ip and $ip2 host: $visitor_host Referring Page: $referrer_page  Request page: $requested_page " );
			}else{
			// Set authentication message
			$MsgText = "<b>Sorry, unable to authenticate you.  <br> Your IPAddress: $ip host: $visitor_host ";
			$log = $DBUTIL->log_usertrans("Unathorized attempt: IPAddress: $ip and $ip2 host: $visitor_host Referring Page: $referrer_page  Request page: $requested_page " );
			}


	}
  }elseif($RequestType == "updateUser"){
//	echo $Login;
  	if ($readyforinsert == 1){
		$ToName = $FName ." " .$LName;
		//if($DOB){$DOB = $DBUTIL->prepDate($DOB);}
		if($year){$DOB = "$year-$month-$day";}
		//if($DOB){$DOB = strtotime($date1);}
		$result = $DBUTIL->updateUser($FName,$LName,$Alias,$Email,$allowemails,$Login, $Password, $Type, $Address, $Address2, $City, $State, $Zip, $Gender,$DOB);
		//echo $DOB;
		if($userpic){$uploadpic = $DBUTIL->updateUserPhoto($Login, $userpic);}
		//$emailout = $DBUTIL->SendUpdateEmail($ToName, $Email,$Login, $Password );
		$MsgText = "<p><b>Your Profile has been updated! <br>  <a href='base.php'> Home... </a></p>";
		if ($msg){$MsgText .= "<p>File upload status: " .$msg ."</p>";}
		}
  }elseif($RequestType == "ChangePW"){

  	if(!$Password){
		$result = "Failed!";
		$MsgText = "<b>New password cannot be blank...</b>";
		$page= "NewUserForm.php";
		$readyforinsert = 0;
		}
  	if($Password != $Password2){
		$result = "Failed!";
		$MsgText = "<b>Passwords do not match please retype...</b>";
		$page= "NewUserForm.php";
		$readyforinsert = 0;
		}
  	if ($readyforinsert == 1){
		$ToName = $FName ." " .$LName;
		$result = $DBUTIL->updateUserPassword($username, $CurrPassword, $Password);
		if ($result==1){
		$result = "Completed Successfully";
		$MsgText = "<b>Your password has been successfully changed! <br> return to <a href='base.php'> Home</a>.";
		}else{ $result = "Failed!"; $MsgText = "<b>Your password was not updated. Possibly wrong password supplied. <br> <a href='base.php?page=ChangePW_form.php'>try again</a>";}
	}
}
//  echo $result;
 // include $page;

 if($result == "Completed Successfully" || $result == 1)
  {$result = "Completed Successfully";
?>

  	 <table class="playertatstable" cellSpacing="0" cellPadding="0" width="90%">
  <tr>
		<th colspan="3" align="center"><?php echo $result ?>&nbsp;</th></tr>
    <tr>
  	  <td colspan="3"><?php echo $MsgText."code: " .$verify ; ?></td>
  	</tr>
  </table>
<?php
  }
  else
  {
?>
  	 <table class="playertatstable" cellSpacing="0" cellPadding="0" width="90%">
		<th colspan="3" align="center"><?php echo $result ?></th>
    <tr>
  	  <td colspan="3"><?php echo $MsgText; ?></td>
  	</tr>
  </table>
<?php
  }//User already exists... <br/>Please try a different username.

?>
