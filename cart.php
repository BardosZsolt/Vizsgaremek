<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Products</title>
  <link rel="stylesheet" href="shop.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  <link rel="shortcut icon" type="image/jpg" href="images/writing-text.png" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css"
    integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
    integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>

<body>
  <div class="container">
    <div class="navbar">
      <img src="images/logo2.png" alt="logo">
      <nav>
        <ul>
          <li><a href="kezdolap.php">HOME</a></li>
          <li><a href="about.php">ABOUT</a></li>
          <li><a href="gallery.php">GALLERY</a></li>
          <li><a href="shop.php">SHOP</a></li>
          <li><a href="products.php">PRODUCTS</a></li>
        </ul>
      </nav>
    </div>
  </div>
  </div>


<!------cart items details------->
<div class="small-container cart-page">
    <table>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Subtotal</th>
        </tr>
        <tr>
            <td>
                <div class="cart-info">
                    <img src="images/product-8.jpg">
                    <div>
                        <p>Trapstar Decoded Tee</p>
                        <small>Price:£45.00 </small>
                        <br>
                        <a href="">Remove</a>
                    </div>
                </div>
            </td>
            <td><input type="number" value="1"></td>
            <td>£45.00</td>
        </tr>
    </table>

    <div class="total-price">
        <table>
            <tr>
                <td>Subtotal</td>
                <td>£45.00</td>
            </tr>
            <tr>
                <td>Tax</td>
                <td>£20.00</td>
            </tr>
            <tr>
                <td>Total</td>
                <td>£65.00</td>
            </tr>
        </table>
    </div>
</div>



  
  

  <!---------footer--------->

  <div class="footer">
    <div class="containter">
      <div class="row">
        <div class="footer-col-1">
          <h3>Download Our App</h3>
          <p>Download App for Android and ios mobile phone.</p>
          <div class="app-logo">
            <img src="images/getit.png">
          </div>
        </div>
        <div class="footer-col-2">
          <img src="images/logo2.png">
          <p>Our Purpose Is To Sustainably Make the Pleasure and Benefits of Sport Accessible to the Many.</p>
        </div>
        <div class="footer-col-3">
          <h3>Useful Links</h3>
          <ul>
            <li>Coupons</li>
            <li>Blog Post</li>
            <li>Return Policy</li>
            <li>Join Affiliate</li>
          </ul>
        </div>
        <div class="footer-col-4">
          <h3>Follow us</h3>
          <ul>
            <li>Facebook</li>
            <li>Twitter</li>
            <li>Instagram</li>
            <li>YouTube</li>
          </ul>

        </div>

      </div>
      <hr>
      <p class="copyrigt">Copyright 2024 - Kornel Project.</p>
    </div>

  </div>

</body>
</html>