
<html>
 <div class="header-container">

          	<?php
            	  require_once('header.php');
          	?>
  </div>

 <body>
    <div id = "register">
        <h2>Register here Saranfamily homepage<h2>
        <h2>This page is under construction<h2>
    </div>
    <div>
    <form action="register-handler.php" method ="post">
        First name:<br>
        <input type = "text" name = "first name" value="Anna"/>
        <br>
        Last name: <br>
        <input type = "text" name="last name" value ="Han"/>
        <br>
        <input type="radio" name="gender" value="male" checked> Male<br>
          <input type="radio" name="gender" value="female"> Female<br>
          <input type="radio" name="gender" value="other"> Other<br><br>
        Birthday:
        <input type="date" name="bday">

        <br>
        <br>
        <input type="submit" value ="Submit"/>
        <input type="reset">

     </form>

</div>

  <div class="footer-container">

	<?php
 	   require_once('footer.php');
	?>
    </div>
</html