<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="shop.css">
</head>

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
    echo "<div class='empty-cart'>";
    echo "<h1>A kosarad üres!</h1>";
    echo "<p>Úgy tűnik, még nem adtál hozzá semmit a kosaradhoz. Böngéssz tovább a boltban, és válaszd ki kedvenc termékeidet!</p>";
    echo '<a href="./?p=shop" class="btn btn-back">Vissza a boltba</a>';
    echo "</div>";
    exit;
}





// Összesített ár inicializálása
$total = 0;
?>
<body>
    <div class="cart-container">
        <h1>Your Shopping Cart</h1>
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
                    $itemTotal = $item['price'] * $item['quantity'];
                    $total += $itemTotal;
                    ?>
                    <tr>
                        <td><?php echo $item['name']; ?></td>
                        <td><?php echo $item['size']; ?></td>
                        <td><?php echo $item['quantity']; ?></td>
                        <td>£<?php echo number_format($item['price'], 2); ?></td>
                        <td>£<?php echo number_format($itemTotal, 2); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h2>Total: £<?php echo number_format($total, 2); ?></h2>
        <div class="cart-actions">
            <a onclick="clearCart()" class="btn btn-clear">Kosár Törlése</a>
            <a href="./?p=shop" class="btn btn-back">Continue Shopping</a>
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
