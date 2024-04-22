<?php
//connect to database
$servername = "localhost";
$username = "hci";
$password = "hci";
$dbname = "hci";
$conn = new mysqli($servername, $username, $password, $dbname);

    //get variable
    $oid = $_POST['oid'];

    //update order status to completed
    $select = "UPDATE orders SET status='completed' WHERE oid='$oid'";
    $result = $conn->query($select);

//go back to ready page
header("Location: ../ready.php");
exit();
?>