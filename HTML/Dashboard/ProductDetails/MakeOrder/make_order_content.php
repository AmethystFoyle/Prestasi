<div class = "menu-content">
    <form action = "index.php" method = "POST" id = "make-order-content-form">
        <div class = "make-order-content">
            <div class = "make-order-content-items make-order-content-disabled" id = "make-order-product-name">
                <label for = "make-order-product-name-label">Product Name</label>
                <input type = "text" id = "make-order-product-name-textbox" name = "make-order-product-name-textbox" value="Product Name" title="Only Supplier can edit this!" readonly>
            </div>
            <div class = "make-order-content-items make-order-content-disabled" id = "make-order-category">
                <label for = "make-order-category-label">Category</label>
                <input type = "text" id = "make-order-category-textbox" name = "make-order-category-textbox" value="Category Name" title="Only Supplier can edit this!" readonly>
            </div>

            <div class = "make-order-content-items make-order-content-disabled" id = "make-order-quantity">
                <label for = "make-order-quantity-label">Quantity (That Can Be Sold)</label>
                <input type = "number" id = "make-order-quantity-textbox" name = "make-order-quantity-textbox" value="999" title="Only Supplier can edit this!" readonly>
            </div>

            <div class = "make-order-content-items make-order-content-disabled" id = "make-order-stock">
                <label for = "make-order-stock-label">Stock (In Warehouse)</label>
                <input type = "number" id = "make-order-stock-textbox" name = "make-order-stock-textbox" value="999" title="Only Supplier can edit this!" readonly>
            </div>

            <div class = "make-order-content-items" id = "make-order-restock">
                <label for = "make-order-restock-label">Restock Order (Amount Not More Than Stock)</label>
                <input type = "number" id = "make-order-restock-textbox" name = "make-order-restock-textbox" value="999">
            </div>

            <input class = "btn-single" id = "make-order-order-btn" type = "submit" value = "Order">
        </div>
    </form>
</div>