<?php require_once('../init/init.php');

class Character {

	public $id;
	public $username;
	public $password;
	public $email;


	public static function authenticate( $username="", $password="") {

	$parameters = array($username, $password);

	$result = Database::find_by_sql("SELECT * FROM users WHERE username = ? and password = ? LIMIT 1", $parameters);

	return $result;

	}

	public function new_character() {

	global $dbh;

	$stmt = $dbh->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");

	$stmt->bindParam(1, $this->username);
	$stmt->bindParam(2, $this->password);
	$stmt->bindParam(3, $this->email);

	$stmt->execute();

	}

}

$char = new Character;

$char->new_character();

?>