<?php 
# starting the session here 
 session_save_path("/home/users/web/b1603/ipw.kingplus/phpsessions");
session_start(); 
if ($_SESSION['email_address'] != "youremail@here.com" ) { 
    echo "<b>You do not have the appropriate permissions to enter new distributors.</b>"; 

# prevent user from typing or pasting a URL string 
# into browser to get to this page. If the $first_name 
# variable is empty, then they have to log in. 
if ( empty( $first_name ) ) { 
    print "Please login below!"; 
    include 'login_form.php'; 
} 
} else { print " 
	<html> 
	<head> 
	<title>Signup Form</title> 
	</head> 
	<body> 
	<form name=form1 method=post action=register.php> 
	  <table width=100% border=0 cellpadding=4 cellspacing=0> 
		<tr> 
		  <td width=24% align=left valign=top>First Name</td> 
		  <td width=76%><input name=first_name type=text id=first_name2></td> 
		</tr> 
		<tr> 
		  <td align=left valign=top>Last Name</td> 
		  <td><input name=last_name type=text id=last_name></td> 
		</tr> 
		<tr> 
		  <td align=left valign=top>Email Address</td> 
		  <td><input name=email_address type=text id=email_address></td> 
		</tr> 
		<tr> 
		  <td align=left valign=top>Desired Username</td> 
		  <td><input name=username type=text id=username></td> 
		</tr> 
		<tr> 
		  <td align=left valign=top>Information about you:</td> 
		  <td><textarea name=info id=info></textarea></td>    </tr> 
		<tr> 
		  <td align=left valign=top>&nbsp;</td> 
		  <td><input type=submit name=Submit value=Join Now!></td> 
		</tr> 
	  </table> 
	</form> 
	</body> 
	</html> 
"; } ?> 

