<?php
// Connect to database
require_once 'C:\wamp64\www\FoodTruckApp/db_connection.php';

// Get variables
$description = $_POST['description'];
$cost = $_POST['updateCost'];

// Prepare the SQL query
$query = "UPDATE item SET cost=? WHERE description=?";

// Prepare the statement
$stmt = $conn->prepare($query);

// Bind parameters
$stmt->bind_param("ds", $cost, $description);

// Set parameters and execute the statement
$stmt->execute();

// Check if the update was successful
if ($stmt->affected_rows > 0) {
    // Update successful
} else {
    // Update failed
}

// Close the statement
$stmt->close();
header("Location: ../inventory.php");
exit();
