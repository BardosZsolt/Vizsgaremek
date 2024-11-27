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

                echo json_encode(["status" => "success", "message" => "Termék hozzáadva a kosárhoz."]);
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
            echo json_encode(["status" => "success", "message" => "A kosár sikeresen törölve lett."]);
            exit;
        }
    }
}

// Kosárban lévő tételek száma
if (isset($_GET['action']) && $_GET['action'] === 'getCartCount') {
    $count = 0;
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $item) {
            $count += $item['quantity'];
        }
    }
    echo json_encode(["count" => $count]);
    exit;
}

// Egy tétel törlése a kosárból
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    if (isset($input['action']) && $input['action'] === 'removeItem') {
        $index = $input['index'] ?? -1;

        if ($index >= 0 && isset($_SESSION['cart'][$index])) {
            array_splice($_SESSION['cart'], $index, 1); // Tétel eltávolítása
            echo json_encode(["status" => "success", "message" => "Tétel eltávolítva a kosárból."]);
        } else {
            echo json_encode(["status" => "error", "message" => "Érvénytelen tétel index."]);
        }
        exit;
    }
}

?>
