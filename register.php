<? 
include "dbobjects/webdata.php";

extract($_POST,'$');
$first_name = stripslashes($first_name); 
$last_name = stripslashes($last_name); 
$email_address = stripslashes($email_address); 
$username = stripslashes($username); 
$info = stripslashes($info); 

if((!$first_name) || (!$last_name) || (!$email_address) || (!$username)){ 
    echo 'You did not submit the following required information! <br />'; 
    if(!$first_name){ 
        echo "First Name is a required field. Please enter it below.<br />"; 
    } 
    if(!$last_name){ 
        echo "Last Name is a required field. Please enter it below.<br />"; 
    } 
    if(!$email_address){ 
        echo "Email Address is a required field. Please enter it below.<br />"; 
    } 
    if(!$username){ 
        echo "Desired Username is a required field. Please enter it below.<br />"; 
    } 
    include 'join_form.php'; 
    exit(); 
} 
     
$sql_email_check = mysql_query("SELECT fldEmail FROM djdb_tblUser WHERE fldEmail='$email_address'"); 
$sql_username_check = mysql_query("SELECT fldLogin FROM users WHERE fldLogin ='$username'"); 

$email_check = mysql_num_rows($sql_email_check); 
$username_check = mysql_num_rows($sql_username_check); 

if(($email_check > 0) || ($username_check > 0)){ 
    echo "Please fix the following errors: <br />"; 
    if($email_check > 0){ 
        echo "<strong>Your email address has already been used by another member in our database. Please use a different Email address!<br />"; 
        unset($email_address); 
    } 
    if($username_check > 0){ 
        echo "The username you have selected has already been used by another member in our database. Please choose a different Username!<br />"; 
        unset($username); 
    } 
    include 'join_form.php'; // Show the form again! 
    exit(); 
} 
?>