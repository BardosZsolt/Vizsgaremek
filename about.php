<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <style>
        @keyframes sticky-parallax-header-move-and-size {
            from {
                background-position: center top;
                background-size: cover;
                height: 100vh;
                font-size: calc(4vw + 1em);
            }
            to {
                background-position: center bottom;
                background-size: cover;
                height: 10vh;
                font-size: 2em;
            }
        }

        #sticky-parallax-header {
            position: fixed;
            top: 50px;
            left: 0;
            width: 100%;
            height: 100vh;
            text-align: center;
            color: white;
            background: url('images/about_bg.jpg') no-repeat center top / cover;
            font-size: calc(4vw + 1em);
            z-index: 999;
            animation: sticky-parallax-header-move-and-size linear forwards;
            animation-timeline: scroll();
            animation-range: 0vh 90vh;
        }

        body {
            padding-top: 100vh;
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #222;
        }

        .content {
            padding: 40px;
            color: white;
        }

        .content h1 {
            font-size: 2.5em;
        }

        .content p {
            font-size: 1.2em;
            line-height: 1.6;
        }

        .map {
            margin: 40px 0;
            text-align: center;
        }

        .map iframe {
            width: 100%;
            max-width: 800px;
            height: 400px;
            border: 0;
        }

        .contact-form {
            margin: 40px 0;
            padding: 20px;
            background-color: #333;
            border-radius: 8px;
            color: white;
        }

        .contact-form h2 {
            margin-bottom: 20px;
        }

        .contact-form label {
            display: block;
            margin-bottom: 10px;
            font-size: 1.1em;
        }

        .contact-form textarea {
            width: 100%;
            height: 100px;
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #555;
            border-radius: 4px;
            background-color: #444;
            color: white;
            font-size: 1em;
        }

        .contact-form input[type="checkbox"] {
            margin-right: 10px;
        }

        .contact-form button {
            padding: 10px 20px;
            background-color: #555;
            border: none;
            border-radius: 4px;
            color: white;
            font-size: 1em;
            cursor: pointer;
        }

        .contact-form button:hover {
            background-color: #777;
        }

        .comments-section {
            margin: 40px 0;
            padding: 20px;
            background-color: #333;
            border-radius: 8px;
            color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .comments-section h2 {
            margin-bottom: 20px;
            font-size: 1.8em;
            text-align: center;
        }

        .comments-section ul {
            list-style: none;
            padding: 0;
            margin: 0;
            max-height: 400px;
            overflow-y: auto;
            border-top: 1px solid #555;
        }

        .comments-section li {
            display: flex;
            flex-direction: column;
            background-color: #444;
            border-radius: 8px;
            padding: 15px;
            margin: 10px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        .comments-section li:nth-child(even) {
            background-color: #555;
        }

        .comments-section p {
            margin: 5px 0;
        }

        .comments-section p strong.user {
            color: #32cd32; /* Zöld szín a felhasználó neve számára */
        }

        .comments-section p strong.admin {
            color: #ffcc00; /* Sárga szín az admin neve számára */
        }

        .comments-section p.admin-reply {
            margin-top: 10px;
            color: #ffcc00; /* Sárga szín az admin válaszokhoz */
        }

        .comments-section small {
            text-align: right;
            font-size: 0.8em;
            color: #aaa;
        }
    </style>
</head>
<body>
    <header id="sticky-parallax-header">
        <h2 class="highlighted-text-shadow">About us</h2>
    </header>
    <div class="content">
        <h1>Welcome to Our Company</h1>
        <p>
            Our company is committed to providing top-notch services and products to our customers. 
            With a dedicated team of professionals, we aim to exceed expectations and deliver value in everything we do.
        </p>
        <p>
            Established in [Year], we have grown to become a trusted name in the industry. Our mission is to innovate 
            and lead with integrity, fostering long-lasting relationships with our clients and partners.
        </p>
        <p>
            Thank you for choosing us and being a part of our journey.
        </p>
        <br><br>
        
        <h2>Our Location</h2>
        <p>We are located in the heart of Budapest, a city rich in culture and history. Visit us to experience our services firsthand.</p>
        
        <div class="map">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d107130.25166421668!2d18.940996389120308!3d47.49799373317047!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4741dc4d754c62eb%3A0x400c4290c1e8d60!2sBudapest!5e0!3m2!1sen!2shu!4v1619572405215!5m2!1sen!2shu" 
                allowfullscreen="" 
                loading="lazy">
            </iframe>
        </div>

        <?php
        if (isset($_SESSION["unick"])) {
            echo '<div class="contact-form">
        <h2>Contact Us</h2>
        <form action="write_comment.php" method="post">
            <label for="message">Write your message or feedback:</label>
            <textarea id="message" name="message" placeholder="Your message..."></textarea>
            <label>
                <input type="checkbox" id="consent" name="consent">
                I agree to share my feedback with the company.
            </label>
            <input type="text" name="nick" style="display: none;" value="' . $_SESSION["unick"] . '">
            <button type="submit">Submit</button>
        </form>
    </div>
    <div class="comments-section">';
        }
        ?>

        <h2>User Comments</h2>
        <ul>
            <?php
            include "kapcsolat.php";
            $comments_sql = "SELECT message, reply, created_at, nick FROM comments ORDER BY created_at DESC";
            $comments_result = $db->query($comments_sql);

            if ($comments_result->num_rows > 0) {
                while ($comment = $comments_result->fetch_assoc()) {
                    echo "<li>";
                    echo "<p><strong class='user'>" . htmlspecialchars($comment['nick']) . ":</strong> " . htmlspecialchars($comment['message']) . "</p>";
                    if ($comment['reply']) {
                        echo "<p class='admin-reply'><strong class='admin'>Admin (" . htmlspecialchars($comment['nick']) . "):</strong> " . htmlspecialchars($comment['reply']) . "</p>";
                    } else {
                        echo "<p><strong class='admin'>Admin:</strong> Még nincs válasz</p>";
                    }
                    echo "<small><em>" . htmlspecialchars($comment['created_at']) . "</em></small>";
                    echo "</li>";
                }
            } else {
                echo "<p>Még nincsenek kommentek.</p>";
            }
            ?>
        </ul>
    </div>
    </div>
</body>
</html>
