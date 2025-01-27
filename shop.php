<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shop</title>
  <link rel="stylesheet" href="shop.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  <link rel="shortcut icon" type="image/jpg" href="images/writing-text.png" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css"
    integrity="sha384-BY+fdrpOd3gfeRvTSMT+VUZmA728cfF9Z2G42xpaRkUGu2i3DyzpTURDo5A6CaLK" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
    integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>
<style>
    *{
    margin: 0;
    padding: 0;
    font-family: 'Roboto', sans-serif;
}
.container{
    width: 100%;
    height: 100vh;
    background: none;
    background-size: cover;
    padding-left: 8%;
    padding-right: 8%;
    box-sizing: border-box;
}

p {
    color: black;
}

.menu-icon{
    width: 30px;
    cursor: pointer;
    margin-left: 40px;
}
nav{
    flex: 1;
    text-align: right;
}
nav ul li{
    list-style: none;
    display: inline-block;
    margin-left: 60px;
}
nav ul li a{
    text-decoration: none;
    color: #fff;
    font-size: 13px;
}
.row{
    display: flex;
    height: 88%;
    align-items: center;
}

.col{
    flex-basis: 50%;
}

.btn{
    display: inline-block;
    background: #2c2b2b;
    color: #fff;
    padding: 8px 30px;
    margin: 30px 0;
    border-radius: 30px;
    transition: 0.5s;
    text-decoration: none;

}

.categories{
    margin: 70px 0;
}

.col-3{
    flex-basis: 30%;
    min-width: 250px;
    margin-bottom: 30px;
    padding-left: 25px;
    padding-right: 25px;
}

.col-3 img{
    width: 100%;
    margin-top: 0;
    vertical-align: middle;
    height: auto;
}

.small-container{
    max-width: 1080px;
    margin: auto;
    padding-left: 25px;
    padding-right: 25px;
}
.col-4{
    flex-basis: 25%;
    padding: 10px;
    min-width: 200px;
    margin-bottom: 50px;
 
}

.col-4 img{
    width: 100%;
}

.title{
    text-align: center;
    margin: 0 auto 80px;
    position: relative;
    line-height: 60px;
    color: #555;
}

.title::after{
    content: '';
    background: #2c2b2b;
    width: 80px;
    height: 5px;
    border-radius: 5px;
    position: absolute;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%);
}

h4{
    color: #555;
}

.col-4 p{
    font-size: 14px;
}

small{
    color:#555;
}

.testimonial{
    padding-top: 100px;
}
.testimonial .col-3{
    text-align: center;
    padding: 40px 20px;
    box-shadow: 0 0 20px 0px rgba(0,0,0,0.1);
    cursor: pointer;
    transition: transform 0.5s;
}

.testimonial .col-3 img{
    width: 50px;
    margin-top: 20px;
    border-radius: 70%;
}

.testimonial .col-3:hover{
    transform: translateY(-10px);
}

.fa.fa-quote-left{
    font-size: 34px;
    color: #ff523b;
}

.col-3 p{
    font-size: 12px;
    margin: 12px 0;
    color: #777;
}

.testimonial .col-3 h3{
    font-weight: 600;
    color: #555;

}

/*-------------brands-----------*/
.brands{
    margin: 100px auto;
}

.col-5{
    width: 160px;
    padding: 50px;
}

.col-5 img{
    width: 100%;
    cursor: pointer;
    filter: grayscale(100%);
    
}

.col-5 img:hover{
    filter: grayscale(0)
}




/*---------------all products page --------*/

.row-2{
    justify-content: space-between;
    margin: 100px auto 50px;
}
select{
    border: 1px solid #000000;
    padding: 5px;
}

select:focus{
    outline: none;
}

.page-btn{
    margin: 0 auto 80px;

}

.page-btn span{
    display: inline-block;
    border: 1px solid #000000;
    margin-left: 10px;
    width: 40px;
    height: 40px;
    text-align: center;
    line-height: 40px;
    cursor: pointer;
}

.page-btn span:hover{
    background: #000000;
    color: white
}



/*---------------single product details-----*/

.single-product{
    margin-top: 80px;
}

.single-product .col-2 img{
    padding: 0;

}

.single-product .col-2{
    padding: 20px;
}

.single-product h4{
    margin: 20px 0;
    font-size: 22px;
    font-weight: bold;
}

.single-product select{
    display: block;
    padding: 10px;
    margin-top: 20px;
}

.single-product input{
    width: 50px;
    height: 40px;
    padding-left: 10px ;
    font-size: 20px;
    margin-right: 10px;
    border: 1px solid #000;
}
input:focus{
    outline: none;
}

.single-product .fa{
    margin-left: 10px;
    margin-top: 10px;
}

.small-img-row{
    display: flex;
    justify-content: space-between;
}

