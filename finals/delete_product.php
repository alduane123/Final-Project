<?php
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $itemId = $_POST['item_id'];

    // Prepare SQL statement to delete item based on item_id
    $sql = "DELETE FROM items WHERE item_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $itemId);

    if ($stmt->execute()) {
        // Handle success (e.g., return success response)
        echo json_encode(['status' => 'success']);
    } else {
        // Handle failure (e.g., return error response)
        echo json_encode(['status' => 'error', 'message' => 'Failed to delete item']);
    }

    $stmt->close();
    $conn->close();
}
?>
