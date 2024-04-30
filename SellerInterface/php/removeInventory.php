<?php
//connect to database
require_once 'C:\wamp64\www\FoodTruckApp/db_connection.php';

//get variables
$description = $_POST['description'];

//insert row into item
$query = "DELETE FROM item WHERE description='$description'";
$result = $conn->query($query);
header("Location: ../inventory.php");
exit;