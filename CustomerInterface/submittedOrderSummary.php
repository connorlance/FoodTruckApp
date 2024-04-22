<?php
session_start(); // Start the session
$servername = "localhost";
$username = "hci";
$password = "hci";
$dbname = "hci";
$conn = new mysqli($servername, $username, $password, $dbname);

$oid = $_SESSION['oid'];

$query = "UPDATE orders SET status='open'WHERE oid='$oid'";
   $result = $conn->query($query);

echo "Your Order has been Submitted<br>";
echo "Order Summary:<br>";
include_once "php/orderSummary.php";
?>