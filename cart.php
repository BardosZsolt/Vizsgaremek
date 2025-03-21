<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="shop.css">
     <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('images/fashionhub_bg.png'); 
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            font-family: Arial, sans-serif;
            color: #fff; /* Fehér szöveg */
        }
        .cart-container {
            background: rgba(0, 0, 0, 0.8); /* Fekete áttetsző háttér a kosárnak */
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
            max-width: 800px;
        }
        h1, h2 {
            text-align: center;
            color: #fff; /* Fehér szöveg */
        }
        .cart-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        .cart-table th, .cart-table td {
            padding: 10px;
            border: 1px solid #555; /* Sötétszürke keret */
            text-align: left;
            color: #fff; /* Fehér szöveg */
        }
        .cart-table th {
            background: #444; /* Még sötétebb szürke fejlécek */
        }
        .cart-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            color: #000; /* Fekete szöveg alapértelmezett */
            background: #fff; /* Fehér háttér alapértelmezett */
            text-decoration: none;
            border-radius: 5px;
            transition: background 0.3s, color 0.3s, transform 0.3s, box-shadow 0.3s;
            border: 1px solid #fff; /* Fehér keret */
        }
        .btn:hover {
            background: #fff; /* Fehér háttér hover esetén */
            color: #000; /* Fekete szöveg hover esetén */
            border: 1px solid #fff; /* Fehér keret hover esetén */
            transform: scale(1.1); /* Gomb nagyítása hover esetén */
            box-shadow: 0 0 10px 2px rgba(255, 255, 255, 0.8); /* Fehér világítás hover esetén */
        }
    </style>
</head>

<?php

// Kosár inicializálása, ha még nem létezik
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Ellenőrizzük, hogy van-e bármilyen termék a kosárban
if (empty($_SESSION['cart'])) {
    echo "<div class='empty-cart'>";
    echo "<h1>Your basket is empty!</h1>";
    echo "<p>It looks like you haven't added anything to your cart yet. Continue browsing the store and choose your favorite products!</p>";
    echo '<a href="./?p=shop" class="btn btn-back">Back to the store</a>';
    echo "</div>";
    exit;
}

// Összesített ár inicializálása
$total = 0;
?>
<body>
    <div class="cart-container">
        <h1 id="orders">Your Shopping Cart</h1>
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Size</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['cart'] as $item): ?>
                    <?php 
                    $itemTotal = $item['price'];
                    $total += $item['price'];
                    ?>
                    <tr>
                        <td><?php echo $item['name']; ?></td>
                        <td><?php echo $item['size']; ?></td>
                        <td><?php echo $item['quantity']; ?></td>
                        <td>£<?php echo number_format($item['price'], 2); ?></td>
                        <td>£<?php echo number_format($itemTotal, 2) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h2>Total: £<?php echo number_format($total, 2); ?></h2>
        <div class="cart-actions">
            <a onclick="clearCart()" class="btn btn-clear">Empty Cart</a>
            <a href="./?p=shop" class="btn btn-back">Continue Shopping</a>
            <a href="checkout.php" class="btn btn-purchase">Buying</a>
        </div>
    </div>

    <script>
    // Kosár teljes törlése
    function clearCart() {
        fetch("cart_action.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ action: "clearCart" })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === "success") {
                alert(data.message);
                location.reload(); // Frissítjük az oldalt
            }
        })
        .catch(error => {console.error("Hiba a kosár törlésekor:", error); location.reload();});
    }
    </script>
</body>
</html>
