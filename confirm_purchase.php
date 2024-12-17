<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vásárlás visszaigazolás</title>
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
    session_start();  // Session indítása

    // Kosár ürítése vásárlás után
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        // Kosár kiürítése
        unset($_SESSION['cart']);

        // Űrlap adatok begyűjtése
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $zipcode = htmlspecialchars($_POST['zipcode']);
        $city = htmlspecialchars($_POST['city']);
        $address = htmlspecialchars($_POST['address']);
        $payment = htmlspecialchars($_POST['payment']);

        echo "<div class='confirmation'>";
        echo "<div class='icon'>&#10004;</div>"; // Pipa ikon
        echo "<h1>Köszönjük a vásárlást!</h1>";
        echo "<p>A rendelésed adatait sikeresen rögzítettük.</p>";

        echo "<ul>";
        echo "<li><strong>Név:</strong> $name</li>";
        echo "<li><strong>E-mail:</strong> $email</li>";
        echo "<li><strong>Irányítószám:</strong> $zipcode</li>";
        echo "<li><strong>Város:</strong> $city</li>";
        echo "<li><strong>Cím:</strong> $address</li>";
        echo "<li><strong>Fizetési mód:</strong> " . ($payment == 'card' ? 'Bankkártya' : 'Készpénz') . "</li>";
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
