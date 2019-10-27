<?php
session_start();
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
	<div class="content">
		<p> 
			
			<br><h2> ACCESS GRANTED</h2>
			<p>Log in was successul!</p>
		<td> <a href = "home.php">Go To Home</a></td>
		</p>

	</div>
	 <div class="footer-container">

		<?php
		   require_once('footer.php');
		?>
		</div>
	</body>
</html>
