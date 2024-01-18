<?php include 'PHP/LoginSignup/losi_content_php.php';

$type = $_SESSION['losi_signInSignUpType'];
$itemID = isset($_SESSION['itemID']) ? $_SESSION['itemID'] : null;

if($type == "Sign In") {
    $supplierID = $_SESSION['losi_signInsupplierID'];
}

elseif($type == "Sign Up") {
    $supplierID = $_SESSION['losi_signUpsupplierID'];
}

    displayAllItemsAgent($supplierID);
?>

<!-- nanti kat button buh a href = make_order_agent.php -->