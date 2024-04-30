<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/styles.css">
    <script src="../js/script.js"></script>
    <title>Food Truck</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Connor Lance">
    <meta name="description" content="This is the inventory page for the seller interface.">
</head>

<body>
    <!--Navigation buttons-->
    <header>
        <div class="nav_container">
            <div id="nav1"><button class="NavButtonWhite " onclick="goToPage('open.php')">Open</button></div>
            <div id="nav2"><button class="NavButtonWhite " onclick="goToPage('ready.php')">Ready</button></div>
            <div id="nav3"><button class="NavButtonWhite " onclick="goToPage('daysales.php')">Daysales</button></div>
            <div id="nav4"><button class="NavButtonBlue " onclick="goToPage('inventory.php')">Inventory</button></div>
        </div>
    </header>

    <main>

        <div id="contentBelowNav">

            <!--Form for inserting new item-->
            <form action="php/insertInventory.php" method="POST">
                <div id='UpdateInventory_container'>
                    <div id="NewItemName"><input type="text" name="description" placeholder="New item Name |"></div>
                    <div id="UpdateInventoryQuanity"><input type="text" name="quantity" placeholder="Qty."></div>
                    <div id="UpdateInventoryCost"><input type="text" name="cost" placeholder="Cost."></div>
                    <div id="UpdateInventorySubmitButton"><input type="submit" class="SubmitButton" value="Add"></div>
                </div>
            </form>

            <form action="php/removeInventory.php" method="POST">
                <div id='removeInventory_container'>
                    <div id="RemoveItemName">
                        <select name="item_description">
                            <option value="">Select Item</option>
                            <?php
                            // Connect to database
                            require_once 'C:\wamp64\www\FoodTruckApp/db_connection.php';
                            $conn = new mysqli($servername, $username, $password, $dbname);

                            // Perform SQL query to fetch items
                            $sql = "SELECT description FROM item";
                            $result = $conn->query($sql);

                            // Check if there are rows returned
                            if ($result->num_rows > 0) {
                                // Output data of each row
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row['description'] . "'>" . $row['description'] . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div id="RemoveInventorySubmitButton"><input type="submit" class="SubmitButton" value="Remove">
                    </div>
                </div>
            </form>

            <!--Generate update inventory forms-->
            <?php
            include_once "php/updateInventory.php";
            ?>
        </div>
        <div id="navMargin"></div>
    </main>
</body>

</html>