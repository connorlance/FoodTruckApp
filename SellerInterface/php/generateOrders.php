<script src="../../js/script.js"></script>
<?php
//connect to database
require_once 'C:\wamp64\www\FoodTruckApp/db_connection.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

//get variable
$orderType = $_SESSION['orderType'];
$page = $_SESSION['page'];
$select = $_SESSION['select'];

$result = $conn->query($select);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        //create variables
        $oid = $row['oid'];
        $lid = $row['lid'];
        $status = $row['status'];

        //forms for daysales
        if ($page == 'daySales') {
            if ($status == 'ready') {
                //generate forms for order buttons
                echo "<form method='post' action='php/expandedOrder.php'>";
                echo "<input type='hidden' name='oid' value='$oid'>";
                echo "<input type='hidden' name='lid' value='$lid'>";

                //ready order buttons set to green
                echo "<button type='submit' class='ButtonClassGreen' style='width: 420px; font-size: 15px; text-align: right;' class='orderButton'>";
                echo "<span style='float: left; display: inline-block;'>#" . $lid . " | </span>";
                echo "<div style='display: inline-block;'>";
            } else if ($status == 'completed') {
                //form for order buttons
                echo "<form method='post' action='php/expandedOrder.php'>";

                //hidden variables
                echo "<input type='hidden' name='oid' value='$oid'>";
                echo "<input type='hidden' name='lid' value='$lid'>";

                //button styling
                echo "<div class='order-container' style='margin-top: 6px;'>";
                echo "<button type='submit' class='ButtonClassWhite order-button' style='width: 420px; font-size: 15px; text-align: right;'>";
                echo "<span style='float: left; display: inline-block;'>#" . $lid . " | </span>";
                echo "<div style='display: inline-block;'>";
            }

            //forms for open and ready
        } else if ($page == 'open' || $page == 'ready') {
            //form for order buttons
            echo "<form method='post' action='php/expandedOrder.php'>";

            //hidden variables
            echo "<input type='hidden' name='oid' value='$oid'>";
            echo "<input type='hidden' name='lid' value='$lid'>";

            //button styling
            echo "<div class='order-container' style='margin-top: 6px;'>";
            echo "<button type='submit' class='ButtonClassWhite order-button' style='width: 420px; font-size: 15px; text-align: right;'>";
            echo "<span style='float: left; display: inline-block;'>#" . $lid . " | </span>";
            echo "<div style='display: inline-block;'>";
        }

        //query order_items table using oid
        $select2 = "SELECT * FROM order_items WHERE oid='$oid'";
        $result2 = $conn->query($select2);

        if ($result2->num_rows > 0) {
            //create array
            $items = array();

            while ($row2 = $result2->fetch_assoc()) {
                //get variables
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
        echo "</button>";
        echo "</form>";

        //form for X button
        if ($page == 'open' || $page == 'ready') {
            echo "<form method='post' action='php/orderStatus.php' style='display: inline-block;'>";
            echo "<input type='hidden' name='oid' value='$oid'>";
            echo "<button type='submit' class='ButtonClassWhite x-button' style='margin-left: 4px;'>";
            echo "<span style='font-size: 20px;'>&times;</span>";
            echo "</button>";
            echo "</form>";
            echo "</div>";
        }
    }
} else {
    echo "0 results";
}
