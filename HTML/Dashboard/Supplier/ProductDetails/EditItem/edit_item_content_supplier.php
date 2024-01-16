

<?php
ob_start(); // Start output buffering
include 'PHP/DatabasePHP/mysqlconnect.php';

$type = $_SESSION['losi_signInSignUpType'];

if($type == "Sign In") {
    $supplierID = $_SESSION['losi_signInID'];
}

elseif($type == "Sign Up") {
    $supplierID = $_SESSION['losi_signUpID'];
}

// Get the item ID from the URL
$itemID = isset($_GET['item_id']) ? $_GET['item_id'] : null;

// Check if the item ID is set and is a valid integer
if ($itemID !== null && is_numeric($itemID)) {
    // Set the item ID as the default value for the "Item ID" textbox
    $defaultItemID = $itemID;
    
    // Retrieve item details from the database
    $conn = connectToDatabase();
    $query = "SELECT * FROM product WHERE ProductID = $itemID AND SupplierID = $supplierID";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Fetch the item details
        $row = $result->fetch_assoc();
        $itemName = $row['ProductName'];
        $category = $row['ProductCategory'];
        $cost = $row['ProductCost'];
        $stock = $row['ProductStock'];
    } else {
        // Handle the case where the item ID doesn't exist
        echo "Error: Item ID not found.";
    }

    // Close the database connection
    closeDatabaseConnection($conn);
} else {
    // Default values if the item ID is invalid or not present in the URL
    $defaultItemID = "";
    $itemName = "";
    $category = "";
    $cost = "";
    $stock = "";
}
?>
<div class="menu-content">
    <form action="edit_item_supplier.php" method="POST" id="edit-item-supplier-content-form">
        <div class="edit-item-supplier-content">
            <div class="edit-item-supplier-items" id="edit-item-supplier-item-name">
                <label for="edit-item-supplier-item-name-label">Item ID</label>
                <input type="text" id="edit-item-supplier-item-name-textbox" name="edit-item-supplier-item-name-textbox" value="<?php echo $defaultItemID; ?>" readonly>
            </div>
            <div class="edit-item-supplier-items" id="edit-item-supplier-item-name">
                <label for="edit-item-supplier-item-name-label">Item Name</label>
                <input type="text" id="edit-item-supplier-item-name-textbox" name="edit-item-supplier-item-name-textbox" value="<?php echo $itemName; ?>">
            </div>

            <div class="edit-item-supplier-items" id="edit-item-supplier-category">
                <label for="edit-item-supplier-category-name-label">Category</label>
                <input type="text" id="edit-item-supplier-category-textbox" name="edit-item-supplier-category-textbox" value="<?php echo $category; ?>">
            </div>

            <div class="edit-item-supplier-items" id="edit-item-supplier-cost">
                <label for="edit-item-supplier-cost-label">Cost</label>
                <input type="number" id="edit-item-supplier-cost-textbox" name="edit-item-supplier-cost-textbox" value="<?php echo $cost; ?>">
            </div>

            <div class="edit-item-supplier-items" id="edit-item-supplier-stock">
                <label for="edit-item-supplier-stock-label">Stock</label>
                <input type="number" id="edit-item-supplier-stock-textbox" name="edit-item-supplier-stock-textbox" value="<?php echo $stock; ?>">
            </div>

            <input class="btn-single" id="edit-item-supplier-save-changes-btn" type="submit" value="Save Changes">
            <input type="hidden" name="submitted" value="TRUE" />
        </div>
    </form>
</div>

<?php
ob_end_flush(); // Flush the output
?>