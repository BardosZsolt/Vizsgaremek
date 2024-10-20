<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="regisztracio.css">
    <title>Regisztráció</title>
</head>

<body>

    <div class="container">
        <h2>Regisztráció</h2>
        <form action="reg_ir.php" method="POST">
            <label for="username">Felhasználónév</label>
            <input type="text" id="username" name="username">

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Jelszó</label>
            <input type="password" id="password" class="eye" name="password" required>

            <label for="retype_password">Jelszó megerősítése</label>
            <input type="password" id="retype_password" class="eye" name="retype_password" required>

            <button type="submit">Regisztráció</button>
        </form>
        <p>Van már fiókod? <a href="bejelentkezes.php">Jelentkezz be itt</a>.</p>

        
        <a href="index.php">
            <button class="back-home" type="button">Vissza a főoldalra</button>
        </a>
    </div>

</body>

</html>
