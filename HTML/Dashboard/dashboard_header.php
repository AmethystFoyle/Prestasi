<?php
$welcomeMessage = "Welcome, " . $_SESSION['losi_signUpName'];
$agentID = "Agent - ID: " . $_SESSION['losi_signUpID'];
?>

<div class = "dashboard-header">
    <div class = "dashboard-header-title">
        <h3 id="dashboard-header-title-title"><?php echo $welcomeMessage?></h3>
        <p id = "dashboard-header-title-usertype-and-id"><i><?php echo $agentID ?></i></p>
    </div>
    <button class = "btn-single" id = "dashboard-header-edit-profile">Edit Profile</button>
    <button class = "btn-single" id = "dashboard-header-log-out">Log Out</button>
</div>