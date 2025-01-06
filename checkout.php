<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        /* Alap háttér és szöveg */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: url('images/fashionhub_bg.png') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Konténer */
        .checkout-container {
            background-color: rgba(31, 31, 31, 0.9); /* Sötétszürke háttér */
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 800px;
            text-align: center;
        }

        h1, h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #ffffff;
        }

        /* Táblázat stílus */
        .cart-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .cart-table th, .cart-table td {
            padding: 10px;
            border-bottom: 1px solid #555;
            text-align: center;
            color: #fff;
        }

        .cart-table th {
            background-color: rgba(31, 31, 31, 0.9);
            color: #f5f5f5;
            font-weight: bold;
        }

        .cart-table tr:nth-child(even) {
            background-color: #2c2c2c;
        }

        .cart-table tr:nth-child(odd) {
            background-color: #383838;
        }

        /* Form stílus */
        form label {
            display: block;
            text-align: left;
            margin-bottom: 8px;
            font-size: 14px;
            color: #f5f5f5;
        }

        form input, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: none;
            border-radius: 5px;
            background-color: #2c2c2c;
            color: #fff;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        form input:focus, select:focus {
            outline: none;
            background-color: #383838;
            box-shadow: 0 0 5px white;
        }

        /* Gombok */
        button {
            width: 100%;
            padding: 10px;
            background-color: white;
            color: black;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background-color: white;
            transform: translateY(-3px);
            box-shadow: 0 5px 10px rgba(255, 255, 255, 0.5);
        }

        button:active {
            transform: translateY(0);
            box-shadow: none;
        }

        /* Vissza gomb */
        .btn-back {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background-color: white;
            color: black;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.2s ease;
            text-align: center;
        }

        .btn-back:hover {
            background-color: white;
            transform: translateY(-3px);
            box-shadow: 0 5px 10px rgba(255, 255, 255, 0.5);
        }
    </style>
</head>
<body>
    <div class="checkout-container">
        <h1>Purchase Summary</h1>
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Size</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>All</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $total = 0;
                foreach ($_SESSION['cart'] as $item): 
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

        <h1>Shipping and Payment Information</h1>
        <form action="confirm_purchase.php" method="POST">
            <label for="name">Full name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">E-mail address:</label>
            <input type="email" id="email" name="email" required>

            <label for="zipcode">Postal code:</label>
            <input type="text" id="zipcode" name="zipcode" oninput="fetchCity()" required>

            <label for="city">City:</label>
            <input type="text" id="city" name="city" required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>

            <label for="payment">Payment Method:</label>
            <select id="payment" name="payment" required>
                <option value="cash">After delivery payment</option>
                <option value="card">Card</option>
            </select>

            <button type="submit">Purchase confirmation</button>
        </form>
        <a href="./?p=shop" class="btn-back">Back to the store</a>
    </div>
</body>
</html>
