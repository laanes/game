<?php require_once('../init/init.php');

	if($session->is_logged_in()) {
		
	header('Location: index.php');

	}

	if(isset($_POST['submit'])) {

	$username = trim($_POST['username']);
	$password = trim($_POST['password']);

	$found_user = Character::authenticate($username, $password);

		if($found_user) {

			$session->login($found_user);
			header('Location: index.php');


		}

		else {
			
			$message = "username/password combination incorrect.";

		}

	}

	else {
		
	$username = "";
	$password = "";

	}


?>

<?php Layout::include_layout_template('header.php'); ?>

<div align="center">
<h2>Please login</h2>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  Username: <input type="text" name="username" maxlength="20" value="<?php echo htmlentities($username); ?>" /><br />
  Password: <input type="password" name="password" maxlength="30" value="<?php echo htmlentities($password); ?>" /><br />

    <p><input type="submit" name="submit" value="Login" /></p>
  </div>
</form>

<?php Layout::include_layout_template('footer.php'); ?>