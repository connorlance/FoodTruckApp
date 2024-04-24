<?php
//connect to database
require_once 'C:\wamp64\www\FoodTruckApp/db_connection.php';

session_start();

//initilize variables 
$iid = $_POST['ID'];
$qty = $_POST['qty'];
$cost = $_POST['cost'];
$oid = $_SESSION['oid'];

//insert an order using order ID
$query = "INSERT INTO order_items (oid, iid, qty, cost) VALUES ('$oid', '$iid', '$qty', '$cost')";
$result = $conn->query($query);

//subtract qty of order_item from item table
$query = "SELECT qty FROM item WHERE iid='$iid'";
$result = $conn->query($query);
if($result) {
    $row = $result->fetch_assoc();
    $currentQty = $row['qty'];
    $newQty = $currentQty - $qty;
} else {
}

//update qty in item table
$query = "UPDATE item SET qty='$newQty' WHERE iid='$iid'";
$result = $conn->query($query);

//send back to choose order items file
if ($result) {
    header("Location: ../chooseOrderItems.php");
    exit;
} else {
    echo "Error: " . $conn->error;
}
?>