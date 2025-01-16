<?php

include "kapcsolat.php";
if ($db->dbect_error) {
    die("Kapcsolódási hiba: " . $db->dbect_error);
}

// Termék hozzáadása
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $pname = $_POST['pname'];
    $pdescription = $_POST['pdescription'];
    $price = $_POST['price'];
    $pimage_url = $_POST['pimage_url'];

    $sql = "INSERT INTO products (pname, pdescription, price, pimage_url, pstock, pcategory_id, pcreated_at, pupdated_at) 
            VALUES ('$pname', '$pdescription', '$price', '$pimage_url', 0, 1, NOW(), NOW())";

    if ($db->query($sql) === TRUE) {
        echo "<script>alert('Új termék sikeresen hozzáadva!');</script>";
    } else {
        echo "<script>alert('Hiba: " . $sql . " - " . $db->error . "');</script>";
    }
}

?>


    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .tabs {
            display: flex;
            cursor: pointer;
            margin-bottom: 20px;
        }
        .tab {
            padding: 10px 20px;
            border: 1px solid #ccc;
            border-bottom: none;
            background-color: #f1f1f1;
            margin-right: 5px;
        }
        .tab.active {
            background-color: #fff;
            font-weight: bold;
        }
        .content {
            border: 1px solid #ccc;
            padding: 20px;
            backdrop-filter: blur(5px);
            color: white;
        }
        .content.hidden {
            display: none;
        }

        #pdescription {
            resize: none;
        }
    </style>
    <div class="tabs">
        <div class="tab active" data-tab="form" onclick="switchTab('form')">Termékfeltöltés</div>
        <div class="tab" data-tab="products" onclick="switchTab('products')">Termékek</div>
    </div>

    <div id="form" class="content">
        <h1>Termékfeltöltés</h1>
        <form method="POST" action="">
            <label for="pname">Termék neve:</label><br>
            <input type="text" id="pname" name="pname" required><br><br>

            <label for="pdescription">Leírás:</label><br>
            <textarea id="pdescription" name="pdescription" required ></textarea><br><br>

            <label for="price">Ár (Ft):</label><br>
            <input type="number" id="price" name="price" step="0.01" required><br><br>

            <label for="pimage_url">Kép URL:</label><br>
            <input type="text" id="pimage_url" name="pimage_url" required><br><br>

            <button type="submit">Feltöltés</button>
        </form>
    </div>

    <div id="products" class="content hidden">
        <h2>Termékek</h2>
        <ul>
            <?php
            // Termékek listázása
            $sql = "SELECT pname, price, pimage_url FROM products";
            $result = $db->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<li>";
                    echo "<img src='" . $row['pimage_url'] . "' alt='" . $row['pname'] . "' style='width:50px; height:50px;'> ";
                    echo $row['pname'] . " - " . $row['price'] . " Ft";
                    echo "</li>";
                }
            } else {
                echo "<li>Nincsenek termékek.</li>";
            }
            ?>
        </ul>
    </div>

    <script>
        function switchTab(tabId) {
            document.querySelectorAll('.tab').forEach(tab => tab.classList.remove('active'));
            document.querySelectorAll('.content').forEach(content => content.classList.add('hidden'));
            document.getElementById(tabId).classList.remove('hidden');
            document.querySelector(`[data-tab="${tabId}"]`).classList.add('active');
        }
    </script>