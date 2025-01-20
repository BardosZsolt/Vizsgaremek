<?php

// Ellenőrizd, hogy az admin be van-e jelentkezve
if (!isset($_SESSION['uid']) || $_SESSION['role'] !== 'admin') {
    echo "<script>alert('Hozzáférés megtagadva! Kérlek, jelentkezz be adminisztrátorként.'); window.location.href = 'bejelentkezes.php';</script>";
    exit;
}

include "kapcsolat.php";  // Az adatbázis kapcsolat betöltése

// Termékek listázása
$sql = "SELECT * FROM products";
$result = $db->query($sql);
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Admin Felület</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 10px; text-align: left; border: 1px solid #ddd; }
        button { padding: 5px 10px; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Admin Felület - Termékek kezelése</h1>

    <h2>Termékek listája</h2>

    <table>
        <tr>
            <th>Termék neve</th>
            <th>Leírás</th>
            <th>Ár</th>
            <th>Kép</th>
            <th>Akciók</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['pname'] . "</td>";
                echo "<td>" . $row['pdescription'] . "</td>";
                echo "<td>" . $row['price'] . " Ft</td>";
                echo "<td><img src='" . $row['pimage_url'] . "' alt='" . $row['pname'] . "' style='width: 100px; height: 100px;'></td>";
                echo "<td>
                        <a href='edit_product.php?id=" . $row['pid'] . "'><button>Szerkesztés</button></a>
                        <a href='delete_product.php?id=" . $row['pid'] . "'><button>Törlés</button></a>
                    </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Nincsenek termékek.</td></tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
$db->close();  // Adatbázis kapcsolat lezárása
?>
