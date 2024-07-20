<?php

require "db.php";


?>

<link rel="stylesheet" href="style.css"> <!-- Link to your CSS file -->
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    table,
    th,
    td {
        border: 1px solid black;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }

    .action-column {
        width: 10%;
        /* Adjust the width as needed */
        text-align: center;
    }

    .btn-update {
        background-color: green;
        color: white;
        border: none;
        padding: 5px 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        cursor: pointer;
        border-radius: 5px;
    }
    
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    /* Modal styles */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: auto;
        /* Enable scroll if needed */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
        padding-top: 100px;
        /* Location of the box */
    }

    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 60%;
        border-radius: 5px;
    }

    .cancel,
    .updateStatus {
        color: #aaa;
        float: right;
        font-size: 15px;
        margin: 15px;

    }

    .cancel:hover,
    .cancel:focus,
    .updateStatus:hover,
    .updateStatus:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    .modal-body {
        margin-bottom: 30px;
    }

    .modal-footer {
        text-align: right;
        margin-bottom: 30px;
    }

    .btn-back {
        float: right;
        color: #333;
        cursor:pointer;
        
    }

</style>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<div class="content">
    <div class="top">
    <a class="btn-back" href="admin.php"=>BACK</a>
    <h2>Manage Orders</h2>    
    </div>

    <?php
    $sql = "SELECT * FROM orders ORDER BY order_date ASC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<table>';
        echo '<tr><th>Order ID</th><th>Total Amount</th><th>Name</th><th>Order Date</th><th>Status</th><th class="action-column">Actions</th></tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr data-order-id="' . $row['order_id'] . '">';
            echo '<td>' . $row['order_id'] . '</td>';
            echo '<td>₱' . number_format($row['total_amount'], 2) . '</td>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['order_date'] . '</td>';
            echo '<td class="order-status">' . $row['status'] . '</td>';
            echo '<td class="action-column">';
            echo '<button class="btn-update" data-order-id="' . $row['order_id'] . '">Update</button>';
            echo '</td>';
            echo '</tr>';
        }



        echo '</table>';
    } else {
        echo '<p>No orders found.</p>';
    }

    $conn->close();
    ?>

    <!-- Modal -->
    <div id="myModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="modal-body">
                <h3>Update Order Status</h3>
                <form id="updateStatusForm">
                    <input type="radio" id="status_placed" name="status" value="Order Placed">
                    <label for="status_placed">Order Placed</label><br>
                    <input type="radio" id="status_processing" name="status" value="Processing">
                    <label for="status_processing">Processing</label><br>
                    <input type="radio" id="status_shipped" name="status" value="Shipped">
                    <label for="status_shipped">Shipped</label><br>
                    <input type="radio" id="status_out_for_delivery" name="status" value="Out for Delivery">
                    <label for="status_out_for_delivery">Out for Delivery</label><br>
                    <input type="radio" id="status_delivered" name="status" value="Delivered">
                    <label for="status_delivered">Delivered</label><br>
                    <input type="radio" id="status_cancelled" name="status" value="Cancelled">
                    <label for="status_cancelled">Cancelled</label><br>
                    <input type="radio" id="status_failed_delivery" name="status" value="Failed Delivery">
                    <label for="status_failed_delivery">Failed Delivery</label><br>
                    <input type="radio" id="status_returned" name="status" value="Returned">
                    <label for="status_returned">Returned</label><br>
                    <div class="modal-footer">
                        <button class="cancel">Cancel</button>
                        <button class="updateStatus">Update Status</button>
                    </div>

                </form>

            </div>

        </div>
    </div>

</div>

<script>
    $(document).ready(function() {
        // Open modal when update button is clicked
        $('.btn-update').click(function() {
            var orderId = $(this).data('order-id');
            $('#myModal').css('display', 'block');
            // Here you could optionally fetch current status and pre-select the corresponding radio button
            $('#updateStatusForm').data('order-id', orderId); // Store orderId in form data
        });

        // Close modal when close button or outside modal area is clicked
        $('.cancel, .close').click(function() {
            $('#myModal').css('display', 'none');
        });

        // Prevent modal from closing when clicking inside the modal content
        $('.modal-content').click(function(event) {
            event.stopPropagation();
        });

        // Update status logic
        $('.updateStatus').click(function() {
            var newStatus = $('input[name="status"]:checked').val();
            var orderId = $('#updateStatusForm').data('order-id'); // Retrieve orderId from form data

            if (newStatus && orderId) { // Ensure orderId is valid
                // Perform AJAX request to update status in database
                $.post('update_status.php', {
                    order_id: orderId,
                    status: newStatus
                }, function(data) {
                    // Handle success or error response from server
                    console.log('Status updated successfully');
                    // Update the status displayed in the table without refreshing the page
                    $('tr[data-order-id="' + orderId + '"] .order-status').text(newStatus);
                    // Close modal after successful update
                    $('#myModal').css('display', 'none');
                }).fail(function() {
                    alert('Error updating status');
                });
            } else {
                alert('Please select a status to update.');
            }
        });
    });
</script>