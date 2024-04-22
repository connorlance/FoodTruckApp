<?php
$servername = "localhost";
$username = "hci";
$password = "hci";
$dbname = "hci";
$conn = new mysqli($servername, $username, $password, $dbname);

session_start();

$cname = $_POST['cname'];
$_SESSION['cname'] = $cname;
$lid = $_POST['lid'];
$status = "pending";

$query="SELECT name, arrival FROM location WHERE lid='$lid'";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $arrival = $row['arrival'];

    $_SESSION['name'] = $name;
    $_SESSION['arrival'] = $arrival;
} else {
    echo "error";
}

$query = "INSERT into orders (cname, lid, status) values('$cname', '$lid', '$status')";
$result = $conn->query($query);

$query="SELECT oid FROM orders WHERE cname='$cname'";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $oid = $row['oid'];
    $_SESSION['oid'] = $oid;
    
} else {
    echo "error";
}
header("Location: ../chooseOrderItems.php");
?>
