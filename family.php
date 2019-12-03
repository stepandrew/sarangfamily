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
<link href="style.css" type="text/css" rel="stylesheet">	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src= "validation.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
  $("#hide").click(function(){
    $(".threecousin").hide();
  });
  $("#show").click(function(){
    $(".threecousin").show();
  });
});
</script>

</head>
    <div class="header-container">
      <?php
          require_once('header.php');
      ?>
    </div>

   	<h2>This palace for my family memeber. </h2>
        <div>
          <p>
        <button id="hide">Hide</button>
        <button id="show">Show</button>
      
       </p>

        <div class="threecousin">three cousins </div>

        <a target="_blank" href="boy3picture.jpg">
          <img src="boy3picture.jpg" alt="boy3picture" width="50%" height="40%" alt="three cousin">
        </a>
       
        </div>
     
   
      <div>
			<h2><span class="footballground"> Football Ground   </span> <h2>
			<ui><img id = "footballground" src="p1.jpg" width="50%" height="40%" alt="candle1" /></ui>
			<br>
      </div>
      


        <div class="footer-container">
        <?php
          require_once('footer.php');
        ?>
        </div>
 </html>