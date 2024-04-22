<?php
//connect to database
$servername = "localhost";
$username = "hci";
$password = "hci";
$dbname = "hci";
$conn = new mysqli($servername, $username, $password, $dbname);

//initilize variables 
$oid = $_SESSION['oid'];
$name = $_SESSION['name'];
$arrival = $_SESSION['arrival'];
$cname = $_SESSION['cname'];
$totalCost = 0;

//echo info for order summary
echo "Order #: $oid<br>";
echo "Location: $name<br>";
echo "Arrival: $arrival<br>";
echo "Customer Name: $cname<br>";


//query order_items table using oid
$select = "SELECT * FROM order_items WHERE oid='$oid'";
$result = $conn->query($select);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    //create variables
    $iid = $row['iid'];
    $qty = $row['qty']; 

    //query item for description using iid
    $selectDescription = "SELECT description, cost FROM item WHERE iid='$iid'";
    $resultDescription = $conn->query($selectDescription);

    if ($resultDescription->num_rows > 0) {
      while ($rowDescription = $resultDescription->fetch_assoc()) {
        //create variables
        $description = $rowDescription['description'];
        $cost = $rowDescription['cost'];
        
        //sum the cost of each item
        for ($i = 0; $i < $qty; $i++) {
          echo "Item: $description  |  Cost: $cost<br>";
          $totalCost += $cost; 
        }
      }
    } 
  }
  //output totalCost
  echo "Total: $$totalCost"; 

  //add totalCost to orders table
  $query = "UPDATE orders SET totalCost='$totalCost' WHERE oid='$oid'";
  $result = $conn->query($query);
} else {
}