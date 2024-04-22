<?php
$servername = "localhost";
$username = "hci";
$password = "hci";
$dbname = "hci";

$conn = new mysqli($servername, $username, $password, $dbname);

$select = "SELECT * FROM item ORDER BY qty";

$result = $conn->query($select);
$restockingDisplayed = false;

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo '<form method="post" action="php/updateInventoryDB.php">';

    $quantity = $row["qty"];
    $color = ($quantity < 5) ? 'red' : 'black';
    $restocking = ($quantity < 5) ? true : false;

    if ($restocking && !$restockingDisplayed) {
      echo "<p style='color: red;'>Restocking</p>";
      $restockingDisplayed = true;
    }
    
    echo "Item: <input type='text' name='item' value= '" . $row["description"] . "'readonly>";
    echo "Qty: <input type='text' name='quantity' value= '" . $quantity . "' style='color: " . $color . ";'><br/>\n";
    echo "<input type='hidden' name='ID' value= '" . $row["iid"] . "'>";
    echo '<input type="submit" name="submit_forms" value="Update" class="ButtonClassBlue2">';
    echo "</form>\n";
  }
} else {
  echo "0 results";
}
?>