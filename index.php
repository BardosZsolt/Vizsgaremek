<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Fashionhub</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  <link rel="shortcut icon" type="image/jpg" href="images/writing-text.png"/>
  <link rel="stylesheet" href="kezdolap.css">
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>
  <div class="container">
    <div class="navbar">
      <?php  ?>
       
    </div>
    <?php
      // Az oldal kiválasztása az URL-ből
      $p = isset($_GET['p']) ? $_GET['p'] : "";

      // Tartalom betöltése a "p" paraméter alapján
    include("navbar.php");
    if (strpos($p, "admin") !== false) {
      include("./admin/admin-navbar.php");
  }
       switch ($p) {
        case "shop":
          include("shop.php");
          break;
        case "about":
          include("about.php");
          break;
          case "admin":
            include("./admin/admin.php");
            break;
              case "admin-product-upload":
                  include("./admin/admin-product-upload.php");
                  break;
  
                  case "admin-comment-edit":
                      include("./admin/admin-comment-edit.php");
                      break;
  
                      case "admin-summary":
                          include("./admin/admin-summary.php");
                          break;
                          case "admin-product-edit":
                            include("./admin/admin-product-edit.php");
                            break;
        default:
          include("./kezdolap.php");
          break;
           
      }
      include("footer.php"); 
    ?>
  </div>
</body>
</html>
