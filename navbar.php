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
                ?>
            </div>
        </li>
        <!-- Kosár ikon -->
        <li class="cart-icon">
            <a href="cart.php">
                <ion-icon name="cart-sharp"></ion-icon>
                <span id="cart-count" class="cart-count"><?php echo $cartCount; ?></span>
            </a>
            <div class="submenu">
                <a href="#" onclick="clearCart()">Kosár törlése</a>
            </div>
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
</script>

<style>
    /* A navigációs sáv stílusa */
nav {
    background-color: black; /* Fekete háttér */
    color: white; /* Fehér szöveg */
    padding: 10px 0;
}

nav ul {
    display: flex;
    justify-content: space-around; /* Az elemek közötti térköz */
    list-style-type: none; /* Listajelölők eltávolítása */
    margin: 0;
    padding: 0;
}

nav li {
    padding: 0 15px; /* Különböző elemek közötti távolság */
}

nav a {
    color: white; /* Fehér színű linkek */
    text-decoration: none; /* Link aláhúzásának eltüntetése */
    font-size: 1.2rem; /* Betűméret növelése */
    padding: 10px;
}

nav a:hover {
    background-color: #333; /* Sötétebb háttér a linkek hover állapotában */
    border-radius: 5px; /* Lekerekített sarkok */
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
    padding: 5px 10px;
    position: absolute;
    top: -5px;
    right: -10px;
}

/* Felhasználói státusz színe */
.user-status p {
    color: white; /* Fehér színű felhasználónév */
    font-size: 1rem;
}

/* Submenü stílus */
.submenu {
    display: none; /* Alapértelmezetten elrejtjük a legördülő menüt */
    background-color: black;
    position: absolute;
    top: 40px;
    right: 0;
    padding: 10px;
    border-radius: 5px;
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