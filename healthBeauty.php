<?php
session_start();
?>
<?php
if(!isset($_SESSION['access_granted']) ||$_SESSION['access_granted'] !== true ){
  header("location: login.php");
  exit();
}
?>
  <div class="header-container">

          	<?php
            	  require_once('header.php');
          	?>
   </div>

   <html>
   	<h2>This pate is for health and beauty care. </h2>
       <h2>This page is under construction<h2>


   </html>

  <div class="footer-container">
          <?php
            require_once('footer.php');
          ?>
    </div>
