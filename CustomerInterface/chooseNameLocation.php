<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../css/styles.css">
    <script src="../js/script.js"></script>
    <title>Food Truck</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Connor Lance">
    <meta name="description" content="This is the page where the customer inputs their name, order, and location.">
</head>

<body>
    <form method="post" action="php/insertOrder.php">
        <div id="chooseLocationTitle">
            <p>Enter a name for the order</p>
        </div>

        <input type="text" name="cname">

        <div id="chooseLocationTitle">
            <p>Choose Location</p>
        </div>

        <?php
        include_once "php/location.php";
        ?>
        <br><br>
        <input type="submit" class="ButtonClassBlue2" value="Next">
    </form>

</body>

</html>