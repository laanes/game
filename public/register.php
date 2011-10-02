<?php require_once('../init/init.php');

	if(isset($_POST['submit'])) {

	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	$email = 	trim($_POST['email']);

	$found_user = Character::authenticate($username, $password);

		if($found_user) {
			
		$message = "Username already exists.";

		}

		else {
			
		$character = new Character();

		$character->username = trim($username);
		$character->password = trim($password);
		$character->email    = trim($email);

		$character->new_character();

		header('Location: login.php');

		}

	}

		else {

			$username = "";
			$password = "";
			$email 	  = "";

		}


?>

<?php Layout::include_layout_template('header.php'); ?>

<div align="center">
<h2>Create account</h2>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  Username: <input type="text" name="username" maxlength="20" value="<?php echo htmlentities($username); ?>" /><br />
  Password: <input type="password" name="password" maxlength="30" value="<?php echo htmlentities($password); ?>" /><br />
  E-mail: <input type="text" name="email" maxlength="40" value="<?php echo htmlentities($email); ?>" /><br />

    <p><input type="submit" name="submit" value="Login" /></p>
  </div>
</form>

<?php Layout::include_layout_template('footer.php'); ?>
