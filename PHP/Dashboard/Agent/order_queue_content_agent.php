<?php
function displayAllItemsOrderQueueAgent($agentID) {
    include 'PHP/DatabasePHP/mysqlconnect.php';
    $conn = connectToDatabase();

    // Fetch items from the orders table with product details
    $result = $conn->query("SELECT o.*, p.ProductName 
                            FROM orders o
                            JOIN product p ON o.ProductID = p.ProductID
                            WHERE o.AgentID = $agentID");

    if ($result->num_rows > 0) {
        echo '<table class="product-details-content-supplier-table" style="margin-top: 2em;">';
        
        // Header row
        echo '<tr>';
        echo '<th style="text-align: left;">Order ID</th>';
        echo '<th style="text-align: left;">Items ID</th>';
        echo '<th style="text-align: left;">Items Name</th>';
        echo '<th style="text-align: left;">Customer Name</th>';
        echo '<th style="text-align: left;">Customer Address</th>';
        echo '<th style="text-align: left;">Customer Number</th>';
        echo '<th style="text-align: left;">Ordered Quantity</th>';
        echo '<th style="text-align: left;">Status</th>';
        echo '</tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';

            echo '<td class="add-new-item-supplier-table-items" style="text-align: left; padding: 2em; padding-left: 0;">' . $row['OrderID'] . '</td>';
            echo '<td class="add-new-item-supplier-table-items" style="text-align: left;">' . $row['ProductID'] . '</td>';
            echo '<td class="add-new-item-supplier-table-items" style="text-align: left;">' . $row['ProductName'] . '</td>';
            echo '<td class="add-new-item-supplier-table-items" style="text-align: left;">' . $row['OrderCustomerName'] . '</td>';
            echo '<td class="add-new-item-supplier-table-items" style="text-align: left;">' . $row['OrderCustomerAddress'] . '</td>';
            echo '<td class="add-new-item-supplier-table-items" style="text-align: left;">' . $row['OrderCustomerContactNumber'] . '</td>';
            echo '<td class="add-new-item-supplier-table-items" style="text-align: left;">' . $row['OrderQuantity'] . '</td>';
            echo '<td class="add-new-item-supplier-table-items" style="text-align: left;">' . $row['OrderStatus'] . '</td>';

            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo "<h2 style='text-align: center; margin-top: 2em;'>No orders are placed for now! Place some orders to see them here.</h2>";
    }

    // Close the database connection
    closeDatabaseConnection($conn);
}
?>