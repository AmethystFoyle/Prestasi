<?php

    if (isset($_POST['submitted'])) {
        $newName = $_POST['edit-profile-supplier-name-textbox'];
        $newPassword = $_POST['edit-profile-new-password-textbox'];
        $newSupplierID = $_POST['edit-profile-supplier-id-textbox'];

        // Check if the new Supplier ID already exists
        if (isSupplierIDExist($newSupplierID)) {
            ifSupplierIDExist($newSupplierID);
            header("Location: edit_profile_supplier_error.php");
            exit();
        } else {
            saveChangesEditProfile($supplierID, $newName, $newPassword);
            changeSupplierID($supplierID, $newSupplierID);
        }
    }

    function saveChangesEditProfile($supplierID, $newName, $newPassword) {
        if ($newName != $_SESSION['losi_signInName']) {
            changeNameSupplier($supplierID, $newName);
        }

        if ($newName != $_SESSION['losi_signInName']) {
            changeNameSupplier($supplierID, $newName);
        }

        if (!empty($newPassword)) {
            changePasswordSupplier($supplierID, $newPassword);
        }
    }

    function changeNameSupplier($supplierID, $newName) {
        // Connect to the database
        $conn = connectToDatabase();
    
        // Update the name directly
        $updateNameQuery = "UPDATE supplier SET SupplierName = '$newName' WHERE SupplierID = '$supplierID'";
        $_SESSION['losi_signInName'] = $newName;

        if ($conn->query($updateNameQuery) === TRUE) {
            // Name updated successfully
            echo "<br>Name updated successfully!";
        } else {
            // Error updating name
            echo "<br>Error updating name: " . $conn->error;
        }
    
        // Close the database connection
        closeDatabaseConnection($conn);
    }
    
    function changePasswordSupplier($supplierID, $newPassword) {
        // Connect to the database
        $conn = connectToDatabase();
    
        // Update the password directly
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $updatePasswordQuery = "UPDATE supplier SET SupplierPassword = '$hashedPassword' WHERE SupplierID = '$supplierID'";
        
        if ($conn->query($updatePasswordQuery) === TRUE) {
            // Password updated successfully
            echo "<br>Password updated successfully!";
        } else {
            // Error updating password
            echo "<br>Error updating password: " . $conn->error;
        }
    
        // Close the database connection
        closeDatabaseConnection($conn);
    }

    function changeSupplierID($oldSupplierID, $newSupplierID) {
        // Connect to the database
        $conn = connectToDatabase();
    
        // Update the SupplierID directly
        $updateIDQuery = "UPDATE supplier SET SupplierID = '$newSupplierID' WHERE SupplierID = '$oldSupplierID'";
        $_SESSION['losi_signInID'] = $newSupplierID;
        $_SESSION['losi_signUpID'] = $newSupplierID;
    
        if ($conn->query($updateIDQuery) === TRUE) {
            // ID updated successfully
            echo "<br>ID updated successfully!";
        } else {
            // Error updating ID
            echo "<br>Error updating ID: " . $conn->error;
        }
    
        // Close the database connection
        closeDatabaseConnection($conn);
    }

    function isSupplierIDExist($supplierID) {
        // Connect to the database
        $conn = connectToDatabase();
    
        // Check if the Supplier ID already exists
        $checkIDQuery = "SELECT COUNT(*) AS count FROM supplier WHERE SupplierID = '$supplierID'";
        $result = $conn->query($checkIDQuery);
    
        // Fetch the count
        $row = $result->fetch_assoc();
        $count = $row['count'];
    
        // Close the database connection
        closeDatabaseConnection($conn);
    
        // Return true if the ID exists, false otherwise
        return ($count > 0);
    }

    function ifSupplierIDExist($supplierID) {
        $epcsupplier_errorMsg = "Supplier ID <i><span style='color: yellow;'>$supplierID</span></i> already exist. Choose other ID.";
        $_SESSION['epcsupplier_errorMsg'] = $epcsupplier_errorMsg;
    }
    
    ob_end_flush();
?>