<?php
 // function SendWelcomeEmail($name, $email,$username, $password ) {
  	//Redirecting emails so they dont go out to live.  	
	//$email = 'akiliking@yahoo.com'; //comment this line to turn off redirect.
	include_once "dbobjects/dbutils.php";
	$UTL = new dbutils($dbName, $dbLogin, $dbPassword);
if($detail){$message = $detail; echo $message;}
	$find   = array("\\\\", "\'", "\\\"");
	$replace = array("\\", "'", "\"");
	$message = str_replace($find,$replace,$message);
	$subject = str_replace($find,$replace,$subject);


	//create a boundary string. It must be unique 
	//so we use the MD5 algorithm to generate a random hash
	$random_hash = md5(date('r', time())); 

	if ($email == "allmembers"){
	//verify user can send to all members
		if($_SESSION['user_type'] == "ADMIN" || $_SESSION['user_type'] == "HOST"){
			$dbResultSet = $UTL->getAllEmails();
			$count = 0;
			while($dbRow = mysql_fetch_array($dbResultSet , MYSQL_ASSOC)) {
				$count++;
				if($count > 1 ){
				$allemails .= ', ' .$dbRow["emailids"]; 
				}else{$allemails = $dbRow["emailids"];}
			}

		$footer = "
		<p align='center'>********************* <b>TONY'S CLUBHOUSE</b> *********************<br>
		If you wish to stop receiving Clubhouse emails, login<br>
		to your clubhouse account to disable email notifications.<br>
		<a href=http://tonysclubhouse.kingplus.com/>http://tonysclubhouse.kingplus.com/</a><br>
		************************************************************</p>
		";
		/*$footer = "
		********************* TONY'S CLUBHOUSE *********************
		** If you wish to stop receiving Clubhouse emails, login
		** to your clubhouse account to disable email notifications.
		** http://tonysclubhouse.kingplus.com/
		************************************************************
		";*/

		$message = "<html><body>" .$message ."<br><br><br><br>" .$footer ."</body></html>";
		$email = 'Clubhouse Members <tonysclubhouse@kingplus.com>';//comment this line to turn off redirect.
		//$allemails = 'akili.king@xo.com, akiliking@yahoo.com';//comment this line to turn off redirect.
		$bcclist = $allemails;
		}
	}	
	//$headers .= "\r\nContent-Type: multipart/alternative; boundary=\"PHP-alt-".$random_hash ."\r\n"; 
	//$headers .= "--PHP-alt-$random_hash Content-Type: text/html; charset= \"iso-8859-1\" Content-Transfer-Encoding: 7bit ";
	//$headers =  "From: $fromemailaddr\n Reply-To: $fromemailaddr\nX-Mailer: PHP/" . phpversion(). "\r\n";
	//$headers .= 'Bcc: akili.king@xo.com' . "\r\n";
	$headers =  "From: $fromemailaddr\nX-Mailer: PHP/" . phpversion(). "\r\n";
	$headers .= "Bcc: $bcclist" . "\r\n" .
				"MIME-Version: 1.0\n" .
				//"Content-Type: multipart/alternative; boundary=\"PHP-alt-".$random_hash."\""; 
				"Content-type: text/html; charset=iso-8859-1";
	
     if ($carboncopy) {$email = $email  ."," .$fromemailaddr;}		
	 $log = fopen("logs/emaillog.html",'a+',1);
	 $timestamp = date("d/m/Y h:i:s A");		
	 $logmsg = $timestamp ."->" ."Email sent to: " .$email ."<br>";
	 $logmsg .= "$subject <br>" .$message ."<br>";

     if ($repost <> true) { $mail_sent = @mail($email, $subject, $message, $headers); 
	 	$message=	$mail_sent ? "Message Sent" : "Mail failed";
		$logmsg .= $message ."<br><br><hr><br><br>";
		fwrite($log,$logmsg);
    	// Write $somecontent to our opened file.
    	/*if (fwrite($log, $logmsg) === FALSE) {
        	echo "Cannot write to log file";
        	exit;
		}*/			
		fclose($log);
		$repost = true;
		}else{
		$message="NO ACTION TAKEN!!!";}
	 
	 
//}
	
echo "  <p>&nbsp;</p>
  <p>&nbsp;</p>  <p>&nbsp;</p>  <p>&nbsp;</p><table  class=\"statstable\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\" border=\"0\">
     <tr valign=\"middle\" ><td> $message</td></tr></table>";?>
	  <script language="JavaScript" type="text/javascript">
	<!--
	alert('<?=$message?>')
	<?php if ($message == "Message Sent"){ 
		echo "window.location = \"http://tonysclubhouse.kingplus.com/base.php\";";
		}?>
	//-->
	</script>
	
?>
