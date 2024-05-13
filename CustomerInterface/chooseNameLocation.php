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
    <!--Form for entering name and selecting location-->
    <form method="post" action="php/insertOrder.php">
        <div id="chooseNameTitle">
            Enter a name for the order
        </div>

        <div id="chooseNameInput">
            <input type="text" name="cname">
        </div>

        <div id="chooseLocationTitle">
            Choose Location
        </div>

        <!--go to file for generating location buttons-->
        <?php
        include_once "php/location.php";
        ?>

        <!--submit information and go to next page-->
        <div id="chooseNameLocationSubmitButton">
            <input type="submit" class="UpdateButton" value="Next">
        </div>

    </form>
</body>

</html>