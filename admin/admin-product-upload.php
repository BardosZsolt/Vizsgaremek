<h1>Admin product upload</h1>

<style>
        body {
            background-color: #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            font-family: Arial, sans-serif;
        }
    
        h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
            margin-top: 40px;
        }
        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
            color: white;
        }
        input, textarea, select, button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
    <div class="">

    <!-- Array (
    [productName] => Sade Ferrell
    [description] => Sint non suscipit e
    [category] => Ex cupidatat sed qui
    [price] => 935
    [productType] => latest
)

array(5) { 
    ["productName"] => string(12) "Sade Ferrell"
    ["description"] => string(19) "Sint non suscipit e"
    ["category"] => string(20) "Ex cupidatat sed qui"
    ["price"] => string(3) "935"
    ["productType"] => string(6) "latest"
}

Array (
    [image] => Array (
        [name] => asd.jpg
        [type] => image/jpeg
        [tmp_name] => C:\xampp\tmp\phpCE1F.tmp
        [error] => 0
        [size] => 16723
    )
)

array(1) { 
    ["image"] => array(5) { 
        ["name"] => string(7) "asd.jpg"
        ["type"] => string(10) "image/jpeg"
        ["tmp_name"] => string(24) "C:\xampp\tmp\phpCE1F.tmp"
        ["error"] => int(0)
        ["size"] => int(16723)
    } 
} -->

      
    <form method="POST" action="./admin/backend/product-upload.php" enctype="multipart/form-data">
            <div>
                <label for="productName">Product Name</label>
                <input type="text" id="productName" name="productName">
            </div>
            <div>
                <label for="description">Description</label>
                <textarea id="description" name="description" cols="30" rows="4"></textarea>
            </div>
            <div>
                <label for="category">Category</label>
                <input type="text" id="category" name="category">
            </div>
            <div>
                <label for="price">Price</label>
                <input type="number" id="price" name="price">
            </div>
            <div>
                <label for="image">Upload Image</label>
                <input type="file" id="image" name="image">
            </div>
            <div>
                <label for="stock">Stock</label>
                <input type="number" id="stock" name="stock">
            </div>
            <div>
                <label for="productType">Product Type</label>
                <select id="productType" name="productType">
                    <option value="latest">Latest Products</option>
                    <option value="featured">Featured Products</option>
                </select>
            </div>
            <button type="submit">Upload Product</button>
        </form>
    </div>