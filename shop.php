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
<div id="modal" class="modal" style="display: none;">
    <div class="modal-content">
        <button class="close" onclick="closeModal()">×</button>
        <div class="modal-left">
            <img id="modal-img" src="" alt="Product image">
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

            <!-- Quantity input -->
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" value="1" min="1" onchange="updatePrice()">

            <button class="btn" onclick="addToCart()">Add to Cart</button>

            <!-- Product description -->
            <p id="modal-description" class="description"></p>
        </div>
    </div>
</div>

<!-- Featured Products Section -->
<div class="small-container">
    <h2 class="title">Featured Products</h2>
        <!-- Dynamic products from the database -->
        <div class="row">
            <?php
            include "kapcsolat.php";
            if ($db->connect_error) {
                die("Connection failed: " . $db->connect_error);
            }

            $sql = "SELECT pname, price, pimage_url, pdescription FROM products WHERE pcategory_id = 1";
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
    </div>
    <h2 class="title">Latest Products</h2>
    <div class="row">
<?php
    include "kapcsolat.php";



    // Kapcsolat ellenőrzése
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    // Termékek lekérdezése
    $sql = "SELECT pname, price, pimage_url, pdescription FROM products WHERE pcategory_id = 2";
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
        // Töltse fel a modal tartalmát
        document.getElementById("modal-img").src = image;
        document.getElementById("modal-name").innerText = name;
        document.getElementById("modal-price").innerText = "£" + price;
        document.getElementById("modal-description").innerText = description;

        // Modal megjelenítése
        document.getElementById("modal").style.display = "flex";

        // Ár mentése és frissítése
        currentPrice = price;
        updatePrice();

        // ESC gombhoz hallgató hozzáadása
        document.addEventListener("keydown", handleKeyDown);

        // A modal körüli területre kattintásra is bezárjuk
        document.getElementById("modal").addEventListener("click", closeModalOnClickOutside);
    }

    function closeModal() {
        // Modal elrejtése
        document.getElementById("modal").style.display = "none";

        // Hallgató eltávolítása
        document.removeEventListener("keydown", handleKeyDown);
        document.getElementById("modal").removeEventListener("click", closeModalOnClickOutside);
    }

    function closeModalOnClickOutside(event) {
        // Ha a modalon kívül kattintanak, zárjuk be
        if (event.target === document.getElementById("modal")) {
            closeModal();
        }
    }

    function handleKeyDown(event) {
        // Ha ESC-et nyomnak, zárjuk be a modalt
        if (event.key === "Escape") {
            closeModal();
        }
    }

    function updatePrice() {
        // Frissítse az árat a darabszám alapján
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
            alert("Please select a size!");
            return;
        }

        // Add to cart API call
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
                location.reload(); // Frissítjük az oldalt
            } else {
                alert(data.message);
                
            }
        })
        .catch(error => console.error("Error:", error));
    }
    
     function sortProducts(order) {
      ['featured', 'latest'].forEach(category => {
        let container = document.getElementById(category);
        let products = Array.from(container.getElementsByClassName('col-4'));
        products.sort((a, b) => {
          let priceA = parseFloat(a.querySelector('p').innerText.replace('£', ''));
          let priceB = parseFloat(b.querySelector('p').innerText.replace('£', ''));
          return order === 'asc' ? priceA - priceB : priceB - priceA;
        });
        container.innerHTML = '';
        products.forEach(product => container.appendChild(product));
      });
    }

    function handleSortChange(event) {
      sortProducts(event.target.value);
    }
</script>


</body>
</html>
