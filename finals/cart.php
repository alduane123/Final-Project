<?php

include "nav.php";
require "db.php";

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
?>




<div class="content">
    <h2>Your Cart</h2>

    <?php
    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        $productIds = array_keys($_SESSION['cart']);
        $ids = implode(',', array_map('intval', $productIds));

        $sql = "SELECT * FROM items WHERE item_id IN ($ids)";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<form action="checkout.php" method="post">';
            echo '<table>';
            echo '<tr><th>Image</th><th>Name</th><th>Price</th><th>Quantity</th><th>Total</th></tr>';

            $totalAmount = 0;

            while ($row = $result->fetch_assoc()) {
                $quantity = intval($_SESSION['cart'][$row['item_id']]);
                $totalPrice = $row['price'] * $quantity;
                $totalAmount += $totalPrice;

                echo '<tr>';
                echo '<td><img src="' . $row['image_url'] . '" alt="' . $row['name'] . '" width="50"></td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>₱' . number_format($row['price'], 2) . '</td>';
                echo '<td>' . $quantity . '</td>';
                echo '<td>₱' . number_format($totalPrice, 2) . '</td>';
                echo '</tr>';
            }

            echo '<tr>';
            echo '<td colspan="4">Total</td>';
            echo '<td>₱' . number_format($totalAmount, 2) . '</td>';
            echo '</tr>';
            echo '</table>';
            echo '<button type="submit" name="checkout">Checkout</button>';
            echo '</form>';
        } else {
            echo "<p>No products found.</p>";
        }
    } else {
        echo '<p>Your cart is empty.</p>';
    }

 
    ?>
</div>


