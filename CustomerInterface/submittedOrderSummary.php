<?php
//connect to database
require_once 'C:\wamp64\www\FoodTruckApp/db_connection.php';

//initilize session variable
session_start(); 
$oid = $_SESSION['oid'];

//query orers table to set status to open
$query = "UPDATE orders SET status='open'WHERE oid='$oid'";
$result = $conn->query($query);

//output order summary
echo "Your Order has been Submitted<br>";
echo "Order Summary:<br>";
include_once "php/orderSummary.php";
?>