
<?php
session_start();
?>



 <div class="header-container">

          	<?php
            	  require_once('header.php');
          	?>
   </div>

    <html>
     <body>
        <div id = "login">
            <h2>login here Saranfamily homepage<h2>
            <h2>This page is under construction<h2>
        </div>
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







</html>
  <div class="footer-container">

	<?php
 	   require_once('footer.php');
	?>
    </div>
