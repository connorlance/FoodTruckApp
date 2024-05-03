<?php
// Connect to database
require_once 'C:\wamp64\www\FoodTruckApp/db_connection.php';

// Check if form is submitted
if (isset($_POST['update_location_value_submitted'])) {
    // Get input data (no sanitization)
    $lid = $_POST['locationName'];
    $arrivalTime = $_POST['insertLocationArrival'];

    // Prepare the SQL statement with placeholders
    $query = "UPDATE location SET arrival = ? WHERE lid = ?";

    // Prepare the statement
    $stmt = $conn->prepare($query);

    // Bind parameters to the prepared statement
    $stmt->bind_param("si", $arrivalTime, $lid);

    // Execute the prepared statement
    if ($stmt->execute()) {
        // Redirect to inventory page
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
    <div id='updateLocation_container'>
        <div id="updateLocationSelect">
            <select name="locationName">
                <option value="">Select Location</option>
                <?php
                // Perform SQL query to fetch items
                $sql = "SELECT * FROM location";
                $result = $conn->query($sql);

                // Check if there are rows returned
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        $lid = htmlspecialchars($row['lid']);
                        echo "<option value='" . htmlspecialchars($lid) . "'>" . htmlspecialchars($row['name']) . " - Current Arrival: " . htmlspecialchars($row['arrival']) . "</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div id="updateLocationArrival"><input type="text" name="insertLocationArrival" placeholder="New Arrival."></div>
        <div id="insertLocationSubmitButton"><input type="submit" class="UpdateButton" value="Update"></div>
        <input type="hidden" name="update_location_value_submitted" value="true">
    </div>
</form>