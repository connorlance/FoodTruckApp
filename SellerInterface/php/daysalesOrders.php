<?php
//connect to database
$servername = "localhost";
$username = "hci";
$password = "hci";
$dbname = "hci";
$conn = new mysqli($servername, $username, $password, $dbname);

//query orders table for orders with ready status, order them in ascending order by lid
$select = "SELECT * FROM orders WHERE status='ready' ORDER BY lid ASC";
$result = $conn->query($select);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        //initilize variables
        $oid = $row['oid']; 
        $lid = $row['lid']; 

        //generate forms for order buttons
        echo "<form method='post' action='php/expandedDaysalesOrder.php'>";
        echo "<input type='hidden' name='oid' value='$oid'>";
        echo "<input type='hidden' name='lid' value='$lid'>";

        //ready order buttons set to green
        echo "<button type='submit' class='ButtonClassGreen' style='width: 420px; font-size: 15px; text-align: right;' class='orderButton'>";
        echo "<span style='float: left; display: inline-block;'>#" . $lid . " | </span>";
        echo "<div style='display: inline-block;'>";

        //query order_items table using oid
        $select2 = "SELECT * FROM order_items WHERE oid='$oid'";
        $result2 = $conn->query($select2);

        //generate lid, qty, description for order buttons
        if ($result2->num_rows > 0) {
            //create array
            $items = array();

            while ($row2 = $result2->fetch_assoc()) {
                $qty = $row2['qty'];
                $iid = $row2['iid'];

                //query item using iid
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
    }
} else {
    echo "0 results";
}

//query orders table for orders with completed status ordered by ascending lid
$select = "SELECT * FROM orders WHERE status='completed' ORDER BY lid ASC";
$result = $conn->query($select);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        //create variables
        $oid = $row['oid']; 
        $lid = $row['lid']; 

       //generate forms for order buttons
        echo "<form method='post' action='php/expandedDaysalesOrder.php'>";
        echo "<input type='hidden' name='oid' value='$oid'>";
        echo "<input type='hidden' name='lid' value='$lid'>";

        //completed order buttons
        echo "<button type='submit' class='ButtonClassWhite' style='width: 420px; font-size: 15px; text-align: right;' class='orderButton'>";
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
        echo "</button>";
        echo "</form>";
    }
} else {
    echo "0 results";
}

//query orders table
$select3 = "SELECT * FROM orders";
$result3 = $conn->query($select3);

//create variable for sum of all orders totalCost
$sumTotalCost = 0;

if ($result3->num_rows > 0) {
    while ($row3 = $result3->fetch_assoc()) { 
        //compute sum of all totalCost
        $sumTotalCost = $sumTotalCost + $row3['totalCost']; 
    }
    echo "<br>";

    //output total sales of all order
    echo "Total sales: $" . $sumTotalCost;
} else {
    echo "0 results";
}
