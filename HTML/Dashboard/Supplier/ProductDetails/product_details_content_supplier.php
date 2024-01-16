<?php include 'PHP/Dashboard/Supplier/add_new_item_supplier_php.php';

$type = $_SESSION['losi_signInSignUpType'];

if($type == "Sign In") {
    $supplierID = $_SESSION['losi_signInID'];
}

elseif($type == "Sign Up") {
    $supplierID = $_SESSION['losi_signUpID'];
}

    displayAllItems($supplierID);
?>

<div class = "menu-content-supplier-add-new">
        <br><br><br><br>
        <h4 id = "product_detail_supplier_add_new_title">Please click the button below to add a new product.</h4>
        <a href = "add_new_item_supplier.php"><button class = "btn-single">Add New</button></a>
</div>