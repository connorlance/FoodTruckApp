<!DOCTYPE html>

<html lang="en">

<head>
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/script.js"></script>
    <title>Food Truck</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Connor Lance">
    <meta name="description" content="This is the open page for the seller interface.">
</head>

<body>
    <div class="tabButtons">
        <div>
            <button class="ButtonClassWhite" onclick="goToPage('open.php')">Open</button>
        </div>
        <div>
            <button class="ButtonClassWhite" onclick="goToPage('ready.php')">Ready</button>
        </div>
        <div>
            <button class="ButtonClassWhite" onclick="goToPage('daysales.php')">Daysales</button>

        </div>
        <div id="inventoryButton">
            <button class="ButtonClassBlue" onclick="openTab(event,'inventory')">Inventory</button>

        </div>
    </div>
    <header>

    </header>

    <main>


        <form action="php/insertInventory.php" method="POST">
            <input type="text" name="description" placeholder="New item | desc." style="font-size: 1.5em; width: 10em;">
            <input type="text" name="quantity" placeholder="Qty." style="font-size: 1.5em; width: 3em;">
            <input type="submit" class="ButtonClassBlue2" value="Add">
        </form>
        <?php
        include_once "php/updateInventory.php";
        ?>



    </main>

    <footer>
    </footer>

</body>

</html>