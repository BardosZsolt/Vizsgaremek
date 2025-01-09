<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="shop.css">
    <title>Webshop</title>
</head>
<body>

    <h1>Products</h1>
    <div class="product-grid">
        <?php
        $products = [
            ["name" => "Trapstar Irongate Paisley Tee", "price" => 80.00, "image" => "images/product-5.jpg", "description" => "A stylish tee with intricate paisley design, perfect for any casual occasion."],
            ["name" => "Trapstar Shooters Tee", "price" => 70.00, "image" => "images/product-6.jpg", "description" => "A bold tee with shooters print, ideal for streetwear enthusiasts."],
            ["name" => "Trapstar Gradient Blue Tee", "price" => 50.00, "image" => "images/product-7.jpg", "description" => "A cool blue gradient tee, blending comfort and style."],
            ["name" => "Trapstar Decoded Tee", "price" => 45.00, "image" => "images/product-8.jpg", "description" => "A decoded design tee with a modern look, made for comfort and style."],
            ["name" => "Trapstar Hoodie", "price" => 90.00, "image" => "images/product-5.jpg", "description" => "A comfortable hoodie perfect for colder days."],
            ["name" => "Trapstar Jacket", "price" => 150.00, "image" => "images/product-6.jpg", "description" => "A stylish jacket to complement any outfit."],
            ["name" => "Trapstar Cap", "price" => 30.00, "image" => "images/product-7.jpg", "description" => "A casual cap for everyday use."],
            ["name" => "Trapstar Sneakers", "price" => 120.00, "image" => "images/product-8.jpg", "description" => "Comfortable and stylish sneakers for any occasion."]
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