<?php
include "kapcsolat.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $comment_id = $_GET['id'];

    if ($comment_id) {
        $stmt = $db->prepare("DELETE FROM comments WHERE comments.id = ?");
        $stmt->bind_param('i', $comment_id);
        if ($stmt->execute()) {
            echo "<script>window.location.href = './?p=admin';</script>";
        } else {
            echo "<script>window.history.back();</script>";
        }
    } else {
        echo "<script>window.history.back();</script>";
    }
}
?>
