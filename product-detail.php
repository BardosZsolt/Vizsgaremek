<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Detail</title>
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
      <?php include("navbar.php"); ?>
    </div>
  </div>
  </div>


<!---------single product details--------->
<div class="small-container single-product">
    <div class="row">
        <div class="col-2">
            <img src="images/product-8.jpg" width="100%" id="ProductImg">

            <div class="small-img-row">
                <div class="small-img-col">
                    <img src="images/product-small1.jpg" width="100%" class="small-img">
                </div>
                <div class="small-img-col">
                    <img src="images/product-small2.jpg" width="100%" class="small-img">
                </div>
                <div class="small-img-col">
                    <img src="images/product-small3.jpg" width="100%" class="small-img">
                </div>
                <div class="small-img-col">
                    <img src="images/product-small4.jpg" width="100%" class="small-img">
                </div>
            </div>



        </div>
        <div class="col-2">
            <p>Home / T-shirt</p>
            <h1>Trapstar Decoded Tee</h1>
            <h4>£45.00</h4>
            <select>
                <option>S</option>
                <option>M</option>
                <option>L</option>
                <option>XL</option>
                <option>XXL</option>
            </select>
            <input type="number" value="1">
            <a href="cart.html" class="btn">Add to Cart</a>
            <h3>Product Details <ion-icon name="clipboard-outline" class="fa"></ion-icon></h3>
            <br>
            <p>Give your summer wardrobe a style upgrade with the Trapsar Decoded Tee. Team it with a pair of short for your daily wearing or a denims for an evening out with the guys.</p>
        </div>
    </div>
</div>

<!---------title------->  
<div class="small-container">
    <div class="row row-2">
        <h2>Related Products</h2>
        <p>View More</p>
    </div>

</div>


  
  <div class="small-container">
    
      <div class="row">
        <div class="col-4">
          <img src="images/product-9.jpg" alt="">
          <h4>Trapstar Irongate Short 'Black' </h4>
          <div class="rating">
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star-half"></ion-icon>
          </div>
          <p>£120.00</p>
        </div>
        <div class="col-4">
          <img src="images/product-10.jpg" alt="">
          <h4>Trapstar Irongate Short 'Gray'</h4>
          <div class="rating">
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star-half"></ion-icon>
          </div>
          <p>£120.00</p>
        </div>
        <div class="col-4">
          <img src="images/product-11.jpg" alt="">
          <h4>Trapstar Irongate Short </h4>
          <div class="rating">
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star-half"></ion-icon>
          </div>
          <p>£150.00</p>
        </div>
        <div class="col-4">
          <img src="images/product-12.jpg" alt="">
          <h4>Trapstar 'Script' Tee</h4>
          <div class="rating">
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star"></ion-icon>
            <ion-icon name="star-half"></ion-icon>
          </div>
          <p>£115.00</p>
        </div>
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

<!--------js for product gallery-------->
<script>
    var ProductImg = document.getElementById("ProductImg");
    var SmallImg = document.getElementByClassName("small-img");

        SmallImg[0].onclick = function()
        {
            ProductImg.src =SmallImg[0].src
        }
        SmallImg[1].onclick = function()
        {
            ProductImg.src =SmallImg[1].src
        }
        SmallImg[2].onclick = function()
        {
            ProductImg.src =SmallImg[2].src
        }
        SmallImg[3].onclick = function()
        {
            ProductImg.src =SmallImg[3].src
        }
</script>

</body>
</html>