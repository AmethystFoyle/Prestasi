<?php include 'PHP/LoginSignup/losi_content_php.php';

$type = $_SESSION['losi_signInSignUpType'];
$itemID = isset($_SESSION['itemID']) ? $_SESSION['itemID'] : null;

$supplierID = $_SESSION['losi_supplierID'];

if($type == "Sign In") {
    $supplierID = $_SESSION['losi_signInID'];
}

elseif($type == "Sign Up") {
    $supplierID = $_SESSION['losi_signUpID'];
}

    displayAllItemsAgent($supplierID);
?>

<!-- nanti kat button buh a href = make_order_agent.php -->