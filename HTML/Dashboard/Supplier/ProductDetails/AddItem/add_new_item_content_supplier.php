<div class = "menu-content">

    <?php include 'PHP/DatabasePHP/mysqlconnect.php'; ?>

    <form action = "add_new_item_supplier.php" method = "POST" id = "add-new-supplier-content-form">
        <div class = "add-new-item-supplier-content">
            <div class = "add-new-item-supplier-items" id = "add-new-supplier-item-name">
                <label for = "add-new-item-supplier-item-name-label">Item Name</label>
                <input type = "text" id = "add-new-supplier-item-name-textbox" name = "add-new-supplier-item-name-textbox">
            </div>

            <div class = "add-new-item-supplier-items" id = "add-new-supplier-item-name">
                <label for = "add-new-supplier-category-name-label">Category</label>
                <input type = "text" id = "add-new-supplier-category-textbox" name = "add-new-supplier-category-textbox">
            </div>

            <div class = "add-new-item-supplier-items" id = "add-new-supplier-item-name">
                <label for = "add-new-supplier-cost-label">Cost</label>
                <input type = "number" id = "add-new-supplier-cost-textbox" name = "add-new-supplier-cost-textbox">
            </div>

            <div class = "add-new-item-supplier-items" id = "add-new-item-supplier-item-name">
                <label for = "add-new-supplier-stock-label">Stock</label>
                <input type = "number" id = "add-new-supplier-stock-textbox" name = "add-new-supplier-stock-textbox">
            </div>

            <input class = "btn-single" id = "add-new-supplier-save-changes-btn" type = "submit" value = "Save Changes">
            <input type="hidden" name="submitted" value="TRUE" />
        </div>
    </form>
</div>

<?php
ob_end_flush(); // Flush the output
?>