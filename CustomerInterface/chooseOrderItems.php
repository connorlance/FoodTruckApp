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

    <div id="orderItemsTitle">
        Order Items
    </div>

    <div>

        <div class="itemPriceQtyTitle_container">
            <div class="itemCustomerTitle">
                Item
            </div>
            <div class="priceCustomerTitle">
                Price
            </div>
            <div class="qtyCustomerTitle">
                Qty
            </div>
        </div>
        <?php
        //get session variable
        session_start();
        $oid = isset($_SESSION['oid']) ? $_SESSION['oid'] : null;

        //go to file for generating order item forms
        include_once "php/orderItems.php";
        ?>

        <div id="cartButton">
            <button class="cartButton" onclick="goToPage('php/cart.php')">Cart</button>
        </div>

</body>

</html>