<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="style.css"> <!-- Add your own stylesheet -->
</head>
<body>

<div class="header">
    <img src="img/Logo Ver.1.png" alt='Atelier' class="logo">
</div>

<div class="nav">
    <a href="home.php">Home</a>
    <a href="cart.php">Cart</a>
    <a href="order.php">Order History</a>
</div>

<div class="container">
    <h2>Checkout</h2>
    <form action="process_checkout.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br><br>

        <label for="payment_method">Payment Method:</label>
        <select id="payment_method" name="payment_method" required>
            <option value="">Select Payment Method</option>
            <option value="Cash on delivery">Cash on delivery</option>
            <option value="E-wallet">E-wallet</option>
            <option value="Credit/Debit card">Credit/Debit card</option>
        </select><br><br>

        <label for="shipping_method">Shipping Method:</label>
        <select id="shipping_method" name="shipping_method" required>
            <option value="">Select Shipping Method</option>
            <option value="Standard Delivery">Standard Delivery</option>
            <option value="Third Party Delivery">Third Party Delivery</option>
            <option value="Pickup">Pickup</option>
        </select><br><br>

        <input type="submit" name="checkout" value="Checkout">
    </form>
</div>



</body>
</html>
