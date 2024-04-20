<?php
$servername = "localhost";
$username = "hci";
$password = "hci";
$dbname = "hci";

$description = $_POST['description'];
$quantity = $_POST['quantity'];

$query = "INSERT into item (description, qty) values('$description', '$quantity')";

$conn = new mysqli($servername, $username, $password, $dbname);

$result = $conn->query($query);
header("Location: ../inventory.php");
exit;
?>