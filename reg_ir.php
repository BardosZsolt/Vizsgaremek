<?php
session_start();

if ($_POST['unick'] == "") {
    die("<script>alert('Nem adtad meg a felhasználóneved!');</script>");
}

include("kapcsolat.php");

if($_POST['unick']=="") die("<script> alert('Nick név?') </script>") ;

// Jelszó titkosítása
$upw = md5($_POST['upw1']);

// Ellenőrizd az adatbázis kapcsolatot
if (!$adb) {
    die("Kapcsolat hiba: " . mysqli_connect_error());
}

// Adatok beszúrása az adatbázisba
$stmt = $adb->prepare("
    INSERT INTO user (uid, uemail, unick, upw, ubirth, udate, uip, usession, ustatus, ucomment) 
    VALUES (NULL, ?, ?, ?, '?', NOW(), '', '', '', '')
");

if ($stmt === false) {
    die("Hiba az előkészített lekérdezés során: " . $adb->error);
}

$stmt->bind_param("sss", $_POST['uemail'], $_POST['unick'], $upw);

if ($stmt->execute()) {
    // Sikeres regisztráció
    echo "<script>alert('Sikeres regisztráció!');</script>";

    // Adatok írása egy fájlba
    $fajl = 'felhasznalok.txt';
    $adatok = "Email: {$_POST['uemail']}, Felhasználónév: {$_POST['unick']}, Jelszó: {$_POST['upw1']}\n";
    file_put_contents($fajl, $adatok, FILE_APPEND);

} else {
    die("Hiba az adatbázisba írás során: " . $stmt->error);
}

// Kapcsolat bezárása
mysqli_close($adb);
?>