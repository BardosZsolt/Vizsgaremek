<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shop</title>
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

<!-- Modal for enlarged product view -->
<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <div class="modal-left">
            <img id="modal-img" src="">
        </div>
        <div class="modal-right">
            <h2 id="modal-name"></h2>
            <p id="modal-price"></p>
            <select id="size">
                <option>Select Size</option>
                <option>S</option>
                <option>M</option>
                <option>L</option>
                <option>XL</option>
            </select>

            <!-- Quantity selector -->
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" value="1" min="1" onchange="updatePrice()">

            <button class="btn" onclick="addToCart()">Add to Cart</button> 

            <!-- Termék leírása -->
            <p id="modal-description" class="description"></p>
        </div>
    </div>
</div>



<!---------FEATURED PRODUCTS-----------> 
<div class="small-container">
<select>
            <option>Default Shorting</option>
            <option>Sort by price</option>
            <option>Sort by popularity</option>
            <option>Sort by rating</option>
            <option>Sort by sale</option>
        </select>
        
    <h2 class="title">Featured Products</h2>
    <div class="row">
        <div class="col-4">
            <img src="images/product-5-.png" alt="" onclick="openModal('images/product-5-.png', 'Trapstar Irongate Paisley Tee', 80.00, 'A stylish tee with intricate paisley design, perfect for any casual occasion.')">
            <h4>Trapstar Irongate Paisley Tee</h4>
            
            <p>£80.00</p>
        </div>
        <div class="col-4">
            <img src="images/product-6.jpg" alt="" onclick="openModal('images/product-6.jpg', 'Trapstar Shooters Tee', 99.75, 'A bold tee with shooters print, ideal for streetwear enthusiasts.')">
            <h4>Trapstar Shooters Tee</h4>
           
            <p>£99.75</p>
        </div>
        <div class="col-4">
            <img src="images/product-7.jpg" alt="" onclick="openModal('images/product-7.jpg', 'Trapstar Gradient Blue Tee', 50.00, 'A cool blue gradient tee, blending comfort and style.')">
            <h4>Trapstar Gradient Blue Tee</h4>
            
            <p>£50.00</p>
        </div>
        <div class="col-4">
            <img src="images/product-8.jpg" alt="" onclick="openModal('images/product-8.jpg', 'Trapstar Decoded Tee', 45.00, 'A decoded design tee with a modern look, made for comfort and style.')">
            <h4>Trapstar Decoded Tee</h4>
          
            <p>£45.00</p>
        </div>
    </div>
</div>

<h2 class="title">Latest Products</h2>
<div class="row">
    <!-- Statikus termékek -->
    <div class="col-4">
        <img src="images/product-9.jpg" alt="" onclick="openModal('images/product-9.jpg', 'Trapstar Irongate Short Black', 120.00, 'Comfortable and stylish shorts for any occasion.')">
        <h4>Trapstar Irongate Short 'Black'</h4>
        <p>£120.00</p>
    </div>
    <div class="col-4">
        <img src="images/product-10.jpg" alt="" onclick="openModal('images/product-10.jpg', 'Trapstar Irongate Short Gray', 120.00, 'Comfortable and stylish shorts in gray.')">
        <h4>Trapstar Irongate Short 'Gray'</h4>
        <p>£120.00</p>
    </div>
    <div class="col-4">
        <img src="images/product-11.jpg" alt="" onclick="openModal('images/product-11.jpg', 'Trapstar Irongate Short', 150.00, 'Stylish shorts for summer days.')">
        <h4>Trapstar Irongate Short</h4>
        <p>£150.00</p>
    </div>
    <div class="col-4">
        <img src="images/product-12.jpg" alt="" onclick="openModal('images/product-12.jpg', 'Trapstar Script Tee', 115.00, 'A stylish tee with a script design.')">
        <h4>Trapstar 'Script' Tee</h4>
        <p>£115.00</p>
    </div>

    <!-- Dinamikus termékek (adatbázisból betöltve) -->
    <?php
    include "kapcsolat.php";



    // Kapcsolat ellenőrzése
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    // Termékek lekérdezése
    $sql = "SELECT pname, price, pimage_url, pdescription FROM products";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="col-4">';
            echo '<img src="' . htmlspecialchars($row['pimage_url']) . '" alt="' . htmlspecialchars($row['pname']) . '" onclick="openModal(\'' . addslashes($row['pimage_url']) . '\', \'' . addslashes($row['pname']) . '\', ' . $row['price'] . ', \'' . addslashes($row['pdescription']) . '\')">';
            echo '<h4>' . htmlspecialchars($row['pname']) . '</h4>';
            echo '<p>£' . number_format($row['price'], 2) . '</p>';
            echo '</div>';
        }
    } else {
        echo "<p>No additional products found in the database.</p>";
    }

    $db->close();
    ?>
</div>

<div class="page-btn">
        <span>1</span>
        <span>2</span>
        <span>3</span>
        <span>4</span>
        <span>&#8594;</span>
      </div>

<script>
    let currentPrice = 0;

    function openModal(image, name, price, description) {
        document.getElementById("modal-img").src = image;
        document.getElementById("modal-name").innerText = name;
        document.getElementById("modal-price").innerText = "£" + price;
        document.getElementById("modal-description").innerText = description;
        document.getElementById("modal").style.display = "block";
        currentPrice = price;
        updatePrice();
    }

    function closeModal() {
        document.getElementById("modal").style.display = "none";
    }

    function updatePrice() {
        const quantity = document.getElementById("quantity").value;
        const totalPrice = currentPrice * quantity;
        document.getElementById("modal-price").innerText = "£" + totalPrice.toFixed(2);
    }

    function addToCart() {
        const name = document.getElementById("modal-name").innerText;
        const price = parseFloat(document.getElementById("modal-price").innerText.replace("£", ""));
        const size = document.getElementById("size").value;
        const quantity = parseInt(document.getElementById("quantity").value);

        if (size === "Select Size") {
            alert("Kérlek, válassz méretet!");
            return;
        }

        fetch("cart_action.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                action: "addToCart",
                name: name,
                price: price,
                size: size,
                quantity: quantity
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === "success") {
                alert(data.message);
                updateCartCount();
            } else {
                alert(data.message);
            }
        })
        .catch(error => console.error("Hiba:", error));
    }
    

    function updateCartCount() {
        // This function should update the cart count in the navigation bar or other parts of the page.
    }


    
</script>

</body>
</html>