.small-img-col{
    flex-basis: 24%;
    cursor: pointer;
}


/*---------------cart items --------*/

.cart-page{
    margin:80px auto;
}
table{
    width: 100%;
    border-collapse: collapse;
}
.cart-info{
    display: flex;
    flex-wrap: wrap;
}

th{
    text-align: left;
    padding: 5px;
    color: #fff;
    background-color: #000;
    font-weight: normal;
}

td{
    padding: 10px 5px;
}
td input{
    width: 40px;
    height: 30px;
    padding: 5px;
}

td a{
    color:#000;
    font-size: 12px;
}

td img{
    width: 80px;
    height: 80px;
    margin-right: 10px;
}

.total-price{
    display: flex;
    justify-content: flex-end;
}

.total-price table{
    border-top: 3px solid #000;
    width: 100%;
    max-width: 400px;
}

td:last-child{
    text-align: right;
}

th:last-child{
    text-align: right;
}

/* Modal styles */
.modal {
    display: none; /* Alapértelmezés szerint rejtve */
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Áttetsző háttér */
    display: flex; /* Középre igazításhoz */
    justify-content: center;
    align-items: center;
}

.modal-content {
    display: flex; /* Vízszintes elrendezés */
    align-items: center;
    background-color: #fff;
    border-radius: 10px;
    width: 90%; /* Reszponzív méret */
    max-width: 600px; /* Maximális szélesség */
    padding: 20px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.25);
    animation: scaleIn 0.3s ease-in-out;
}

.modal-left {
    flex: 1; /* A kép aránya */
    text-align: center;
}

.modal-left img {
    max-width: 100%; /* Kép méretezése */
    max-height: 150px; /* Limitáljuk a kép magasságát */
    border-radius: 5px;
}

.modal-right {
    flex: 2; /* Szöveg aránya */
    padding-left: 15px; /* Térköz a kép mellett */
    display: flex;
    flex-direction: column; /* Szövegek és gombok egymás alatt */
    justify-content: center;
}

.close {
    position: absolute;
    top: 10px;
    right: 15px;
    font-size: 20px;
    color: #333;
    cursor: pointer;
    background: none;
    border: none;
    font-weight: bold;
}

.close:hover {
    color: red; /* Hover hatás */
}

.description {
    margin-top: 10px;
    font-size: 14px;
    color: #555;
}

/* Animáció a megjelenéshez */
@keyframes scaleIn {
    from {
        transform: scale(0.8);
        opacity: 0;
    }
    to {
        transform: scale(1);
        opacity: 1;
    }
}



