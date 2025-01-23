<?php
include "kapcsolat.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $comment_id = $_POST['comment_id'] ?? null;
    $reply = trim($_POST['reply']) ?? '';

    if ($comment_id && !empty($reply)) {
        $stmt = $db->prepare("UPDATE comments SET reply = ? WHERE id = ?");
        $stmt->bind_param('si', $reply, $comment_id);
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
