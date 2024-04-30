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
            <div id="nav1"><button class="NavButtonWhite " onclick="goToPage('open.php')">Open</button></div>
            <div id="nav2"><button class="NavButtonBlue " onclick="goToPage('ready.php')">Ready</button></div>
            <div id="nav3"><button class="NavButtonWhite " onclick="goToPage('daysales.php')">Daysales</button></div>
            <div id="nav4"><button class="NavButtonWhite " onclick="goToPage('inventory.php')">Inventory</button></div>
        </div>
    </header>
    <main>
        <div id="contentBelowNav">
            <!--Generate open orders-->
            <?php
            session_start();
            $_SESSION['orderType'] = 'ready';
            $_SESSION['page'] = 'ready';

            include_once "php/selectOrders.php";
            ?>
        </div>
        <div id="navMargin"></div>

    </main>
</body>

</html>