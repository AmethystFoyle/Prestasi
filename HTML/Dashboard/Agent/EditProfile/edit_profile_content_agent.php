<?php

$type = $_SESSION['losi_signInSignUpType'];

if($type == "Sign In") {
    $name = $_SESSION['losi_signInName'];
    $agentID = $_SESSION['losi_signInID'];
}

elseif($type == "Sign Up") {
    $name = $_SESSION['losi_signUpName'];
    $agentID = $_SESSION['losi_signUpID'];
}
?>

<div class = "menu-content">
    <form action = "edit_profile_content_agent.php" method = "POST" id = "edit-profile-agent-content-form">
        <div class = "edit-profile-agent-content">
            <div class = "edit-profile-content-items edit-profile-content-disabled" id = "edit-profile-agent-id">
                <label for = "make-order-product-name-label">Agent ID</label>
                <input type = "text" id = "edit-profile-agent-id-textbox" name = "edit-profile-agent-id-textbox" value="<?php echo $agentID; ?>" title="Only Supplier can edit this!" readonly>
            </div>
            <div class = "edit-profile-content-items" id = "edit-profile-agent-name">
                <label for = "make-order-category-label">Agent's Name</label>
                <input type = "text" id = "edit-profile-agent-name-textbox" name = "edit-profile-agent-name-textbox" value="<?php echo $name; ?>">
            </div>

            <div class = "edit-profile-content-items" id = "edit-profile-new-password">
                <label for = "make-order-quantity-label">New Password</label>
                <input type = "password" id = "edit-profile-new-password-textbox" name = "edit-profile-new-password-textbox" value="">
            </div>

            <div class = "edit-profile-content-items" id = "edit-profile-confirm-new-password">
                <label for = "make-order-stock-label">Confirm New Password</label>
                <input type = "password" id = "edit-profile-confirm-new-password-textbox" name = "edit-profile-confirm-new-password-textbox" value="">
            </div>

            <input class = "btn-single" id = "edit-profile-agent-save-changes-btn" type = "submit" value = "Save Changes">
        </div>
    </form>
</div>