<?php
include "../../kapcsolat.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Form adatok beolvasása
    $pname = trim($_POST['productName']);
    $pdescription = trim($_POST['description']);
    $price = floatval($_POST['price']);
    $pstock = intval($_POST['stock']);
    $pcategory_id = intval($_POST['category']);

    // Fájl ellenőrzése
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_name = basename($_FILES['image']['name']);
        $file_size = $_FILES['image']['size'];
        $file_type = mime_content_type($file_tmp);

        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($file_type, $allowed_types)) {
            print("<script>alert('Csak JPG, PNG vagy GIF fájlok engedélyezettek!');   </script>");
            header("Location: ../../?p=admin-product-upload");
exit();
        }

        if ($file_size > 2 * 1024 * 1024) { // 2MB limit
            print("<script>alert('A fájl mérete túl nagy!');   </script>");
            header("Location: ../../?p=admin-product-upload");
exit();
        }

        // Új fájlnév létrehozása
        $upload_dir = "images/";
        $new_file_name = uniqid() . "_" . $file_name;
        $file_path = $upload_dir . $new_file_name;

        // if (!move_uploaded_file($file_tmp, $file_path)) {
        //     print("<script>alert('Hiba történt a fájl feltöltése közben!');   </script>");
        // }
    } else {
        $file_path = NULL; // Ha nincs kép feltöltve
    }

    // SQL beszúrás előkészített utasítással
    $query = "INSERT INTO products (pname, pdescription, price, pstock, pimage_url, pcategory_id, pcreated_at) 
              VALUES (?, ?, ?, ?, ?, ?, NOW())";

    if ($stmt = mysqli_prepare($db, $query)) {
        mysqli_stmt_bind_param($stmt, "ssdiss", $pname, $pdescription, $price, $pstock, $file_path, $pcategory_id);
        
        if (mysqli_stmt_execute($stmt)) {
            echo "<script>alert('A termék sikeresen hozzáadva!');   </script>";
            header("Location: ../../?p=admin-product-upload");
exit();
        } else {
            echo "<script>alert('Hiba történt a termék hozzáadása során!');   </script>";
            header("Location: ../../?p=admin-product-upload");
exit();
        }
        
        mysqli_stmt_close($stmt);
    } else {
        print("<script>alert('SQL hiba!');   </script>");
        header("Location: ../../?p=admin-product-upload");
exit();
    }

    mysqli_close($db);
}
 else {
    print("<script>alert('Érvénytelen kérés!');   </script>");
    header("Location: ../../?p=admin-product-upload");
exit();
}
?>

