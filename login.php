<?php
session_start();	
$_SESSION['error']=array();

function displayError($key) {
	if(isset($_SESSION['error'][$key])) { ?>
		<span id="<?= $key . "Error" ?>" class="error"><?= $_SESSION['error'][$key] ?></span>
	<?php }
	unset($_SESSION['error'][$key]);	
}
function preset($key) {
	if(isset($_SESSION['preset'][$key]) && !empty($_SESSION['preset'][$key])) {
		echo 'value="' . $_SESSION['preset'][$key] . '" ';
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