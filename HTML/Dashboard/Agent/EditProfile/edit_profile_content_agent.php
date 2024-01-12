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

    <?php include 'PHP/DatabasePHP/mysqlconnect.php'; ?>

    <form action = "edit_profile_agent.php" method = "POST" id = "edit-profile-agent-content-form">
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

            <input class = "btn-single" id = "edit-profile-agent-save-changes-btn" type = "submit" value = "Save Changes">
            <input type="hidden" name="submitted" value="TRUE" />
        </div>
    </form>
</div>

<?php

    if (isset($_POST['submitted'])) {
        $newName = $_POST['edit-profile-agent-name-textbox'];
        $newPassword = $_POST['edit-profile-new-password-textbox'];

        saveChangesEditProfile($agentID, $newName, $newPassword);
    }

    function saveChangesEditProfile($agentID, $newName, $newPassword) {
        if ($newName != $_SESSION['losi_signInName']) {
            changeNameAgent($agentID, $newName);
        }

        if (!empty($newPassword)) {
            changePasswordAgent($agentID, $newPassword);
        }
    }

    function changeNameAgent($agentID, $newName) {
        // Connect to the database
        $conn = connectToDatabase();
    
        // Update the name directly
        $updateNameQuery = "UPDATE agent SET AgentName = '$newName' WHERE AgentID = '$agentID'";
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
    
    function changePasswordAgent($agentID, $newPassword) {
        // Connect to the database
        $conn = connectToDatabase();
    
        // Update the password directly
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $updatePasswordQuery = "UPDATE agent SET AgentPassword = '$hashedPassword' WHERE AgentID = '$agentID'";
        
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
    
?>

<?php
ob_end_flush(); // Flush the output
?>