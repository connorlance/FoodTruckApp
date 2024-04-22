<?php
//connect to database
$servername = "localhost";
$username = "hci";
$password = "hci";
$dbname = "hci";
$conn = new mysqli($servername, $username, $password, $dbname);

//get variables
$description = $_POST['description'];
$quantity = $_POST['quantity'];
$cost = $_POST['cost'];

//insert row into item
$query = "INSERT into item (description, qty, cost) values('$description', '$quantity', '$cost')";
$result = $conn->query($query);
header("Location: ../inventory.php");
exit;
?>