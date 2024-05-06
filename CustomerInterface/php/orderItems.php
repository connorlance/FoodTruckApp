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
?>
      <form method="post" action="php/insertOrderItem.php">
        <div class="itemPriceQtyContainer">
          <!-- description and price form boxes -->
          <div class="itemDescription">
            <input type='text' name='description' value='<?php echo $row["description"]; ?>' readonly><br />
          </div>
          <div class="itemPrice">
            <input type='text' name='cost' value='$<?php echo $row["cost"]; ?>' readonly><br />
          </div>

          <!-- hidden variables for iid, oid, cost -->
          <input type='hidden' name='ID' value='<?php echo $row["iid"]; ?>'>
          <input type='hidden' name='oid' value='<?php echo $oid; ?>'>
          <input type='hidden' name='cost' value='<?php echo $row["cost"]; ?>'>

          <!-- buttons for - and + qty -->
          <div class="number-input">
            <input type="number" name="qty" id="qty<?php echo $row["iid"]; ?>" value="0" min="0" readonly>
            <button type="button" class="MinusButton" onclick="decrementMoreThanFive(<?php echo $row["iid"]; ?>)">-</button>
            <button type="button" class="PlusButton" onclick="incrementMoreThanFive(<?php echo $row["iid"]; ?>)">+</button>
          </div>

          <!-- hidden field for max quantity -->
          <input type="hidden" id="max_qty<?php echo $row["iid"]; ?>" value="<?php echo $row["qty"]; ?>">
          <!-- add qty of item to order -->
          <div class="itemPriceQtySubmit">
            <input type="submit" name="submit_forms" value="Add" class="customerOrderUpdateButton">
          </div>
        </div>
      </form>

    <?php
    }
  }
} else {
  echo "0 results";
}

//query item table for items with qty less than 5
$select = "SELECT * FROM item WHERE qty <= 5";
$result = $conn->query($select);

if ($result->num_rows > 0) {
  echo "<p style=\"margin-bottom: 0; margin-left: 1.2em;\"><span>Items Low in Stock:</span></p>";
  while ($row = $result->fetch_assoc()) {
    if ($row['qty'] > 0) {
      echo '<p style="color: red; margin: 0; margin-left: 12em; margin-bottom: .1em;">(Only ' . $row['qty'] . ' left)</p>';
    }
    if ($row["qty"] > 0) { // Check if qty is greater than 0
    ?>
      <form method="post" action="php/insertOrderItem.php">
        <div class="itemPriceQtyContainer2">
          <!-- description and price form boxes -->
          <div class="itemDescription2">
            <input type='text' name='description' value='<?php echo $row["description"]; ?>' readonly><br />
          </div>
          <div class="itemPrice2">
            <input type='text' name='cost' value='$<?php echo $row["cost"]; ?>' readonly><br />
          </div>

          <!-- hidden variables for iid, oid, cost -->
          <input type='hidden' name='ID' value='<?php echo $row["iid"]; ?>'>
          <input type='hidden' name='oid' value='<?php echo $oid; ?>'>
          <input type='hidden' name='cost' value='<?php echo $row["cost"]; ?>'>

          <!-- buttons for - and + qty -->
          <div class="number-input2">
            <input type="number" name="qty" id="qty<?php echo $row["iid"]; ?>" value="0" readonly>
            <button type="button" class="MinusButton" onclick="decrementLessThanFive(<?php echo $row["iid"]; ?>, <?php echo $row["qty"]; ?>)">-</button>
            <button type="button" class="PlusButton" onclick="incrementLessThanFive(<?php echo $row["iid"]; ?>, <?php echo $row["qty"]; ?>)">+</button>
          </div>

          <!-- add qty of item to order -->
          <div class="itemPriceQtySubmit2">
            <input type="submit" name="submit_forms" value="Add" class="customerOrderUpdateButton">
          </div>
        </div>
      </form>

<?php
    }
  }
} else {
  echo "0 results";
}
?>