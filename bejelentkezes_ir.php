<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"]) || empty($_POST["password"])) {
        echo "<script>alert('Minden mezőt ki kell tölteni!'); window.location.href = 'bejelentkezes.php';</script>";
        exit;
    }

    $email = $_POST["email"];
    $password = $_POST["password"];

    include("kapcsolat.php");

    if (!$db) {
        echo "<script>alert('Nem sikerült csatlakozni az adatbázishoz!'); window.location.href = 'bejelentkezes.php';</script>";
        exit;
    }

    // Jelszó hash-elve
    $hashed_password = md5($password);

    // Az admin jogosultságot is figyelembe kell venni
    $userek = "SELECT * FROM user WHERE uemail = '$email' AND upw = '$hashed_password' LIMIT 1";
    $result = mysqli_query($db, $userek);

    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);

        // Beállítjuk a session-t
        $_SESSION["uid"] = $user["uid"];
        $_SESSION["unick"] = $user["unick"];
        $_SESSION["uemail"] = $user["uemail"];
        $_SESSION["role"] = $user["role"];  // Ezt hozzáadjuk a szerepkör tárolásához

        // Admin jogosultság ellenőrzése
        if ($user["role"] === "admin") { 
            echo "<script>alert('Sikeres bejelentkezés adminisztrátorként!'); window.location.href = 'index.php';</script>";
        } else {
            echo "<script>alert('Sikeres bejelentkezés!'); window.location.href = 'index.php';</script>";
        }
    } else {
        echo "<script>alert('Helytelen email cím vagy jelszó!'); window.location.href = 'bejelentkezes.php';</script>";
    }

    mysqli_close($db);
}
?>
