<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Kosárban lévő tételek számának kiszámítása
$cartCount = 0;
if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $item) {
        $cartCount += $item['quantity'];
    }
}
?>

<nav>
    <ul>
        <!-- Logó bal oldalon -->
        <li class="logo">
            <a href="index.php">
                <img src="images/fashionhb.png" alt="Logo" style="height: 25px;"> <!-- A logó képe -->
            </a>
        </li>
        
        <!-- Menüpontok jobb oldalon -->
        <li><a href="index.php">HOME</a></li>
        <li><a href="./?p=about">ABOUT</a></li>
        <li><a href="./?p=shop">SHOP</a></li>
        <li class="user-status">
            <?php
            if (!isset($_SESSION["uid"])) {
                echo '<ion-icon name="person"></ion-icon>';
            } else {
                echo "<p style='width: 5rem; color: red; font-size: 1rem;'>".$_SESSION["unick"]."</p>";
            }
            
            ?>
            <div class="submenu">
                <a href="regisztracio.php">Sign up</a>
                <?php
                if (!isset($_SESSION["uid"])) {
                    echo '<a href="bejelentkezes.php">Sign in</a>';
                } else {
                    echo '<a href="kijelentkezes.php">Log out</a>';
                }
                if(isset($_SESSION["role"])){
                if($_SESSION["role"] == "admin"){
                    echo '<a href="./?p=admin">Admin panel</a>';
                }
                else {
                    echo "";
                }
            }
                ?>
            </div>
        </li>
        <li class="cart-icon">
            <a href="cart.php">
                <ion-icon name="cart-sharp"></ion-icon>
                <span id="cart-count" class="cart-count"><?php echo $cartCount; ?></span>
            </a>
<!--             <div class="submenu">
                <a href="#" onclick="clearCart()">Kosár törlése</a>
            </div> -->
        </li>
    </ul>
</nav>

<script>
// Kosár számának frissítése
function updateCartCount() {
    fetch("cart_action.php?action=getCartCount")
        .then(response => response.json())
        .then(data => {
            const cartCountElement = document.getElementById("cart-count");
            cartCountElement.innerText = data.count || 0;
        })
        .catch(error => console.error("Error updating cart count:", error));
}

// Kosár tartalmának törlése
function clearCart() {
    fetch("cart_action.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            action: "clearCart"
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === "success") {
            alert(data.message);
            updateCartCount(); // Frissítjük a kosár számát
        } else {
            console.error("Error clearing cart:", data.message);
        }
    })
    .catch(error => console.error("Error clearing cart:", error));
}

// Automatikus frissítéshez hívjuk meg az updateCartCount függvényt
updateCartCount();


// Késleltetés az almenü elrejtéséhez
let submenuTimeout;

document.querySelector(".user-status").addEventListener("mouseenter", () => {
    clearTimeout(submenuTimeout); // Töröljük az előző időzítőt
    document.querySelector(".submenu").style.display = "block"; // Menü megjelenítése
});

document.querySelector(".user-status").addEventListener("mouseleave", () => {
    submenuTimeout = setTimeout(() => {
        document.querySelector(".submenu").style.display = "none"; // Menü elrejtése
    }, 300); // 300ms késleltetés
});
</script>

<style>
 /* A navigációs sáv stílusa */
nav {
    background-color: black; /* Fekete háttér */
    color: white; /* Fehér szöveg */
    padding: 10px 0;
    width: 100%; /* Teljes szélesség */
    position: fixed; /* Rögzített navigáció */
    top: 0; /* A tetején kezdődjön */
    left: 0; /* Bal oldalon kezdődjön */
    z-index: 1000; /* Előrébb hozza a navigációs sávot */
}

/* A navigációs sáv belső elemeinek elrendezése */
nav ul {
    display: flex;
    justify-content: space-between; /* Bal oldalon a logó, jobb oldalon a menüpontok */
    align-items: center; /* Vertikális középre igazítás */
    list-style-type: none; /* Listajelölők eltávolítása */
    margin: 0;
    padding: 0;
}

nav li {
    padding: 0 15px; /* Különböző elemek közötti távolság */
}

/* A logó elhelyezése bal oldalon */
nav .logo {
    flex: 1; /* Logó elfoglalja az elérhető helyet */
    text-align: left; /* A logót balra igazítjuk */
}

nav a {
    color: white; /* Fehér színű linkek */
    text-decoration: none; /* Link aláhúzásának eltüntetése */
    font-size: 1.2rem; /* Betűméret növelése */
    padding: 10px;
}

/* Eltávolítjuk a hover effektust */
nav a:hover {
    background-color: transparent; /* Semmilyen háttérszín nem változik */
    border-radius: 0; /* Nincs lekerekítés */
}

/* Kosár ikon színezése */
.cart-icon ion-icon {
    color: white; /* Fehér színű kosár ikon */
}

/* Kosár számának megjelenítése */
.cart-count {
    background-color: red; /* Piros háttér a kosár számához */
    color: white; /* Fehér színű szám */
    border-radius: 50%;
    position: absolute;
    top: 8px;
    right: 27px;
    max-width: 20px;
    max-height: 20px;
    min-width: 15px;
    display: grid;
    place-items: center;
}

/* Felhasználói státusz színe */
.user-status p {
    color: white; /* Fehér színű felhasználónév */
    font-size: 1rem;
}

/* Submenü stílus */
.submenu {
    display: none; /* Elrejtett állapot */
    background-color: black;
    position: absolute;
    top: 40px;
    right: 0;
    padding: 10px;
    border-radius: 5px;
    z-index: 100; /* Menü a navigációs sáv felett */
}

nav li:hover .submenu {
    display: block; /* Megjelenítjük a menüt hover hatásra */
}

.submenu a {
    color: white;
    padding: 5px 10px;
}

.submenu a:hover {
    background-color: #333;
}


</style>