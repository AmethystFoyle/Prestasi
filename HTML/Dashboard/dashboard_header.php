<?php

$type = $_SESSION['losi_signInSignUpType'];
$user = $_SESSION['losi_userType'];

if($type == "Sign In") {
    $welcomeMessage = "Welcome, " . $_SESSION['losi_signInName'];
    $agentID = "$user - ID: " . $_SESSION['losi_signInID'];
}

elseif($type == "Sign Up") {
    $welcomeMessage = "Welcome, " . $_SESSION['losi_signUpName'];
    $agentID = "$user - ID: " . $_SESSION['losi_signUpID'];
}

if($user == "Agent") {
    $editProfileBtn = "edit_profile_agent.php";
} elseif($user == "Supplier") {
    $editProfileBtn = "edit_profile_supplier.php";
}


?>

<div class = "dashboard-header">
    <div class = "dashboard-header-title">
        <h3 id="dashboard-header-title-title"><?php echo $welcomeMessage?></h3>
        <p id = "dashboard-header-title-usertype-and-id"><i><?php echo $agentID ?></i></p>
    </div>
    <a href = <?php echo $editProfileBtn ?> ><button class = "btn-single" id = "dashboard-header-edit-profile">Edit Profile</button></a>
    <a href = "index.php"><button class = "btn-single" id = "dashboard-header-log-out">Log Out</button></a>
</div>