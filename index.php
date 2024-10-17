<?php
    session_start();  
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Bejelentkezés és Regisztráció</title>
</head>
<body>
<?php

if( isset( $_GET['p'] ) )  $p = $_GET['p'] ;
else                       $p = ""         ;

if( !isset( $_SESSION['uid']) )
{

    if( $p==""             )  include( "login_form.php"   ) ;  else
if( $p=="regisztracio" )  include( "reg_form.php"     ) ;  else
              include( "404_kulso.php"    ) ;
}
else
{
if( $p==""             )  include( "belsolap.php"     ) ;  else
if( $p=="adatlapom"    )  include( "adatlap_form.php" ) ;  else
              include( "404_belso.php"    ) ;
}

?>


    <div class="container fade-in" id="register-form" style="display:none;">
        <h2>Regisztráció</h2>
        <form action="reg_ir.php" method="POST" target="kisablak">
            <input type="text" name="unick" placeholder="Felhasználónév" required>
            <input type="email" name="uemail" placeholder="Email" required>
            <input type="password" name="upw1" placeholder="Jelszó" required>
            <input type="password" name="upw2" placeholder="Jelszó megerősítése" required>
            
            <button type="submit">Regisztráció</button>
        </form>
        <button class="back-button" onclick="showLogin()">Vissza a bejelentkezéshez</button>
    </div>

    <iframe name="kisablak"></iframe>


    <script>
         function showRegister() {
            document.getElementById("login-form").style.display = "none";
            document.getElementById("register-form").style.display = "block";
        }

        function showLogin() {
            document.getElementById("login-form").style.display = "block";
            document.getElementById("register-form").style.display = "none";
        }
    </script>

</body>
</html>

</body>
</html>