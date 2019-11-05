<?php
session_start();	

/**
 * Prints error for given key (if one exists).
 */
 /*function displayError($key) {
 	if(isset($_SESSION['error'][$key])) { ?>
 		<span id ="<?php $key ."error" ?>" > <?php $_SESSION['error'][$key] ?></span>
 	<?php }
 	//unset($_SESSION['error'][$key]);	
 } */
 /**
 * Prints preset for given SESSION key (if one exists).
 */
// function preset($key) {
// 	if(isset($_SESSION['preset'][$key]) && !empty($_SESSION['preset'][$key])) {
// 		echo 'value="' . $_SESSION['preset'][$key] . '" ';
// 	}
// }
// if (isset($_SESSION['message'])) {
// 	echo "<div class='message bad'>{$_SESSION['message']}</div>";
//  }
?>

<html>
  <head>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
<div class="sessionerr">
 
 </div>

 
	<div class = "login" >
				<h2>login to our Saranfamily homepage<h2>

			 <form method="POST" action = "login-handler.php" autocomplete = "off">
		<div>
		
			 <label for ="email">Email</label><br>
	    
				<input type = "email" id="email" name = "email"  placeholder="email" value="<?php $_SESSION['presets']['email'] ?>" required/>
				
				<?php if(isset($_SESSION['error'])) {
 					print('<span id =\"error\"</span>');
				  } 
				?>
		</div>
				<br>
		<div>
				<label for="password"> Password</label><br>
				<input type = "password" name="password" id="password" placeholder="password" required />
			<!--	<p><?php //displayError('password'); ?></p> -->
		</div>
				<br>
		<div>
				<input type="submit" value ="submit" id="login" value="Login" />
			<!--	<?php //displayError('exception'); ?> -->
		</div>
			 </form>


			 <?php 
		
			 $error = isset($_GET['error']) ? $_GET['error'] : false;
			
			 if($error == true){ 
				 
			?>
			 <span> Oh! no, your input was incorrect!</span>
			 <?php } ?>

			
 
	<?php
 	   require_once('footer.php');
	?>
	</body>
</html>