<!DOCTYPE html>
<html>

<?php
$servername = "localhost";
$username = "u3qjwfow9lr4m";
$password = "Aquarium123!";
$dbname = "db4mbanoqqeatu";
$conn = new mysqli($servername, $username, $password, $dbname);

$json = file_get_contents('php://input');
$data = json_decode($json);


$sql = "INSERT INTO `orders` (`id`, `items`, `date`, `total`) VALUES ($data->id, '$data->items','$data->date','$data->total')";
if ($conn->query($sql) === TRUE) {
    echo "new record created";

} else {
    echo " $conn->error ";
}

$conn->close();

?>

</html>