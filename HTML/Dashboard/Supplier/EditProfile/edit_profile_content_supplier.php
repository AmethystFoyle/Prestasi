<?php
$type = $_SESSION['losi_signInSignUpType'];

if($type == "Sign In") {
    $name = $_SESSION['losi_signInName'];
    $supplierID = $_SESSION['losi_signInID'];
}

elseif($type == "Sign Up") {
    $name = $_SESSION['losi_signUpName'];
    $supplierID = $_SESSION['losi_signUpID'];
}
?>

<div class = "menu-content">

    <?php include 'PHP/DatabasePHP/mysqlconnect.php'; ?>

    <form action = "edit_profile_supplier.php" method = "POST" id = "edit-profile-supplier-content-form">
        <div class = "edit-profile-supplier-content">
            <div class = "edit-profile-content-items" id = "edit-profile-supplier-id">
                <label for = "make-order-product-name-label">Supplier ID</label>
                <input type = "text" id = "edit-profile-supplier-id-textbox" name = "edit-profile-supplier-id-textbox" value="<?php echo $supplierID; ?>">
            </div>
            <div class = "edit-profile-content-items" id = "edit-profile-supplier-name">
                <label for = "make-order-category-label">Supplier's Name</label>
                <input type = "text" id = "edit-profile-supplier-name-textbox" name = "edit-profile-supplier-name-textbox" value="<?php echo $name; ?>">
            </div>

            <div class = "edit-profile-content-items" id = "edit-profile-new-password">
                <label for = "make-order-quantity-label">New Password</label>
                <input type = "password" id = "edit-profile-new-password-textbox" name = "edit-profile-new-password-textbox" value="">
            </div>

            <input class = "btn-single" id = "edit-profile-supplier-save-changes-btn" type = "submit" value = "Save Changes">
            <input type="hidden" name="submitted" value="TRUE" />
        </div>
    </form>
</div>

<?php

    if (isset($_POST['submitted'])) {
        $newName = $_POST['edit-profile-supplier-name-textbox'];
        $newPassword = $_POST['edit-profile-new-password-textbox'];
        $newSupplierID = $_POST['edit-profile-supplier-id-textbox'];

        saveChangesEditProfile($supplierID, $newName, $newPassword);
        changeSupplierID($supplierID, $newSupplierID);
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
    
    
?>

<?php
ob_end_flush(); // Flush the output
?>