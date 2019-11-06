<?php
session_start();	
echo "<pre>" .print_r($_SESSION,1). "</pre>";
//echo($_SESSION['error']);
$presets = array();
  if (isset($_SESSION['presets'])) {
    $presets = array_shift($_SESSION['presets']);
  }

  //<input type = "email" id="email" name = "email"  placeholder="email" value="<?php echo isset($presets['email']) ? $presets['email'] : ''; ?
?>

<html>
  <head>
    <link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="form.css">
</head>
  <body>
<div class="sessionerr">
<?php if (isset($_SESSION['error']['message'])) { ?>
	<span  class="message"><?php echo $_SESSION['error']['message'] ?></span>
<?php } ?>
	
 </div>

 
	<div class = "login" >
				<h2>login to our Saranfamily homepage<h2>

			 <form method="POST" action = "login-handler.php" autocomplete = "off">
		<div>
		
			 <label for ="email">Email</label><br>
	    
				<input type = "email" id="email" name = "email"  placeholder="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" required/>
					<?php if (isset($_SESSION['error']['email'])) { ?>
			<span  class="message"><?php echo $_SESSION['error']['email'] ?></span>
			<?php } ?>	
		
	
		</div>
				<br>
		<div>
				<label for="password"> Password</label><br>
				<input type = "password" name="password" id="password" placeholder="password" value="<?php echo isset($_SESSION['password']) ? $_SESSION['password'] : ''; ?>" required />
					<?php if (isset($_SESSION['error']['password'])) { ?>
					<span  class="message"><?php echo $_SESSION['error']['password'] ?></span>
					<?php } ?>	
		</div>
				<br>
		<div>
				<input type="submit" value ="submit" id="login" value="Login" />
		
		</div>
			 </form>


			 <?php 
		
			 $error = isset($_GET['error']) ? $_GET['error'] : false;
			
			 if($error == true){ 
				 
			?>
			 <span id="errorwarn"> Oh! no, your input was incorrect!</span>
			 <?php } ?>

			
 
	<?php
 	   require_once('footer.php');
	?>
	</body>
</html>