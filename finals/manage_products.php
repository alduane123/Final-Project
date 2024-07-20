<?php

require "db.php";

?>




<link rel="stylesheet" href="style.css"> <!-- Link to your CSS file -->
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    .table-container {
        max-height: 700px;
        overflow-y: auto;
    }

    table,
    th,
    td {
        border: 1px solid black;
        padding: 8px;

        overflow: hidden;
        /* Ensure text overflow behaves */


    }

    th {
        background-color: #f2f2f2;
    }

    .btn-addProduct {



        width: 200px;
        height: 50px;
        background-color: green;
        border: 2px solid #333;
        display: flex;
        justify-content: center;
        padding: 10px;
        text-align: center;
        text-decoration: none;
        color: white;
        font-size: 20px;
        font-weight: bold;
        transition: all 0.3s ease;
        margin: 20px auto;
        cursor: pointer;

    }

    /* Modal */
    .modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
        background-color: #fefefe;
        margin: 10% auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        max-width: 600px;
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

    /* Button styles */
    .btn-addProduct {
        width: 200px;
        height: 50px;
        background-color: green;
        border: 2px solid #333;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 10px;
        text-align: center;
        text-decoration: none;
        color: white;
        font-size: 20px;
        font-weight: bold;
        transition: all 0.3s ease;
        margin: 20px auto;
        cursor: pointer;
    }

    .btn-addProduct:hover {
        background-color: #4CAF50;
    }

    .cancel-btn,
    .add-btn {
        background-color: #ccc;
        color: black;

        border-radius: 20px;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin-right: 10px;
        cursor: pointer;
    }

    .cancel-btn:hover,
    .add-btn:hover {
        background-color: #aaa;
    }

    .desc {
        width: 40%;


    }


    .action-column {
        width: 10%;
        /* Adjust the width as needed */
        text-align: center;
    }

    .btn-delete {
        background-color: red;
        color: white;
        border: none;
        padding: 5px 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        cursor: pointer;
        border-radius: 5px;
    }


    .btn-delete {
        margin: 5px;
    }

    .btn-back {
        float: right;
        color: #333;
        cursor: pointer;

    }
</style>


<div class="content">
    <div class="top">
        <a class="btn-back" href="admin.php"=>BACK</a>
        <h2>Manage Products</h2>
    </div>

    <div class="table-container">
        <?php

        $sql = "SELECT * FROM items ORDER BY item_id ASC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo '<table>';
            echo '<tr><th>Item ID</th><th>Name</th><th>Category</th><th>Price</th><th>Stock Quantity</th><th>Description</th><th class="action-column">Actions</th></tr>';

            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['item_id'] . '</td>';
                echo '<td>' . $row['name'] . '</td>';
                echo '<td>' . $row['category'] . '</td>';
                echo '<td>' . $row['price'] . '</td>';
                echo '<td>' . $row['stock_quantity'] . '</td>';
                echo '<td class="desc">' . $row['description'] . '</td>';
                echo '<td class="action-column">';

                echo '<button class="btn-delete" data-item-id="' . $row['item_id'] . '">Delete</button>';
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
        <div id="addProductModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2>Add Product</h2>
                <form id="addProductForm" action="add_product.php" method="post" enctype="multipart/form-data">
                    <label for="itemName">Item Name:</label>
                    <input type="text" id="itemName" name="itemName" required><br><br>

                    <label for="category">Category:</label>
                    <select id="category" name="category" required>
                        <option value="">Select Category</option>
                        <option value="Area Rugs & Carpets">Area Rugs & Carpets</option>
                        <option value="Bedframes">Bedframes</option>
                        <option value="Bedsheets">Bedsheets</option>
                        <option value="Blackout Curtains">Blackout Curtains</option>
                        <option value="Blankets">Blankets</option>
                        <option value="Ceiling Lighting">Ceiling Lighting</option>
                    </select><br><br>

                    <label for="price">Price:</label>
                    <input type="text" id="price" name="price" required><br><br>

                    <label for="stockQuantity">Stock Quantity:</label>
                    <input type="text" id="stockQuantity" name="stockQuantity" required><br><br>

                    <label for="description">Description:</label><br>
                    <textarea id="description" name="description" rows="4" required></textarea><br><br>

                    <label for="image">Product Image:</label>
                    <input type="file" id="image" name="image" accept="image/*" required><br><br>

                    <div style="text-align: center;">
                        <button type="submit" class="add-btn">Add</button>
                        <button type="button" class="cancel-btn">Cancel</button>
                    </div>
                </form>
            </div>
        </div>


    </div>
    <!-- Button to open the modal -->
    <button class="btn-addProduct" id="addProductBtn">Add Product</button>


</div>

<script>
    // Get the modal element
    var modal = document.getElementById("addProductModal");

    // Get the button that opens the modal
    var btn = document.getElementById("addProductBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    // Optional: Close modal when cancel button is clicked
    var cancelBtn = document.querySelector(".cancel-btn");
    if (cancelBtn) {
        cancelBtn.onclick = function() {
            modal.style.display = "none";
        }
    }


    //-----------------------------------------------------------------

    // Get all delete buttons
    var deleteButtons = document.getElementsByClassName("btn-delete");

    // Loop through each delete button and attach a click event listener
    Array.from(deleteButtons).forEach(function(button) {
        button.addEventListener('click', function() {
            // Get item ID from data attribute
            var itemId = this.getAttribute('data-item-id');

            // Confirm deletion
            var confirmDelete = confirm("Are you sure you want to delete this item?");

            if (confirmDelete) {
                // AJAX request to delete the item
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            window.location.reload();
                        } else {
                            console.error('Error deleting item');
                        }
                    }
                };
                xhr.open('POST', 'delete_product.php');
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.send('item_id=' + itemId);
            }
        });
    });
</script>