<?php
// Connect to database
require_once 'C:\wamp64\www\FoodTruckApp/db_connection.php';

// Check if form is submitted
if (isset($_POST['insert_inventory_value_submitted'])) {
    // Get input data (no sanitization)
    $description = $_POST['description'];
    $quantity = $_POST['quantity'];
    $cost = $_POST['cost'];

    // Prepare the SQL statement with placeholders
    $query = "INSERT INTO item (description, qty, cost) VALUES (?, ?, ?)";

    // Prepare the statement
    $stmt = $conn->prepare($query);

    // Bind parameters to the prepared statement
    $stmt->bind_param("sid", $description, $quantity, $cost);

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
    <div id='UpdateInventory_container'>
        <div id="NewItemName"><input type="text" name="description" placeholder="New Item Name |"></div>
        <div id="UpdateInventoryQuanity"><input type="text" name="quantity" placeholder="Qty."></div>
        <div id="UpdateInventoryCost"><input type="text" name="cost" placeholder="Cost."></div>
        <div id="UpdateInventorySubmitButton"><input type="submit" class="SubmitButtonGreen" value="Add"></div>
        <input type="hidden" name="insert_inventory_value_submitted" value="true">
    </div>
</form>