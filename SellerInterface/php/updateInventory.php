<?php
//connect to database
$servername = "localhost";
$username = "hci";
$password = "hci";
$dbname = "hci";
$conn = new mysqli($servername, $username, $password, $dbname);

//query item table order by qty
$select = "SELECT * FROM item ORDER BY qty";
$result = $conn->query($select);

//create boolean variable
$restockingDisplayed = false;

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    //create form for updating inventory
    echo '<form method="post" action="php/updateInventoryDB.php">';

    //create variables
    $itemId = $row["iid"];
    $quantity = $row["qty"];

    //set qty color to red if qty < 5
    $color = ($quantity < 5) ? 'red' : 'black';
    $restocking = ($quantity < 5) ? true : false;

    //output red if restocking = true, only 1 time
    if ($restocking && !$restockingDisplayed) {
      echo "<p style='color: red;'>Restocking</p>";
      $restockingDisplayed = true;
    }
    
    //create description, qty text boxes
    echo "Item: <input type='text' name='item' value= '" . $row["description"] . "'readonly style='width: 100px;'>";
    echo "Qty: <input type='text' id='qty" . $itemId . "' name='quantity' value= '" . $quantity . "' style='color: " . $color . "; width: 20px;'>";

    //hidden variable
    echo "<input type='hidden' name='ID' value= '" . $itemId . "'>";

    echo " ";

    //- and + buttons
    echo '<button type="button" class="ButtonClassBlue2" onclick="decrement(' . $itemId . ')" class="decrement-btn">-</button>';
    echo '<button type="button" class="ButtonClassBlue2" onclick="increment(' . $itemId . ')" class="increment-btn">+</button>';

    echo " ";

    //update button
    echo '<input type="submit" name="submit_forms" value="Update" class="ButtonClassBlue2">';
    echo "</form>\n";
  }
} else {
  echo "0 results";
}
?>