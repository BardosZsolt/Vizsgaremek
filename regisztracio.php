<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="regisztracio.css">
    <title>Registration</title>
</head>
<style>
    body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background: url('images/fashionhub_bg.png') no-repeat center center fixed;
        background-size: cover;
        color: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .container {
        background-color: rgba(31, 31, 31, 0.9);
        padding: 20px 30px;
        border-radius: 10px;
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
        width: 100%;
        max-width: 400px;
        text-align: center;
    }

    h2 {
        margin-bottom: 20px;
        font-size: 24px;
        color: #ffffff;
    }

    form label {
        display: block;
        text-align: left;
        margin-bottom: 8px;
        font-size: 14px;
        color: #f5f5f5;
    }

    form input {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: none;
        border-radius: 5px;
        background-color: #2c2c2c;
        color: #fff;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    form input:focus {
        outline: none;
        background-color: #383838;
        box-shadow: 0 0 5px #e91e63;
    }

    button {
        width: 100%;
        padding: 10px;
        background-color: white;
        color: black;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
    }

    button:hover {
        background-color: white;
        transform: translateY(-3px);
        box-shadow: 0 5px 10px rgba(233, 30, 99, 0.5);
    }

    button:active {
        transform: translateY(0);
        box-shadow: none;
    }

    p {
        margin-top: 15px;
        font-size: 14px;
        color: white;
    }

    p a {
        color: white;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    p a:hover {
        color: white;
    }

    .back-button {
        display: inline-block;
        margin-top: 15px;
        padding: 10px 20px;
        background-color: white;
        color: black;
        text-decoration: none;
        border-radius: 5px;
        font-size: 16px;
        font-weight: bold;
        transition: background-color 0.3s ease, transform 0.2s ease;
        text-align: center;
    }

    .back-button:hover {
        background-color: white;
        transform: translateY(-3px);
        box-shadow: 0 5px 10px rgba(233, 30, 99, 0.5);
    }

    .back-button:active {
        transform: translateY(0);
        box-shadow: none;
    }
</style>
<body>

    <div class="container">
        <h2>Registration</h2>
        <form action="reg_ir.php" method="POST">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <label for="retype_password">Confirm password</label>
            <input type="password" id="retype_password" name="retype_password" required>

            <button type="submit">Registration</button>
        </form>
        <p>Already have an account? <a href="bejelentkezes.php">Log in here</a>.</p>
        <a href="index.php" class="back-button">Back to main page</a>
    </div>

</body>

</html>
