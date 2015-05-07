
<?php
//require('../../session.h.php');
// Unset session data
$_SESSION=array();
// Clear cookie
unset($_COOKIE[session_name()]);
// Destroy session data
session_destroy();
// Redirect to clear the cookie.
print '<meta http-equiv="refresh" content="0;URL=base.php">'; 	 
exit;
?> 
