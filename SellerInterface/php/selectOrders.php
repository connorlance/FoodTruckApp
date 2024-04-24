<?php
//connect to database
require_once 'C:\wamp64\www\FoodTruckApp/db_connection.php';

$orderType = $_SESSION['orderType'];
$page = $_SESSION['page'];

if($page == 'open' || $page == 'ready'){
    $_SESSION['select'] = "SELECT * FROM orders WHERE status='$orderType' ORDER BY lid ASC";
    include_once "php/generateOrders.php";

}else if($page == 'daySales'){
    $_SESSION['select'] = "SELECT * FROM orders WHERE status='ready' ORDER BY lid ASC";
    include "php/generateOrders.php";
    $_SESSION['select'] = "SELECT * FROM orders WHERE status='completed' ORDER BY lid ASC";
    include "php/generateOrders.php";
}