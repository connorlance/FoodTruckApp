<?php
//connect to database
require_once 'C:\wamp64\www\FoodTruckApp/db_connection.php';

session_start();

//initilize variables 
$cname = $_POST['cname'];
$_SESSION['cname'] = $cname;
$lid = $_POST['location'];
$status = "pending";

//query name and arrival for sending to session variables
$query = "SELECT name, arrival FROM location WHERE lid='$lid'";
$result = $conn->query($query);

//initilize session variables
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $arrival = $row['arrival'];
    $_SESSION['name'] = $name;
    $_SESSION['arrival'] = $arrival;
} else {
    echo "error";
}
//query oid for session variable
$query = "SELECT oid FROM orders WHERE cname='$cname'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $oid = $row['oid'];
} else {
    echo "error";
}

//insert order to database
$query = "INSERT into orders (cname, lid, status) values('$cname', '$lid', '$status')";
$result = $conn->query($query);

//query order table for oid
if ($result) {
    // Retrieve the oid after insertion
    $oid_query = "SELECT oid FROM orders WHERE cname='$cname' AND lid='$lid' AND status='$status'";
    $oid_result = $conn->query($oid_query);
    if ($oid_result && $oid_result->num_rows > 0) {
        $oid_row = $oid_result->fetch_assoc();
        $_SESSION['oid'] = $oid_row['oid']; // Set the oid session variable
    } else {
        echo "Failed to retrieve oid";
    }
}


//send to next file
header("Location: ../chooseOrderItems.php");
