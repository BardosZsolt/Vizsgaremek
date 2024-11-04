<?php

if (empty($_POST["username"])) {
    echo "<script>alert('Hiányzik a felhasználónév!'); window.location.href = 'regisztracio.php';</script>";
    exit;
}

if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('Nem megfelelő email cím!'); window.location.href = 'regisztracio.php';</script>";
    exit;
}

if (strlen($_POST["password"]) < 8) {
    echo "<script>alert('Legalább 8 karakter kell hogy legyen a jelszó!'); window.location.href = 'regisztracio.php';</script>";
    exit;
}

if (!preg_match("/[a-z]/i", $_POST["password"])) {
    echo "<script>alert('Legalább egy betűt tartalmaznia kell a jelszónak!'); window.location.href = 'regisztracio.php';</script>";
    exit;
}

if (!preg_match("/[0-9]/i", $_POST["password"])) {
    echo "<script>alert('Legalább egy számot tartalmaznia kell a jelszónak!'); window.location.href = 'regisztracio.php';</script>";
    exit;
}

if ($_POST["password"] !== $_POST["retype_password"]) {
    echo "<script>alert('A jelszavaknak egyezniük kell!'); window.location.href = 'regisztracio.php';</script>";
    exit;
}

include("kapcsolat.php");

if (!$db) {
    echo "<script>alert('Nem sikerült csatlakozni az adatbázishoz!'); window.location.href = 'regisztracio.php';</script>";
    exit;
}

$email = $_POST["email"];
$email_query = "SELECT * FROM user WHERE uemail = '$email' LIMIT 1";
$email_result = mysqli_query($db, $email_query);

if (mysqli_num_rows($email_result) > 0) {
    echo "<script>alert('Ez az email cím már használatban van!'); window.location.href = 'regisztracio.php';</script>";
    exit;
}

$upw = md5($_POST["password"]);

$query = "
INSERT INTO user (uid, uemail, unick, upw, ubirth, udate, uip, usession, ustatus, ucomment)
VALUES (NULL, '$_POST[email]', '$_POST[username]', '$upw', '$_POST[dateofbirth]', NOW(), '', '', '', '');
";

if (mysqli_query($db, $query)) {
    echo "<script>alert('Sikeres regisztráció!'); window.location.href = 'bejelentkezes.php';</script>";
} else {
    echo "<script>alert('Hiba történt a regisztráció során!'); window.location.href = 'regisztracio.php';</script>";
}

mysqli_close($db);

?>