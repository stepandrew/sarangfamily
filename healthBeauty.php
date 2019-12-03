<?php
session_start();
?>
<?php
if(!isset($_SESSION['access_granted']) ||$_SESSION['access_granted'] !== true ){
  header("location: login.php");
  exit();
}
?>
<html>
  <head>
  <link rel="stylesheet" type="text/css" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script> 
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideToggle("slow");
  });
});
</script>
</head>
  <div class="header-container">

          	<?php
            	  require_once('header.php');
          	?>
   </div>

   
   	<h2> </h2>
     <div id="flip">Click to slide the panel down or up</div>
    <div id="panel">This pate is for health and beauty care.</div>


   </html>

  <div class="footer-container">
          <?php
            require_once('footer.php');
          ?>
    </div>
