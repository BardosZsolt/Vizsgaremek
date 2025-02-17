<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rendelés visszaigazolása</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background: url('images/fashionhub_bg.png') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .confirmation {
            max-width: 700px;
            width: 90%;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            padding: 40px 30px;
            text-align: center;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .confirmation h1 {
            color: #2c3e50;
            font-size: 2em;
            margin-bottom: 10px;
        }

        .icon {
            font-size: 4em;
            color: #27ae60;
            margin-bottom: 15px;
        }

        .confirmation p {
            font-size: 1.2em;
            color: #555;
            margin-bottom: 20px;
        }

        .confirmation ul {
            list-style: none;
            padding: 0;
            text-align: left;
            margin: 0 auto 20px auto;
            max-width: 500px;
        }

        .confirmation ul li {
            font-size: 1em;
            margin-bottom: 10px;
            color: #444;
            display: flex;
            justify-content: space-between;
            border-bottom: 1px solid #f0f0f0;
            padding-bottom: 5px;
        }

        .confirmation ul li strong {
            font-weight: bold;
            color: #000;
        }

        .confirmation button {
            background-color: #4bbbbd;
            color: #fff;
            border: none;
            padding: 12px 20px;
            font-size: 1.1em;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        .confirmation button:hover {
            background-color: #3696a0;
            transform: scale(1.05);
        }
    </style>
</head>
<body>

<?php
session_start();
include "kapcsolat.php";

if (!isset($_SESSION['uid'])) {
    echo "<script>alert('Bejelentkezés szükséges!'); window.location.href = 'bejelentkezes.php';</script>";
    exit;
}

if (empty($_SESSION['cart'])) {
    echo "<script>alert('A kosár üres!'); window.location.href = 'index.php';</script>";
    exit;
}

$user_id = (int)$_SESSION['uid'];
$total_price = (float)$_POST['total_price'];
$name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8');
$email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
$zipcode = (int)$_POST['zipcode'];
$city = htmlspecialchars($_POST['city'], ENT_QUOTES, 'UTF-8');
$address = htmlspecialchars($_POST['address'], ENT_QUOTES, 'UTF-8');
$payment_method = (int)$_POST['payment'];
$status = 'F';
$order_date = date('Y-m-d H:i:s');
$updated_at = date('Y-m-d H:i:s');

$sql = "INSERT INTO orders (user_id, total_price, order_date, name, email, zipcode, city, address, payment_method, status, updated_at) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $db->prepare($sql);
if ($stmt === false) {
    die("Prepare Error: " . $db->error);
}

$stmt->bind_param("idsisssssis", $user_id, $total_price, $order_date, $name, $email, $zipcode, $city, $address, $payment_method, $status, $updated_at);
if (!$stmt->execute()) {
    die("Execute Error: " . $stmt->error);
}

$order_id = $stmt->insert_id;
$stmt->close();

$stmt = $db->prepare("INSERT INTO order_items (order_id, product_id, quantity, price_at_purchase) VALUES (?, ?, ?, ?)");
foreach ($_SESSION['cart'] as $item) {
    $stmt->bind_param("iiid", $order_id, $item['product_id'], $item['quantity'], $item['price']);
    $stmt->execute();
}
$stmt->close();

$stmt = $db->prepare("UPDATE orders SET total_price = ? WHERE id = ?");
$stmt->bind_param("di", $total_price, $order_id);
$stmt->execute();
$stmt->close();

unset($_SESSION['cart']);
?>

<div class="confirmation">
    <div class="icon">✅</div>
    <h1>Sikeres rendelés!</h1>
    <p>Köszönjük, <?php echo $name; ?>! A rendelésed sikeresen rögzítettük.</p>
    <ul>
        <li><strong>Rendelési szám:</strong> <?php echo $order_id; ?></li>
        <li><strong>Név:</strong> <?php echo $name; ?></li>
        <li><strong>Email:</strong> <?php echo $email; ?></li>
        <li><strong>Szállítási cím:</strong> <?php echo "$zipcode, $city, $address"; ?></li>
        <li><strong>Fizetési mód:</strong> <?php echo ($payment_method == 1) ? "Utánvét" : "Bankkártya"; ?></li>
        <li><strong>Végösszeg:</strong> <?php echo number_format($total_price, 0, ',', ' '); ?> Ft</li>
    </ul>
    <button onclick="window.location.href='index.php'">Vissza a főoldalra</button>
</div>

</body>
</html>
