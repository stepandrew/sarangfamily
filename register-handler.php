<?php
session_start();
setcookie("Hi", "cookie");
echo print_r($_COOKIE, 1);
?>

<html>
 <body>

  <?php 
	 echo print_r($_POST,1);
	 
	 $firstName = htmlspecialchars(trim($_POST["firstName"])); 
	 $lastName = htmlspecialchars(trim($_POST["lastName"])); 
	 $email = trim($_POST["email"]);
	 $password = trim($_POST["password"]);
	 $password_match = trim($_POST["password_match"]);
	 
	 if(strlen($firstName) <=0 || strlen($firstName)>50){ 
		 $firstNameError = "first name is required. Must be less than 50 characters.";
	}
	 
	  if(strlen($email) <=0 || strlen($email)>50){ 
		 $emailError = "email is required. Must be less than 50 characters.";
	}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		  $emailError = "Must be valid email address.";
		  
	  }
	 ?>
	 
	<p> First Name: <?php echo htmlspecialchars($firstName) ?></p>
		 <?php if(isset($firstNameError)){ ?>
			<span id="firstNameError" class="error"> <?php $firstNameError ?></span>
		 <?php } ?>

	<p> Last Name: <?php echo htmlspecialchars($lastName) ?></p>

	<p> Email: <?php echo htmlspecialchars($email); ?></p>
		  <?php if(isset($emailError)){ ?>
			<span id="emailError" class="error"> <?php $emailError ?></span>
		 <?php } ?>
	<p> Password Match: <?php echo htmlspecialchars($password_match) ?></p>
 </body>
 </html>