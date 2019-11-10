<?php
session_start();
?>
<?php
/* session_start();
if (isset($_SESSION["access_granted"]) && !$_SESSION["access_granted"] ||
   !isset($_SESSION["access_granted"])) {
  $_SESSION["status"] = "You need to log in first";
  header("Location:login.php");
}

echo "ACCESS GRANTED"; 
?>
  
<a href="logout.php">Logout</a> */
?>

<html> 
	<head>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
	<div class="welcome">
		<p> 		
			<br><h2>Welcome to our homepage</h2>
			<p>Your register was successul!</p>
		<td> <a href = "login.php">Please login. </a></td>
		</p>

	</div>

	</body>
</html>
