<?php
include "nav.php";
require "db.php";

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
?>




<link rel="stylesheet" href="style.css"> <!-- Link to your CSS file -->
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }
    table, th, td {
        border: 1px solid black;
        padding: 8px;
    }
    th {
        background-color: #f2f2f2;
    }
</style>


<div class="content">
    <h2>Order History</h2>

    <?php
    
    $sql = "SELECT * FROM orders WHERE user_id = '$user_id' ORDER BY order_date DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<table>';
        echo '<tr><th>Order ID</th><th>Total Amount</th><th>Name</th><th>Order Date</th><th>Status</th></tr>';
        
        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row['order_id'] . '</td>';
            echo '<td>₱' . number_format($row['total_amount'], 2) . '</td>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['order_date'] . '</td>';
            echo '<td>' . $row['status'] . '</td>';
            echo '</tr>';
        }
        
        echo '</table>';
    } else {
        echo '<p>No orders found.</p>';
    }

    $conn->close();
    ?>
</div>

