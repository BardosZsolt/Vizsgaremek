<?php

session_start();

if ($_POST["username"] !== $_SESSION["unick"] || 
    $_POST["email"] !== $_SESSION["uemail"] || 
    $_POST["password"] !== $_SESSION["upw"]) {

    if (empty($_POST["username"])) {
        echo "<script>alert('Hiányzik a felhasználónév!'); window.location.href = 'profil.php';</script>";
        exit;
    }

    if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('Nem megfelelő email cím!'); window.location.href = 'profil.php';</script>";
        exit;
    }

    if (strlen($_POST["password"]) < 8) {
        echo "<script>alert('Legalább 8 karakter kell hogy legyen a jelszó!'); window.location.href = 'profil.php';</script>";
        exit;
    }

    if (!preg_match("/[a-z]/i", $_POST["password"])) {
        echo "<script>alert('Legalább egy betűt tartalmaznia kell a jelszónak!'); window.location.href = 'profil.php';</script>";
        exit;
    }
    
    if (!preg_match("/[0-9]/i", $_POST["password"])) {
        echo "<script>alert('Legalább egy számot tartalmaznia kell a jelszónak!'); window.location.href = 'profil.php';</script>";
        exit;
    }

    $upw = md5($_POST["password"]);

    include("kapcsolat.php");

    $query = "UPDATE user SET unick = '$_POST[username]', uemail = '$_POST[email]', upw = '$upw' WHERE uid = '$_SESSION[uid]'";

    if (mysqli_query($db, $query)) {
        $_SESSION["unick"] = $_POST["username"];
        $_SESSION["uemail"] = $_POST["email"];
        $_SESSION["upw"] = $_POST["password"];
        echo "<script>alert('Profil frissítve!'); window.location.href = 'profil.php';</script>";
    } else {
        echo "<script>alert('Hiba történt a frissítés során!'); window.location.href = 'profil.php';</script>";
    }

    mysqli_close($db);
}
else {
    echo "<script>alert('Nem történt változás az adatokban.'); window.location.href = 'profil.php';</script>";
}

?>