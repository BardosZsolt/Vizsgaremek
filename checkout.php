<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Ha nincs termék a kosárban, visszairányítjuk a felhasználót
if (empty($_SESSION['cart'])) {
    echo "<h1>A kosarad üres!</h1>";
    echo '<a href="./?p=shop" class="btn btn-back">Vissza a boltba</a>';
    exit;
}

// Kosár tartalmának megjelenítése
$total = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="shop.css">
</head>
<body>
    <div class="checkout-container">
        <h1>Purchase summary</h1>
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Termék neve</th>
                    <th>Méret</th>
                    <th>Mennyiség</th>
                    <th>Ár</th>
                    <th>Összesen</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['cart'] as $item): ?>
                    <?php 
                    $itemTotal = $item['price'] * $item['quantity'];
                    $total += $itemTotal;
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($item['name']); ?></td>
                        <td><?php echo htmlspecialchars($item['size']); ?></td>
                        <td><?php echo $item['quantity']; ?></td>
                        <td>£<?php echo number_format($item['price'], 2); ?></td>
                        <td>£<?php echo number_format($itemTotal, 2); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <h2>Final amount: £<?php echo number_format($total, 2); ?></h2>

        <!-- Szállítási és fizetési adatok -->
        <h1>Shipping and Payment Information</h1>
        <form action="confirm_purchase.php" method="POST">
            <label for="name">Full name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">E-mail address:</label>
            <input type="email" id="email" name="email" required>

            <label for="zipcode">Postal code:</label>
            <input type="text" id="zipcode" name="zipcode" required>

            <label for="city">City:</label>
            <input type="text" id="city" name="city" required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>

            <label for="payment">Payment method:</label>
            <select id="payment" name="payment" required>
                <option value="cash">Cash</option>
                <option value="card">card</option>
            </select>

            <button type="submit">Purchase confirmation</button>
        </form>
    </div>
</body>
</html>
