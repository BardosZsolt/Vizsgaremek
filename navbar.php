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
        <li><a href="./?p=galery">GALLERY</a></li>
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
                <a href="regisztracio.php">Regisztráció</a>
                <?php
                if (!isset($_SESSION["uid"])) {
                    echo '<a href="bejelentkezes.php">Bejelentkezés</a>';
                } else {
                    echo '<a href="kijelentkezes.php">Kijelentkezés</a>';
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
