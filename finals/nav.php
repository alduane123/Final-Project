<?php

require 'db.php';
session_start();
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Décor & Accessories</title>
    <link rel="icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css"> 
</head>
<body>

<div class="header">
    <img src="img/Logo Ver.1.png" alt='Atelier' class="logo">
</div>

<div class="nav">
    
    <a href="home.php">Home</a>
    <a href="cart.php">Cart</a>
    <a href="order.php">Order History</a>
    <?php
    
    $query = $conn->query("SELECT * from users WHERE user_id = '$user_id'") or die($db->error);
    if ($query->num_rows > 0) {
        echo '<a class="logoutButton" href="logout.php">Logout</a>';
    }else{
        echo '<a class="loginButton" href="index.php">Login</a>';
    }
    ?>
    
</div>
</body>
</html>