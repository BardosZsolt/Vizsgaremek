<div id="admin-menu">
    <ul>
        <li><a href="?p=admin-product-upload">📦 Termékek feltöltése</a></li>
        <li><a href="?p=admin-comment-edit">💬 Kommentek kezelése</a></li>
        <li><a href="?p=admin-product-edit">✏️ Termékek szerkesztése</a></li>
        <li><a href="?p=admin-summary">📊 Termék statisztika</a></li>
    </ul>
</div>

<style>
    #admin-menu {
        margin: 20px auto;
        max-width: 600px;
        text-align: center;
    }

    #admin-menu ul {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 15px;
        padding: 0;
        list-style: none;
    }

    #admin-menu ul li {
        display: inline-block;
    }

    #admin-menu ul li a {
        display: inline-block;
        padding: 12px 18px;
        background: #007bff;
        color: white;
        text-decoration: none;
        font-weight: bold;
        border-radius: 8px;
        transition: all 0.3s ease-in-out;
        box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.2);
    }

    #admin-menu ul li a:hover {
        background: #0056b3;
        transform: scale(1.05);
    }
</style>
