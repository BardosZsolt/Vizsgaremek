<?php
session_start();

// Ellenőrizd, hogy az admin be van-e jelentkezve
if (!isset($_SESSION['uid']) || $_SESSION['role'] !== 'admin') {
    echo "<script>alert('Hozzáférés megtagadva! Kérlek, jelentkezz be adminisztrátorként.'); window.location.href = 'bejelentkezes.php';</script>";
    exit;
}

include "kapcsolat.php";  // Az adatbázis kapcsolat betöltése

// Ha meg van adva a termék ID-je, töröljük a terméket
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // A termék törlése az adatbázisból
    $delete_sql = "DELETE FROM products WHERE pid = ?";
    $stmt = $db->prepare($delete_sql);
    $stmt->bind_param('i', $product_id);
    $stmt->execute();
    $stmt->close();

    echo "<script>alert('Termék sikeresen törölve!'); window.location.href = 'index.php';</script>";
    exit;
}

$db->close();  // Adatbázis kapcsolat lezárása
?>
