<?php
include 'PHP/LoginSignup/losi_content_php.php';
include 'PHP/DatabasePHP/mysqlconnect.php';
function showMakeOrderData() {
    $conn = connectToDatabase();

    // Get item id from URL
    if (isset($_GET['item_id'])) {
        // Retrieve the 'item_id' value from the URL
        $itemID = $_GET['item_id'];
    }

    // Fetch items from the product table associated with the specific supplier
    $productQuery = $conn->query("SELECT * FROM product WHERE ProductID = $itemID");

    // Check if the query was successful
    if ($productQuery->num_rows > 0) {

        // Fetch the associative array once and store it in a variable
        $productData = $productQuery->fetch_assoc();

        $itemName = $productData['ProductName'];
        $itemStock = $productData['ProductStock'];

        $_SESSION['item_id'] = $itemID;
        $_SESSION['item_name'] = $itemName;
        $_SESSION['item_stock'] = $itemStock;
    }

    closeDatabaseConnection($conn);
}

function makeOrder() {
    $conn = connectToDatabase();
    $type = $_SESSION['losi_signInSignUpType'];

    if($type == "Sign In") {
        $agentID = $_SESSION['losi_signInID'];
    }

    elseif($type == "Sign Up") {
        $agentID = $_SESSION['losi_signUpID'];
    }

    $productID = $_SESSION['item_id'];
    $customerName = isset($_POST["make-order-customer-name-textbox"]) ? $_POST["make-order-customer-name-textbox"] : null;
    $customerAddress = isset($_POST["make-order-customer-address-textbox"]) ? $_POST["make-order-customer-address-textbox"] : null;
    $customerContactNumber = isset($_POST["make-order-customer-contact-number-textbox"]) ? $_POST["make-order-customer-contact-number-textbox"] : null;
    $orderQuantity = isset($_POST["make-order-quantity-textbox"]) ? $_POST["make-order-quantity-textbox"] : null;

    // Check if the order quantity is valid
    if ($orderQuantity > $_SESSION['item_stock']) {
        echo "<br>Quantity cannot be more than stock<br>";

    } else {
        // Perform the SQL INSERT operation
        $insertQuery = "INSERT INTO orders (AgentID, ProductID, OrderQuantity, OrderCustomerName, OrderCustomerAddress, OrderCustomerContactNumber, OrderStatus)
                        VALUES ($agentID, $productID, $orderQuantity, '$customerName', '$customerAddress', '$customerContactNumber', 'Pending')";

        if ($conn->query($insertQuery) === TRUE) {
            echo "<br>Order placed successfully!<br>";
        } else {
            echo "Error: " . $insertQuery . "<br>" . $conn->error;
        }
    }

    closeDatabaseConnection($conn);
}
?>
