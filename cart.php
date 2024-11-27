<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Kosár inicializálása, ha még nem létezik
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Ellenőrizzük, hogy van-e bármilyen termék a kosárban
if (empty($_SESSION['cart'])) {
    echo "<h1>A kosarad üres!</h1>";
    echo '<a href="./?p=shop">Vissza a boltba</a>';
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="shop.css">
</head>
<body>
    <h1>Your Shopping Cart</h1>
    <div class="cart-items">
        <?php
        $total = 0;

        // Kosár tételek megjelenítése
        foreach ($_SESSION['cart'] as $index => $item) {
            $item_total = $item['price'] * $item['quantity'];
            $total += $item_total;

            echo '<div class="cart-item">';
            echo '<h4>' . $item['name'] . '</h4>';
            echo '<p>Size: ' . $item['size'] . '</p>';
            echo '<p>Quantity: ' . $item['quantity'] . '</p>';
            echo '<p>Price: £' . $item_total . '</p>';
            echo '<button onclick="removeItem(' . $index . ')">Törlés</button>';
            echo '</div>';
        }
        ?>
        <h2>Total: £<?php echo number_format($total, 2); ?></h2>

        <!-- Kosár törlése gomb -->
        <button onclick="clearCart()">Kosár Törlése</button>

        <!-- Vásárlás folytatása -->
        <a href="./?p=shop" class="btn">Continue Shopping</a>
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
        .catch(error => console.error("Hiba a kosár törlésekor:", error));
    }

    // Egy termék törlése a kosárból
    function removeItem(index) {
        fetch("cart_action.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({ action: "removeItem", index: index })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === "success") {
                alert(data.message);
                location.reload(); // Frissítjük az oldalt
            }
        })
        .catch(error => console.error("Hiba a tétel törlésekor:", error));
    }
    </script>
</body>
</html>
