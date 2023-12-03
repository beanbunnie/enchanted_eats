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
    <h1> Thank you for your order </h1>
    <php? ?>

        <script>
            cart = JSON.parse(localStorage.getItem('cart'));

            if (localStorage.getItem('order_id') === null) {
                localStorage.setItem('order_id', 1)
            } else {
                localStorage.setItem('order_id', parseInt(localStorage.getItem('order_id')) + 1)
            }

            totalPrice = localStorage.getItem('totalPrice')
            order_id = localStorage.getItem('order_id')

            const currentDate = new Date();

            itemsString = ''
            cart.forEach(function (item) {
                itemsString += "Name: " + item.name
                itemsString += "   Cost: $" + parseInt(item.price) * parseInt(item.quantity)
                itemsString += "   Quantity: " + item.quantity + "________"
            })

            request = new XMLHttpRequest()
            request.open("POST", "savaData.php", true)
            request.setRequestHeader("Content-type", "application/json")
            request.send(JSON.stringify({
                id: order_id,
                items: itemsString,
                date: currentDate.getDate() + "/" + currentDate.getDate() + "/" + currentDate.getFullYear(),
                total: "$" + totalPrice,
            }))

            currentDate.setDate(currentDate.getDate() + 2);
            var day = currentDate.getDate()
            var month = currentDate.getMonth()
            var year = currentDate.getFullYear()
            document.write("<h2> Your order will arrive in two days, on " + day + "/" + month + "/" + year + "</h2>")

            cart = localStorage.setItem('cart', '')

        </script>
</body>