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
            <button class="ButtonClassBlue " onclick="goToPage('open.php')">Open</button>
        </div>
        <div>
            <button class="ButtonClassWhite " onclick="goToPage('ready.php')">Ready</button>
        </div>
        <div>
            <button class="ButtonClassWhite " onclick="goToPage('daysales.php')">Daysales</button>
        </div>
        <div>
            <button class="ButtonClassWhite " onclick="goToPage('inventory.php')">Inventory</button>
        </div>
    </header>

    <main>

    <!--Generate open orders-->
    <?php
    session_start();
    $_SESSION['orderType'] = 'open';
    $_SESSION['page'] = 'open';

    include_once "php/selectOrders.php";
    ?>

    </main>
</body>
</html>