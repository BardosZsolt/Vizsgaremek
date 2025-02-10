<style>
table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        th {
            background-color: #333;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
        }
        tr:nth-child(even) {
            background-color: #f7f7f7;
        }
        tr:nth-child(odd) {
            background-color: #fff;
        }
        tr:hover {
            background-color: #eaeaea;
        }
        td img {
            max-width: 80px;
            height: auto;
            border-radius: 4px;
        }
        button {
            padding: 8px 12px;
            border: 1px solid #333;
            border-radius: 4px;
            background-color: #fff;
            color: #333;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        button:hover {
            background-color: #333;
            color: #fff;
        }
        a {
            text-decoration: none;
        }
        h2{
            color:white;
        }

        #admin-menu ul{
            display: flex;
            justify-content: space-between;
            list-style-type: none;

        }

        #admin-menu ul li a{
            color: white;
        }
    </style>

<table>
        <tr>
            <th>Termék neve</th>
            <th>Leírás</th>
            <th>Ár</th>
            <th>Kép</th>
            <th>Műveletek</th>
        </tr>
        <?php

if (!isset($_SESSION['uid']) || $_SESSION['role'] !== 'admin') {
    echo "<script>alert('Hozzáférés megtagadva! Kérlek, jelentkezz be adminisztrátorként.'); window.location.href = 'bejelentkezes.php';</script>";
    exit;
}

include "kapcsolat.php";  // Az adatbázis kapcsolat betöltése

// Termékek lekérdezése
$sql_products = "SELECT * FROM products";
$result_products = $db->query($sql_products);

        if ($result_products->num_rows > 0) {
            while ($row = $result_products->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['pname']) . "</td>";
                echo "<td>" . htmlspecialchars($row['pdescription']) . "</td>";
                echo "<td>" . htmlspecialchars($row['price']) . " £</td>";
                echo "<td><img src='" . htmlspecialchars($row['pimage_url']) . "' alt='" . htmlspecialchars($row['pname']) . "'></td>";
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