 <?php
 session_start();
 session_destroy();
 
 ?>
 <div class="header-container">

          	<?php
            	  require_once('header.php');
          	?>
   </div>

       <div id = "login">
           <h2>Please visit  Saranfamily homepage again<h2>
          	<td> <a href = "login.php">Go To login page</a></td>
       </div>

<p1> Good by </p1>  <div class="footer-container">

	<?php
 	   require_once('footer.php');
	?>
    </div>
