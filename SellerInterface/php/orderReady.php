<?php
//connect to database
$servername = "localhost";
$username = "hci";
$password = "hci";
$dbname = "hci";
$conn = new mysqli($servername, $username, $password, $dbname);

    //get variable
    $oid = $_POST['oid'];

    //update order status to ready
    $select = "UPDATE orders SET status='ready' WHERE oid='$oid'";
    $result = $conn->query($select);

//go back to open page
header("Location: ../open.php");
exit();
?>