<div class = "menu-content">

    <?php include 'PHP/DatabasePHP/mysqlconnect.php'; ?>

    <form action = "edit_item_supplier.php" method = "POST" id = "edit-item-supplier-content-form">
        <div class = "edit-item-supplier-content">
            <div class = "edit-item-supplier-items" id = "edit-item-supplier-item-name">
                <label for = "edit-item-supplier-item-name-label">Item ID</label>
                <input type = "text" id = "edit-item-supplier-item-name-textbox" name = "edit-item-supplier-item-name-textbox">
            </div>
            <div class = "edit-item-supplier-items" id = "edit-item-supplier-item-name">
                <label for = "edit-item-supplier-item-name-label">Item Name</label>
                <input type = "text" id = "edit-item-supplier-item-name-textbox" name = "edit-item-supplier-item-name-textbox">
            </div>

            <div class = "edit-item-supplier-items" id = "edit-item-supplier-category">
                <label for = "edit-item-supplier-category-name-label">Category</label>
                <input type = "text" id = "edit-item-supplier-category-textbox" name = "edit-item-supplier-category-textbox">
            </div>

            <div class = "edit-item-supplier-items" id = "edit-item-supplier-cost">
                <label for = "edit-item-supplier-cost-label">Cost</label>
                <input type = "number" id = "edit-item-supplier-cost-textbox" name = "edit-item-supplier-cost-textbox">
            </div>

            <div class = "edit-item-supplier-items" id = "edit-item-supplier-stock">
                <label for = "edit-item-supplier-stock-label">Stock</label>
                <input type = "number" id = "edit-item-supplier-stock-textbox" name = "edit-item-supplier-stock-textbox">
            </div>

            <input class = "btn-single" id = "edit-item-supplier-save-changes-btn" type = "submit" value = "Save Changes">
            <input type="hidden" name="submitted" value="TRUE" />
        </div>
    </form>
</div>

<?php
ob_end_flush(); // Flush the output
?>