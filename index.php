<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="index.css">
  <link href="https://fonts.googleapis.com/css?family=Bentham|Playfair+Display|Raleway:400,500|Suranna|Trocchi"
    rel="stylesheet">
  <title>Products</title>
</head>

<body>

  <div class="header">
    <img src="logo.png" alt="Logo">

    <a href="cart.php">cart</a>
    <a href="orders.php">orders</a>
    <a href="index.php">products</a>
  </div>

</body>

<?php
$servername = "localhost";
$username = "u3qjwfow9lr4m";
$password = "Aquarium123!";
$dbname = "db4mbanoqqeatu";

$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM products";
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
  string = ''

  for (var i in json_data) {
    var dish = json_data[i]
    string = '<div class="wrapper">\
      <div class="product-img"> <img src="' + dish["image"] + '"height="420" width="327"></div>' +
      '<div class="product-info"> <div class="product-text"><h1>' + dish["name"] + '</h1>' +
      '<span><h2>$' + dish["price"] + '</h2>' +
      '<button class="moreButton">More...</button></span>' +
      '<p class = "moreText" style = "display: none;">' + dish["description"] + '</p></div>' +
      '<div class="product-price-btn"> <select name="quantity" id="quantity">' + generateOptions() + '</select>' +
      '<button type="button" class ="addCart">Add to Cart</button></div></div></div>';
    document.write(string);
  }

  function generateOptions() {
    string = ''
    for (var i = 1; i <= 20; i++) {
      string += "<option value" + i + "selected>" + i + "</option>"
    }
    return string
  }
  function showParagraph(event) {
    var container = event.target.closest('.wrapper');
    event.target.style.display = 'none';
    container.querySelector('.moreText').style.display = 'block';
  }

  var buttons = document.querySelectorAll('.moreButton');
  buttons.forEach(function (button) {
    button.addEventListener('click', showParagraph);
  });

  function getCart() {
    const cart = localStorage.getItem('cart');
    return cart ? JSON.parse(cart) : [];
  }

  function addToCart(product) {
    let cart = getCart();
    const existingProduct = cart.find(item => item.name === product.name);
    if (existingProduct) {
      existingProduct.quantity += product.quantity;
    } else {
      cart.push(product);
    }
    localStorage.setItem('cart', JSON.stringify(cart));
    console.log(JSON.stringify(cart));
    window.location.href = 'https://magnoliac.sgedu.site/enchanted_eats/cart.php';
  }

  var buttons = document.querySelectorAll('.addCart');
  buttons.forEach(function (button) {
    button.addEventListener('click', addItem);
  });

  function addItem(event) {
    var container = event.target.closest('.wrapper');
    addToCart({
      name: container.querySelector('h1').innerText,
      price: parseInt(container.querySelector('h2').innerText.substring(1)),
      quantity: parseInt(container.querySelector('select').value),
    })
  }

</script>

</html>