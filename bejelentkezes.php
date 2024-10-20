<!DOCTYPE html>

<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bejelentkezes.css">
    <title>Bejelentkezés</title>
</head>

<body>

    <div class="container">
        <h2>Bejelentkezés</h2>
        <form action="bejelentkezes_ir.php" method="POST">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Jelszó</label>
            <input type="password" id="password" class="eye" name="password" required>

            <button type="submit">Bejelentkezés</button>
        </form>
        <p>Nincs még fiókod? <a href="./?p=regisztracio">Regisztrálj itt</a>.</p>

       
        <a href="index.php">
            <button class="back-home" type="button">Vissza a főoldalra</button>
        </a>
    </div>

</body>

</html>