/* Üres kosár - alap stílus */
.empty-cart {
    text-align: center;
    padding: 50px 20px;
    background: linear-gradient(135deg, #fefefe, #7fb3eb);
    color: #fff;
    border-radius: 10px;
    margin: 30px auto;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.empty-cart h1 {
    font-size: 2.2rem;
    font-weight: bold;
    margin-bottom: 20px;
    color: black;
}

.empty-cart p {
    font-size: 1.1rem;
    margin-bottom: 30px;
    line-height: 1.6;
    color:black;
}

/* Gomb stílus - "Vissza a boltba" */
.empty-cart .btn-back {
    display: inline-block;
    padding: 12px 25px;
    font-size: 1rem;
    font-weight: bold;
    text-decoration: none;
    background: black;
    color: #fff;
    border-radius: 50px;
    transition: all 0.3s ease;
    box-shadow: 0 4px 6px rgba(204, 41, 41, 0.3);
}

.empty-cart .btn-back:hover {
    background: #7fb3eb;
    box-shadow: 0 6px 8px rgba(0, 86, 179, 0.5);
    transform: translateY(-2px);
}

/* Gombok igazítása középre */
.empty-cart a {
    display: inline-block;
    margin-top: 20px;
}
.checkout-container {
    max-width: 600px;
    margin: 0 auto;
    padding: 20px;
    background: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    font-family: Arial, sans-serif;
}

.checkout-container h1 {
    text-align: center;
    color: #333;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

.form-group input,
.form-group select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 1em;
}

.form-actions {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 20px;
}

.btn {
    padding: 10px 20px;
    text-decoration: none;
    background: #333;
    color: #fff;
    border-radius: 5px;
    transition: background 0.3s;
    text-align: center;
}

.btn:hover {
    background: #7fb3eb;
}
/* Szállítási és fizetési adatok kerettel */
form {
    max-width: 500px;
    margin: 30px auto;
    padding: 20px;
    background-color: #e3f2fd; /* Világos kék háttér */
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Árnyék */
    border: 2px solid #000; /* Fekete külső keret */
}

form label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
    color: #37474f; /* Sötétszürke szöveg */
}

form input,
form select {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #000; /* Fekete keret a mezők körül */
    border-radius: 5px;
    font-size: 1em;
    background-color: #f1f8e9; /* Világos zöldes árnyalat */
    transition: border-color 0.3s, box-shadow 0.3s;
}

form input:focus,
form select:focus {
    border-color: #1e88e5; /* Kék fókusz */
    box-shadow: 0 0 8px rgba(30, 136, 229, 0.5);
    outline: none;
    background-color: #ffffff; /* Fókuszban fehér háttér */
}

form button {
    width: 100%;
    padding: 15px;
    background-color: lightseagreen; 
    color: #ffffff;
    font-size: 1.2em;
    font-weight: bold;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s, transform 0.2s;
}

form button:hover {
    background-color: lightseagreen; 
    transform: scale(1.05); /* Enyhe nagyítás */
}

form button:active {
    background-color: #ff6f00; /* Sötétebb narancs aktív állapot */
}

/* Formázott fejléc */
form h1 {
    text-align: center;
    font-size: 1.8em;
    margin-bottom: 20px;
    color: #1e88e5; /* Kék cím */
    font-weight: bold;
}

/* Keret az egyes mezők között */
form .form-group {
    padding: 10px;
    border: 1px solid #000; /* Fekete keret a mezők között */
    border-radius: 5px;
    margin-bottom: 15px;
    background-color: #ffffff; /* Fehér háttér az egyes szakaszoknak */
}

/* Responsive */
@media (max-width: 768px) {
    form {
        padding: 15px;
    }
}

.page-btn span.active {
    background-color: #333;
    color: #fff;
    border-radius: 50%;
}

.row {
    display: flex;
    flex-wrap: wrap;
    gap: 20px; /* Távolság az elemek között */
  }
  
  .col-4 {
    flex: 1 1 calc(25% - 20px); /* Egy elem szélessége a sor 25%-a */
    box-sizing: border-box; /* Hogy a padding és a margin ne növelje az elem méretét */
    max-width: calc(25% - 20px);
  }
  
  .col-4 img {
    width: 100%; /* Képek szépen illeszkednek a szülő konténer szélességéhez */
  }

  .row {
    display: flex;
    flex-wrap: wrap;
    gap: 20px; /* Távolság az elemek között */
    margin-bottom: 40px; /* Távolság az utána lévő elemekkel */
  }
  
  .col-4 {
    flex: 1 1 calc(25% - 20px); /* Egy elem szélessége a sor 25%-a */
    box-sizing: border-box; /* Hogy a padding és a margin ne növelje az elem méretét */
    max-width: calc(25% - 20px);
  }
  
  .col-4 img {
    width: 100%; /* Képek szépen illeszkednek a szülő konténer szélességéhez */
  }
  
  /* Gombok vagy más elemek elhelyezkedéséhez */
  .page-btn {
    text-align: center;
    margin-top: 20px;
    clear: both; /* Biztosítja, hogy a gombok ne lógjanak be a rácsba */
  }

  /* A termékek sorba rendezése */
.row {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-bottom: 40px;
  }
  
  /* Minden egyes termékhez tartozó oszlop */
  .col-4 {
    flex: 1 1 calc(25% - 20px);
    box-sizing: border-box;
    max-width: calc(25% - 20px);
    text-align: center; /* Középre igazítja a szövegeket */
  }
  
  /* A képek fix méretének beállítása */
  .col-4 img {
    width: 100%; /* A kép szélessége mindig kitölti a szülő konténer szélességét */
    height: 200px; /* Fix magasság beállítása */
    object-fit: cover; /* A képek nem torzulnak, de kitöltik a rendelkezésre álló teret */
    margin-bottom: 10px; /* Kis távolság a kép és a szöveg között */
  }
  
  /* A termékek nevei és árai */
  .col-4 h4 {
    font-size: 16px; /* A termék neve */
    margin: 10px 0; /* A név és ár közötti távolság */
  }
  
  .col-4 p {
    font-size: 14px; /* A termék árának mérete */
    color: #555; /* Sötétebb szín a szövegekhez */
    margin: 0;
  }
 

</style>
<!-- Modal for enlarged product view -->
<!-- Modal for enlarged product view -->
<div id="modal" class="modal" style="display: none;">
    <div class="modal-content">
        <button class="close" onclick="closeModal()">×</button>
        <div class="modal-left">
            <img id="modal-img" src="" alt="Product image">
        </div>
        <div class="modal-right">
            <h2 id="modal-name"></h2>
            <p id="modal-price"></p>
            <select id="size">
                <option>Select Size</option>
                <option>S</option>
                <option>M</option>
                <option>L</option>
                <option>XL</option>
            </select>

            <!-- Quantity input -->
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" value="1" min="1" onchange="updatePrice()">

            <button class="btn" onclick="addToCart()">Add to Cart</button>

            <!-- Product description -->
            <p id="modal-description" class="description"></p>
        </div>
    </div>
</div>

<!-- Featured Products Section -->
<div class="small-container">
    <h2 class="title">Featured Products</h2>
        <!-- Dynamic products from the database -->
        <div class="row">
            <?php
            include "kapcsolat.php";
            if ($db->connect_error) {
                die("Connection failed: " . $db->connect_error);
            }

            $sql = "SELECT pname, price, pimage_url, pdescription FROM products WHERE pcategory_id = 1";
            $result = $db->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-4">';
                    echo '<img src="' . htmlspecialchars($row['pimage_url']) . '" alt="' . htmlspecialchars($row['pname']) . '" onclick="openModal(\'' . addslashes($row['pimage_url']) . '\', \'' . addslashes($row['pname']) . '\', ' . $row['price'] . ', \'' . addslashes($row['pdescription']) . '\')">';
                    echo '<h4>' . htmlspecialchars($row['pname']) . '</h4>';
                    echo '<p>£' . number_format($row['price'], 2) . '</p>';
                    echo '</div>';
                }
            } else {
                echo "<p>No additional products found in the database.</p>";
            }
            $db->close();
            ?>
        </div>
    </div>
    <h2 class="title">Latest Products</h2>
    <div class="row">
