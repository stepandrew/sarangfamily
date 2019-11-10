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
  <div class="header-container">

          	<?php
            	  require_once('header.php');
          	?>
   </div>

   	<h2>This palace for my family memeber. </h2>
       <h2>This page is under construction<h2>

<!--
  
<ul>
<div class="gallery">
	
         <a target="_blank" href="p1.jpg">
        <img src="p1.jpg" alt="football ground" width="30%" height="400">
         </a>

 <div class="desc">Football stadium</div>

  <a target="_blank" href="boy3pictuer".jpg">
    <img src="boy3picture.jpg" alt="boy3picture" width="30" height="400">
  </a>
  <div class="desc">three cousins</div>
</div>
</ul>

-->

  <div class="footer-container">
	<?php
 	   require_once('footer.php');
	?>
    </div>
 </html>