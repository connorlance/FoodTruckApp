<?php
//connect to database
require_once 'C:\wamp64\www\FoodTruckApp/db_connection.php';

//initilize session variable
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$oid = isset($_SESSION['oid']) ? $_SESSION['oid'] : null;
$name = isset($_SESSION['name']) ? $_SESSION['name'] : '';
$arrival = isset($_SESSION['arrival']) ? $_SESSION['arrival'] : '';
$cname = isset($_SESSION['cname']) ? $_SESSION['cname'] : '';
$totalCost = 0;

//query orers table to set status to open
$query = "UPDATE orders SET status='open'WHERE oid='$oid'";
$result = $conn->query($query);

echo '<body style="background-color: #dddddd;">';
echo '<div style="font-size: 3em; text-align: center; border-bottom: 1px solid black;">Order Submitted</div>';
echo "<div id='cartTitle_container'>";
echo "</div>";

// Echo info for order summary
echo '<div style="text-align: center; font-size: 1.5em; border-bottom: 1px solid black;">';
echo "Order #: $oid<br>";
echo "Location: $name<br>";
echo "Arrival: $arrival<br>";
echo "Customer Name: $cname<br>";
echo '</div>';

// Echo header row for item details
echo '<div style="text-align: center; font-size: 1.5em; border-bottom: 1px solid black;">Item | Qty | Cost</div>';

// Query order_items table using oid
$select = "SELECT * FROM order_items WHERE oid='$oid'";
$result = $conn->query($select);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Create variables
        $iid = $row['iid'];
        $qty = $row['qty'];

        // Query item for description using iid
        $selectDescription = "SELECT description, cost FROM item WHERE iid='$iid'";
        $resultDescription = $conn->query($selectDescription);

        if ($resultDescription->num_rows > 0) {
            // Fetch the item details (should be only one since iid is unique)
            $rowDescription = $resultDescription->fetch_assoc();

            // Create variables
            $description = $rowDescription['description'];
            $cost = $rowDescription['cost'];

            // Output the item and its total cost based on quantity
            echo '<div style="text-align: center; font-size: 1.5em;">' . $description . ' | ' . $qty . ' | $' . ($cost * $qty) . '</div>';

            // Add the total cost of this item and its quantity to the overall total
            $totalCost += $cost * $qty;
        }
    }
    // Output totalCost
    echo '<div style="text-align: center; margin-left: 0.5em; font-size: 1.5em; border-top: 1px solid black; border-bottom: 1px solid black;">Total: $' . $totalCost . '</div>';

    // Add totalCost to orders table
    $query = "UPDATE orders SET totalCost='$totalCost' WHERE oid='$oid'";
    $result = $conn->query($query);
} else {
}

echo '</body>';
