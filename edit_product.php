<?php
session_start();

// Ellenőrizd, hogy az admin be van-e jelentkezve
if (!isset($_SESSION['uid']) || $_SESSION['role'] !== 'admin') {
    echo "<script>alert('Hozzáférés megtagadva! Kérlek, jelentkezz be adminisztrátorként.'); window.location.href = 'bejelentkezes.php';</script>";
    exit;
}

include "kapcsolat.php";  // Az adatbázis kapcsolat betöltése

// Ha meg van adva a termék ID-je, betöltjük az adatokat
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // A termék adatainak lekérése
    $sql = "SELECT * FROM products WHERE pid = $product_id";
    $result = $db->query($sql);
    $product = $result->fetch_assoc();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['pname'];
    $description = $_POST['pdescription'];
    $price = $_POST['price'];
    $image_url = $_POST['pimage_url'];
    $pcategory_id = $_POST['pcategory_id'];

    // Az adatok frissítése az adatbázisban
    $update_sql = "UPDATE products SET pname = ?, pdescription = ?, price = ?, pimage_url = ?, pcategory_id = ? WHERE pid = ?";
    $stmt = $db->prepare($update_sql);
    $stmt->bind_param('ssdsii', $name, $description, $price, $image_url, $pcategory_id, $product_id);
    $stmt->execute();
    $stmt->close();

    echo "<script>alert('Termék sikeresen frissítve!'); window.location.href = 'index.php';</script>";
    exit;
}
?>







<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Termék Szerkesztése</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .form-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            padding: 20px;
        }
        .form-container h1 {
            font-size: 24px;
            text-align: center;
            color: #111;
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }
        input[type="text"],
        input[type="number"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 14px;
            margin-bottom: 15px;
            transition: border-color 0.3s ease;
        }
        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus {
            border-color: #333;
            outline: none;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #333;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #555;
        }
        textarea {
            height: 80px;
            resize: vertical;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Termék Szerkesztése</h1>
        <form method="POST" action="">
            <label for="pname">Termék neve:</label>
            <input type="text" id="pname" name="pname" value="<?php echo htmlspecialchars($product['pname']); ?>" required>

            <label for="pdescription">Leírás:</label>
            <textarea id="pdescription" name="pdescription" required><?php echo htmlspecialchars($product['pdescription']); ?></textarea>

            <label for="price">Ár (£):</label>
            <input type="number" id="price" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" required>

            <label for="pimage_url">Kép URL:</label>
            <input type="text" id="pimage_url" name="pimage_url" value="<?php echo htmlspecialchars($product['pimage_url']); ?>" required>

            <label for="pcategory_id">Kategória ID:</label>
            <input type="number" id="pcategory_id" name="pcategory_id" value="<?php echo htmlspecialchars($product['pcategory_id']); ?>" required>

            <button type="submit">Frissítés</button>
        </form>
    </div>
</body>
</html>
