<?php
session_start();
include "kapcsolat.php";
if(isset($_SESSION["uid"])){
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $message = $_POST['message'];
    
        if ($message) {
            $stmt = $db->prepare("INSERT INTO `comments` (`id`, `message`, `consent`, `reply`, `created_at`, `nick`) VALUES (NULL, ?, 1, NULL, current_timestamp(), ?);");
            $stmt->bind_param('ss', $message, $_POST["nick"]);
            if ($stmt->execute()) {
                echo "<script>window.location.href = './?p=about';</script>";
            } else {
                echo "<script>window.history.back();</script>";
            }
        } else {
            echo "<script>window.history.back();</script>";
        }
    }
}else{
    echo "<script>window.location.href = 'bejelentkezes.php';</script>";
}





?>