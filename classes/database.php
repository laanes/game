<?php require_once('../init/init.php');

class Database {
	
	public static function find_by_sql( $query, $parameters ) {
		
	global $dbh;

	$stmt = $dbh->prepare( $query );

	$stmt->execute( $parameters );

	$results = $stmt->fetch(PDO::FETCH_OBJ);
	
	return $results;


	}

}

?>