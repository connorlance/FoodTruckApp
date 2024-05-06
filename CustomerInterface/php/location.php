<?php
//connect to database
require_once 'C:\wamp64\www\FoodTruckApp/db_connection.php';

//query location table
$select = "SELECT * FROM location";
$result = $conn->query($select);

//create location radio buttons
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo '<div class="locationButtons">';
    echo '<label class="locationButton">';
    echo "<input type='radio' name='location' value='" . $row["lid"] . "'>";
    echo $row["name"] . "     |     " . $row["arrival"];
    echo '</label>';
    echo '</div>';
  }
} else {
  echo "0 results";
}
