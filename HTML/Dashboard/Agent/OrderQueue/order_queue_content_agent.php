<?php include 'PHP/LoginSignup/losi_content_php.php';

$type = $_SESSION['losi_signInSignUpType'];

if($type == "Sign In") {
    $agentID = $_SESSION['losi_signInID'];
}

elseif($type == "Sign Up") {
    $agentID = $_SESSION['losi_signUpID'];
}

displayAllItemsOrderQueueAgent($agentID);
?>

<!-- nanti kat button buh a href = make_order_agent.php -->