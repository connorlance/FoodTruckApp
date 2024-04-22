<script src="../../js/script.js"></script>
<?php
//connect to database
$servername = "localhost";
$username = "hci";
$password = "hci";
$dbname = "hci";
$conn = new mysqli($servername, $username, $password, $dbname);

//query orders table for orders with ready status ascending by lid
$select = "SELECT * FROM orders WHERE status='ready' ORDER BY lid ASC";
$result = $conn->query($select);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        //create variables
        $oid = $row['oid']; 
        $lid = $row['lid']; 

        ////form for order buttons
        echo "<form method='post' action='php/expandedOrderReady.php'>";

        //hidden variables
        echo "<input type='hidden' name='oid' value='$oid'>";
        echo "<input type='hidden' name='lid' value='$lid'>";

        //button styling
        echo "<div class='order-container' style='margin-top: 6px;'>"; 
        echo "<button type='submit' class='ButtonClassWhite order-button' style='width: 420px; font-size: 15px; text-align: right;'>"; // Start order button with styles
        echo "<span style='float: left; display: inline-block;'>#" . $lid . " | </span>";
        echo "<div style='display: inline-block;'>";

        //query order_items table using oid
        $select2 = "SELECT * FROM order_items WHERE oid='$oid'";
        $result2 = $conn->query($select2);

        if ($result2->num_rows > 0) {
            //create array
            $items = array();

            while ($row2 = $result2->fetch_assoc()) {
                //create variables
                $qty = $row2['qty'];
                $iid = $row2['iid'];

                //query item table using iid
                $select3 = "SELECT * FROM item WHERE iid='$iid'";
                $result3 = $conn->query($select3);

                if ($result3->num_rows > 0) {
                    while ($row3 = $result3->fetch_assoc()) {

                        //create qty + description 
                        $item = $qty . " " . $row3['description'];

                        //add $item to array
                        $items[] = $item;
                    }
                } else {
                    echo "error";
                }
            }

            //style order buttons to be inline-block, implode items together to add & between items
            echo "<div style='display: inline-block; margin-right: 10px;'>";
            echo " " . implode(" & ", $items) . "\n";
            echo "</div>";
            echo "<br>";
        } else {
            echo "error";
        }
        echo "</div>"; 

        //form for X button
        echo "</form>";
        echo "<form method='post' action='php/orderCompleted.php' style='display: inline-block;'>";
        echo "<input type='hidden' name='oid' value='$oid'>";
        echo "<button type='submit' class='ButtonClassWhite x-button' style='margin-left: 4px;'>"; 
        echo "<span style='font-size: 20px;'>&times;</span>";
        echo "</button>"; 
        echo "</form>"; 
        echo "</div>"; 
        echo "</form>";
    }
} else {
    echo "0 results";
}
?>