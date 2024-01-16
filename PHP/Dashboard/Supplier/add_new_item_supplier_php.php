<?php
ob_start(); // Start output buffering

function addNewItemSupplier() {

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
        $sql = "INSERT INTO product (ProductID, ProductName, ProductCategory, ProductCost, ProductStock) 
                VALUES ($itemID, '$itemName', '$category', $cost, $stock)";

        if ($conn->query($sql) === TRUE) {
            echo "<br>New record created successfully";
        } else {
            echo "<br>Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the database connection
        closeDatabaseConnection($conn);
    }

}
?>