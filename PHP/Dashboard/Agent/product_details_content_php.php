<?php
function displayAllItemsAgent($supplierID) {
    include 'PHP/DatabasePHP/mysqlconnect.php';
    $conn = connectToDatabase();

    // Fetch items from the product table associated with the specific supplier
    $result = $conn->query("SELECT * FROM product WHERE SupplierID = $supplierID");

    if ($result->num_rows > 0) {
        echo '<table class="product-details-content-supplier-table" style = "margin-top: 2em;">';
        
        // Header row
        echo '<tr>';
        echo '<th style = "text-align: left;">Items ID</th>';
        echo '<th style = "text-align: left;">Items Name</th>';
        echo '<th style = "text-align: left;">Category</th>';
        echo '<th style = "text-align: left;">Cost</th>';
        echo '<th style = "text-align: left;">Price</th>';
        echo '<th style = "text-align: left;">Stock</th>';
        echo '<th style = "text-align: left;">Quantity</th>';
        echo '</tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr">';
            
            $itemID = $row['ProductID']; // Get the item ID for the current iteration
            echo '<td class="add-new-item-supplier-table-items" style = "text-align: left; padding: 1em; padding-left: 0;">' . $itemID . '</td>';
            echo '<td class="add-new-item-supplier-table-items" style = "text-align: left;">' . $row['ProductName'] . '</td>';
            echo '<td class="add-new-item-supplier-table-items" style = "text-align: left;">' . $row['ProductCategory'] . '</td>';
            echo '<td class="add-new-item-supplier-table-items" style = "text-align: left;">RM' . number_format($row['ProductCost'], 2) . '</td>';
            echo '<td class="add-new-item-supplier-table-items" style = "text-align: left;">RM' . number_format($row['ProductPrice'], 2) . '</td>';
            echo '<td class="add-new-item-supplier-table-items" style = "text-align: left;">' . $row['ProductStock'] . '</td>';
            echo '<td class="add-new-item-supplier-table-items" style = "text-align: left;">' . $row['ProductQuantity'] . '</td>';
            echo '<td id="product-detail-td-btn-edit"><a href="make_order_agent.php?item_id=' . $itemID . '"><button class="btn-inside-table">Make Order</button></a></td>';
            
            // Update the session variable with the current item ID
            $_SESSION['itemID'] = $itemID;

            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo "<h2 style ='text-align: center; margin-top: 2em;'>No products found! Ask your supplier(ID = $supplierID) to add products!</h2>";
    }

    // Close the database connection
    closeDatabaseConnection($conn);
}
?>