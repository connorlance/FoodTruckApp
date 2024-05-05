<?php
// Connect to the database
require_once 'C:\wamp64\www\FoodTruckApp/db_connection.php';

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Get variables
$orderType = $_SESSION['orderType'];
$page = $_SESSION['page'];
$select = $_SESSION['select'];

$result = $conn->query($select);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Create variables
        $oid = $row['oid'];
        $lid = $row['lid'];
        $status = $row['status'];

        // Container and form for respective order type
        if ($page == 'daySales') {
            // Determine container and button class based on status
            if ($status == 'ready') {
                $container_class = 'DaySalesReadyOrder_container';
                $button_class = 'DaySalesReadyButtonGreen';
            } elseif ($status == 'completed') {
                $container_class = 'DaySalesCompletedOrder_container';
                $button_class = 'CompletedButtonWhite';
            }
        } elseif ($page == 'ready') {
            // Container and form for ready page
            $container_class = 'ReadyPageOrder_container';
            $button_class = 'ReadyButtonGreen';
        } elseif ($page == 'open') {
            // Container and form for open page
            $container_class = 'OpenPageOrder_container';
            $button_class = 'OpenButtonBlue';
        }

        // Form for order buttons
        echo "<div class='$container_class'>";
        // Open inner div for buttons
        echo "<div class='button_div'>";

        // Button for order status
        echo "<button type='button' class='$button_class' id='orderButton1_$oid' onclick='toggleOrderButtons($oid)'>";

        // Section 1
        echo "<div class='section1_$oid'>";
        echo "<span style='float: left; display: inline-block;'>&nbsp;#$lid | </span>";

        // Query order_items table using oid
        $select2 = "SELECT * FROM order_items WHERE oid='$oid'";
        $result2 = $conn->query($select2);

        if ($result2->num_rows > 0) {
            // Create array
            $items = array();

            while ($row2 = $result2->fetch_assoc()) {
                // Get variables
                $qty = $row2['qty'];
                $iid = $row2['iid'];

                // Query item table using iid
                $select3 = "SELECT * FROM item WHERE iid='$iid'";
                $result3 = $conn->query($select3);

                if ($result3->num_rows > 0) {
                    while ($row3 = $result3->fetch_assoc()) {
                        // Create qty + description
                        $item = $qty . " " . $row3['description'];
                        // Add $item to array
                        $items[] = $item;
                    }
                } else {
                    echo "error";
                }
            }

            // Display item descriptions inside the buttons
            echo "<div style='display: inline-block; margin-right: 10px;'>";
            echo " " . implode(" | ", $items) . "\n";
            echo "</div>";
            echo "<br>";
        } else {
            echo "error";
        }
        echo "</div>";


        // Section 2
        echo "<div class='section2_$oid' style='display:none;'>";



        echo "</div>";

        // Close the button
        echo "</button>";

        // Close inner div for buttons
        echo "</div>";

        // Form for X button
        if ($page == 'open' || $page == 'ready') {
            echo "<form method='post' action='php/orderStatus.php'>";
            echo "<input type='hidden' name='oid' value='$oid'>";
            echo "<button type='submit' class='XButtonRed'>";
            echo "<span style='font-size: 30px;'>&times;</span>";
            echo "</button>";
            echo "</form>";
        }
        echo "</div>"; // Close container div
    }
} else {
    echo "0 results";
}
