<?php
//session_start();

// Ellenőrizzük, hogy a felhasználó be van-e jelentkezve
if (!isset($_SESSION['felhasznalo'])) {
    // Ha nincs bejelentkezve, átirányítjuk a bejelentkező oldalra
    //header("Location: login_form.php");
    //exit();
}
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Felhasználói Üdvözlés</title>
    <style>
        /* Alapbeállítások */
        * {
            box-sizing: border-box;
        }

        /* Színek és alapelemek */
        $primary: hsl(260, 100%, 80%);
        html, body {
            height: 100vh;
            width: 100vw;
        }

        body {
            margin: 0;
            display: grid;
            place-items: center;
            background-color: #222;
            font-family: system-ui, sans-serif;
        }

        /* Üdvözlő szöveg bal felső sarokban */
        .udvozlo {
            position: absolute;
            top: 20px;
            left: 20px;
            font-size: 24px;
            color: white;
            font-weight: bold;
        }

        .udvozlo span {
            font-size: 28px;
            color: #4CAF50;
            font-family: 'Trebuchet MS', sans-serif;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
            padding: 5px 10px;
            border-radius: 5px;
            background-color: #e8f5e9;
        }

        /* Kilépés gomb jobb felső sarokban */
        .logout-button {
            position: absolute;
            top: 20px;
            right: 20px;
            padding: 8px 15px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            background-color: #f44336;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .logout-button:hover {
            background-color: #d32f2f;
        }

        /* Menü beállításai középre igazítva */
        nav, .nav-item {
            display: flex;
        }

        nav {
            border-radius: 6px;
            background-image: linear-gradient(
                rgb(48, 48, 48) 13%,
                rgb(30, 30, 30) 40%,
                #0c0d11 86%
            );
            color: rgba(255, 255, 255, 0.6);
            text-shadow: 0 -2px 0 black;
            cursor: pointer;
            box-shadow: 1px 2px 4px rgb(20, 20, 20), 0 4px 12px rgb(10, 10, 10);
        }

        .nav-item {
            flex-direction: row-reverse;
            font-size: 0.8999rem;
            line-height: 1rem;
            align-items: center;
            min-width: 120px;
            justify-content: space-between;
            transition: all 80ms ease;
        }

        .nav-item.active {
            color: $primary;
            text-shadow: 0 0 3px hsla(260, 100%, 70%, 0.7);
        }

        .nav-item:not(.active):hover {
            color: rgba(255, 255, 255, 0.87);
        }

        .nav-item:hover > .icon .subicon {
            height: 32px;
            width: 32px;
            border-radius: 32px;
            top: -16px;
            right: -16px;
            border-color: white;
        }

        .nav-item:not(:first-of-type) {
            border-left: 1px solid rgb(60, 60, 60);
        }

        .nav-item:not(:last-of-type) {
            border-right: 0.1rem solid black;
        }

        .nav-item a {
            color: inherit;
            text-decoration: none;
            padding: 1ch;
        }

        .icon {
            padding: 1ch;
            position: relative;
        }

        .subicon {
            text-shadow: none;
            transition: all 40ms ease;
            position: absolute;
            top: -3px;
            right: -3px;
            background: red;
            color: white;
            box-shadow: 0 0 4px rgba(41, 41, 41, 0.405);
            width: 18px;
            height: 18px;
            border-radius: 14px;
            font-size: 0.7em;
            font-weight: 700;
            display: inline-grid;
            place-items: center;
            border: 2px solid white;
        }

        .icon > svg {
            max-width: 16px;
        }
    </style>
</head>
<body>

<div class="header">
    <!-- Menü beillesztése középre -->
    <nav class="menu" id="nav">
        <span class="nav-item active">
            <span class="icon">
                <i data-feather="home"></i>
            </span>
            <a href="#">Home</a>
        </span>
        <span class="nav-item">
            <span class="icon">
                <i data-feather="search"></i>
            </span>
            <a href="#">Search</a>
        </span>
        <span class="nav-item">
            <span class="icon">
                <span class="subicon">13</span>
                <i data-feather="bell"></i>
            </span>
            <a href="#">Notifications</a>
        </span>
        <span class="nav-item">
            <span class="icon">
                <i data-feather="star"></i>
            </span>
            <a href="#">Favorites</a>
        </span>
        <span class="nav-item">
            <span class="icon">
                <span class="subicon">1</span>
                <i data-feather="bell"></i>
            </span>
            <a href="#">Your Profile</a>
        </span>
    </nav>

    <!-- Kilépés gomb jobbra -->
    <input type="button" value="Kilépés" class="logout-button" onclick="window.location.href='logout.php';">
</div>

<div class="udvozlo">
    <?php
    // Üdvözlő szöveg a felhasználónak
    echo "Üdvözöljük, " . htmlspecialchars($_SESSION['unick']) . "!";
    ?>
</div>

<!-- Feather ikonok inicializálása -->
<script src="https://unpkg.com/feather-icons"></script>
<script>
    feather.replace(); // Feather ikonok cseréje
</script>

</body>
</html>
