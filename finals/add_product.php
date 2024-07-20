<?php
require "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Collect form data
  $itemName = $_POST['itemName'];
  $category = $_POST['category'];
  $price = $_POST['price'];
  $stockQuantity = $_POST['stockQuantity'];
  $description = $_POST['description'];
  
  // File upload handling (example)
  $target_dir = "product_img/";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
  
  // Insert into database
  $sql = "INSERT INTO items (name, category, price, stock_quantity, image_url, description)
          VALUES ('$itemName', '$category', '$price', '$stockQuantity', '$target_file', '$description')";
  
  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $conn->close();
}
?>
