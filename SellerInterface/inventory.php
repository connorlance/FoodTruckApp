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
            <?php
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            ?>

            <div id="daySalesOptionForms">
                <div id="manageInventoryOptions">
                    <?php
                    include_once "php/insertInventory.php";
                    include_once "php/updateCost.php";
                    include_once "php/removeInventory.php";
                    include_once "php/insertLocation.php";
                    include_once "php/updateLocation.php";
                    include_once "php/removeLocation.php";
                    ?>
                </div>
                <button id="toggleButton" class="SubmitButtonGreen" onclick="toggleManageInventoryOptions()">Item and Location Options</button>
            </div>

            <div id="daySalesItemForms">
                <?php
                include_once "php/updateInventory.php";
                ?>
            </div>
        </div>
        <div id="navMargin"></div>
    </main>
</body>

</html>