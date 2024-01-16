
<?php
ob_start(); // Start output buffering

function addNewItemSupplier($supplierID) {
    // Check if the form is submitted
    if (isset($_POST['submitted'])) {
        // Retrieve values from the form
        $itemID = $_POST['add-new-supplier-item-id-textbox'];
        $itemName = $_POST['add-new-supplier-item-name-textbox'];
        $category = $_POST['add-new-supplier-category-textbox'];
        $cost = $_POST['add-new-supplier-cost-textbox'];
        $stock = $_POST['add-new-supplier-stock-textbox'];

        $conn = connectToDatabase();

        // Prepare and execute the SQL query to insert data
        $sql = "INSERT INTO product (ProductID, SupplierID, ProductCategory, ProductName, ProductCost, ProductStock) 
                VALUES ($itemID, $supplierID, '$category', '$itemName', $cost, $stock)";

        if ($conn->query($sql) === TRUE) {
            echo "<br>New record created successfully";
        } else {
            echo "<br>Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the database connection
        closeDatabaseConnection($conn);
    }
}


function displayAllItems($supplierID) {
    include 'PHP/DatabasePHP/mysqlconnect.php';
    $conn = connectToDatabase();

    // Fetch items from the product table associated with the specific supplier
    $result = $conn->query("SELECT * FROM product WHERE SupplierID = $supplierID");

    if ($result->num_rows > 0) {
        echo '<table class="product-details-content-supplier-table">';
        
        // Header row
        echo '<tr>';
        echo '<th>Items ID</th>';
        echo '<th>Items Name</th>';
        echo '<th>Category</th>';
        echo '<th>Cost</th>';
        echo '<th>Stock</th>';
        echo '</tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>';

            echo '<td class = "add-new-item-supplier-table-items">' . $row['ProductID'] . '</td>';
            echo '<td class = "add-new-item-supplier-table-items">' . $row['ProductName'] . '</td>';
            echo '<td class = "add-new-item-supplier-table-items">' . $row['ProductCategory'] . '</td>';
            echo '<td class = "add-new-item-supplier-table-items">RM' . number_format($row['ProductCost'], 2) . '</td>';
            echo '<td class = "add-new-item-supplier-table-items">' . $row['ProductStock'] . '</td>';
            echo '<td id = "product-detail-td-btn-edit"><button class="btn-inside-table">Edit</button></td>';

            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo "<h2 style ='text-align: center; margin-top: 2em;'>Such empty... No products found!</h2>";
    }

    // Close the database connection
    closeDatabaseConnection($conn);
}

?>
