<?php
ob_start();
//connect to database
require_once 'C:\wamp64\www\FoodTruckApp/db_connection.php';



// Check if the form is submitted for updating inventory
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_forms'])) {

  //create variables
  $description = $_POST['item'];
  $quantity = $_POST['quantity'];
  $ID = $_POST['ID'];

  // Update item table with qty and description using iid
  $query = "UPDATE item SET qty='$quantity', description='$description' WHERE iid='$ID'";
  $result = $conn->query($query);

  // Redirect back to inventory page
  header("Location: http://localhost/FoodTruckApp/SellerInterface/inventory.php");
  exit;
}
//query item table order by qty
$select = "SELECT * FROM item ORDER BY qty";
$result = $conn->query($select);

//create boolean variable
$ItemQtyTitle = false;


if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    // Create form for updating inventory
    echo '<form method="post" action="' . htmlspecialchars($_SERVER["PHP_SELF"]) . '">';

    // Create variables
    $itemId = $row["iid"];
    $quantity = $row["qty"];

    // Set qty color to red if qty < 5
    $color = ($quantity <= 5) ? 'red' : 'black';
    $restocking = ($quantity < 5) ? true : false;

    // Output Item and Qty titles once
    if ($ItemQtyTitle == false) {
      echo "<div id='InventoryUpdateItemQtyTitle_container'>";
      echo "<div id='InventoryUpdateItemQtyTitle_item'>";
      echo "Item";
      echo "</div>";
      echo "<div id='InventoryUpdateItemQtyTitle_qty'>";
      echo "Qty";
      echo "</div>";
      echo "</div>";
      $ItemQtyTitle = true;
    }

    // Create description, qty text boxes
    echo "<div id='InventoryUpdateItemQty_container'>";

    echo "<div id='InventoryUpdateDescription'>";
    echo "<input type='text' name='item' value= '" . $row["description"] . "'readonly>";
    echo "</div>";

    echo "<div id='InventoryUpdateQty'>";
    echo "<input type='text' id='qty" . $itemId . "' name='quantity' value= '" . $quantity . "'style='color: " . $color . ";'>";
    echo "</div>";

    // Hidden variable
    echo "<input type='hidden' name='ID' value= '" . $itemId . "'>";

    // Minus button
    echo "<div id='MinusButton'>";
    echo '<button type="button" class="MinusButton" onclick="decrement(' . $itemId . ')" class="decrement-btn">-</button>';
    echo "</div>";

    // Plus button
    echo "<div id='PlusButton'>";
    echo '<button type="button" class="PlusButton" onclick="increment(' . $itemId . ')" class="increment-btn">+</button>';
    echo "</div>";

    // Update button
    echo "<div id='UpdateInventoryQtySubmitButton'>";
    echo '<input type="submit" name="submit_forms" value="Update" class="UpdateButton">';
    echo "</div>";

    echo "</form>"; // Close the form for each iteration
    echo "</div>"; // Close InventoryUpdateItemQty_container
  }
} else {
  echo "0 results";
}
$conn->close();
