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
                <button class="NavButtonWhite " onclick="goToPage('daysales.php')">Daysales</button>
            </div>
            <div id="nav4">
                <button class="NavButtonBlue " onclick="goToPage('inventory.php')">Inventory</button>
            </div>
        </div>
    </header>

    <main>

        <div id="contentBelowNav">
            <!--Form for inserting new item-->
            <form action="php/insertInventory.php" method="POST">
                <input type="text" name="description" placeholder="New item Name"
                    style="font-size: 1.5em; width: 10em;">
                <input type="text" name="quantity" placeholder="Qty." style="font-size: 1.5em; width: 3em;">
                <input type="text" name="cost" placeholder="Cost." style="font-size: 1.5em; width: 3em;">
                <input type="submit" class="ButtonClassBlue2" value="Add">
            </form>

            <!--Generate update inventory forms-->
            <?php
            include_once "php/updateInventory.php";
            ?>
        </div>

    </main>
</body>

</html>