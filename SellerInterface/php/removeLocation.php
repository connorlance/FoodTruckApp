<?php
// Connect to database
require_once 'C:\wamp64\www\FoodTruckApp/db_connection.php';

// Check if form is submitted
if (isset($_POST['remove_location_submitted'])) {
    // Get input data (no need for sanitization as it's a dropdown)
    $lid = $_POST['location'];

    // Prepare the SQL statement with a placeholder
    $query = "DELETE FROM location WHERE lid=?";

    // Prepare the statement
    $stmt = $conn->prepare($query);

    // Bind parameters to the prepared statement
    $stmt->bind_param("s", $lid);

    // Execute the prepared statement
    if ($stmt->execute()) {
        // Redirect back to inventory page
        header("Location: http://localhost/FoodTruckApp/SellerInterface/inventory.php");
        exit;
    } else {
        // Handle error
        echo "Error: " . $conn->error;
    }

    // Close the statement
    $stmt->close();
}
?>

<!-- Form for removing item -->
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <div id='removeLocation_container'>
        <div id="removeLocationName">
            <select name="location">
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
                        $name = htmlspecialchars($row['name']);
                        echo "<option value='$lid'>$name</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div id="removeLocationSubmitButton">
            <input type="hidden" name="remove_location_submitted" value="1">
            <input type="submit" class="SubmitButtonRed" value="Remove">
        </div>
    </div>
</form>