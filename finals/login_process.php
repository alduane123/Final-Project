<?php
require 'db.php';
session_start();


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    

    $query = $conn->query("SELECT * from users where username = '$username' AND password = '$password'") or die($db->error);

    if ($query->num_rows == 1) {
        
        $result = $query->fetch_assoc();
        $_SESSION['user_id'] = $result['user_id'];
        header('Location: home.php');
    } else {
        echo "Invalid username or password";
    }
}else{
    header("Location: index.php");
}


?>

