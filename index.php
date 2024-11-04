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
      <nav>
        <ul>
          <li><a href="index.php">HOME</a></li>
          <li><a href="about.php">ABOUT</a></li>
          <li><a href="gallery.php">GALLERY</a></li>
          <li><a href="shop.php">SHOP</a></li>
          <li class="user-status">
            <?php
            if (!isset($_SESSION["uid"])) {
                echo '<ion-icon name="person"></ion-icon>';
            } else {
                echo "<p style='width: 5rem; color: red; font-size: 1rem;'>".$_SESSION["unick"]."</p>";
            }
            ?>
            <div class="submenu">
              <a href="regisztracio.php">Regisztráció</a>
              <?php
              if (!isset($_SESSION["uid"])) {
                  echo '<a href="bejelentkezes.php">Bejelentkezés</a>';
              } else {
                  echo '<a href="kijelentkezes.php">Kijelentkezés</a>';
              }
              ?>
            </div>
          </li>
        </ul>
      </nav>
    </div>
    <div class="row">
      <div class="col">
        <a href="https://fontmeme.com/trapstar-logo-font/"><img src="https://fontmeme.com/permalink/240213/d4e18533d67d2886f30a4187482b70cf.png" alt="trapstar-logo-font" border="0"></a>        
        <p>A Trapstar egy brit divatmárka, amely streetwear stílusban készült ruházatot kínál, jellemzően hip-hop és urban kultúrával összefonódó dizájnokkal és motívumokkal. A márka elismert a minőségi anyagok és az egyedi tervezésű ruhadarabok iránti elkötelezettségével.</p>
        <a href="shop.html" target="_blank"><button type="button">Explore</button></a> 
      </div>
      <div class="col">
        <a href="gallery.html" target="_blank">
          <div class="card card1">
            <h5>Gallery</h5>
            <p></p>
          </div>
        </a>
        <a href="shop.html" target="_blank">
          <div class="card card2">
            <h5>Shop Online</h5>
            <p></p>
          </div>
        </a>
        <a href="about.html" target="_blank">
          <div class="card card3">
            <h5>About</h5>
            <p></p>
          </div>
        </a>
        <div class="card card4">
          <h5>Community</h5>
          <p></p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
