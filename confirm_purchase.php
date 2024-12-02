<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vásárlás megerősítése</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5; /* Világos háttér */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .confirmation {
            max-width: 600px;
            width: 90%;
            background-color: #ffffff; /* Fehér doboz */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Árnyék */
            text-align: center;
            border: 2px solid #000; /* Fekete keret */
        }

        .confirmation h1 {
            color: #1e88e5; /* Kék cím */
            margin-bottom: 20px;
        }

        .confirmation p {
            font-size: 1.1em;
            margin-bottom: 20px;
            color: #37474f; /* Sötétszürke szöveg */
        }

        .confirmation h2 {
            color: #fbc02d; /* Arany cím */
            margin-bottom: 10px;
        }

        .confirmation ul {
            list-style: none;
            padding: 0;
            text-align: left;
        }

        .confirmation ul li {
            margin-bottom: 10px;
            font-size: 1.1em;
            color: #455a64; /* Sötétebb szürke */
        }

        .confirmation ul li strong {
            color: #000; /* Fekete kiemelés */
        }

        .confirmation button {
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 1.1em;
            color: #ffffff;
            background-color: #1e88e5; /* Kék gomb */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        .confirmation button:hover {
            background-color: #1565c0; /* Sötétebb kék hover */
            transform: scale(1.05); /* Enyhe nagyítás */
        }

        .confirmation button:active {
            background-color: #0d47a1; /* Még sötétebb kék */
        }
    </style>
</head>
<body>
    <?php
    session_start();  // A session indítása

    // Kosár ürítése vásárlás után
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Kosár kiürítése
        unset($_SESSION['cart']); // Töröljük a kosár adatokat a session-ból

        $name = htmlspecialchars($_POST['name']);       // Név
        $email = htmlspecialchars($_POST['email']);     // E-mail cím
        $zipcode = htmlspecialchars($_POST['zipcode']); // Irányítószám
        $city = htmlspecialchars($_POST['city']);       // Város
        $address = htmlspecialchars($_POST['address']); // Cím
        $payment = htmlspecialchars($_POST['payment']); // Fizetési mód

        echo "<div class='confirmation'>";
        echo "<h1>Vásárlás megerősítve!</h1>";
        echo "<p>Köszönjük, hogy nálunk vásároltál.</p>";
        echo "<h2>Adatok:</h2>";
        echo "<ul>";
        echo "<li><strong>Név:</strong> $name</li>";
        echo "<li><strong>E-mail:</strong> $email</li>";
        echo "<li><strong>Irányítószám:</strong> $zipcode</li>";
        echo "<li><strong>Város:</strong> $city</li>";
        echo "<li><strong>Cím:</strong> $address</li>";
        echo "<li><strong>Fizetési mód:</strong> $payment</li>";
        echo "</ul>";
        echo "<button onclick=\"window.location.href='./?p=shop'\">Vissza a boltba</button>";
        echo "</div>";
    } else {
        echo "<div class='confirmation'>";
        echo "<h1>Hiba történt!</h1>";
        echo "<p>Az oldal csak POST metódussal érhető el.</p>";
        echo "</div>";
    }
    ?>
</body>
</html>
