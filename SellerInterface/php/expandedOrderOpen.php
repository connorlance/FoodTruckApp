<?php
//connect to database
$servername = "localhost";
$username = "hci";
$password = "hci";
$dbname = "hci";
$conn = new mysqli($servername, $username, $password, $dbname);

//get variables
$oid = $_POST['oid'];
$lid = $_POST['lid'];

//query orders, order_items, location tables using oid and iid
$select = "SELECT orders.*, order_items.*, location.*
FROM orders
JOIN order_items ON orders.oid = order_items.oid
JOIN location ON orders.lid = location.lid
WHERE orders.oid = '$oid' AND location.lid = '$lid'";
$result = $conn->query($select);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    //output location name, order #, customer name
    echo $row['name'] . " ";
    echo "Order #" . $oid . " ";
    echo "(" . $row['cname'] . ")";

    //form for X button
    echo "<form method='post' action='orderReady.php' style='display: inline-block;'>";
    echo "<input type='hidden' name='oid' value='$oid'>";
    echo "<button type='submit' class='ButtonClassWhite x-button' style='margin-left: 4px;'>";
    echo "<span style='font-size: 20px;'>&times;</span>";
    echo "</button>";
    echo "</form>";

    echo "<br>";

    //output qty
    echo "Qty: ";

    //output total cost for order
    echo "<br>Total: $" . $row['totalCost'];

    //query order_items, item tables using oid
    $select2 = "SELECT order_items.qty, item.description 
                FROM order_items 
                INNER JOIN item ON order_items.iid = item.iid 
                WHERE order_items.oid='$oid'";
    $result2 = $conn->query($select2);

    //output each qty and description for order
    if ($result2->num_rows > 0) {
        while ($row2 = $result2->fetch_assoc()) {
            echo "<br>";
            echo $row2['qty'] . " ";
            echo $row2['description'];
        }
    }
} else {
    echo "0 results";
}