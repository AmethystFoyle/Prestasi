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
            <div class = "edit-profile-content-items edit-profile-content-disabled" id = "edit-profile-supplier-id">
                <label for = "make-order-product-name-label">Supplier ID</label>
                <input type = "text" id = "edit-profile-supplier-id-textbox" name = "edit-profile-supplier-id-textbox" value="<?php echo $supplierID; ?>" pattern="\d{4}" minlength="4" maxlength="4" readonly>
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
            <?php include 'HTML/Dashboard/Supplier/EditProfile/edit_profile_content_supplier_php.php'; ?>
        </div>
    </form>
</div>

