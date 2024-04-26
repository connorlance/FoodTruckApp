<script src="../../js/script.js"></script>
<?php
//connect to database
require_once 'C:\wamp64\www\FoodTruckApp/db_connection.php';

//query item table for items with qty more than 5
$select = "SELECT * FROM item WHERE qty > 5";
$result = $conn->query($select);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    if ($row["qty"] > 0) { // Check if qty is greater than 0
      //create forms for adding items to order
      echo '<form method="post" action="php/insertOrderItem.php" style="display: inline-block; margin-right: 10px;">'; 

      //description and price form boxes
      echo "Description: <input type='text' name='description' value= '" . $row["description"] . "' readonly><br/>\n";
      echo "Price: <input type='text' name='cost' value= '" . $row["cost"] . "' readonly><br/>\n";

      //hidden variables for iid, oid, cost
      echo "<input type='hidden' name='ID' value= '" . $row["iid"] . "'>";
      echo "<input type='hidden' name='oid' value= '$oid'>";
      echo "<input type='hidden' name='cost' value= '" . $row["cost"] . "'>";

      //buttons for - and + qty
      echo '<div class="number-input" style="display: inline-block;">';
      echo 'Qty: <input type="number" name ="qty" id="qty'.$row["iid"].'" value="0" min="0" readonly>';
      echo '<button type="button" class="ButtonClassBlue2" style="margin-left: 10px;" onclick="decrementMoreThanFive('.$row["iid"].')">-</button>'; 
      echo '<button type="button" class="ButtonClassBlue2" onclick="incrementMoreThanFive('.$row["iid"].')">+</button>'; 
      echo '</div>';
      
      // hidden field for max quantity
      echo '<input type="hidden" id="max_qty'.$row["iid"].'" value="'.$row["qty"].'">';
   
      //add qty of item to order
      echo '<input type="submit" name="submit_forms" value="Add to Order" class="ButtonClassBlue2" style="margin-left: 10px;">'; 
      echo "</form>\n";
    }
  }
} else {
  echo "0 results";
}

//query item table for items with qty less than 5
$select = "SELECT * FROM item WHERE qty <= 5";
$result = $conn->query($select);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    if ($row["qty"] > 0) { // Check if qty is greater than 0
      //create forms for adding items to order
      echo '<form method="post" action="php/insertOrderItem.php" style="display: inline-block; margin-right: 10px;">'; 

      //description and price form boxes
      echo "Description: <input type='text' name='description' value= '" . $row["description"] . "' readonly><br/>\n";
      echo "Price: <input type='text' name='cost' value= '" . $row["cost"] . "' readonly><br/>\n";

      //hidden variables for iid, oid, cost
      echo "<input type='hidden' name='ID' value= '" . $row["iid"] . "'>";
      echo "<input type='hidden' name='oid' value= '$oid'>";
      echo "<input type='hidden' name='cost' value= '" . $row["cost"] . "'>";

      //buttons for - and + qty
      echo '<div class="number-input" style="display: inline-block;">';
      echo 'Qty: <input type="text" name="qty" id="qty'.$row["iid"].'" value="0 (Only '.$row['qty'].' left)" readonly style="color: red;">';
      echo '<button type="button" class="ButtonClassBlue2" style="margin-left: 10px;" onclick="decrementLessThanFive('.$row["iid"].', '.$row["qty"].')">-</button>';
      echo '<button type="button" class="ButtonClassBlue2" onclick="incrementLessThanFive('.$row["iid"].', '.$row["qty"].')">+</button>';
      echo '</div>';
     
      //add qty of item to order
      echo '<input type="submit" name="submit_forms" value="Add to Order" class="ButtonClassBlue2" style="margin-left: 10px;">'; 
      echo "</form>\n";
    }
  }
} else {
  echo "0 results";
}
?>

