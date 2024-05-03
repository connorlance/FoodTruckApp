<?php
ob_start(); // Start output buffering

// Check if form is submitted
if (isset($_POST['insert_location_value_submitted'])) {
    // Connect to database
    require_once 'C:\wamp64\www\FoodTruckApp/db_connection.php';

    // Get input data (no sanitization)
    $locationName = $_POST['insertLocationName'];
    $arrivalTime = $_POST['insertLocationArrival'];

    // Prepare the SQL statement with placeholders
    $query = "INSERT INTO location (name, arrival) VALUES (?, ?)";

    // Prepare the statement
    $stmt = $conn->prepare($query);

    // Bind parameters to the prepared statement
    $stmt->bind_param("ss", $locationName, $arrivalTime);

    // Execute the prepared statement
    if ($stmt->execute()) {
        // Get the last inserted ID
        $lastInsertedID = $stmt->insert_id;

        // Redirect to inventory page
        ob_end_clean(); // Clean (erase) the output buffer
        header("Location: http://localhost/FoodTruckApp/SellerInterface/inventory.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }

    // Close the statement
    $stmt->close();
}
?>

<!-- Form for inserting new item -->
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <div id='insertLocation_container'>
        <div id="insertLocationName"><input type="text" name="insertLocationName" placeholder="New Location Name |"></div>
        <div id="insertLocationArrival"><input type="text" name="insertLocationArrival" placeholder="Arrival Time."></div>
        <div id="insertLocationSubmitButton"><input type="submit" class="SubmitButtonGreen" value="Add"></div>
        <input type="hidden" name="insert_location_value_submitted" value="true">
    </div>
</form>