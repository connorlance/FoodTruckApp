<?php
ob_start();
// Connect to database
require_once 'C:\wamp64\www\FoodTruckApp/db_connection.php';

// Check if form is submitted
if (isset($_POST['remove_item_submitted'])) {
    // Get input data (no need for sanitization as it's a dropdown)
    $description = $_POST['description'];

    // Prepare the SQL statement with a placeholder
    $query = "DELETE FROM item WHERE description=?";

    // Prepare the statement
    $stmt = $conn->prepare($query);

    // Bind parameters to the prepared statement
    $stmt->bind_param("s", $description);

    // Execute the prepared statement
    if ($stmt->execute()) {
        // Redirect back to inventory page
        header("Location: http://localhost/FoodTruckApp/SellerInterface/inventory.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }

    // Close the statement
    $stmt->close();
}
?>

<!-- Form for removing item -->
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
    <div id='removeInventory_container'>
        <div id="RemoveItemName">
            <select name="description">
                <option value="">Select Item</option>
                <?php
                // Connect to database
                require_once 'C:\wamp64\www\FoodTruckApp/db_connection.php';

                // Perform SQL query to fetch items
                $sql = "SELECT description FROM item";
                $result = $conn->query($sql);

                // Check if there are rows returned
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . htmlspecialchars($row['description']) . "'>" . htmlspecialchars($row['description']) . "</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div id="RemoveInventorySubmitButton">
            <input type="hidden" name="remove_item_submitted" value="1">
            <input type="submit" class="SubmitButtonRed" value="Remove">
        </div>
    </div>
</form>