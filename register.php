﻿
<html>
 <body>
	 <div class="header-container">
          	<?php
            	  require_once('header.php');
          	?>
	 </div>
    <div id = "register">
        <h2>Register here Saranfamily homepage<h2>        
    </div>
<section>
   
    <form action="register-handler.php" method ="post">
		<fieldset>
		
		
        First name:<br>
        	<input type = "text" id ="firstName" name = "firstname" maxlength="50" required/>
       		 <br><br>
        Last name: <br>
      	  	<input type = "text" id= "lastName" name="lastname" required/>
			<br><br>
		
	    email:<br>
            <input type = "email" id="email" name = "email" required />
            <br><br>
		
       password: <br>
            <input type = "password" id = "password" name="password" required />
            <br><br>
	
		 password match: <br>
            <input type = "password" id= "password_match" name="password_match" required />
            <br><br>
   <!--	<input type="radio" name="gender" value="male" checked> Male<br>
          <input type="radio" name="gender" value="female"> Female<br>
          <input type="radio" name="gender" value="other"> Other<br><br> -->
        Birthday:
        <input type="date" name="birthday">

        <br>
        <br>
			<button type="submit" value ="Submit">Submit</button>
        <button type="reset" >Reset</button>
		</fieldset>
     </form>
	<?php 
	$error = isset( $_GET['error']) ? $_GET['error'] : false;
	if($error == true){
		?>
	<span> OH NO, Your input was incorrect! </span>
	<?php } ?>

</section>
  <div class="footer-container">

	<?php
 	   require_once('footer.php');
	?>
    </div>
</html>