<h1>Admin comment edit</h1>


<?php 
include "kapcsolat.php";  // Az adatbázis kapcsolat betöltése
$sql_comments = "SELECT * FROM comments ORDER BY created_at DESC";
$result_comments = $db->query($sql_comments);
?>


<table>
    <tr>
        <th>Üzenet</th>
        <th>Dátum</th>
        <th>Admin Válasz</th>
        <th>Műveletek</th>
    </tr>
    <?php
    if ($result_comments->num_rows > 0) {
        while ($comment = $result_comments->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($comment['message']) . "</td>";
            echo "<td>" . htmlspecialchars($comment['created_at']) . "</td>";
            echo "<td>" . ($comment['reply'] ? htmlspecialchars($comment['reply']) : "Nincs válasz") . "</td>";
            echo "<td>
                    <form method='post' action='reply_to_comment.php'>
                        <textarea name='reply' placeholder='Írj választ...' required>" . htmlspecialchars($comment['reply']) . "</textarea>
                        <input type='hidden' name='comment_id' value='" . $comment['id'] . "'>
                        <button type='submit'>Mentés</button>
                    </form>
                    <a href='delete_comment.php?id=" . $comment['id'] . "'><button>Törlés</button></a>
                </td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='4'>Nincsenek kommentek.</td></tr>";
    }
    ?>
</table>

<style>
        /* Az admin stílusai */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }
        th {
            background-color: #333;
            color: #fff;
            font-weight: bold;
            text-transform: uppercase;
        }
        tr:nth-child(even) {
            background-color: #f7f7f7;
        }
        tr:nth-child(odd) {
            background-color: #fff;
        }
        tr:hover {
            background-color: #eaeaea;
        }
        td img {
            max-width: 80px;
            height: auto;
            border-radius: 4px;
        }
        button {
            padding: 8px 12px;
            border: 1px solid #333;
            border-radius: 4px;
            background-color: #fff;
            color: #333;
            font-size: 14px;
            cursor: pointer;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        button:hover {
            background-color: #333;
            color: #fff;
        }
        a {
            text-decoration: none;
        }
        h2{
            color:white;
        }

        #admin-menu ul{
            display: flex;
            justify-content: space-between;
            list-style-type: none;

        }

        #admin-menu ul li a{
            color: white;
        }
    </style>