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

    // Az adatok frissítése az adatbázisban
    $update_sql = "UPDATE products SET pname = ?, pdescription = ?, price = ?, pimage_url = ? WHERE pid = ?";
    $stmt = $db->prepare($update_sql);
    $stmt->bind_param('ssdsi', $name, $description, $price, $image_url, $product_id);
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
    <title>Termék Szerkesztése</title>
</head>
<body>
    <h1>Termék Szerkesztése</h1>

    <form method="POST" action="">
        <label for="pname">Termék neve:</label><br>
        <input type="text" id="pname" name="pname" value="<?php echo $product['pname']; ?>" required><br><br>

        <label for="pdescription">Leírás:</label><br>
        <textarea id="pdescription" name="pdescription" required><?php echo $product['pdescription']; ?></textarea><br><br>

        <label for="price">Ár (Ft):</label><br>
        <input type="number" id="price" name="price" value="<?php echo $product['price']; ?>" required><br><br>

        <label for="pimage_url">Kép URL:</label><br>
        <input type="text" id="pimage_url" name="pimage_url" value="<?php echo $product['pimage_url']; ?>" required><br><br>

        <button type="submit">Frissítés</button>
    </form>
</body>
</html>

<?php
$db->close();  // Adatbázis kapcsolat lezárása
?>
