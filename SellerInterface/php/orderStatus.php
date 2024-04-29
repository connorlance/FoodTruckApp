<?php
//connect to database
require_once 'C:\wamp64\www\FoodTruckApp/db_connection.php';

//get variable
$oid = $_POST['oid'];

//Select status from orders
$select = "SELECT status FROM orders WHERE oid='$oid'";
$result = $conn->query($select);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $status = $row['status'];

    // Update order status to ready and back to open page
    if ($status == 'open') {
        $update = "UPDATE orders SET status='ready' WHERE oid='$oid'";
        $conn->query($update);
        header("Location: ../open.php");
        exit();

        // Update order status to completed and back to ready page
    } else if ($status == 'ready') {
        $update = "UPDATE orders SET status='completed' WHERE oid='$oid'";
        $conn->query($update);
        header("Location: ../ready.php");
        exit();
    }
}
