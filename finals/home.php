<?php
include "nav.php";
require "db.php";

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
?>

<div class="content">
    <div class="sidebar">
        <h3>Categories</h3>
        <ul>
            <li><a href="?category=all">All Products</a></li>
            <li><a href="?category=<?php echo urlencode('Area Rugs & Carpets'); ?>">Area Rugs & Carpets</a></li>
            <li><a href="?category=<?php echo urlencode('Bedframes'); ?>">Bedframes</a></li>
            <li><a href="?category=<?php echo urlencode('Bedsheets'); ?>">Bedsheets</a></li>
            <li><a href="?category=<?php echo urlencode('Blackout Curtains'); ?>">Blackout Curtains</a></li>
            <li><a href="?category=<?php echo urlencode('Blankets'); ?>">Blankets</a></li>
            <li><a href="?category=<?php echo urlencode('Ceiling Lighting'); ?>">Ceiling Lighting</a></li>
        </ul>
    </div>

    <div class="main-content">
        <h2>Products</h2>
        <div class="product-grid">
            <?php
            $category = isset($_GET['category']) ? $_GET['category'] : 'all';

            $sql = "SELECT * FROM items";
            if ($category != 'all') {
                $sql .= " WHERE category = '" . $conn->real_escape_string($category) . "'";
            }

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="product">';
                    echo '<img src="' . $row['image_url'] . '" alt="' . $row['name'] . '">';
                    echo '<h4>' . $row['name'] . '</h4>';
                    echo '<p>₱' . number_format($row['price'], 2) . '</p>';
                    
                    echo '<button onclick="addToCart('.$row['item_id'].')">Add to Cart</button>';
                    echo '</div>';
                }
            } else {
                echo "<p>No products found.</p>";
            }

            $conn->close();
            ?>
        </div>
    </div>
</div>

<div class="footer">
    <p>&copy; 2024 Atelier. No Copyright Infringement Intended. Educational Purposes Only.</p>
</div>

<script>
    function addToCart(productId) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "add_to_cart.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                alert("Added to cart successfully!");
            }
        };
        xhr.send("id=" + productId);
    }
</script>   
