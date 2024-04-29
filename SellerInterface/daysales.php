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
        <div class="nav_container">
            <div id="nav1">
                <button class="NavButtonWhite " onclick="goToPage('open.php')">Open</button>
            </div>
            <div id="nav2">
                <button class="NavButtonWhite " onclick="goToPage('ready.php')">Ready</button>
            </div>
            <div id="nav3">
                <button class="NavButtonBlue " onclick="goToPage('daysales.php')">Daysales</button>
            </div>
            <div id="nav4">
                <button class="NavButtonWhite " onclick="goToPage('inventory.php')">Inventory</button>
            </div>
        </div>
    </header>
    <main>

        <div id="contentBelowNav">
        

            <?php
            session_start();
            $_SESSION['page'] = 'daySales';


            //Generate ready and completed orders
            include_once "php/selectOrders.php";


            ?>
            <footer>
                <?php
                //query orders table
                $select3 = "SELECT * FROM orders WHERE status = 'ready' OR status = 'completed'";
                $result3 = $conn->query($select3);

                //create variable for sum of all orders totalCost
                $sumTotalCost = 0;

                if ($result3->num_rows > 0) {
                    while ($row3 = $result3->fetch_assoc()) {
                        //compute sum of all totalCost
                        $sumTotalCost = $sumTotalCost + $row3['totalCost'];
                        $numOrders = $result3->num_rows;

                    }
                    echo "<br>";

                    echo "<div id=TotalOrdersSales_container>";
                    //output # of ready and completed orders
                    echo "<div id='NumOrders'>";
                    echo "Total Orders: " . $numOrders;
                    echo "</div>";
                    //output total sales of ready and completed orders
                    echo "<div id='SumTotalSales'>";
                    echo "Total sales: $" . $sumTotalCost;
                    echo "</div>";
                    echo "</div";


                } else {
                    echo "0 results";
                }
                ?>
            </footer>
        </div>
<div id="navMargin"></div>

    </main>
</body>

</html>