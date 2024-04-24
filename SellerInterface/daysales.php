<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/styles.css">
    <script src="../js/script.js"></script>
    <title>Food Truck</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Connor Lance">
    <meta name="description" content="This is the open page for the seller interface.">
</head>

<body>
    <!--Navigation buttons-->
    <header>
        <div>
            <button class="ButtonClassWhite " onclick="goToPage('open.php')">Open</button>
        </div>
        <div>
            <button class="ButtonClassWhite " onclick="goToPage('ready.php')">Ready</button>
        </div>
        <div>
            <button class="ButtonClassBlue " onclick="goToPage('daysales.php')">Daysales</button>
        </div>
        <div id="inventoryButton">
            <button class="ButtonClassWhite " onclick="goToPage('inventory.php')">Inventory</button>
        </div>
    </header>
    <main>

        <?php
        session_start();
        $_SESSION['page'] = 'daySales';


        //Generate ready and completed orders
        include_once "php/selectOrders.php";

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
        ?>

    </main>
</body>

</html>