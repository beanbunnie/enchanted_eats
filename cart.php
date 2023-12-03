<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="index.css">
    <link href="https://fonts.googleapis.com/css?family=Bentham|Playfair+Display|Raleway:400,500|Suranna|Trocchi"
        rel="stylesheet">
    <title>Cart</title>
</head>

<body>
    <div class="header">
        <img src="logo.png" alt="Logo">
        <a href="cart.php">cart</a>
        <a href="orders.php">orders</a>
        <a href="index.php">products</a>
    </div>
    <h1> Your Cart </h1>
    <table id="productTable" style="width:100%;" border=1 cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
            </tr>
        </thead>
        <tbody id="tableBody">
        </tbody>
    </table>


    <script>
        const cart = JSON.parse(localStorage.getItem('cart'));
        var tableBody = document.getElementById("tableBody");

        cart.forEach(function (item) {
            var row = document.createElement("tr");
            Object.values(item).forEach(text => {
                var cell = document.createElement("td");
                var textNode = document.createTextNode(text);
                cell.appendChild(textNode);
                row.appendChild(cell);
            });
            tableBody.appendChild(row);
        });

        totalPrice = 0;
        cart.forEach(function (item) {
            totalPrice += item.price * item.quantity
        });
        localStorage.setItem('totalPrice', totalPrice);

        document.write("Your total is:" + totalPrice)

        function goIndex() {
            window.location.href = 'https://magnoliac.sgedu.site/enchanted_eats/index.php';
        }

        function goThankYou() {
            window.location.href = 'https://magnoliac.sgedu.site/enchanted_eats/thankyou.php';

        }
    </script>

    <br>
    <button type="button" class="continueShopping product-price-btn" onclick="goIndex()"> Continue Shopping </button>
    <button type="button" class="checkOut product-price-btn" onclick="goThankYou()"> Check Out </button>

</body>