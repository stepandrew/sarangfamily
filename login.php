<?php
session_start();	
function displayError($key) {
	if(isset($_SESSION['errors'][$key])) { ?>
		<span id="<?= $key . "Error" ?>" class="error"><?= $_SESSION['errors'][$key] ?></span>
	<?php }
	unset($_SESSION['errors'][$key]);	
}
function preset($key) {
	if(isset($_SESSION['presets'][$key]) && !empty($_SESSION['presets'][$key])) {
		echo 'value="' . $_SESSION['presets'][$key] . '" ';
	}
}

?>

<html>
  <head>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>

	<div class = "login" >
				<h2>login to our Saranfamily homepage<h2>

			 <form method="POST" action = "login-handler.php" autocomplete = "off">
		<div>
				<p><?php displayError('status'); ?></p>
			 <label for ="email">Email</label><br>
				<input type = "text" name = "email" id="email" placeholder="Email"<?php preset('email'); ?> required />
		</div>
				<br>
		<div>
				<label for="password"> Password</label><br>
				<input type = "password" name="password" id="password" placeholder="Password" required />
				<p><?php displayError('password'); ?></p>
		</div>
				<br>
		<div>
				<input type="submit" value ="Submit" id="login" value="Login" />
				<?php displayError('exception'); ?>
		</div>
			 </form>
	</div>

	<?php
 	   require_once('footer.php');
	?>
	</body>
</html>