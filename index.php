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
      overflow-x: hidden !important;
    }
  </style>
  <div class="container">
    <div class="navbar">
      <img src="images/logo2.png" alt="logo">
      <?php include("navbar.php"); ?>
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
</body>
</html>
