<?php
$servername = "localhost";
$username = "hci";
$password = "hci";
$dbname = "hci";
$conn = new mysqli($servername, $username, $password, $dbname);

$description = $_POST['description'];
$quantity = $_POST['quantity'];
$cost = $_POST['cost'];

$query = "INSERT into item (description, qty, cost) values('$description', '$quantity', '$cost')";
$result = $conn->query($query);
header("Location: ../inventory.php");
exit;
?>