<?php

    if (isset($_POST['submitted'])) {
        $newName = $_POST['edit-profile-supplier-name-textbox'];
        $newPassword = $_POST['edit-profile-new-password-textbox'];
        $newSupplierID = $_POST['edit-profile-supplier-id-textbox'];

        saveChangesEditProfile($newSupplierID, $newName, $newPassword);
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
    
    ob_end_flush();
?>