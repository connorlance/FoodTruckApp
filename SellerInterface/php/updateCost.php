<?php
// Connect to database
require_once 'C:\wamp64\www\FoodTruckApp/db_connection.php';

// Check if the specific form is submitted
if (isset($_POST['update_cost_form_submitted'])) {
    // Validate input
    $description = $_POST['description'];
    $updateCost = $_POST['updateCost'];

    // Prepare the SQL query
    $query = "UPDATE item SET cost=? WHERE description=?";

    // Prepare the statement
    $stmt = $conn->prepare($query);

    // Bind parameters
    $stmt->bind_param("ds", $updateCost, $description);

    // Execute the statement
    $stmt->execute();

    // Check if the update was successful
    if ($stmt->affected_rows > 0) {
        // Update successful
    } else {
        // Update failed
    }

    // Close the statement
    $stmt->close();
    header("Location: http://localhost/FoodTruckApp/SellerInterface/inventory.php");
    exit();
}
?>

<!--Form for updating item cost-->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
    <input type="hidden" name="update_cost_form_submitted" value="true">
    <div id='updateCost_container'>
        <div id="UpdateCostItemName">
            <select name="description">
                <option value="">Select Item</option>
                <?php
                // Perform SQL query to fetch items
                $sql = "SELECT description, cost FROM item ORDER BY qty ASC";
                $result = $conn->query($sql);

                // Check if there are rows returned
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . htmlspecialchars($row['description']) . "'>" . htmlspecialchars($row['description']) . " - Current cost: " . htmlspecialchars($row['cost']) . "</option>";
                    }
                }
                ?>
            </select>
        </div>
        <div id='UpdateInventoryCost'><input type="text" name="updateCost" placeholder="New Cost."></div>

        <div id="updateCostSubmitButton"><input type="submit" class="UpdateButton" value="Update"></div>
    </div>
</form>