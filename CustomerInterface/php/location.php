<?php
$servername = "localhost";
$username = "hci";
$password = "hci";
$dbname = "hci";
$conn = new mysqli($servername, $username, $password, $dbname);

$select = "SELECT * FROM location";

$result = $conn->query($select);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    echo '<div class="locationButtons">';
    echo '<label class="ButtonClassWhite">';
    echo "<input type='radio' name='location' value='" . $row["name"] . "'>";
    echo "<input type='hidden' name='lid' value= '" . $row["lid"] . "'>";
    echo $row["name"];
    echo '</label>';
    echo '</div>';
  }
} else {
  echo "0 results";
}
?>