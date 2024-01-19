<?php include 'PHP/LoginSignup/losi_content_php.php';

$type = $_SESSION['losi_signInSignUpType'];

if($type == "Sign In") {
    $supplierID = $_SESSION['losi_signInID'];
}

elseif($type == "Sign Up") {
    $supplierID = $_SESSION['losi_signUpID'];
}

displayAllItemsOrderQueueSupplier($supplierID)
?>

<!-- nanti kat button buh a href = make_order_agent.php -->