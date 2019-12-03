﻿<?php
	session_start();
require_once 'Dao.php';
//echo "<pre>" .print_r($_SESSION,1). "</pre>";
//echo($_SESSION['error']);
?>

<html>
  <head>
    <link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="form.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src = "jquery-3.4.1.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery-3.validation.min.js" ></script>
	<!--<script src= "validation.js" type="text/javascript"></script> -->

</head>
  <body>
 	 <div class="header-container">

		<?php
			require_once('header.php');
		?>
	</div>


	<div class = "login" >
				<h2>login to our Saranfamily homepage<h2>
			 <form method="POST" id="loginform" action = "login-handler.php" autocomplete = "off">
	
		
	<div>	
		<label for ="email">Email</label><br>
	    
			<input type = "email" id="email" name = "email"  placeholder="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ''; ?>" required/>
					
	</div>
				<br>
	<div>
		<label for="password"> Password</label><br>
			<input type = "password" name="password" id="password" placeholder="password" value="<?php echo isset($_SESSION['password']) ? $_SESSION['password'] : ''; ?>" required />
		  <?php
		 // echo $_SESSION['password'];
		  ?>
	</div>
				<br>
	<div>
				<button type="submit" value ="submit" id="login" value="Login">Submit</button>
		
	</div>
			 </form>

	<div class="sessionerr">
	<?php if (isset($_SESSION['error']['email'])) { ?>
	<span  class="message"><?php echo $_SESSION['error']['email'] ?></span>
	<?php } ?>	
	<?php if (isset($_SESSION['error']['password'])) { ?>
	<span  class="message"><?php echo $_SESSION['error']['password'] ?></span>
	<?php } ?>	
    <?php if (isset($_SESSION['error']['message'])) { ?>
	<span  class="message"><?php echo $_SESSION['error']['message'] ?></span>
	
	<?php } ?>
	</div>
	 
			 <?php 
			 $error = isset($_GET['error']) ? $_GET['error'] : false;			
			 if($error == true){ 			 
			?>
			 <span id="errorwarn"> Oh! no, your input was incorrect!</span>
			 <button id="fadeoutbutton">Click to fade out warning</button>
			
			 <?php } 
			
			 ?>

    </div>		
 
	<?php
 	   require_once('footer.php');
	?>
	</body>
</html>