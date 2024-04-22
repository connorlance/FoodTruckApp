<?php
//connect to database
$servername = "localhost";
$username = "hci";
$password = "hci";
$dbname = "hci";
$conn = new mysqli($servername, $username, $password, $dbname);
session_start();

//initilize variables 
$iid = $_POST['ID'];
$qty = $_POST['qty'];
$cost = $_POST['cost'];
$oid = $_SESSION['oid'];

//insert an order using order ID
$query = "INSERT INTO order_items (oid, iid, qty, cost) VALUES ('$oid', '$iid', '$qty', '$cost')";
$result = $conn->query($query);

//send back to choose order items file
if ($result) {
    header("Location: ../chooseOrderItems.php");
    exit;
} else {
    echo "Error: " . $conn->error;
}
?>