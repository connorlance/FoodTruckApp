<script src="../../js/script.js"></script>
<?php
$servername = "localhost";
$username = "hci";
$password = "hci";
$dbname = "hci";
$conn = new mysqli($servername, $username, $password, $dbname);






$select = "SELECT * FROM orders ORDER BY oid ASC";
$result = $conn->query($select);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Output order ID with #
        echo "<div style='display: inline-block; margin-right: 10px;'>";
        echo "#" . $row['oid'];
        echo "</div>";
        $oidCurrent = $row['oid'];

        $select2 = "SELECT * FROM order_items WHERE oid='$oidCurrent'";
        $result2 = $conn->query($select2);

        if ($result2->num_rows > 0) {
            // Initialize an empty array to store item descriptions and quantities
            $items = array();

            while ($row2 = $result2->fetch_assoc()) {
                $qty = $row2['qty'];
                $iidCurrent = $row2['iid'];

                $select3 = "SELECT * FROM item WHERE iid='$iidCurrent'";
                $result3 = $conn->query($select3);
                if ($result3->num_rows > 0) {
                    while ($row3 = $result3->fetch_assoc()) {
                        // Store item quantity and description in the array
                        $item = $qty . " " . $row3['description'];
                        $items[] = $item;
                    }
                } else {
                    echo "error";
                }
            }

            // Output item descriptions separated by &
            echo "<div style='display: inline-block; margin-right: 10px;'>";
            echo " " . implode(" & ", $items) . "\n";
            echo "</div>";
            echo "<br>";
        } else {
            echo "error";
        }
    }
} else {
    echo "0 results";
}
?>