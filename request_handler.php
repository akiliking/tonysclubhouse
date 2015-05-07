<?php
 /* **************************************************
 	Request Handler Accepts Data from the Request_form.php 
    submits it to database and send email notification to the clubhouse.
	************************************************** */
//	*** Redirect Email for debugging. ****
	//$email = 'akiliking@yahoo.com'; //comment this line to turn off redirect.
// 	****************************	

//	***** DB Connection *********
	include_once "dbobjects/dbutils.php";
	$UTL = new dbutils($dbName, $dbLogin, $dbPassword);
//	******************************

	if($detail){$message = $detail; echo $message;}
	$subject = $request_type ." from $username ";
	if ($request_type == "Song Request")
	{
		$prefix = "
		<p align='center'>********************* <b>TONY'S CLUBHOUSE</b> *********************<br>
		A SONG REQUEST WAS SUBMITTED VIA THE <a href='http://tonysclubhouse.kingplus.com'> TONYS CLUBHOUSE</a> WEB SITE<br> SEE DETAILS BELOW.<br>
		************************************************************</p><br><br>
		";

	
		$message = $subject ."<br>Please Play Song: '$song' by $artist <br>"  .$message;
	}
	 


	$sqlmessage = $UTL->sqlsafe($message);
	$artist = $UTL->sqlsafe($artist);
	$song = $UTL->sqlsafe($song);

	$find   = array("\\\\", "\'", "\\\"");
	$replace = array("\\", "'", "\"");	
	$message = str_replace($find,$replace, $prefix .$message);
	
	echo $message;
	$fromemailaddr = "$username<$fromemailaddr>";
	
	echo $sqlmessage;
	// Insert Request in the request table.
	$DBInsert = "INSERT INTO djdb_request (user_id, name, artist, song, notes, request_type, request_date)
				 VALUES($userid, '$username', '$artist', '$song', '$sqlmessage', '$request_type', sysdate());";	
		
	$dbResultSet = mysql_query($DBInsert) or die("Insert execute error: " .mysql_error() ." for: ".$DBInsert);

	//create a boundary string. It must be unique 
	//so we use the MD5 algorithm to generate a random hash
	//$random_hash = md5(date('r', time())); 
	
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
