<? 
# database connection scripts 
# the next 4 lines you can modify 
$dbhost = 'kingplus.ipowermysql.com'; 
$dbLogin = 'kingplus_sa'; 
$dbPassword = 'sa'; 
$dbName = 'kingplus_db'; 

#under here, don't touch! 
$connection = mysql_pconnect("$dbhost","$dbLogin","$dbPassword") 
    or die ("Couldn't connect to server."); 
$db = mysql_select_db("$dbName", $connection) 
    or die("Couldn't select database."); 
?> 
