<?php
session_start();
//echo "<pre>" .print_r($_SESSION,1). "</pre>";
?>
<?php
//$_SESSION['errors']=array();
$setup = array();
if(isset($_SESSION['setup'])){
  $setup = array_shift($_SESSION['setup']);
}

?>
<html>
  <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src = "jquery-3.4.1.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery-3.validation.min.js" ></script>
	<script src= "validation.js" type="text/javascript"></script>

  <style>
 .erroroccur{color: red;}
    </style>
  </head>
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
  
		<div>
      <label for ="firstname">  First name:</label><br>
        	<input type = "text" id ="firstname" name = "firstname" placeholder='first name' value="<?php echo isset($setup['firstname']) ? $setup['firstname'] : ''; ?>" required/>
       		 <br><br>
      <label for ="lastname">  Last name:</label><br>
      	  	<input type = "text" id= "lastname" name="lastname" placeholder='last name' value="<?php echo isset($setup['lastname']) ? $setup['lastname'] : ''; ?>"required/>
			<br><br>
		
	    <label for ="email">Email:</label><br>
            <input type = "email" id="email" name = "email" placeholder='email' value="<?php echo isset($setup['email']) ? $setup['email'] : ''; ?>" required />
            <br><br>
		
      <label for ="password">password:</label> <br>
            <input type = "password" id = "password" name="password" placeholder='password' value="<?php echo isset($setup['password']) ? $setup['password'] : ''; ?>" required />
            <br><br>
	
      <label for ="passwordmatch">password match: </label><br>
            <input type = "password" id= "password_match" name="password_match" placeholder='password match' required />
            <br><br>
   
      <label for ="birthday">   Birthday: </label>
        <input type="date" name="birthday"/>

        <br>
        <br>
			<button type="submit" value ="Submit">Submit</button>
        <button type="reset">Reset</button>


      <div class="registererror">

        <p>
              <?php if (isset($_SESSION['errors']['firstname'])) { ?>
              <span class="erroroccur" ><?php echo $_SESSION['errors']['firstname'] ?></span>
               
              <?php } ?>
         </p>
         <p>
          <?php if (isset($_SESSION['errors']['emailError'])) { ?>
              <span class="erroroccur"><?php echo $_SESSION['errors']['emailError'] ?></span>
             
              <?php } ?>
          </p>
          <P>
          <?php if (isset($_SESSION['errors']['passwordMatchError'])) { ?>
              <span class="erroroccur"><?php echo $_SESSION['errors']['passwordMatchError'] ?></span>
             
              <?php } ?>
        
          </p>
          <P>
          <?php if (isset($_SESSION['errors']['messages'])) { ?>
              <span class="erroroccur"><?php echo $_SESSION['errors']['messages'] ?></span>
             
              <?php } ?>
        
          </p>
          <P>
          <?php if (isset($_SESSION['errors']['emailexist'])) { ?>
              <span class="erroroccur"><?php echo $_SESSION['errors']['emailexist'] ?></span>
            
              <?php } ?>
        
          </p>

      <?php 
			 $errors = isset($_GET['errors']) ? $_GET['errors'] : false;			
			 if($errors == true){ 			 
		 	?>
       <span id="errorwarn"> Oh! no, your register is not completed!</span>
      
			 <?php } ?>
    </div>
   
       
    </div>	
		</fieldset>
     </form>
</section>
  <div class="footer-container">

	<?php
 	   require_once('footer.php');
	?>
    </div>
</html>