<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["unick"]) || empty($_POST["upw"])) {
        echo "<script>alert('Minden mezőt ki kell tölteni!'); window.location.href = 'localhost/bzsolti/';</script>";
        exit;
    }

    $unick = $_POST["unick"];
    $upw = $_POST["upw"];

    include("kapcsolat.php");

    if (!$adb) {
        echo "<script>alert('Nem sikerült csatlakozni az adatbázishoz!'); window.location.href = 'localhost/bzsolti/';</script>";
        exit;
    }

    $hashed_password = md5($upw);

    $userek = "SELECT * FROM user WHERE unick = '$unick' AND upw = '$hashed_password' LIMIT 1";
    $result = mysqli_query($adb, $userek);

    if (mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION["uid"] = $user["uid"];
        $_SESSION["unick"] = $user["unick"];
        $_SESSION["upw"] = $hashed_password;
        $_SESSION["uemail"] = $user["uemail"];
        $_SESSION["udate"] = $user["udate"];
        echo "<script>alert('Sikeres bejelentkezés!'); parent.location.href = './';</script>";
    } else {
        echo "<script>alert('Helytelen email cím vagy jelszó!'); </script>";
    }

    mysqli_close($adb);
}
?>