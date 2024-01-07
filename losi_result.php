<?php
include 'PHP/LoginSignup/losi_content_php.php';

$errorMsg = $_SESSION['losi_errorMsg'];
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

    <link rel="stylesheet" href="CSS/losi_title_section.css">
    <link rel="stylesheet" href="CSS/losi_form.css">
</head>

    <body>
        <div id = "losi-form">
        <h1>ERROR!</h1>
        <h3>Your error: <?php echo $errorMsg;?></h3>
        <br>
        <a href = "index.php" style = "color: yellow;">Go Back to Sign In / Sign Up Page</a>
    </body>
</html>
<?php
ob_end_flush(); // Flush the output
?>