<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }


        .dashboard h2 {
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
            margin-bottom: 20px;
            text-align: center;
            font-size: 30px;
        }

        .dashboard {
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;


        }



        .dashboard .btn {
            width: 250px;
            height: 150px;
            background-color: #fff;
            border: 2px solid #333;
            border-radius: 10px;
            display: inline-flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            text-decoration: none;
            color: #333;
            font-size: 20px;
            font-weight: bold;
            transition: all 0.3s ease;
            margin: 20px;
        }

        .dashboard .btn:hover {
            background-color: #321605;
            color: #fff;
            border-color: #fff;
            cursor: pointer;
        }

        .buttons {
            display: flex;
    
            justify-content: center;
            
            margin-top: 20px;
            
        }
    </style>
</head>

<body>
    <div class="dashboard">
        <h2>Admin Dashboard</h2>

        <div class="buttons">

            <a href="manage_orders.php" class="btn">Manage Orders</a>
            <a href="manage_products.php" class="btn">Manage Products</a>
        </div>



    </div>
</body>

</html>