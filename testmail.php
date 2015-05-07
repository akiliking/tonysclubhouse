
  <?php
  include_once "dbobjects/dbutils.php";
  
  $testmail = new dbutils($dbName, $dbLogin, $dbPassword);

	$testmail->SendWelcomeEmail("Akili", "akili.king@xo.com","username", "password" )  
  ?>
