<?php
//connect to database
$servername = "localhost";
$username = "hci";
$password = "hci";
$dbname = "hci";
$conn = new mysqli($servername, $username, $password, $dbname);

//query location table
$select = "SELECT * FROM location";
$result = $conn->query($select);

//create location radio buttons
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo '<div class="locationButtons">';
    echo '<label class="ButtonClassWhite">';
    echo "<input type='radio' name='location' value='" . $row["lid"] . "'>"; 
    echo $row["name"];
    echo '</label>';
    echo '</div>';
  }
} else {
  echo "0 results";
}