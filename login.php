<html>
<?php
session_start();
$email = $_POST['email'];
$password = $_POST['password'];
$errors = array();

	
	
$my_query = ""; 
$my_query = "SELECT * FROM users WHERE email = '$email' AND pw = '$password'";
//$result = mysqli_query($connection, $my_query);

?>

<html>
  <head>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>

	 <div class="header-container">

				<?php
					  require_once('header.php');
				?>
	   </div>

			<div id = "login">
				<h2>login here Saranfamily homepage<h2>

			 <form method="POST" action = "login-handler.php" autocomplete = "off">
				email:<br>
				<input type = "text" name = "email" >
				<br>
				password: <br>
				<input type = "password" name="password" >
				<br>
				<br>
				<input type="submit" value ="Submit">

			 </form>
			 </div>


	  <div class="footer-container">

		<?php
		   require_once('footer.php');
		?>
		</div>
	</body>
</html>