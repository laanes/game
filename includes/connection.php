<?php 

$dbh = new PDO(
'mysql:host='.C::$DBHOST.';dbname='.C::$DBNAME, C::$DBUSER, C::$DBPASS, array( PDO::ATTR_PERSISTENT => true ) 
);

?>