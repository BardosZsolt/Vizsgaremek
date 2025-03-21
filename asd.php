<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="shop.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  <link rel="shortcut icon" type="image/jpg" href="images/writing-text.png" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css"
    integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
    integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <title>Webshop</title>
</head>
<body>

    <h1>Products</h1>
    <div class="product-grid">
        <?php
        $products = [
            ["name" => "Trapstar Irongate Paisley Tee", "price" => 80.00, "image" => "images/product-5-.png", "description" => "A stylish tee with intricate paisley design, perfect for any casual occasion."],
            ["name" => "Trapstar Shooters Tee", "price" => 70.00, "image" => "images/product-5-.png", "description" => "A bold tee with shooters print, ideal for streetwear enthusiasts."],
            ["name" => "Trapstar Gradient Blue Tee", "price" => 50.00, "image" => "images/product-5-.png", "description" => "A cool blue gradient tee, blending comfort and style."],
            ["name" => "Trapstar Decoded Tee", "price" => 45.00, "image" => "images/product-5-.png", "description" => "A decoded design tee with a modern look, made for comfort and style."],
            ["name" => "Trapstar Hoodie", "price" => 90.00, "image" => "images/product-5-.png", "description" => "A comfortable hoodie perfect for colder days."],
            ["name" => "Trapstar Jacket", "price" => 150.00, "image" => "images/product-5-.png", "description" => "A stylish jacket to complement any outfit."],
            ["name" => "Trapstar Cap", "price" => 30.00, "image" => "images/product-5-.png", "description" => "A casual cap for everyday use."],
            ["name" => "Trapstar Sneakers", "price" => 120.00, "image" => "images/product-5-.png", "description" => "Comfortable and stylish sneakers for any occasion."]
        ];

        foreach ($products as $product) {
            echo '<div class="product">';
            echo '<img src="' . $product["image"] . '" alt="' . $product["name"] . '" onclick="openModal(\'' . $product["image"] . '\', \'' . $product["name"] . '\', ' . $product["price"] . ', \'' . $product["description"] . '\')">';
            echo '<h4>' . $product["name"] . '</h4>';
            echo '<p>£' . $product["price"] . '</p>';
            echo '</div>';
        }
        ?>
    </div>


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

        // AJAX hívás a kosár frissítéséhez
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

    function clearCart() {
        fetch("cart_action.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                action: "clearCart"
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === "success") {
                alert(data.message);
                window.location.href = "shop.php"; // Visszairányítás a shop oldalra
            }
        })
        .catch(error => console.error("Hiba a kosár törlésekor:", error));
    }
    </script>

</body>
</html>