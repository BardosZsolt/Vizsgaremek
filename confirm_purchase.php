<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase confirmation</title>
    <style>
        /* Alap háttér beállítás */
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

        /* Fő doboz */
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

        /* Animáció a beúszáshoz */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Címsor */
        .confirmation h1 {
            color: #2c3e50;
            font-size: 2em;
            margin-bottom: 10px;
        }

        /* Ikon és Köszönet szöveg */
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

        /* Vásárlási adatok */
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

        /* Gomb */
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
            background-color: #4bbbbd;
            transform: scale(1.05);
        }


        .back-link:hover {
            color: #1565c0;
        }
    </style>
</head>
<body>
<?php
session_start();
include "kapcsolat.php"; // Adatbázis kapcsolat

// Ellenőrizzük, hogy a felhasználó be van-e jelentkezve
if (!isset($_SESSION['uid'])) {
    echo "<script>alert('Bejelentkezés szükséges!'); window.location.href = 'bejelentkezes.php';</script>";
    exit;
}

// Ha nincs termék a kosárban, ne engedje a rendelést
if (empty($_SESSION['cart'])) {
    echo "<script>alert('A kosár üres!'); window.location.href = 'index.php';</script>";
    exit;
}

// Felhasználói adatok
$user_id = (int)$_SESSION['uid'];
$total_price = (float)$_POST['total_price'];
$name = htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8'); // Sanitized
$email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8'); // Sanitized
$zipcode = (int)$_POST['zipcode'];
$city = htmlspecialchars($_POST['city'], ENT_QUOTES, 'UTF-8'); // Sanitized
$address = htmlspecialchars($_POST['address'], ENT_QUOTES, 'UTF-8'); // Sanitized
$payment_method = (int)$_POST['payment'];
$status = 'F';
$order_date = date('Y-m-d H:i:s'); // Current timestamp
$updated_at = date('Y-m-d H:i:s'); // Current timestamp

// F - Feldolgozás alatt
// V - Visszaküldve
// T - Törölve
// M - Módosítva (hozzáadtam / töröltem egy terméket)

$sql = "INSERT INTO orders (user_id, total_price, order_date, name, email, zipcode, city, address, payment_method, status, updated_at) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $db->prepare($sql);

if ($stmt === false) {
    die("Prepare Error: " . $db->error . "<br>SQL: " . $sql);
}

// Corrected bind_param: created_at removed
$stmt->bind_param("idsisssssis", $user_id, $total_price, $order_date, $name, $email, $zipcode, $city, $address, $payment_method, $status, $updated_at);

if (!$stmt->execute()) {
    die("Execute Error: " . $stmt->error);
}

$stmt->execute();
$order_id = $stmt->insert_id;
$stmt->close();

// 2️⃣ Termékek mentése az `order_items` táblába
$stmt = $db->prepare("INSERT INTO order_items (order_id, product_id, quantity, price_at_purchase) VALUES (?, ?, ?, ?)");
foreach ($_SESSION['cart'] as $item) {
    $total_price += $item['price'] * $item['quantity'];
    $stmt->bind_param("iiid", $order_id, $item['product_id'], $item['quantity'], $item['price']);
    $stmt->execute();
}
$stmt->close();

// 3️⃣ Frissítsük a rendelés végösszegét az `orders` táblában
$stmt = $db->prepare("UPDATE orders SET total_price = ? WHERE id = ?");
$stmt->bind_param("di", $total_price, $order_id);
$stmt->execute();
$stmt->close();

// 4️⃣ Kosár ürítése és sikerüzenet
unset($_SESSION['cart']);
echo "<script>alert('Rendelés sikeresen leadva!'); window.location.href = 'index.php';</script>";
exit;
?>

</body>
</html>
