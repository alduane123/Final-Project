<?php
include "db.php"; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if order_id and status are set and not empty
    if (isset($_POST['order_id']) && isset($_POST['status']) && !empty($_POST['order_id']) && !empty($_POST['status'])) {
        $order_id = $_POST['order_id'];
        $new_status = $_POST['status'];

        // Prepare and execute SQL UPDATE statement
        $sql = "UPDATE orders SET status = ? WHERE order_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $new_status, $order_id);

        if ($stmt->execute()) {
            echo "Status updated successfully";
        } else {
            echo "Error updating status: " . $conn->error;
        }

        $stmt->close();
    } else {
        echo "Missing order_id or status parameters";
    }
} else {
    echo "Invalid request";
}

$conn->close();
?>
