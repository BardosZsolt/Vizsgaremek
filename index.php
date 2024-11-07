<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trapstar</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  <link rel="shortcut icon" type="image/jpg" href="images/writing-text.png"/>
  <link rel="stylesheet" href="kezdolap.css">
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>
  <style>
    .container{
      overflow: hidden !important;
    }
  </style>
  <div class="container">
    <div class="navbar">
      <img src="images/logo2.png" alt="logo">
      <?php include("navbar.php"); ?>
    </div>
    <div class="row">
      <div class="col">
        <a href="https://fontmeme.com/trapstar-logo-font/"><img src="https://fontmeme.com/permalink/240213/d4e18533d67d2886f30a4187482b70cf.png" alt="trapstar-logo-font" border="0"></a>        
        <p>A Trapstar egy brit divatmárka, amely streetwear stílusban készült ruházatot kínál, jellemzően hip-hop és urban kultúrával összefonódó dizájnokkal és motívumokkal. A márka elismert a minőségi anyagok és az egyedi tervezésű ruhadarabok iránti elkötelezettségével.</p>
        <a href="shop.html" target="_blank"><button type="button">Explore</button></a> 
      </div>



    



      <?php
          if( isset($_GET['p']) )  $p = $_GET['p']  ;
          else                     $p = "" ;
          
          if( $p == "galery" )  include("gallery.php")    ;  else 
          if( $p==  "shop"   )  include("shop.php"   )    ;  else
          if( $p==  "about"  )  include("about.php"  )    ;  else
          if( $p==  "home"   )  include("index.php"  )    ;  else
                                include("kezdolap.php")   ;
      ?>


    </div>
  </div>
</body>
</html>
