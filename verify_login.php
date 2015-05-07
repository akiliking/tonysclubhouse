# verify_login.php
<?php
SESSION_START();
if (!isset($_SESSION['user_name'])) :
     echo "error: not loged in or session expired.";
     echo "<br>". session_id();
else:
     echo "sucessfuly verified ligin on another page for user $_SESSION[user_name]";
     echo "<br>". session_id();
endif;
?>