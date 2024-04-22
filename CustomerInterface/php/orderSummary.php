<?php
$servername = "localhost";
$username = "hci";
$password = "hci";
$dbname = "hci";
$conn = new mysqli($servername, $username, $password, $dbname);

$oid = $_SESSION['oid'];
$name = $_SESSION['name'];
$arrival = $_SESSION['arrival'];
$cname = $_SESSION['cname'];

$totalCost = 0; // Initialize total cost variable

echo "Order #: $oid<br>";
echo "Location: $name<br>";
echo "Arrival: $arrival<br>";
echo "Customer Name: $cname<br>";

$select = "SELECT * FROM order_items WHERE oid='$oid'";
$result = $conn->query($select);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $iid = $row['iid'];
    $qty = $row['qty']; // Retrieve quantity from the order_items table

    $selectDescription = "SELECT description, cost FROM item WHERE iid='$iid'";
    $resultDescription = $conn->query($selectDescription);

    if ($resultDescription->num_rows > 0) {
      while ($rowDescription = $resultDescription->fetch_assoc()) {
        $description = $rowDescription['description'];
        $cost = $rowDescription['cost'];
        
        // Repeat item details based on quantity
        for ($i = 0; $i < $qty; $i++) {
          echo "Item: $description  |  Cost: $cost<br>";
          $totalCost += $cost; // Add cost to total
        }
      }
    } 
  }
  echo "Total: $$totalCost"; // Output total cost
} else {
  
}


