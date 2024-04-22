<script src="../../js/script.js"></script>
<?php
//connect to database
$servername = "localhost";
$username = "hci";
$password = "hci";
$dbname = "hci";
$conn = new mysqli($servername, $username, $password, $dbname);

//query item table
$select = "SELECT * FROM item";
$result = $conn->query($select);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
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
    echo '<button type="button" class="ButtonClassBlue2" style="margin-left: 10px;" onclick="decrement('.$row["iid"].')">-</button>'; 
    echo '<button type="button" class="ButtonClassBlue2" onclick="increment('.$row["iid"].')">+</button>'; 
    echo '</div>';
 
    //add qty of item to order
    echo '<input type="submit" name="submit_forms" value="Add to Order" class="ButtonClassBlue2" style="margin-left: 10px;">'; 
    echo "</form>\n";
  }
} else {
  echo "0 results";
}
?>