<div class="container fade-in" id="login-form">
        <h2>Bejelentkezés</h2>
        <form action="login_ir.php" method="POST" target="kisablak">
            <input name="unick"  type="text" placeholder="Felhasználónév" required>
            <input name="upw" type="password" placeholder="Jelszó" required>
            <button type="submit">Bejelentkezés</button>
        </form>
        <div class="toggle">
            <p>Nincs még fiókod? <a href="#" onclick="location.href='./?p=regisztracio'">Regisztráció</a></p>
        </div>
    </div>