<?php

$type = $_SESSION['losi_signInSignUpType'];

if($type == "Sign In") {
    $supplierID = $_SESSION['losi_signInID'];
}

elseif($type == "Sign Up") {
    $supplierID = $_SESSION['losi_signUpID'];
}

?>

<div class = "menu-content">

    <?php include 'PHP/Dashboard/Supplier/add_new_item_supplier_php.php'; ?>

    <form action = "add_new_item_supplier.php" method = "POST" id = "add-new-supplier-content-form">
        <div class = "add-new-item-supplier-content">

            <div class = "add-new-item-supplier-items" id = "add-new-supplier-item-id">
                <label for = "add-new-item-supplier-item-id-label">Item ID</label>
                <input type = "text" id = "add-new-supplier-item-id-textbox" name = "add-new-supplier-item-id-textbox" required>
            </div>

            <div class = "add-new-item-supplier-items" id = "add-new-supplier-item-name">
                <label for = "add-new-item-supplier-item-name-label">Item Name</label>
                <input type = "text" id = "add-new-supplier-item-name-textbox" name = "add-new-supplier-item-name-textbox" required>
            </div>

            <div class = "add-new-item-supplier-items" id = "add-new-supplier-item-name">
                <label for = "add-new-supplier-category-name-label">Category</label>
                <input type = "text" id = "add-new-supplier-category-textbox" name = "add-new-supplier-category-textbox" required>
            </div>

            <div class = "add-new-item-supplier-items" id = "add-new-supplier-item-name">
                <label for = "add-new-supplier-cost-label">Cost</label>
                <input type = "number" id = "add-new-supplier-cost-textbox" name = "add-new-supplier-cost-textbox" required>
            </div>

            <div class = "add-new-item-supplier-items" id = "add-new-item-supplier-item-name">
                <label for = "add-new-supplier-stock-label">Stock</label>
                <input type = "number" id = "add-new-supplier-stock-textbox" name = "add-new-supplier-stock-textbox" required>
            </div>

            <input class = "btn-single" id = "add-new-supplier-save-changes-btn" type = "submit" value = "Add New">
            <input type="hidden" name="submitted" value="TRUE" />

            <?php
            
                if(isset($_POST['submitted'])) {
                    addNewItemSupplier($supplierID);
            }
            ?>
        </div>
    </form>
</div>

<?php
ob_end_flush(); // Flush the output
?>