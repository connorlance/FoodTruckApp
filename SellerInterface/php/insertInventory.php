<?php
//connect to database
require_once 'C:\wamp64\www\FoodTruckApp/db_connection.php';

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