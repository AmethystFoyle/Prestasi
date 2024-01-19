<?php
function displayAllItemsOrderQueueSupplier($supplierID) {
    include 'PHP/DatabasePHP/mysqlconnect.php';
    $conn = connectToDatabase();

    // SQL Query
    $query = "SELECT
                agent.AgentID,
                orders.OrderID,
                product.ProductName,
                orders.OrderQuantity,
                product.ProductStock
              FROM
                orders
              JOIN
                agent ON orders.AgentID = agent.AgentID
              JOIN
                product ON orders.ProductID = product.ProductID
              WHERE
                product.SupplierID = $supplierID
                AND orders.OrderStatus = 'Pending';";

    // Execute the query
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        echo '<table class="product-details-content-supplier-table" style="margin-top: 2em;">';
        // Header row
        echo '<tr>';
        echo '<th style="text-align: left;">Agent ID</th>';
        echo '<th style="text-align: left;">Order ID</th>';
        echo '<th style="text-align: left;">Items Name</th>';
        echo '<th style="text-align: left;">Ordered Quantity</th>';
        echo '<th style="text-align: left;">Stock Available</th>';
        echo '</tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td style="text-align: left; padding: 2em; padding-left: 0;">' . $row['AgentID'] . '</td>';
            echo '<td style="text-align: left;">' . $row['OrderID'] . '</td>';
            echo '<td style="text-align: left;">' . $row['ProductName'] . '</td>';
            echo '<td style="text-align: left;">' . $row['OrderQuantity'] . '</td>';
            echo '<td style="text-align: left;">' . $row['ProductStock'] . '</td>';
            echo '<td><button class="btn-inside-table" type="submit">Approve</button></a></td>';
            echo '<td><button class="btn-inside-table" type="submit">Reject</button></a></td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo "<h2 style='text-align: center; margin-top: 2em;'>No orders are placed by any agents.</h2>";
    }

    // Close the database connection
    closeDatabaseConnection($conn);
}
?>