<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Termék hozzáadása a kosárhoz
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    if (isset($input['action'])) {
        if ($input['action'] === 'addToCart') {
            $productName = $input['name'] ?? '';
            $productPrice = $input['price'] ?? 0;
            $productSize = $input['size'] ?? '';
            $quantity = $input['quantity'] ?? 1;

            if ($productName && $productPrice > 0 && $productSize) {
                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = [];
                }

                $_SESSION['cart'][] = [
                    "name" => $productName,
                    "price" => $productPrice,
                    "size" => $productSize,
                    "quantity" => $quantity
                ];

                // Kosár tartalom számának frissítése és visszaküldése JSON-ban
                $count = count($_SESSION['cart']);
                echo json_encode(["status" => "success", "message" => "Termék hozzáadva a kosárhoz.", "cartCount" => $count]);
            
            } else {
                echo json_encode(["status" => "error", "message" => "Hibás termékadatok."]);
            }
            exit;
        }

        // Kosár törlése
        if ($input['action'] === 'clearCart') {
            if (isset($_SESSION['cart'])) {
                unset($_SESSION['cart']); // Kosár tartalmának törlése
            }
            echo json_encode(["status" => "success", "message" => "A kosár sikeresen törölve lett.", "cartCount" => 0]);
            exit;
        }

        // Egy tétel törlése a kosárból
        if ($input['action'] === 'removeItem') {
            $index = $input['index'] ?? -1;

            if ($index >= 0 && isset($_SESSION['cart'][$index])) {
                array_splice($_SESSION['cart'], $index, 1); // Tétel eltávolítása

                // Kosár tartalom számának frissítése és visszaküldése JSON-ban
                $count = count($_SESSION['cart']);
                echo json_encode(["status" => "success", "message" => "Tétel eltávolítva a kosárból.", "cartCount" => $count]);
            } else {
                echo json_encode(["status" => "error", "message" => "Érvénytelen tétel index."]);
            }
            exit;
        }
    }
}

// Kosárban lévő tételek száma lekérdezése
if (isset($_GET['action']) && $_GET['action'] === 'getCartCount') {
    $count = count($_SESSION['cart'] ?? []);
    echo json_encode(["count" => $count]);
    exit;
}
?>
