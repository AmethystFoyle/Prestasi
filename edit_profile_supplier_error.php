<?php
session_start();
include 'HTML/Dashboard/Supplier/EditProfile/edit_profile_content_supplier_php.php';
$errorMsg = $_SESSION['epcsupplier_errorMsg'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prestasi</title>

    <!-- Load the font IBM Plex Mono from Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="CSS/main.css">
    <link rel="stylesheet" href="CSS/ui.css">

    <link rel="stylesheet" href="CSS/main_container.css">
</head>

    <body>
        <div class = "menu-content">
        <h1>ERROR!</h1>
        <h3>Your error: <?php echo $errorMsg;?></h3>
        <br>
        <a href = "edit_profile_supplier.php" style = "color: yellow;">Go Back to Edit Profile (Supplier) Page</a>
    </body>
</html>