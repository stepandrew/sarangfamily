<?php
$_SESSION['error']=array();
/**
 * Prints error for given key (if one exists).
 */
function displayError($key) {
	if(isset($_SESSION['error'][$key])) { ?>
		<span id="<?= $key . "Error" ?>" class="error"><?= $_SESSION['error'][$key] ?></span>
	<?php }
	unset($_SESSION['error'][$key]);	
}
?>
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
    <p> <?php displayError('status'); ?> </p>
		<div>
      <label for ="firstname">  First name:</label><br>
        	<input type = "text" id ="firstname" name = "firstname" placeholder='first name' required/>
       		 <br><br>
      <label for ="lastname">  Last name:</label><br>
      	  	<input type = "text" id= "lastname" name="lastname" placeholder='last name'required/>
			<br><br>
		
	    <label for ="email">Email:</label><br>
            <input type = "email" id="email" name = "email" placeholder='email' required />
            <br><br>
		
      <label for ="password">password:</label> <br>
            <input type = "password" id = "password" name="password" placeholder='password' required />
            <br><br>
	
      <label for ="passwordmatch">password match: </label><br>
            <input type = "password" id= "password_match" name="password_match" placeholder='password match' required />
            <br><br>
   
      <label for ="birthday">   Birthday: </label>
        <input type="date" name="birthday">

        <br>
        <br>
			<button type="submit" value ="Submit">Submit</button>
        <button type="reset" >Reset</button>
		</fieldset>
     </form>
</section>
  <div class="footer-container">

	<?php
 	   require_once('footer.php');
	?>
    </div>
</html>