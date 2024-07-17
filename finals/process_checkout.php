<?php
include 'db.php';
session_start();
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['checkout'])) {
    
    $name = isset($_POST['name']) ? $_POST['name'] : ''; 
    $address = isset($_POST['address']) ? $_POST['address'] : ''; 
    $paymentMethod = isset($_POST['payment_method']) ? $_POST['payment_method'] : ''; 
    $shippingMethod = isset($_POST['shipping_method']) ? $_POST['shipping_method'] : ''; 

    $totalAmount = 0;

    if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
        $productIds = array_keys($_SESSION['cart']);
        $ids = implode(',', array_map('intval', $productIds));

        $sql = "SELECT * FROM items WHERE item_id IN ($ids)";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $stmt = $conn->prepare("INSERT INTO orders (user_id, item_id, total_amount, name, order_date, address, payment_method, shipping_method, status) VALUES (?, ?, ?, ?, NOW(), ?, ?, ?, 'Pending')");

            $stmt->bind_param("iidssss", $user_id, $item_id, $totalAmount, $name, $address, $paymentMethod, $shippingMethod);

            while ($row = $result->fetch_assoc()) {
                $item_id = $row['item_id'];
                $quantity = intval($_SESSION['cart'][$row['item_id']]);
                $totalPrice = $row['price'] * $quantity;
                $totalAmount += $totalPrice;

                if ($stmt->execute()) {
                    // Process each item or do additional actions
                } else {
                    // Handle insert failure
                    echo '<h2>Error</h2>';
                    echo '<p>There was an error processing your order. Please try again.</p>';
                    echo '<a href="cart.php">Go Back to Cart</a>';
                    exit; 
                }
            }

            // Clear the cart after successful checkout
            unset($_SESSION['cart']);

            echo '<h2>Checkout Successful</h2>';
            echo '<p>Thank you for your purchase!</p>';
            echo '<p>Total Amount: ₱' . number_format($totalAmount, 2) . '</p>';
            echo '<p>Name: ' . $name . '</p>';
            echo '<p>Order Date: ' . date('Y-m-d H:i:s') . '</p>';
            echo '<p>Address: ' . $address . '</p>';
            echo '<p>Payment Method: ' . $paymentMethod . '</p>';
            echo '<p>Shipping Method: ' . $shippingMethod . '</p>';
            echo '<a href="home.php">Continue Shopping</a>';

            $stmt->close();
        } else {
            echo '<h2>Error</h2>';
            echo '<p>No products found in your cart.</p>';
            echo '<a href="cart.php">Go Back to Cart</a>';
        }
    } else {
        echo '<h2>Error</h2>';
        echo '<p>Your cart is empty.</p>';
        echo '<a href="cart.php">Go Back to Cart</a>';
    }
} else {
    echo '<h2>Error</h2>';
    echo '<p>Invalid request.</p>';
    echo '<a href="cart.php">Go Back to Cart</a>';
}

$conn->close();
?>
