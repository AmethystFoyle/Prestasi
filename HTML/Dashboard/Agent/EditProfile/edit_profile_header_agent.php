<?php

$type = $_SESSION['losi_signInSignUpType'];

if($type == "Sign In") {
    $name = $_SESSION['losi_signInName'];
}

elseif($type == "Sign Up") {
    $name = $_SESSION['losi_signUpName'];
}
?>

<div class = "menu-header">
    <div class = "menu-header-title">
        <h3 id = "menu-header-title-title">Edit Profile</h3>
        <p id = "menu-header-title-extra-info"><i><?php echo $name ?></i></p>
    </div>
    <a href = "dashboard_agent.php" class = "menu-header-go-back-btn"><button class = "btn-single">Go Back</button></a>
</div>