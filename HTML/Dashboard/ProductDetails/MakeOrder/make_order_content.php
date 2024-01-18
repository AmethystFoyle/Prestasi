<?php

    include 'PHP/Dashboard/Agent/make_order_content_php.php';
    showMakeOrderData();

    $itemId = $_SESSION['item_id'];
    $itemName = $_SESSION['item_name'];
    $itemStock = $_SESSION['item_stock'];
?>

<div class = "menu-content">
    <form action = "make_order_agent.php?item_id=<?php echo $itemId; ?>" method = "POST" id = "make-order-content-form">
        <div class = "make-order-content">
            <div class = "make-order-content-items make-order-content-disabled" id = "make-order-item-name">
                <label for = "make-order-item-name-label">Item Name</label>
                <input type = "text" id = "make-order-item-name-textbox" name = "make-order-item-name-textbox" value="<?php echo $itemName; ?>" title="Only Supplier can edit this!" readonly>
            </div>

            <div class = "make-order-content-items make-order-content-disabled" id = "make-order-item-id">
                <label for = "make-order-item-id-label">Item ID</label>
                <input type = "text" id = "make-order-item-id-textbox" name = "make-order-item-id-textbox" value="<?php echo $itemId; ?>" title="Only Supplier can edit this!" readonly>
            </div>

            <div class = "make-order-content-items" id = "make-order-customer-name">
                <label for = "make-order-customer-name-label">Customer Name</label>
                <input type = "text" id = "make-order-customer-name-textbox" name = "make-order-customer-name-textbox" value="">
            </div>

            <div class = "make-order-content-items" id = "make-order-customer-address">
                <label for = "make-order-customer-address-label">Customer Address</label>
                <input type = "text" id = "make-order-customer-address-textbox" name = "make-order-customer-address-textbox" value="">
            </div>

            <div class = "make-order-content-items" id = "make-order-customer-contact-number">
                <label for = "make-order-customer-contact-number-label">Customer Contact Number</label>
                <input type = "text" id = "make-order-customer-contact-number-textbox" name = "make-order-customer-contact-number-textbox" value="">
            </div>

            <div class = "make-order-content-items" id = "make-order-quantity">
                <label for = "make-order-quantity-label">Quantity To Order</label>
                <input type = "number" id = "make-order-quantity-textbox" name = "make-order-quantity-textbox" value="">
            </div>

            <div class = "make-order-content-items make-order-content-disabled" id = "make-order-stock">
                <label for = "make-order-stock-label">Stock (In Warehouse)</label>
                <input type = "number" id = "make-order-stock-textbox" name = "make-order-stock-textbox" value="<?php echo $itemStock; ?>" title="Only Supplier can edit this!" readonly>
            </div>

            <input class = "btn-single" id = "make-order-order-btn" type = "submit" value = "Order" style = "margin-bottom: 2em;">
            <input type="hidden" name="submitted" value="TRUE" />

            <?php
                if(isset($_POST['submitted'])) {
                makeOrder();
            }
            ?>
        </div>
    </form>
</div>