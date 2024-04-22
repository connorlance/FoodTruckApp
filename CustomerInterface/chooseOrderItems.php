<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../css/styles.css">
    <script src="../js/script.js"></script>
    <title>Food Truck</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Connor Lance">
    <meta name="description" content="This page is where the customer adds items to their order.">
</head>
<body>

    <?php
   session_start();
   $oid = $_SESSION['oid'];
    include_once "php/orderItems.php";
    ?>

    <div id="summary">
        Order Summary
    </div>

    <?php
    include_once "php/orderSummary.php";
    ?>
    <br>
<button class="ButtonClassWhite" onclick="goToPage('submittedOrderSummary.php')">Submit Order</button>

</body>
</html>