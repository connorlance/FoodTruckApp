<?php
$servername = "localhost";
$username = "hci";
$password = "hci";
$dbname = "hci";
$conn = new mysqli($servername, $username, $password, $dbname);

$iid = $_POST['ID'];
$qty = $_POST['qty'];
$cost = $_POST['cost'];

session_start();
$oid = $_SESSION['oid'];

$query = "INSERT INTO order_items (oid, iid, qty, cost) VALUES ('$oid', '$iid', '$qty', '$cost')";
$result = $conn->query($query);

if ($result) {
    header("Location: ../chooseOrderItems.php");
    exit;
} else {
    echo "Error: " . $conn->error;
}

?>