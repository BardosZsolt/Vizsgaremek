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
            width: 100%; /* Teljes szélesség */
            height: 100vh; /* Kezdeti magasság */
            text-align: center;
            color: white;
            background: url('images/aboutuss.jpg') no-repeat center top / cover; /* Fontos a `cover` használata */
            font-size: calc(4vw + 1em);
            z-index: 999;
            animation: sticky-parallax-header-move-and-size linear forwards;
            animation-timeline: scroll();
            animation-range: 0vh 90vh;
        }

        body {
            padding-top: 100vh; /* A fejléc magasságának megfelelő tartalom-eltolás */
            font-family: Arial, sans-serif;
            margin: 0;
        }

        .content {
            padding: 40px;
        }

        .content h1 {
            font-size: 2.5em;
            color: black;
        }

        .content p {
            font-size: 1.2em;
            line-height: 1.6;
            color: black;
        }

        .h2 {
          font-size: 1.2em;
        }

        /* Betűtípus */
        
        
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
    </div>
</body>
</html>