<?php
    include "kapcsolat.php";



    // Kapcsolat ellenőrzése
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    // Termékek lekérdezése
    $sql = "SELECT pname, price, pimage_url, pdescription FROM products WHERE pcategory_id = 2";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="col-4">';
            echo '<img src="' . htmlspecialchars($row['pimage_url']) . '" alt="' . htmlspecialchars($row['pname']) . '" onclick="openModal(\'' . addslashes($row['pimage_url']) . '\', \'' . addslashes($row['pname']) . '\', ' . $row['price'] . ', \'' . addslashes($row['pdescription']) . '\')">';
            echo '<h4>' . htmlspecialchars($row['pname']) . '</h4>';
            echo '<p>£' . number_format($row['price'], 2) . '</p>';
            echo '</div>';
        }
    } else {
        echo "<p>No additional products found in the database.</p>";
    }

    $db->close();
    ?>
    </div>

<div class="page-btn">
        <span>1</span>
        <span>2</span>
        <span>3</span>
        <span>4</span>
        <span>&#8594;</span>
      </div>

<script>
    let currentPrice = 0;

    function openModal(image, name, price, description) {
        // Töltse fel a modal tartalmát
        document.getElementById("modal-img").src = image;
        document.getElementById("modal-name").innerText = name;
        document.getElementById("modal-price").innerText = "£" + price;
        document.getElementById("modal-description").innerText = description;

        // Modal megjelenítése
        document.getElementById("modal").style.display = "flex";

        // Ár mentése és frissítése
        currentPrice = price;
        updatePrice();

        // ESC gombhoz hallgató hozzáadása
        document.addEventListener("keydown", handleKeyDown);

        // A modal körüli területre kattintásra is bezárjuk
        document.getElementById("modal").addEventListener("click", closeModalOnClickOutside);
    }

    function closeModal() {
        // Modal elrejtése
        document.getElementById("modal").style.display = "none";

        // Hallgató eltávolítása
        document.removeEventListener("keydown", handleKeyDown);
        document.getElementById("modal").removeEventListener("click", closeModalOnClickOutside);
    }

    function closeModalOnClickOutside(event) {
        // Ha a modalon kívül kattintanak, zárjuk be
        if (event.target === document.getElementById("modal")) {
            closeModal();
        }
    }

    function handleKeyDown(event) {
        // Ha ESC-et nyomnak, zárjuk be a modalt
        if (event.key === "Escape") {
            closeModal();
        }
    }

    function updatePrice() {
        // Frissítse az árat a darabszám alapján
        const quantity = document.getElementById("quantity").value;
        const totalPrice = currentPrice * quantity;
        document.getElementById("modal-price").innerText = "£" + totalPrice.toFixed(2);
    }

    function addToCart() {
        const name = document.getElementById("modal-name").innerText;
        const price = parseFloat(document.getElementById("modal-price").innerText.replace("£", ""));
        const size = document.getElementById("size").value;
        const quantity = parseInt(document.getElementById("quantity").value);

        if (size === "Select Size") {
            alert("Please select a size!");
            return;
        }

        // Add to cart API call
        fetch("cart_action.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                action: "addToCart",
                name: name,
                price: price,
                size: size,
                quantity: quantity
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === "success") {
                alert(data.message);
            } else {
                alert(data.message);
            }
        })
        .catch(error => console.error("Error:", error));
    }
</script>


</body>
</html>
