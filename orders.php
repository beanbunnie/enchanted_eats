<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="index.css">
    <link href="https://fonts.googleapis.com/css?family=Bentham|Playfair+Display|Raleway:400,500|Suranna|Trocchi"
        rel="stylesheet">
    <title>Orders</title>
</head>

<body>
    <div class="header">
        <img src="logo.png" alt="Logo">
        <a href="cart.php">cart</a>
        <a href="orders.php">orders</a>
        <a href="index.php">products</a>
    </div>
    <h1> Here are your previous orders</h1>
    <table id="productTable" style="width:100%;" border=1 cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <th>Id</th>
                <th>Items</th>
                <th>Date</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody id="tableBody">
        </tbody>
    </table>

    <?php
    $servername = "localhost";
    $username = "u3qjwfow9lr4m";
    $password = "Aquarium123!";
    $dbname = "db4mbanoqqeatu";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "SELECT * FROM orders";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        $jsonData = json_encode($data);
        echo "<script> var json_data = $jsonData; </script>";
    } else {
        echo "0 results";
    }
    ?>

    <script>
        const order = json_data;
        var tableBody = document.getElementById("tableBody");
        console.log("Order placed")
        console.log(order);

        order.forEach(function (item) {
            var row = document.createElement("tr");
            Object.values(item).forEach(text => {
                console.log(text);
                var cell = document.createElement("td");
                var textNode = document.createTextNode(text);
                cell.appendChild(textNode);
                row.appendChild(cell);
            });
            tableBody.appendChild(row);
        });
    </script>
</body>